function fil_img= leefilter(img,siz,var1,win_centre)
    winSize1=siz(1);
    winSize2=siz(2);
    for j = 1:size(img,1) - winSize1 + 1
            for i = 1:size(img,2) - winSize2 + 1
                win = double(img(j:j + winSize1 - 1, i:i + winSize2 - 1, :));
                
                for k=1:size(fil_img,3)
                    
                                x_mean=mean2(win(:,:,k));
                                fil_img(((2*j+winSize1-1)/2)-1,((2*i+winSize2-1)/2)-1,k)=x_mean+var1*(win(win_centre(1,1),win_centre(1,2))-x_mean);
                                    
                end
            end
        end

endfunction
