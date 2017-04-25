function filternew(pic,RGB,tp1,tp11,tp12,winSize1,winSize2,sigma,path)

//******************************************************
//code developed by: L.N.Eeti,Research Assistant,CSRE.
//Date:25-02-2011

//input name of any filter shall exactly match as given under 
//Gaussian filter/Lee filter/Average(Mean) filter/Median filter/Circular
//filter

//contents of param.txt
  //  %filter name e.g. Median filter
   // %window size1(rows) e.g. 3
   // %windoe size2(cols) e.g. 5
   // %test image name e.g. inputimage
   // %sigma value(for gaussian)/k value(sigma filter/LEE filter)   **sigma=[0.5  3];
     //                                                             %**k=[1 2] (for sigma filter)
       //                                                           %**k=[0 1) (for lee filter)
 
//%contents of RGB.txt: band numbers e.g. 4 3 2

//% outputs: histogram of each band before and after filtering;a filtered image
//%***********************************************************
stacksize('max');
mode(-1);

[img,RbandVal,GbandVal,BbandVal] = imgdisplay1(pic,RGB,path);
bnd=[RbandVal, GbandVal, BbandVal];
[r,c,b]=size(img);
img=double(img);
fil_img = zeros(r,c,b);
filImg = zeros(r,c,b);


if (tp11==65) //average filter
    out_fname = path+'FilteredImage.jpg';
    F=ones(winSize1,winSize2)/winSize1/winSize2;
    F=double(F);
    
    for i=1:b
         fil_img(:,:,i)=conv2(img(:,:,i),F,"same");
    end
    
elseif isequal(tp11,67)  //circular filter
    out_fname = path+'FilteredImage.jpg';
    p2=floor(sqrt(winSize1*winSize2));
    F=circularfilter(p2);
     for i=1:b 
         fil_img(:,:,i)=conv2(img(:,:,i),F,"same");
    end  
    
elseif isequal(tp11,71) //gaussian filter
    out_fname = path+'FilteredImage.jpg';
    w=[winSize1,winSize2];
     F=fspecial('gaussian',w,sigma);
     for i=1:b
         fil_img(:,:,i)=conv2(img(:,:,i),F,"same");
    end  
    
elseif isequal(tp11,76)//lee filter
    out_fname = path+'FilteredImage.jpg';
    var1=sigma;
    siz=[winSize1 winSize2];

 win_centre=floor(([winSize1 winSize2]+1)/2);
     u=win_centre-1;
     img1= zeros(r+2*u(1,1),c+2*u(1,2),b);
     for i=1:b
        img1(:,:,i)=padding(img(:,:,i),[u(1,1) u(1,2)]);
    end
     
      fil_img= leefilter(img1,siz,var1,win_centre);
    
elseif (isequal(tp11,77) & isequal(tp12,101))//median filter
    out_fname = path+'FilteredImage.jpg';
    for i=1:b
        fil_img(:,:,i)=medfilt2(img(:,:,i),[winSize1 winSize2]);
    end
    
    
    elseif isequal(tp11,83)       //sigma filter
    out_fname = path+'FilteredImage.jpg';

     var1=sigma;  
     win_centre=floor(([winSize1 winSize2]+1)/2);
     u=win_centre-1;
      siz=[winSize1 winSize2];
     img1= zeros(r+2*u(1,1),c+2*u(1,2),b);
     for i=1:b
        img1(:,:,i)=padding(img(:,:,i),[u(1,1) u(1,2)]);
    end
    
    fil_img= sigmafilter(img1,siz,var1);
    
    
    elseif isequal(tp11,77) & isequal(tp12,111) //mode filter
    out_fname=path+'FilteredImage.jpg';
    win_centre=floor(([winSize1 winSize2]+1)/2);
     u=win_centre-1;
     img1= zeros(r+2*u(1,1),c+2*u(1,2),b);
     for i=1:b
        img1(:,:,i)=padding(img(:,:,i),[u(1,1) u(1,2)]);
    end
     
     
     for j = 1:r - winSize1 + 1
            for i = 1:c - winSize2 + 1
                win = double(img1(j:j + winSize1 - 1, i:i + winSize2 - 1, :));
                
                for k=1:b
                    
                                x_mode=modefilter(win(:,:,k));
                                fil_img(((2*j+winSize1-1)/2)-1,((2*i+winSize2-1)/2)-1,k)=x_mode;
                                    
                end
            end
        end
    
     elseif isequal(tp11,87)//weighted average filter
    out_fname=path+'FilteredImage.jpg';
    COF="COF.txt";
    kern1=getcof(COF);
       [m,n]=size(kern1);
    coff_sum=sum(sum(kern1));
    if (coff_sum >1)
        kern1=kern1./ coff_sum;
    end
    if (b>1)
        kern=zeros(m,n,3);
        for i=1:b
            kern(:,:,i)=kern1;
        end
      
    end
    siz=[winSize1 winSize2];
    win_centre=floor(([winSize1 winSize2]+1)/2);
    u=win_centre-1;
    img1= zeros(r+2*u(1,1),c+2*u(1,2),b);
    for i=1:b
        img1(:,:,i)=padding(img(:,:,i),[u(1,1) u(1,2)]);
    end
          fil_img=weightavgfilter(img1,siz,kern);
    
    end
    
    
    for i=1:size(filImg,3)
        minPxlVal = min(min(fil_img(:,:,i)));
        maxPxlVal = max(max(fil_img(:,:,i)));
        maxmin = 1/(maxPxlVal - minPxlVal);    
        filImg(:,:,i) = 255*((fil_img(:,:,i)-minPxlVal).*maxmin);
    end
filImg=uint8(filImg);
   imwrite(filImg,out_fname); 
   
   


//Histogram start

if (isequal(RbandVal,GbandVal) & isequal(GbandVal,BbandVal)) then
    for k=1:256
   h(k)=length(find(filImg(:,:,1)==(k-1)));
end
   scf(1);
      
      plot2d3('gnn',[1:256],h);
      xlabel("Gray value","color","red");
      ylabel("Number of pixels","color","red");
      
      title('Histogram of band '+string(RbandVal)+' of '+pic+' AFTER '+tp1+' smoothening ','color','red');
      
      xs2jpg(gcf(),path+"out_hist_afterfilter '+string(RbandVal)+'.jpg");
     
      xdel(winsid());

else
    
 for i=1:b
      
      for k=1:256
    h(k)=length(find(filImg(:,:,i)==(k-1)));
end
 scf(1);

      plot2d3('gnn',[1:256],h);
      xlabel("Gray value","color","red");
      ylabel("Number of pixels","color","red");
      
      title("Histogram of band "+string(bnd(i))+" of '+pic+' AFTER '+tp1+' smoothening ',"color","red");
      
      xs2jpg(gcf(),path+"out_hist_afterfilter band "+string(bnd(i))+".jpg");
     
      xdel(winsid());
        
end
end 

endfunction
