function [ a ] = ifft2 ( a2 )
// a2 = 2D−DFT o f any r e a l o r c o m p l e x 2D m a t r i x
// a = 2D−IDFT o f a2
m=size(a2,1);
n=size(a2,2);
// I n v e r s e F o u r i e r t r a n s f o r m a l o n g t h e r o w s
for i=1:n
a1(:,i)=exp(2*%i*%pi*(0:m-1)'.*.(0:m-1)/m)*a2(:,i);
end
// I n v e r s e f o u r i e r t r a n s f o r m a l o n g t h e c o l u m n s
for j =1:m
atemp=exp(2*%i*%pi*(0:n-1)'.*.(0:n-1)/n)*(a1(j,:)).';
a(j,:) = atemp.';
end
a=a/(m*n);
a=real(a);
endfunction
