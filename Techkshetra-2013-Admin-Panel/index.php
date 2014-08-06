<?php
	
  include_once('./library/db_common.php');


  array_walk_recursive($_POST, 'sanitizeVariables'); 
  array_walk_recursive($_GET, 'sanitizeVariables'); 



//default page
  include_once('./library/all_guest.php') ;

//common for all user's pages
  include_once('./library/all_login_pages.php') ;
  include_once('./library/all_login_validate.php') ;  
  include_once('./library/all_sidebars.php') ;  
  include_once('./library/all_logout.php');
  include_once('./library/all_event_list.php') ; 
  include_once('./library/all_event_status.php') ;  
  include_once('./library/id_to_name.php');
  include_once('./library/tk13id.php');

  $page = file_get_contents("./theme/index.html") ;

//only for registration committee

  if ( isset ( $_COOKIE['tk13reg'] ) )
            {
                   
                    //registration committee pages and functions  
                    include_once('./library/reg_online.php');
                    include_once('./library/reg_offline.php');
                    include_once('./library/reg_single_event.php');
                    include_once('./library/reg_group_event.php');
                    include_once('./library/reg_workshop.php');

                  
                 $page = str_replace('{username}', 'Registration Committe Member' , $page ) ;
                 $page = sidebar ( $page , 'reg' ) ;
                 if ( isset ( $_GET['reg']) && $_GET['reg'] == 'offline')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', reg_offline_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', reg_off() , $page ) ;
                                  }     
                       }


                 elseif ( isset ( $_GET['reg']) && $_GET['reg'] == 'online')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', reg_on_status() , $page ) ;
                                 }
                             elseif (isset($_POST['check']) && $_POST['check'] == '2') 
                                 {
                                     $page = str_replace('{main-content-right}', reg_on_update() , $page ) ; 
                                 }    
                             else
                                  {
                                     $page = str_replace('{main-content-right}', reg_on() , $page ) ;
                                  }     
                       }      
                 elseif ( isset ( $_GET['reg']) && $_GET['reg'] == 'single_event')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', se_reg_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', se_reg() , $page ) ;
                                  }     
                       } 

                 elseif ( isset ( $_GET['reg']) && $_GET['reg'] == 'group_event')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', ge_reg_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', ge_reg() , $page ) ;
                                  }     
                       } 

                 elseif ( isset ( $_GET['reg']) && $_GET['reg'] == 'workshop')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', workshop_reg_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', workshop_reg() , $page ) ;
                                  }     
                       } 
                       
                 elseif ( isset($_GET['q']) && $_GET['q'] == 'es')
                       {
                         $page = str_replace('{main-content-right}', event_status() , $page ) ;
                       }                        

                 elseif ( isset($_GET['q']) && $_GET['q'] == 'logout')
                       {
                         logout(1);
                       }      
                 else 
                       {
                        $page = guest($page);
                       }      

            }   




//  only for certificate committee            
  
  elseif ( isset ( $_COOKIE['tk13cer'] ) )
            {
                
                 //certificate committee pages and functions  
                 include_once('./library/cer_participation.php');
                 include_once('./library/cer_winners.php');
                 include_once('./library/cer_participants.php');

                 $page = str_replace('{username}', 'Certificate Committee Member' , $page ) ;
                 $page = sidebar ( $page , 'cer' ) ;

                 if( isset ( $_GET['cer']) && $_GET['cer'] == 'winners')
                       {
                             
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', cer_winners_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', cer_winners() , $page ) ;
                                  }     
                       }    
                 
                 elseif ( isset ( $_GET['cer']) && $_GET['cer'] == 'participation')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', cer_participation_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', cer_participation() , $page ) ;
                                  }     
                       }
                 elseif ( isset ( $_GET['cer']) && $_GET['cer'] == 'events')
                       {
                            if ( isset ( $_GET['q']) && $_GET['q'] == 'list')
                                {
                                   if( isset($_POST['check']) && $_POST['check'] == '1')
                                       { 
                                           $page = str_replace('{main-content-right}', cer_participants_submit() , $page ) ;
                                       }
                                   else
                                        {
                                           $page = str_replace('{main-content-right}', cer_participants() , $page ) ;
                                        }     
                                }
     
                       }

                 elseif ( isset ( $_GET['cer']) && $_GET['cer'] == 'check')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', cer_status_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', cer_status() , $page ) ;
                                  }     
                       }

                 elseif ( isset($_GET['q']) && $_GET['q'] == 'es')
                       {
                         $page = str_replace('{main-content-right}', event_status() , $page ) ;
                       }                        

                elseif ( isset($_GET['q']) && $_GET['q'] == 'logout')
                       {
                         logout(2);
                       }      
                else 
                       {
                        $page = guest($page);
                       }             
            } 


   

// only for event heads login

  elseif ( isset ( $_COOKIE['tk13eh'] ) )
            {
                 
                //event heads pages and functions  
                include_once('./library/eh_list.php');
                include_once('./library/eh_status.php');
                include_once('./library/eh_winners.php');

                 $page = str_replace('{username}', 'Event Head' , $page ) ;
                 $page = sidebar ( $page , 'eh' ) ;
                 
                 if( isset ( $_GET['eh']) && $_GET['eh'] == 'list')
                       {
                             $page = str_replace('{main-content-right}', eh_list() , $page ) ;
                       }    
                 
                 elseif ( isset ( $_GET['eh']) && $_GET['eh'] == 'status')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', eh_status_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', eh_status() , $page ) ;
                                  }     
                       }

                 elseif ( isset ( $_GET['eh']) && $_GET['eh'] == 'winners')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', eh_winners_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', eh_winners() , $page ) ;
                                  }     
                       }     
                 elseif ( isset($_GET['q']) && $_GET['q'] == 'logout')
                       {
                         logout(3);
                       }    

                 elseif ( isset($_GET['q']) && $_GET['q'] == 'es')
                       {
                         $page = str_replace('{main-content-right}', event_status() , $page ) ;
                       }                        
  

                 else 
                       {
                        $page = guest($page);
                       }            
            } 



//only for administrator

  elseif ( isset ( $_COOKIE['tk13admin'] ) )
            {    

                 //administrator pages and functions
                 include_once('./library/admin_details.php') ;
                 include_once('./library/admin_edit_winners.php') ;
                 include_once('./library/admin_event_heads.php') ;
                 include_once('./library/admin_participants.php') ;
                 include_once('./library/admin_winners.php') ;
                 include_once('./library/admin_add_event.php') ;
                 include_once('./library/id_to_name.php') ;

                 $page = str_replace('{username}', 'Administrator' , $page ) ;
                 $page = sidebar ( $page , 'ba' ) ;

                 if ( isset ( $_GET['q']) && $_GET['q'] == 'add_event')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', add_event_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', add_event() , $page ) ;
                                  }     
                       }


                 elseif ( isset ( $_GET['q']) && $_GET['q'] == 'winners')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', admin_winners_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', admin_winners() , $page ) ;
                                  }     
                       }

                 elseif ( isset ( $_GET['q']) && $_GET['q'] == 'edit_winners')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '2')
                                 { 
                                     $page = str_replace('{main-content-right}', admin_winners_edit_submit() , $page ) ;
                                 }

                             elseif( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', admin_winners_edit() , $page ) ;
                                 }    
                             else
                                  {
                                     $page = str_replace('{main-content-right}', admin_winners_edit() , $page ) ;
                                  }     
                       }

                 elseif ( isset ( $_GET['q']) && $_GET['q'] == 'eh')
                       {
                           $page = str_replace('{main-content-right}', admin_event_heads() , $page ) ;          
                       }

                 elseif ( isset ( $_GET['q']) && $_GET['q'] == 'details')
                       {
                           $page = str_replace('{main-content-right}', admin_details() , $page ) ;          
                       }

                 elseif ( isset ( $_GET['q']) && $_GET['q'] == 'list')
                       {
                             if( isset($_POST['check']) && $_POST['check'] == '1')
                                 { 
                                     $page = str_replace('{main-content-right}', admin_participants_submit() , $page ) ;
                                 }
                             else
                                  {
                                     $page = str_replace('{main-content-right}', admin_participants() , $page ) ;
                                  }     
                       }


                 elseif ( isset($_GET['q']) && $_GET['q'] == 'es')
                       {
                         $page = str_replace('{main-content-right}', event_status() , $page ) ;
                       }                        

                 elseif ( isset($_GET['q']) && $_GET['q'] == 'logout')
                       {
                         logout(4);
                       }      
                 else 
                       {
                        $page = guest($page);
                       }                   
            }  



//Login pages for all authorised committees

   elseif ( isset ( $_GET['login']) ) 
             {
             	 $page = str_replace('{username}', 'Guest' , $page ) ;

             	 if( isset( $_POST['name'] ) )
             	 	              {
                                   $page = str_replace('{main-content-right}', login_validate() , $page ) ;
                                    $page = common_left ( $page ) ;  
             	 	              }
             	 else	              
             	                  {
             	                  	$page = str_replace('{main-content-right}', login_page() , $page ) ;
                                    $page = common_left ( $page ) ;
             	                  }     
             	 

             }          


elseif ( isset($_GET['q']) && $_GET['q'] == 'es')
                       {
                         $page = str_replace('{main-content-right}', event_status() , $page ) ;
                         $page = str_replace('{username}', 'Guest' , $page ) ;
                         $page = common_left ( $page ) ;
                       }                        


  else     
            {
                 $page = str_replace('{username}', 'Guest' , $page ) ;
                 $page = guest ( $page ) ;
                 $page = common_left ( $page ) ;
            } 


                
  print $page;
	
  exit;

	
?>