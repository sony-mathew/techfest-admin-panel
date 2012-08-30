<?php

function sidebar($page , $membership)

          {

           //sidebar of registration committee 
              if( $membership == 'reg')     
                      {   
                        $left = '
                             Registration : 
                             <li><a href="index.php?reg=online">Online Reg.</a></li>  
                             <li><a href="index.php?reg=offline">Offline Reg.</a></li>
                             <li><a href="index.php?reg=cash">Extra Cash</a></li>
                             <li><a href="index.php?reg=single_event">Single Event</a></li>
                             <li><a href="index.php?reg=group_event">Group Event</a></li>
                             <li><a href="index.php?reg=workshop">Workshop</a></li>
                             <br/>
                             Common :
                             <li><a href="index.php?q=es">Events Status</a></li> 
                             <li><a href="index.php?q=logout">Logout</a></li> ' ;
                      }
           //sidebar of certificate committee   
              elseif( $membership == 'cer')     
                      {   
                        $left = '
                             Certificates :
                             <li><a href="index.php?cer=winners">Winners</a></li>  
                             <li><a href="index.php?cer=participation">Participation</a></li>
                             <br/>
                             Common : 
                             <li><a href="index.php?q=es">Events Status</a></li> 
                             <li><a href="index.php?q=logout">Logout</a></li>  ' ;
                      }

           //sidebar of event heads  
              elseif( $membership == 'eh')     
                      {   
                        
                        $event = explode('+',$_COOKIE['a3k12eh']);
                        $left = '
                             Event ('.$event[1].') :
                             <li><a href="index.php?eh=list"> Participants </a></li>  
                             <li><a href="index.php?eh=status"> Status </a></li>
                             <li><a href="index.php?eh=winners"> Winners </a></li>
                             <br/>
                             Common :
                             <li><a href="index.php?q=es">Events Status</a></li> 
                             <li><a href="index.php?q=logout">Logout</a></li>  ' ;
                      }

           //sidebar of administrator           
              elseif( $membership == 'ba')     
                      {   
                        $left = '
                             Registration : 
                             <li><a href="index.php?q=details">Details</a></li>
                             Updates :
                             <li><a href="index.php?q=edit_winners">Edit Winners</a></li>  
                             <li><a href="index.php?q=eh">Event Heads</a></li>
                             Events :
                             <li><a href="index.php?q=list"> Participants </a></li>  
                             <li><a href="index.php?q=add_event"> Add Event </a></li>
                             <li><a href="index.php?q=winners"> Winners </a></li>   
                             Common :
                             <br/>
                             <li><a href="index.php?q=es">Events Status</a></li> 
                             <li><a href="index.php?q=logout">Logout</a></li>  ' ;
                      }
            

                   $page = str_replace('{left-menu}', $left, $page ) ;

                   return $page;
          }  

?>