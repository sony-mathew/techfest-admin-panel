<?php



function workshop_reg()
           {
              $bd = '
              <h2><a href="#"> Workshop Registration </a></h2>  
              <form method="post" action="index.php?reg=workshop">
              <div id="line">
              <div class="linel"> A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid" maxlength="15" /></div></div>
              
              <div id="line"> <div class="linel">Workshops    :   </div> <div class="liner" style = "height:100px;">'.events_list(4).' </div></div>
              <input type="hidden" name="check" value="1" />
              <div id="line"> <div class="liner"> <input type="submit" value="Register Me" style="width:100px;height:35px;"/>  </div></div> ';

              return $bd ;
           }

function workshop_reg_submit()
           {
                    $link = connect();
                       
                    $event = $_POST['workshop'] ;
                    
                //updating the events in the profiles table for the user     
                    $result = mysql_query('select events,name from profiles where a3k_id = \''.$_POST['a3kid'].'\'');
                    check($result) ;
                    $row = mysql_fetch_row($result);
                    $row[0] = $row[0].','.$event ;

                    $_POST['name'] = $row[1] ;
                    $result = mysql_query('update profiles set events = \''.$row[0].'\'  where a3k_id = \''.$_POST['a3kid'].'\'');
                    check($result) ;

                    if( !isset ( $_POST['dd'] ) )    { $_POST['dd'] = '00000' ; } 

               //registering the user for each event in workshop_reg table
                    
                        $bd = '<div id="line"> Registration details of '.$_POST['name'].' </div>';
                      
                        $result = mysql_query('select id from workshop_reg where a3k_id=\''.$_POST['a3kid'].'\' and event = \''.$event.'\'');
                        check($result) ; 
                        $row = mysql_fetch_row($result);
                        
                        if( is_null ( $row[0] ) )
                            {
                                   $result = mysql_query('insert into workshop_reg (event, name, a3k_id, dd ) values (\''.$event.'\',\''.$_POST['name'].'\',\''.$_POST['a3kid'].'\',\''.$_POST['dd'].'\')');
                                   check($result) ;
                                   $bd = $bd.'<div id="line"> '.ucwords($_POST['name']).' have been succesfully registered for '.$event.'. </div>' ;

                                   //updating counter
                    
                                   $result = mysql_query('update counter set total_workshop_reg = total_workshop_reg + 1 ');
                                   check($result) ;
                            } 
                        else 
                             {
                                 $bd = $bd.'<div id="line"> '.ucwords($_POST['name']).' has already registered for '.$event.'. </div>' ;
                             }    
                    
                return $bd; 
           }           
?>