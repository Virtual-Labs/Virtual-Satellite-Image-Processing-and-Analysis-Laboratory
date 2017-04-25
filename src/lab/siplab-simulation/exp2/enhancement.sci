function enhancement(pic,RGB,tp1,tp11,tp12,var1,var2,path)
//***************************************************************
//program for IMAGE ENHANCEMENT
//Author: L.N.Eeti, Research Assistant, CSRE. (28/03/2011)
//this program requires param.txt and RGB.txt file; param.txt contents are
  //  % name of test image e.g. quickbird.jpg
   // % name of enhancement method e.g. logarithmic
     //   %**Linear/StandardDeviation/Histogram/Logarithmic/Exponential/Decor
       //         %-relation
    //% value of var1 (if needed)
   // % value for var2 (if needed)
  //%***RGB.txt contains band combinations e.g. 3 2 1(multiband) or 1 1 1 (if single
  //%band)
//%***************************************************************

//tp11=ascii(part(tp1,1));
//tp12=ascii(part(tp1,3));

[img,RbandVal,GbandVal,BbandVal] = imgdisplay1(pic,RGB,path);

if(tp11==76 & tp12==110) //linear stretching
   
    img=double(img);
    enimg=zeros(size(img,1),size(img,2),size(img,3));
    for i=1:size(img,3)
        min_val=min(min(img(:,:,i)));
        max_val=max(max(img(:,:,i)));
        for j=1:size(img,1)
            for k=1:size(img,2)
                enimg(j,k,i)=255*((img(j,k,i)-min_val)./(max_val-min_val));
            end
        end
    end
    enimg=uint8(enimg);
   imwrite(enimg,path+'EnhancedImage.jpg'); 
   
elseif(tp11==83)// standard deviation stretch
    img=double(img);
    enimg=zeros(size(img,1),size(img,2),size(img,3));
    for i=1:size(img,3)
        mean_val=mean2(img(:,:,i));
        std_val=std2(img(:,:,i));
        min_val=mean_val-(var1*std_val);   //var1 > 0
        max_val=mean_val+(var1*std_val);
        for j=1:size(img,1)
            for k=1:size(img,2)
                if(img(j,k,i)>max_val)
                    enimg(j,k,i)=255;
                elseif(img(j,k,i)<min_val)
                    enimg(j,k,i)=0;
                else
                    enimg(j,k,i)=round(255*((img(j,k,i)-min_val)./(max_val-min_val)));
                end
                
            end
        end
    end
    enimg=uint8(enimg);
   imwrite(enimg,path+'EnhancedImage.jpg'); 
   
   
   elseif(tp11==72)// histogram equalization
    enimg=zeros(size(img,1),size(img,2),size(img,3));
    for i=1:size(img,3)
        
         enimg(:,:,i)=histeq(img(:,:,i));        
    end 
    if(size(img,3)==1)
        enimg=uint8(enimg(:,:,1));
    else
     R = enimg;
    G = enimg;
    B = enimg;
    R(:,:,2)=0;
    R(:,:,3)=0;
    G(:,:,1)=0;
    G(:,:,3)=0;
    B(:,:,1)=0;
    B(:,:,2)=0;
       
        enimg=R+G+B;
        enimg=uint8(enimg);
    end
    imwrite(enimg,path+'EnhancedImage.jpg');
   
   
   elseif(tp11==76 & tp12==103)//logarithmic stretch
    img=double(img);
    enimg=zeros(size(img,1),size(img,2),size(img,3));
    for i=1:size(img,3)
        min_val=min(min(img(:,:,i)));
        max_val=max(max(img(:,:,i)));
        x_min=log(1+min_val);x_max=log(1+max_val);
        k_val=255/(x_max-x_min);
        if(var1==[]) //default
           for j=1:size(img,1)
                for k=1:size(img,2)
                    enimg(j,k,i)=k_val*(log(1+img(j,k,i))-x_min); 
                    if(enimg(j,k,i)>255)
                        enimg(j,k,i)=255;
                    end
                end
           end 
        else
        for j=1:size(img,1)
            for k=1:size(img,2)
                enimg(j,k,i)=k_val*(log(1+img(j,k,i))-x_min)+var1; //var1=[0 255]
                if(enimg(j,k,i)>255)
                        enimg(j,k,i)=255;
                end
            end
        end
        end
    end
   enimg=uint8(enimg);
   imwrite(enimg,path+'EnhancedImage.jpg');  
   
   
   elseif(tp11==69)//exponential stretch
    img=double(img);
   enimg=zeros(size(img,1),size(img,2),size(img,3));
    for i=1:size(img,3)
        min_val=min(min(img(:,:,i)));
        max_val=max(max(img(:,:,i)));
        x_min=(min_val)^var1;x_max=(max_val)^var1; //var1=[0 2]
        k_val=255 ./(x_max-x_min);
        if(var1==[]) //default
           for j=1:size(img,1)
                for k=1:size(img,2)
                    enimg(j,k,i)=k_val*((img(j,k,i)^1.5)-x_min); 
                    if(enimg(j,k,i)>255)
                        enimg(j,k,i)=255;
                    end
                end
           end 
        else
        for j=1:size(img,1)
            for k=1:size(img,2)
                enimg(j,k,i)=k_val*((img(j,k,i)^var1)-x_min)+var2; //var2=[0 255]
                if(enimg(j,k,i)>255)
                        enimg(j,k,i)=255;
                end
            end
        end
        end
    end
   enimg=uint8(enimg);
   imwrite(enimg,path+'EnhancedImage.jpg'); 
   
   
   elseif(tp11==68)//decorrelation stretch
    img=double(img);
    enimg=decorr(img);
    enimg=uint8(enimg);
    imwrite(enimg,path+'EnhancedImage.jpg');
    
      
end



//Histogram start
if (isequal(RbandVal,GbandVal) & isequal(GbandVal,BbandVal)) then
    for k=1:256
   h(k)=length(find(enimg(:,:,1)==(k-1)));
end
   scf(1);
      
      plot2d3('gnn',[1:256],h);
      xlabel("Gray value","color","red");
      ylabel("Number of pixels","color","red");
      
      title('Histogram of band '+string(RbandVal)+' of '+pic+' AFTER '+tp1+' stretching ','color','red');
      
      xs2jpg(gcf(),path+"out_hist_afterenhancement band '+string(RbandVal)+'.jpg");
     
      xdel(winsid());
 

else
    
 for i=1:size(enimg,3)
      
      for k=1:256
    h(k)=length(find(enimg(:,:,i)==(k-1)));
end
 scf(1);


      
      plot2d3('gnn',[1:256],h);
      xlabel("Gray value","color","red");
      ylabel("Number of pixels","color","red");
      
      title("Histogram of band "+string(RGB(i))+" of '+pic+' AFTER '+tp1+' stretching ',"color","red");
      
      xs2jpg(gcf(),path+"out_hist_afterenhancement band "+string(RGB(i))+".jpg");
     
      xdel(winsid());
        
end
end
endfunction
