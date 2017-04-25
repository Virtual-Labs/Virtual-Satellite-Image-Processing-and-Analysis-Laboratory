function fftfilter(pic,RGB,tline1,tline3,tline4,typef,path)



[img, RbandVal, GbandVal, BbandVal]=imgdisplay1(pic,RGB,path);
[r,c,no_layer]=size(img);
img=double(img);

for i=1:no_layer
    data(:,:,i)=img(:,:,i);
end


    
ft=fft2(data,r,c);

for j=1:no_layer
ft_shift(:,:,j)=fftshift(ft(:,:,j));
ft_log=2*log(1+ft_shift);
J(:,:,j)=(imresize(ft_log(:,:,j),[r c]));
end

for i=1:size(J,3)
    minPxlVal = min(min(J(:,:,i)));
    maxPxlVal = max(max(J(:,:,i)));
    maxmin = 1/(maxPxlVal - minPxlVal);    
    J(:,:,i) = (J(:,:,i)-minPxlVal).* maxmin;
end

for i =1:no_layer
    imwrite(J(:,:,i),path+"out_magnitude_spectrum_"+string(RGB(i))+ ".jpg");
end

imwrite(J,path+'out_mag_spectrum_All.jpg');



select typef
case 'Butterworth' 
    butterfft(ft,tline1,tline3,tline4,r,c,no_layer,RGB,path,typef);
case 'Gaussian'
   gausfft(ft,tline1,tline3,tline4,r,c,no_layer,RGB,path,typef);
end
endfunction
