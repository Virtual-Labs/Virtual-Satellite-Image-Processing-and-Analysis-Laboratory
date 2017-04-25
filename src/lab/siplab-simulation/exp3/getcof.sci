function N=getcof(COF)        
i=1;
fid = mopen(COF,"r");
while ~meof(fid)
    tline = mgetl(fid,1);  
    if type(tline)==10 then 
   
    [Tokens] = strtok_n(tline," ");
   M(i,1:3)=evstr(Tokens);
    i=i+1;
end
end
mclose(fid);
M=double(M);
       N=M';
endfunction
