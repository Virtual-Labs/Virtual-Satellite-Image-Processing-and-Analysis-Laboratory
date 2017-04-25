function [first,second]=strtok_new(name,dil)
    mode(-1)
    TOKENS = [];
    token = strtok(name,dil);
    TOKENS = [TOKENS,token];
    while( token <> '' )
      token = strtok(dil);
      TOKENS = [TOKENS,token];
    end
    //disp(TOKENS);
    first=TOKENS(1);
    second=TOKENS(2);
endfunction
