
function [img, RbandVal]=imgdisplay1(fname,RGB,path)

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
  RbandVal=RGB;
   

 i = imread(fname);
 [r,c]=size(i)

      img = i(:,:,RbandVal);
      imwrite(img,path+'out_original_img.jpg');
else
[NumCols,NumRows,NumBands,Offset,DataType,InterleaveType] = readSatImgInfo(fname)

RbandVal=RGB;
   

bnd=[RbandVal RbandVal RbandVal];
i=bilimage(fname,NumRows,NumCols,NumBands,bnd);
       
      img = i(:,:,1);
  
imwrite(img,path+'out_original_img.jpg');

img=imread(path+'out_original_img.jpg');
img=img(:,:,1);

  end
 
endfunction       
