function H = buttertest(M,N,D0,n)
    
  // Set up range of variables.
u = 0:(M - 1);
v = 0:(N - 1);

//Compute the indices for use in meshgrid.
idx = find(u > M/2);
u(idx) = u(idx) - M;
idy = find(v > N/2);
v(idy) = v(idy) - N;

//Compute the meshgrid arrays.
[V, U] = meshgrid(v, u);

//Compute the distances D(U, V).
D = sqrt(U .^ 2 + V .^ 2);

//Begin filter computations.

H = 1 ./ (1 + (D ./ D0) .^ (2*n));

endfunction
