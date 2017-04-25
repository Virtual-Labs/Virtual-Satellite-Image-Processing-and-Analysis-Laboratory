function S = pinv1(D)

// Pseudoinverse of a diagonal matrix, with a larger-than-standard
// tolerance to help in handling edge cases.  We've provided our
// own in order to: (1) Avoid replacing all calls to PINV with calls to
// PINV(...,TOL) and (2) Take advantage of the fact that our input is
// always diagonal so we don't need to call SVD.
format(10)
d = diag(D);
[m,n]=size(d)
//disp(d)
tol =length(d) * max(d) * sqrt(%eps);
//disp(tol)
keep = d > tol;
keep=bool2s(keep)
//disp(keep)
s = ones(m,n);
for i=1:m
    for j=1:n
        if (keep(i,j)) then
        s(i,j) = s(i,j) ./ d(i,j);
    else
        s(i,j) = 0;
        end
    end
end
//s(keep) = s(keep) ./ d(keep);
//disp(s);
//s(~keep) = 0;
//disp(s);

S = diag(s);

endfunction
