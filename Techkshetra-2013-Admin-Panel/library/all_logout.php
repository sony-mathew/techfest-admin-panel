<?php


function logout ( $i )
                       {

                         if ( $i == 1)
                                 {
                                   setcookie('tk13reg' , 'registration+ahjshdl34' , time()- 60*60 ) ;
                                 }

                         elseif ( $i == 2)
                                 {
                                  setcookie('tk13cer' , 'cerficate_committe+gdfhyryklo9' , time()-60*60 ) ;
                                 }
                         elseif ( $i == 3)
                                 {
                                  setcookie('tk13eh' , 'events_heads' , time() - 60*60 ) ;
                                 }
                         elseif ( $i == 4)
                                 {
                                   setcookie('tk13admin' , 'thisisbigadmin+ghyt6574wbsmmsj867' , time() - 60*60 ) ;
                                 }                  

                         print '<meta http-equiv="refresh" content="0;./index.php" /> Logout Succesful.You are being redirected.'; 
                         exit;

                      }

?>
