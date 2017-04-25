function IFFT_conj=ifft2d(F_FFT)
 Conj_F = conj(F_FFT);
Conj_FFT = fft2(Conj_F);
IFFT_conj = conj(Conj_FFT)/length(Conj_FFT);

IFFT_conj=abs(IFFT_conj);
endfunction
