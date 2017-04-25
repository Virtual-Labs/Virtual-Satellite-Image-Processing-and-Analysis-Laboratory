function [T, offset] = fitdecorrtrans(means, Cov, useCorr, targetMean, targetSigma)

// Square-root variances in a diagonal matrix.
format(10)
 d=diag(Cov)
 ds=sqrt(d)
 S=diag(ds)
if(targetSigma==[])
targetSigma = S;
end

if useCorr then
    //tol =length(S) * max(S) * sqrt(%eps);
Corr = pinv1(S) * Cov * pinv1(S);
//disp(Corr)
for i=1:size(Corr,1)
for j=1:size(Corr,2)
if(i==j) then
Corr(i,j)=1;
end
end
end
//disp(Corr)
[V, D] = spec(Corr);
//disp(V)
//disp(D)
D=real(D)
for i=1:size(D,1)
    for j=1:size(D,2)
        if (D(i,j)<0) 
            D(i,j)=0;
        end
    end
end
//D(D < 0) = 0;
///tol =length(D) * max(D) * sqrt(%eps);
d1=pinv1(D);
W = sqrt(d1);
//tol =length(S) * max(S) * sqrt(%eps);
T=pinv1(S)*V*W*V'*targetSigma;
else
[V ,D] = spec(Cov);
D=real(D);
for i=1:size(D,1)
    for j=1:size(D,2)
        if (D(i,j)<0) 
            D(i,j)=0;
        end
    end
end
//tol =length(D) * max(D) * sqrt(%eps);
d1=pinv1(D);
W = sqrt(d1);
T=V*W*V'*targetSigma;
end
// Get the output variances right even for correlated bands, except
// for zero-variance bands---which can't be stretched at all.
d2=diag(T' * Cov * T);
d3=sqrt(d2);
d4=diag(d3);
//tol =length(real(d4)) * max(real(d4)) * sqrt(%eps);
T = T * pinv1(real(d4)) * targetSigma;
T=real(T)
if (targetMean==[])
// Restore original sample means.
targetMean = means;
end
offset = targetMean-means*T;
endfunction
