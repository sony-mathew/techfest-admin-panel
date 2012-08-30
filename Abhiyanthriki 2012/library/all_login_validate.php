<?php
	
  /* authentication codes for all committees are set here */



define(reg , 'a3k12reg');
define(regpass , 'abhireg12');

define(cerpass , 'abhicerti12');
define(cer , 'a3k12cer');

define(admin , 'admin');
define(passwrde , 'a3k12isgreat');



function login_validate()
           {            
                        //if its  a registration committee member
                        if ( $_GET['login'] == 'rc' && $_POST['name'] == reg && $_POST['pass'] == regpass )    
                                           { $check = 1 ; setcookie('a3k12reg' , 'registration+ahjshdl34' , time()+ 8*60*60 ) ; }

                        //if its a certificate committee member                 
                        elseif ( $_GET['login'] == 'cc' && $_POST['name'] == cer && $_POST['pass'] == cerpass) 
                                           { $check = 1 ;  setcookie('a3k12cer' , 'cerficate_committe+gdfhyryklo9' , time()+ 8*60*60 ) ; }

                        //if its an event head                                         
                        elseif ( $_GET['login'] == 'eh') 
                                           {    
                                                $link = connect() ;
                                                $result = mysql_query('select name from events where username =\''.$_POST['name'].'\' and password = \''.$_POST['pass'].'\'');
                                                check($result);
                                                $row = mysql_fetch_row($result);
                                                if($row[0] != NULL) // valiadting username and password
                                                    { 
                                                        $check = 1 ;
                                                        setcookie('a3k12eh' , $_POST['username'].'+'.$row[0] , time()+ 1*60*60 ) ;
                                                    } 
                                           }

                        //if its the administrator                 
                        elseif ( $_GET['login'] == 'ba' && $_POST['name'] == admin && $_POST['pass'] == passwrde) 
                                           { $check = 1 ; setcookie('a3k12admin' , 'thisisbigadmin+ghyt6574wbsmmsj867' , time()+ 1*60*60 ) ; }

                        else 
                                           { $check = 0 ;}                         

                         
                        if ( $check == 1 )
                                   {
                                    print '<meta http-equiv="refresh" content="0;url=http://localhost/work/reg/admin/A3K12/index.php" /> Login Succesful.You are being redirected.'; exit;
                                   } 


                         $bd = '<h2><a href="#">Abhiyanthriki 2012 Login</a></h2>
                                    <div style="width : 300px ; height : 200px ; margin : auto; margin-top : 50px;" >
                                             Invalid Login. Check your login credentials.  
                                </div>' ;
                         return $bd ;
           }









	
?>