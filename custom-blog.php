<?php
function render($count){
    if($count%13==0) : 
        get_template_part('partials/hero-one');
      else :  
        if($count%13==1) : 
          get_template_part('partials/hero-two');
        else:
          if($count%13==2):
            get_template_part('partials/hero-three');
          else:
            if($count%13==9):
              get_template_part('partials/hero-one');
            else:
              get_template_part('partials/blog-normal');
            endif;
          endif;
        endif;	
      endif;
}

?>