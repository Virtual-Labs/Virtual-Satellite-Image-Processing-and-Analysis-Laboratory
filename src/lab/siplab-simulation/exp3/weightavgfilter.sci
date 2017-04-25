function fil_img=weightavgfilter(img,siz,kern)

 winSize1=siz(1);
    winSize2=siz(2);
[r,c,b]=size(img)
N=winSize1*winSize2;
f_img=ones(winSize1,winSize2,b);
        for j = 1:r - winSize1 + 1
            for i = 1:c - winSize2 + 1
                win = img(j:j+winSize1-1,i:i+winSize2-1,:);
                win=double(win);
                for k=1:b
                    f_img(:,:,k)=kern(:,:,k).* win(:,:,k);
                      fil_img(((2*j + winSize1-1)/2)-1, ((2*i + winSize2-1)/2)-1, k)=f_img((winSize1+1)/2, (winSize2+1)/2, k)/N;
                                         
                end
            end
        end
        
    endfunction
    
