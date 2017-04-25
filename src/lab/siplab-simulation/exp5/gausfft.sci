function gausfft(ft,tline1,tline3,tline4,r,c,no_layer,RGB,path,typef)

    


fil_lvl=strcmp(tline1,'lowpass','i');

select fil_lvl
case 0
    w=[3 3];
    g_low=fspecial('gaussian',w,tline3);
    for i=1:3
        glow(:,:,i)=g_low;
    end
    
    ft2=fft2(glow,r,c);
for j=1:no_layer
ft_con(:,:,j)=ft(:,:,j).* ft2(:,:,j);
a=ifft2d(ft_con(:,:,j));
output(:,:,j)=uint8(real(a));
output_rz(:,:,j)=output(1:r,1:c);
end
    
    for i=1:no_layer
    a=ifft2d(ft_con(:,:,i));
    minPxlVal = min(min(a));
    maxPxlVal = max(max(a));
    maxmin = (maxPxlVal - minPxlVal); 
    fcc(:,:,i) = real((a-minPxlVal)./ maxmin);
    
end


ft_con1=real(fcc(1:r,1:c,:));
gra=rgb2gray(ft_con1);
imwrite(gra,path+typef+tline1+' filteredimg.jpg');



for i =1:no_layer
    ft_con2=output_rz(:,:,i);
    imwrite(ft_con2,path+typef+tline1+' filteredimg '+string(RGB(i))+'.jpg');
end

else
    
    w=[3 3];
     g_low1=fspecial('gaussian',w,tline3);
     g_low2=fspecial('gaussian',w,tline4);
    g_high=(g_low1)-(g_low2);
    
    for i=1:3
        ghigh(:,:,i)=g_high;
    end
    ft2=fft2(ghigh,r,c);
for j=1:no_layer
ft_con(:,:,j)=ft(:,:,j).* ft2(:,:,j);
a=ifft2d(ft_con(:,:,j));
output(:,:,j)=uint8(real(a));
output_rz(:,:,j)=output(1:r,1:c);
end
    
    for i=1:no_layer
    a=ifft2d(ft_con(:,:,i));
    minPxlVal = min(min(a));
    maxPxlVal = max(max(a));
    maxmin = (maxPxlVal - minPxlVal); 
    fcc(:,:,i) = real((a-minPxlVal)./ maxmin);
    
end


ft_con1=real(fcc(1:r,1:c,:));
gra=rgb2gray(ft_con1);
imwrite(gra,path+typef+tline1+' filteredimg.jpg');

for i =1:no_layer
    ft_con2=real(fcc(1:r,1:c,i));
    imwrite(ft_con2,path+typef+tline1+' filteredimg '+string(RGB(i))+'.jpg');
end
end

endfunction
