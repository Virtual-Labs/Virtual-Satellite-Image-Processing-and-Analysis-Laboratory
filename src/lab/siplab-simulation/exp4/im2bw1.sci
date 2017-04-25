function bw = im2bw1(Img, arg2, arg3, arg4)

if argn(2) <=1 then
   error('Invalid number of arguments.");
end


if type(Img) == 1 then // 2D double array
   if size(arg2,'*') == 1 then   // im2bw(Img, level,???)
      level = arg2
      if (argn(2) == 2)          // im2bw(Img,level)
         maxvalue = max(Img);
      else
         maxvalue = arg3
      end
   else    // im2bw(Img, map, ???)
      if argn(2) ==2 then
         error('Missing the threshold level.')
      end
      level = arg3
      Img=im2gray(Img,arg2)
      if (argn(2) == 3)
         maxvalue = max(Img);
      else
         maxvalue = arg4
      end
   end
elseif type(Img) == 17 then  // Hypermatrix
   level = arg2
   if (argn(2) == 2)          // im2bw(RGB,level)
      maxvalue = max(Img);
   else
      maxvalue = arg3
   end
   Img = im2gray(Img)
else
   error('Invalid type of 1st. argument.')
end

if (level < 0) | (level > 1) then
   error('The threshold level must be in range 0-1.')
end


bw = 1*(Img>=level*maxvalue)

endfunction
