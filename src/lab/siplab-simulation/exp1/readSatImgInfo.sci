function [NumCols,NumRows,NumBands,Offset,DataType,InterleaveType] = readSatImgInfo(fname)

// Output variables initialisation (not found in input variables)
NumCols=[];
NumRows=[];
NumBands=[];
Offset=[];
DataType=[];
InterleaveType=[];

mode(-1)

// Display warning for floating point exception
ieee(1);


//-------------------------------------------------------------------------
// readSatImgInfo - reads header information contained in a satellite imagery
// Author: Abhinav Garg (4.10.10)
// Edited (latest): 4.10.10
// 
// Purpose:      To extract information required to display a satellite
//               imagery
// 
// SYNTAX:
// [NumCols NumRows NumBands Offset DataType InterleaveType] = readSatImgInfo(fname)
// 
// INPUT:
// fname: stringgiving the full pathname of the satellite image to read.
// 
// OUTPUT:
// NumCols: no of samples (no of columns) of input image
// NumRows: no of lines (no of rows) of input image
// NumBands: no of bands
// DataType: data type
// Offset: offset value
// InterleaveType: interleave type
// 
// write the following essential header info on imginfo.txt file 
// samples: no of samples (no of columns) of input image
// lines: no of lines (no of rows) of input image
// bands: no of bands present in image
// data type: data type in which pixel values are stored
// Offset: offset value
// Interleave type: interleave type in which image is written

// NOTE : this program requires the corresponding image header file in ENVI format. 
//           The header file must have the same name as the input image file
//           + the ''.hdr'' exention.
// 
// 
//--------------------------------------------------------------------------

// Parameters initialization
elements = makecell([1,6],"samples","lines","bands","data type","header offset","interleave");
elements=["samples","lines","bands","data type","header offset","interleave"];
d = makecell([1,10],"uint8","int16","int32","float32","float64","double","uint16","uint32","int64","uint64");
d=["uint8","int16","int32","float32","float64","double","uint16","uint32","int64","uint64"];
// off_set = 0;
NumCols = 0;
NumRows = 0;
NumBands = 1;
DataType = "";
Offset = 0;
InterleaveType = "";

[first,second] = strtok_new(fname,".");

// Check for image types other than ENVI
extn = makecell([6,1],".jpg",".jpeg",".png",".bmp",".gif",".tiff");
extn = ["jpg","jpeg","png","bmp","gif","tiff"];
// !! L.57: Matlab function strmatch not yet converted, original calling sequence used.

if ~isempty(grep(second,extn)) then
    //disp("test")
  nfid = mopen("imginfo.txt","wt");
 
  mtlb_fprintf(nfid,"Input image is a simple %s image\n",second);
  mclose(nfid);
  return;
else
  rfid = mopen(strcat([first,".hdr"]),"r");
 // disp(rfid)
end;


while 1

  tline = mgetl(rfid,1);  if meof()~=0 then tline = -1;end;

  if ~type(tline)==10 then break,end;

  //disp(tline)
  [first,second] = strtok_new(tline,"=");
//  disp('first= ')
//  disp(first)
//  disp('second= ')
//  disp(second)



  select stripblanks(first)
      
    case elements(1) then // no. of samples
       //[f,s] = strtok_new(second);
       NumCols = evstr(second);

    case elements(2) then // no. of lines
       //[f,s] = strtok_new(second);
       NumRows = evstr(second);
    case elements(3) then
        //disp('case3') // no. of bands
    
       //[f,s] = strtok_new(second);
       NumBands = evstr(second);
    case elements(4) then // data type
   //     disp('case4')
    
       //[f,s] = strtok_new(second);
       t = evstr(second);
       //disp(t);
       select t
           
     case 1 then //''uint8'' data
    DataType = d(1);
     case 2 then //''int16'' data
    DataType = d(2);
     case 3 then //''int32'' data
    DataType = d(3);
     case 4 then //''float32'' data
    DataType = d(4);
     case 5 then //''float64'' data
    DataType = d(5);
     case 8 then //''double'' data
    DataType = d(6);
     case 12 then //''uint16'' data
    DataType = d(7);
     case 13 then //''uint32'' data
    DataType = d(8);
     case 14 then //''int64'' data
    DataType = d(9);
     case 15 then //''uint64'' data
    DataType = d(10);
 else
     disp('no data type')
       return;
   end;
    case elements(5) then // off_set

   //[f,s] = strtok_new(second);
   Offset = evstr(second);
    case elements(6) then // interleave type

   //[f,s] = strtok_new(second);
   interleave = stripblanks(second);
   select interleave
     case "bsq" then //''bsq'' arrangement of bands 
    InterleaveType = "bsq";
     case "bil" then //''bil'' arrangement of bands
    InterleaveType = "bil";
     case "bip" then //''bil'' arrangement of bands
    InterleaveType = "bip";
     else
       return;
   end;
  end;
end;
mclose(rfid);

// write image information read to imginfo.txt file for display to user
//nfid = mopen('/home/priya/Desktop/img-disp-scilab-1/imginfo.txt','wt');

//mfprintf(fd,'hello %s %d.\n','world',1);
//mfprintf(nfid,'Displaying image header information ...\n');

//mfprintf(nfid," \n");

//mfprintf(nfid,'samples = %d \n',NumCols);

//mfprintf(nfid,' \n');

//mfprintf(nfid,'lines = %d \n',NumRows);

//mfprintf(nfid,' \n');


//mfprintf(nfid,'bands = %d \n',NumBands);

//mfprintf(nfid,' \n');

//mfprintf(nfid,'data type = %s\n',DataType(1,1));

//mfprintf(nfid,' \n');

//mfprintf(nfid,'offset = %d \n',Offset);

//mfprintf(nfid,' \n');

//mfprintf(nfid,'interleave type = %s \n',InterleaveType);

//mclose(nfid);




endfunction
