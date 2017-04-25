stacksize('max');

mode(-1)
exec('/usr/share/scilab/contrib/sivp/loader.sce');
getd;
//cd '/home/priya/Desktop/img-disp-scilab-1';
fname='inputimage';
win4pix='win4pix.txt';
//RGB=evstr(x_dialog('RGB bands ?','1 1 1'));
//subsetrow=evstr(x_dialog('Enter Row Start and Row End for subset image ','70 180'));
//subsetcol=evstr(x_dialog('Enter Column Start and Column End for subset image ','70 180'));
RGB=[1 2 3];
subsetrow=[70 180];
subsetcol=[70 180];
img = imgdisplay(fname,RGB,subsetrow,subsetcol,win4pix);
//imshow(img)
disp(size(img),"size of image")

