function [TOKEN]=strtok_n(name,dil)
    TOKENS = [];
    token = strtok(name,dil);
    TOKENS = [TOKENS,token];
    while( token <> '' )
      token = strtok(dil);
      TOKENS = [TOKENS,token];
    end
   TOKEN=TOKENS;
endfunction;
