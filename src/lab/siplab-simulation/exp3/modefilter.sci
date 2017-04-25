function M=modefilter (img)
    m=tabul(img,"i")
[x,y]=max(m(:,2));
M=m(y,1);
//disp(m(y,1),'the mode is')

endfunction
