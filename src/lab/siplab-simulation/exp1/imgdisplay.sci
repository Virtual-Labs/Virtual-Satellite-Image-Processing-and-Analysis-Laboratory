
function img=imgdisplay(fname,RGB,subsetrow,subsetcol,win4pix,path)

// Output variables initialisation (not found in input variables)
img=[];

// Display mode
mode(-1);

// Display warning for floating point exception
ieee(1);
//fname='inputimage';
//RGB='RGB.txt';
//win4pix='win4pix.txt';

if(isequal(part(fname, length(fname)-3),'.') | isequal(part(fname, length(fname)-4),'.')) then
  //rgb_fid = mopen(RGB,"r");
  //while ~meof(rgb_fid)
    //tline = mgetl(rgb_fid,1);  if meof()~=0 then tline = -1;end;
    //if type(tline)==10 then 
   
  //  [Tokens] = strtok_n(tline," "); // read Red Band value
    //RbandVal = evstr(Tokens(1))
    
    //GbandVal =evstr(Tokens(2)) // read Green Band value
    
    //BbandVal =evstr(Tokens(3)) // read Blue Band value 
    //row1 = evstr(mgetl(rgb_fid,1))   
    //row2 = evstr(mgetl(rgb_fid,1))  
    //col1 = evstr(mgetl(rgb_fid,1))  
    //col2 = evstr(mgetl(rgb_fid,1)) 
//  end
 
    
//end
//mclose(rgb_fid);
RbandVal=RGB(1,1);
GbandVal=RGB(1,2);
BbandVal=RGB(1,3);
row1=subsetrow(1,1);
row2=subsetrow(1,2);
col1=subsetcol(1,1);
col2=subsetcol(1,2);

 i = imread(fname);
 [r,c]=size(i)
 
if (isequal(RbandVal,GbandVal) & isequal(GbandVal,BbandVal)) then
        
      img = i(:,:,RbandVal);
    if (row1)~=[] then
     
      subset = img(row1:row2,col1:col2,:);
     
      imwrite(subset,path+'out_subset_img.jpg');
     
    end;
else
   img(:,:,1)=i(:,:,RbandVal);
         img(:,:,2)=i(:,:,GbandVal);
          img(:,:,3)=i(:,:,BbandVal);
  
  
[r,c]=size(img)
    
    if (row1)~=[] then
      subset = img(row1:row2,col1:col2,:); 
       //imshow(uint8(subset))
      imwrite((subset),path+'out_subset_img.jpg');
    end;
end
imwrite(img,path+'out_original_img.jpg');

//Histogram start
if(size(img,3)>1)
        for i=1:size(img,3)
      
      for k=1:256
    h(k)=length(find(img(:,:,i)==(k-1)));
end
 scf(1);

//imhist(img(:,:,i),255,'');
      
      plot2d3('gnn',[1:256],h);
      xlabel("Gray value","color","red");
      ylabel("Number of pixels","color","red");
      
      title("Histogram of band "+string(RGB(i))+" in "+fname,"color","red");
      
      xs2jpg(gcf(),path+"out_hist_band "+string(RGB(i))+".jpg");
     
      xdel(winsid());
        
        
        

        end

else
    for k=1:256
   h(k)=length(find(img==(k-1)));
end
   scf(1);
      
  
//imhist(img,255,'');
      plot2d3('gnn',[1:256],h);
      xlabel("Gray value","color","red");
      ylabel("Number of pixels","color","red");
      
      title("Histogram of band "+string(RbandVal)+" in "+fname,"color","red");
      
      xs2jpg(gcf(),path+"out_hist_band "+string(RbandVal)+".jpg");
     
      xdel(winsid());

end

else
[NumCols,NumRows,NumBands,Offset,DataType,InterleaveType] = readSatImgInfo(fname);

//rgb_fid = mopen(RGB,"r");
  //while ~meof(rgb_fid)
    //tline = mgetl(rgb_fid,1);  if meof()~=0 then tline = -1;end;
    //if type(tline)==10 then 
   
  //  [Tokens] = strtok_n(tline," "); // read Red Band value
    //RbandVal = evstr(Tokens(1))
    
    //GbandVal =evstr(Tokens(2)) // read Green Band value
    
    //BbandVal =evstr(Tokens(3)) // read Blue Band value 
//    row1 = evstr(mgetl(rgb_fid,1))   
  //  row2 = evstr(mgetl(rgb_fid,1))  
    //col1 = evstr(mgetl(rgb_fid,1))  
    //col2 = evstr(mgetl(rgb_fid,1)) 
//  end
 
    
//end

//mclose(rgb_fid);

RbandVal=RGB(1,1);
GbandVal=RGB(1,2);
BbandVal=RGB(1,3);
row1=subsetrow(1,1);
row2=subsetrow(1,2);
col1=subsetcol(1,1);
col2=subsetcol(1,2);

bnd=[RbandVal GbandVal BbandVal];
i=bilimage(fname,NumRows,NumCols,NumBands,bnd);


if (isequal(RbandVal,GbandVal) & isequal(GbandVal,BbandVal)) then
        
      img = i(:,:,1);
    if (row1)~=[] then
     
      subset = img(row1:row2,col1:col2,:);
     
      imwrite(subset,path+'out_subset_img.jpg');
     
    end;
else
    R = i;
    G = i;
    B = i;
    R(:,:,2)=0;
    R(:,:,3)=0;
    G(:,:,1)=0;
    G(:,:,3)=0;
    B(:,:,1)=0;
    B(:,:,2)=0;
       
        img=R+G+B;
  
    
    if (row1)~=[] then
      subset = img(row1:row2,col1:col2,:); 
       //imshow(uint8(subset))
      imwrite((subset),path+'out_subset_img.jpg');
    end;
end
imwrite(img,path+'out_original_img.jpg');

img=imread(path+'out_original_img.jpg');
//Histogram start
if (isequal(RbandVal,GbandVal) & isequal(GbandVal,BbandVal)) then
    for k=1:256
   h(k)=length(find(img(:,:,1)==(k-1)));
end
   scf(1);
      
      plot2d3('gnn',[1:256],h);
      xlabel("Gray value","color","red");
      ylabel("Number of pixels","color","red");
      
      title("Histogram of band "+string(RbandVal)+" in "+fname,"color","red");
      
      xs2jpg(gcf(),path+"out_hist_band "+string(RbandVal)+".jpg");
     
      xdel(winsid());
 

else
    
 for i=1:size(img,3)
      
      for k=1:256
    h(k)=length(find(img(:,:,i)==(k-1)));
end
 scf(1);


      
      plot2d3('gnn',[1:256],h);
      xlabel("Gray value","color","red");
      ylabel("Number of pixels","color","red");
      
      title("Histogram of band "+string(RGB(i))+" in "+fname,"color","red");
      
  xs2jpg(gcf(),path+"out_hist_band "+string(RGB(i))+".jpg");
     
      xdel(winsid());
        
end
end

  end;
  // pixel values in a 5x5 window start
//**************************************************************************
// ****needs a 'win4pix.txt' file; contents of which shall be as follows
        
        // ULC(upper left corner)/URC(upper right)/LLC(lower left)/LRC(lower-
        //right)/Middle/UserSpecified
        // 5x5 window coordinates(if user specifies) (first two values are
        // for rows and last two are for columns)
                //e.g.   12o
                //          124
                //          90
                //          94
        // band number       
 //*************************************************************************                          
  wpix=mopen(win4pix,'r');
   
    tp1 = mgetl(wpix,1);  
    tp11=ascii(part(tp1,1))
    tp12=ascii(part(tp1,2))
    r_min = evstr(mgetl(wpix,1))   
    r_max = evstr(mgetl(wpix,1))  
    c_min = evstr(mgetl(wpix,1))  
    c_max = evstr(mgetl(wpix,1)) 
  
    if (tp1~=[])
       band=evstr(mgetl(wpix))
       mclose(wpix);
       if (size(img,3)==1)
           band=1;
       end
       img1=img(:,:,band);
       if (tp11==85 & tp12==76) 
           nfid = mopen('ULC1.txt','wt');
           for i=1:5
               for j=1:5
               
           a=img1(i,j);
           mfprintf(nfid,'%d \t',a);
       end
       mfprintf(nfid,'\n');
   end
   mclose(nfid);
elseif (tp11==85 & tp12==82)
    nfid = mopen('URC1.txt','wt');
           for i=1:5
               for j=size(img,2)-4:size(img,2)
               
           a=img1(i,j);
           mfprintf(nfid,'%d \t',a);
       end
       mfprintf(nfid,'\n');
       end
 mclose(nfid);
elseif (tp11==76 & tp12==76)
    nfid = mopen('LLC1.txt','wt');
           for i=size(img,1)-4:size(img,1)
               for j=1:5
               
           a=img1(i,j);
           mfprintf(nfid,'%d \t',a);
       end
       mfprintf(nfid,'\n');
       end
 mclose(nfid);

elseif (tp11==76 & tp12==82)

nfid = mopen('LRC1.txt','wt');
           for i=size(img,1)-4:size(img,1)
               for j=size(img,2)-4:size(img,2)
               
           a=img1(i,j);
           mfprintf(nfid,'%d \t',a);
       end
       mfprintf(nfid,'\n');
       end
 mclose(nfid);

elseif (tp11==77)
           rm=ceil(size(img,1)/2);
           cm=ceil(size(img,2)/2);
nfid = mopen('Middle1.txt','wt');
           for i=rm-2:rm+2
               for j=cm-2:cm+2
           a=img1(i,j);
           mfprintf(nfid,'%d \t',a);
       end
       mfprintf(nfid,'\n');
       end
 mclose(nfid);
 
 
elseif(tp11==85 & tp12==115)
    nfid = mopen('Random1.txt','wt');
           for i=r_min:r_max
               for j=c_min:c_max
           a=img1(i,j);
           mfprintf(nfid,'%d \t',a);
       end
       mfprintf(nfid,'\n');
       end
 mclose(nfid);
end
end  
endfunction       
