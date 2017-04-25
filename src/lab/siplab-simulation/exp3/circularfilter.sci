function h=circularfilter(p2)
    rad   = p2;
     crad  = ceil(rad-0.5);
     i=-crad:crad;
     j=-crad:crad;
     [x,y] = meshgrid(i,j);
     maxxy = max(abs(x),abs(y));
     minxy = min(abs(x),abs(y));
     m1 = (rad^2 <  (maxxy+0.5).^ 2 + (minxy-0.5).^ 2).* (minxy-0.5) +(rad^2 >= (maxxy+0.5).^ 2 + (minxy-0.5).^ 2).* sqrt(rad^2 - (maxxy + 0.5).^ 2);
     m2 = (rad^2 >  (maxxy-0.5).^ 2 + (minxy+0.5).^ 2).* (minxy+0.5) + (rad^2 <= (maxxy-0.5).^ 2 + (minxy+0.5).^ 2).* sqrt(rad^2 - (maxxy - 0.5).^ 2);
     sgrid1 = (rad^2*(0.5*(asin(m2/rad) - asin(m1/rad)) + 0.25*(sin(2*asin(m2/rad)) - sin(2*asin(m1/rad)))) -(maxxy-0.5).* (m2-m1) + (m1-minxy+0.5)).* ((((rad^2 < (maxxy+0.5).^ 2 + (minxy+0.5).^ 2) & (rad^2 > (maxxy-0.5).^ 2 + (minxy-0.5).^ 2)) | ((minxy==0)&(maxxy-0.5 < rad)&(maxxy+0.5>=rad))));
     sgrid1 = sgrid1 + ((maxxy+0.5).^ 2 + (minxy+0.5).^ 2 < rad^2);
     sgrid1(crad+1,crad+1) = min(%pi*rad^2,%pi/2);
     if ((crad>0) & (rad > crad-0.5) & (rad^2 < (crad-0.5)^2+0.25)) 
        m1  = sqrt(rad^2 - (crad - 0.5).^ 2);
        m1n = m1/rad;
        sg0 = 2*(rad^2*(0.5*asin(m1n) + 0.25*sin(2*asin(m1n)))-m1*(crad-0.5));
        sgrid1(2*crad+1,crad+1) = sg0;
        sgrid1(crad+1,2*crad+1) = sg0;
        sgrid1(crad+1,1)        = sg0;
        sgrid1(1,crad+1)        = sg0;
        sgrid1(2*crad,crad+1)   = sgrid1(2*crad,crad+1) - sg0;
        sgrid1(crad+1,2*crad)   = sgrid1(crad+1,2*crad) - sg0;
        sgrid1(crad+1,2)        = sgrid1(crad+1,2)      - sg0;
        sgrid1(2,crad+1)        = sgrid1(2,crad+1)      - sg0;
     end
     sgrid1=real(sgrid1);
     sgrid1(crad+1,crad+1) = min(sgrid1(crad+1,crad+1),1);
     h = sgrid1/sum(sgrid1(:));
     
endfunction
