function S = decorr(A)
// Decorrelation stretch for a multiband image of class double.
useCorr=1;
targetMean=[];
targetSigma=[];

[r,c,nbands]=size(A);
npixels = r * c;
A = matrix(A,[npixels nbands]);
B = A;
meanB = mean(B,'r');
n = size(B,1);
if n==1 then
cov1 = zeros(nbands, nbands);
else
cov1=(B'*B-(n*meanB')*meanB)/(n - 1);
end

[T,offset]=fitdecorrtrans(meanB,cov1,useCorr,targetMean,targetSigma);
disp(offset)

    S = A*T;
    disp(size(S,2))
    for i=1:size(S,2)
    
    S(:,i)=S(:,i)+offset(1,i);
    
    end
S = matrix(S,[r c nbands]);
endfunction
