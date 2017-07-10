<?php 
$xi = 2;
if($xi>4){
	goto a;
}
$shell = 5;
goto b;

a:$shell = 6;
  
b:echo $shell*2;