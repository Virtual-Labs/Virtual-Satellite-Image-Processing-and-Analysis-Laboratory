exec('/usr/share/scilab/contrib/sivp/loader.sce');
cd '/home/priya/Desktop/edge'
getd('/home/priya/Desktop/edge');

stacksize('max');
mode(-1);
fname='inputimage';
RGB=4;
[img, RbandVal]=imgdisplay1(fname,RGB)

//img=imread('out_original_img.jpg');
//img=img(:,:,1);
//img=double(img)
thresh=0.02;
direction='horizontal';
thinning=1;
edgeImg = edge2(img,'log',thresh,direction);
//edgeImg=skeleton(edgeImg);
imwrite(edgeImg,'out_edge_img7.jpg');
