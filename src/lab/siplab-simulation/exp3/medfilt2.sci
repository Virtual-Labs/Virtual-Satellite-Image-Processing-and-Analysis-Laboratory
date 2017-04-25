function y=medfilt2(x,sz,opt)
    y=[];
    sx=size(x);
    if length(sx)~=2 then
        error('First input must be a matrix!');
    else
        mx=sx(1);
        nx=sx(2);
    end
    [argout, argin]=argn(0);
    if argin<1 then
   error('At least one input required!');
    elseif argin==1 
        sz=[3 3];
        opt='z';
    elseif argin==2
        opt='z';
    end
    if argout>1 then
        error('Too many output arguments!' );
    end
    m=sz(1);
    n=sz(2);
    m1=floor(m/2);
    n1=floor(n/2);
   
    x=padding(x,[m1,n1],opt);
    for i=(m1+1):(mx+m1)
        for j=(n1+1):(nx+n1)
            y(i-m1,j-n1)=median(x(i-m1:i+m1,j-n1:j+n1));
        end
    end
endfunction
