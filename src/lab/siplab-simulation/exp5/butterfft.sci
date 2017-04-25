function butterfft(ft,tline1,tline3,tline4,r,c,no_layer,RGB,path,typef)




fil_lvl=strcmp(tline1,'lowpass','i');




select fil_lvl
    case 0

H=buttertest(r,c,tline3,tline4);
ft2=fft2(H);
for j=1:no_layer
  ft_con(:,:,j)=ft2 .* ft(:,:,j);  
end

for i=1:no_layer
    a=ifft2d(ft_con(:,:,i));
    minPxlVal = min(min(a));
    maxPxlVal = max(max(a));
    maxmin = (maxPxlVal - minPxlVal); 
    ft_con(:,:,i) = real((a-minPxlVal)./ maxmin);
    
end
ft_con1=real(ft_con(1:r,1:c,:));
gra=rgb2gray(ft_con1);
imwrite(gra,path+typef+tline1+' filteredimg.jpg');



for i =1:no_layer
    ft_con2=real(ft_con(1:r,1:c,i));
    imwrite(ft_con2,path+typef+tline1+' filteredimg '+string(RGB(i))+'.jpg');
end

else
  H =buttertest(r,c,tline3,tline4);
  H=1-H;
ft2=fft2(H);
for j=1:no_layer
  ft_con(:,:,j)=ft(:,:,j).* ft2;  
end

for i=1:no_layer
    a=ifft2d(ft_con(:,:,i));
    minPxlVal = min(min(a));
    maxPxlVal = max(max(a));
    maxmin = (maxPxlVal - minPxlVal); 
    ft_con(:,:,i) = real((a-minPxlVal)./ maxmin);
    
end
ft_con1=real(ft_con(1:r,1:c,:));

gra=rgb2gray(ft_con1);
imwrite(gra,path+typef+tline1+' filteredimg.jpg');



for i =1:no_layer
    ft_con2=real(ft_con(1:r,1:c,i));
    imwrite(ft_con2,path+typef+tline1+' filteredimg '+string(RGB(i))+'.jpg');
end
end
endfunction
