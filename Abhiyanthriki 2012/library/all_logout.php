<?php


function logout ( $i )
                       {

                         if ( $i == 1)
                                 {
                                   setcookie('a3k12reg' , 'registration+ahjshdl34' , time()- 60*60 ) ;
                                 }

                         elseif ( $i == 2)
                                 {
                                  setcookie('a3k12cer' , 'cerficate_committe+gdfhyryklo9' , time()-60*60 ) ;
                                 }
                         elseif ( $i == 3)
                                 {
                                  setcookie('a3k12eh' , 'events_heads' , time() - 60*60 ) ;
                                 }
                         elseif ( $i == 4)
                                 {
                                   setcookie('a3k12admin' , 'thisisbigadmin+ghyt6574wbsmmsj867' , time() - 60*60 ) ;
                                 }                  

                         print '<meta http-equiv="refresh" content="0;url=http://localhost/work/reg/admin/A3K12/index.php" /> Logout Succesful.You are being redirected.'; 
                         exit;

                      }

?>
