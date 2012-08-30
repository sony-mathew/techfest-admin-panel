<?php
	
function guest($page)

          {
          	       $main = '
<h2><a href="#">Lets do it yaar</a></h2>

Abhiyanthriki, the bi-annual technical and managerial colloquy of Rajagiri School of Engineering and Technology houses a series of events 
which tests the hidden talents of our country’s youth. This is a golden opportunity for those participating to apply their technical as well 
as managerial skills in a practical arena.

This September come be enthralled by the phenomenal three day extravaganza that is Abhyanthriki 2012.
' ;
          

                  $page = str_replace('{main-content-right}', $main, $page ) ;
                  return $page;

          }

function common_left($page)

          {
          	       $left = '<li><a href="index.php?login=cc">Certificates </a></li>  
                             <li><a href="index.php?login=eh">Event Heads </a></li>
                             <li><a href="index.php?login=rc">Registration </a></li>
                             <br/>
                             <li><a href="index.php?login=ba">Administrator</a></li> 
                             <li><a href="index.php?q=es">Events Status</a></li> ' ;
                   $page = str_replace('{left-menu}', $left, $page ) ;

                   return $page;
          }           
	
?>