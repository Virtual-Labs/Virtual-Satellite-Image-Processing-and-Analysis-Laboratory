function fil_img=sigmafilter(img,siz,var1,win_centre)

 winSize1=siz(1);
    winSize2=siz(2);
 
 for j = 1:size(img,1) - winSize1 + 1
            for i = 1:size(img,2) - winSize2 + 1
                win = double(img(j:j + winSize1 - 1, i:i + winSize2 - 1, :));
                
                for k=1:size(fil_img,3)
                    
                                mat_std=std2(win(:,:,k));
                                thres=var1*mat_std;
                                for r=1:size(win,1)
                                    for s=1:size(win,2)
                                        if (((win(r,s,k)-win(win_centre(1,1),win_centre(1,2),k))<= thres) & ((win(win_centre(1,1),win_centre(1,2),k)-win(r,s,k))<= thres))
                                            pix(1,:) = win(r,s,k);
                                        end
                                    end
                                end
                                tot=sum(pix);
                                fil_img(((2*j+winSize1-1)/2)-1,((2*i+winSize2-1)/2)-1,k)=tot/length(pix);
                            
                end
            end
      end
      
      
      endfunction
