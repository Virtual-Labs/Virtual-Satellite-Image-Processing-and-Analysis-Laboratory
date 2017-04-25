function imout=bilimage(filename,row,col,band,bnd)


stacksize('max')

//fname='inputimage.hdr';
//[NumCols,NumRows,NumBands,Offset,DataType,InterleaveType] = readSatImgInfo(fname)
//filename='inputimage1';
//row=801;
//col=1401;
//band=6;
[fd_r] = mopen(filename,'r');

   
     
     p=col;
   
  
  mseek(0)
  
  
  a=1;
 for i=1:row
         
   
              for j=1:band,
   n=mgeti(p,'us',fd_r);
  m=uint8(n);
   
   [x,y]=size(m);
   if(y==p)
      B(:,j,i)=m
  else
      m=resize_matrix(m,x,p)
       B(:,j,i)=m
      end
      mseek(p*a);
       a=a+1;
      
   end
          
           end
      
       mclose(fd_r)
       i=permute(B,[3 1 2]);


c2=(col/2)+1;

r=linspace(0,1,255)';
g=zeros(255,1);
b=zeros(255,1);
cmap=[r g b];
cmap1=[g r b];
cmap2=[g b r];
b1=bnd(1,1);
b2=bnd(1,2);
b3=bnd(1,3);

    img1=i(:,1:c2,b1);
im=imresize(img1,[row col])
  im1=ind2rgb(im,cmap);
  
//imwrite(im1,'imgrgb4.jpg'); 
 
img1=i(:,1:c2,b2);
im=imresize(img1,[row col])
  im2=ind2rgb(im,cmap1);
//imwrite(im1,'imgrgb5.jpg');
  
img1=i(:,1:c2,b3);
im=imresize(img1,[row col])
  im3=ind2rgb(im,cmap2);
//imwrite(im1,'imgrgb6.jpg');  

imout=im1+im2+im3;
//imwrite(imout,'imgtrail.jpg');  
//imshow(imout)
endfunction
