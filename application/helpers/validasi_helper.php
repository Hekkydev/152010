<?php

if(!function_exists('js_validation')):
  function js_validation($valid_name,$form_name,$params= array())
  {
    if($valid_name == TRUE && $form_name == TRUE):
        echo "<script type='text/javascript'>\n";
        echo "function ".$valid_name."(){ \n";
        foreach($params as $key => $value):
          echo "var ".$key." = document.forms['".$form_name."']['".$key."'].value; \n";
          echo "\n";
          echo "if(".$key." == null || ".$key." == '' ){ \n ";
          echo "  popup('Lengkapi data ".$value."');\n";
          echo "    return false; \n";
          echo "} \n";
        endforeach;
        echo "}\n";
        echo "</script>\n";
    else:
      echo '';    
    endif;
  }
endif;
