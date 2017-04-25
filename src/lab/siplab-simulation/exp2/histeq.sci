function [hea,b]= histeq(a)
// a− original image
// b− histogram
// hea− histogram equalized image
[ m,n ]= size(a);
for i =1:256
b(i) = length(find(a ==(i-1))) ;
end
pbb = b/( m*n ) ;
pb(1) = pbb (1) ;
for i =2:256
pb(i) = pb(i -1) + pbb(i) ;
end
s = pb*255;
sb = uint8(round(s));
index =0;
for i =1: m
for j =1: n
index = double ( a (i , j ) ) +1; // convert it to double
// otherwise index = 255+1 =0
hea (i,j) = sb ( index ) ; // histogram equalization
end
end
endfunction
