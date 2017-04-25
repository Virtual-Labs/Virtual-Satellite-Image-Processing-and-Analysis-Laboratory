function y=padding(x,sz,opt)
    y=[];
    sx=size(x);
    if length(sx)~=2 then
        disp('First input must be a matrix!');
        return;
    else
        mx=sx(1);
        nx=sx(2);
    end
    [argout, argin]=argn(0);
    if argin<1 then
    disp('At least one input required!');
    return;
    elseif argin==1 
        sz=[1 1];
        opt='z';
    elseif argin==2
        if  type(sz)~=1 then
            disp('Second input must be a two element numeric array!');
            return;
        end
        if type(sz)==1 & length(sz)~=2 then
            disp('Second input must be a two element numeric array!');
            return;
        end
        opt='z';
    end
    if type(opt)~=10 & lenght(opt)~=1 then
        disp('Third input must be a character constant!');
        disp('See help for valid options!');
        return;
    end
    if argout>1 then
        disp('Too many output arguments!' );
        return;
    end
    m1=sz(1);
    n1=sz(2);
    
    if opt=='z' then
        y=[zeros(m1,nx);x;zeros(m1,nx)];
        y=[zeros(mx+2*m1,n1) y zeros(mx+2*m1,n1)];
    elseif opt=='p'
        y=[x(m1:-1:1,:) ; x; x($:-1:$-m1,:)];
        y=[y(:, n1:-1:1) y y(:,$:-1:$-n1 )];
    elseif opt=='o'
        y=[ones(m1,nx);x;ones(m1,nx)];
        y=[ones(mx+2*m1,n1) y ones(mx+2*m1,n1)];
    elseif opt=='-'
        mn=min(x);
        y=[ones(m1,nx)*mn;x;ones(m1,nx)*mn];
        y=[ones(mx+2*m1,n1)*mn y ones(mx+2*m1,n1)*mn];
    elseif opt=='+'
        mn=max(x);
        y=[ones(m1,nx)*mn;x;ones(m1,nx)*mn];
        y=[ones(mx+2*m1,n1)*mn y ones(mx+2*m1,n1)*mn];
    elseif opt=='m'
        mn=median(x);
        y=[ones(m1,nx)*mn;x;ones(m1,nx)*mn];
        y=[ones(mx+2*m1,n1)*mn y ones(mx+2*m1,n1)*mn]; 
    elseif opt=='n'
        y=[ones(m1,nx)*%nan;x;ones(m1,nx)*%nan];
        y=[ones(mx+2*m1,n1)*%nan y ones(mx+2*m1,n1)*%nan];
    else
        disp('Unknown padding option!');
        return;
    end
endfunction
