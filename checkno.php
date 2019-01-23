<?php
session_start();   
  srand((double)microtime()*1000000);   
  $im   =   imagecreate(36,20);   
  $str[0]=chr(rand(97,122));
  $str[1]=chr(rand(97,122));   
  $str[2]=chr(rand(97,122));   
  $str[3]=chr(rand(97,122));   
  $strs=$str[0].$str[1].$str[2].$str[3];   
  $_SESSION['randcode']=$strs;   
  $bg   =   imagecolorallocate($im,   236,   233,   216);   
    
  $font_color=imagecolorallocate($im,   0,   0,   0);   
    
    
  for   ($i=0;$i<20;$i++){   
  imagesetpixel   ($im,   rand(0,36),   rand(0,20),   $font_color);   
  }   
  imagechar($im,   4,   0,   1,   $str[0],   $font_color);   
  imagechar($im,   4,   9,   1,   $str[1],   $font_color);   
  imagechar($im,   4,   18,   1,   $str[2],   $font_color);   
  imagechar($im,   4,   27,   1,   $str[3],   $font_color);   
  header('Content-type:   image/png');   
  imagepng($im);   
?>