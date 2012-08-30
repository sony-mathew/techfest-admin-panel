<?php



function se_reg()
           {
              $bd = '
              <h2><a href="#"> Single Event Registration </a></h2>  
              <form method="post" action="index.php?reg=single_event">
              <div id="line">
              <div class="linel"> A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid" maxlength="15" /></div></div>
              <div id="line"> <div class="linel">Events    :   </div> <div class="liner" style = "height:100px;">'.events_list(1).' </div></div>
              <input type="hidden" name="check" value="1" />
              <div id="line"> <div class="liner"> <input type="submit" value="Register Me" style="width:100px;height:35px;"/>  </div></div> ';

              return $bd ;
           }

function se_reg_submit()
           {
                    $link = connect();
                       
                    $ev = $_POST['event'] ;
                     if( !is_null($ev[0]) )
                        { $events = implode(',',$_POST['event']) ;  }
    
                    //updating the events in the profiles table for the user     
                    $result = mysql_query('select events,name from profiles where a3k_id = \''.$_POST['a3kid'].'\'');
                    check($result) ;
                    $row = mysql_fetch_row($result);
                    $row[0] = $row[0].','.$events ;

                    $_POST['name'] = $row[1] ;
                    
                    $result = mysql_query('update profiles set events = \''.$row[0].'\'  where a3k_id = \''.$_POST['a3kid'].'\'');
                    check($result) ;

                    $bd = '<div id="line"> Registration details of '.$_POST['name'].' </div>';

               //registering the user for each event in single_event_reg table
                    
                    $events = '';
                    foreach ($ev as $key => $value) 
                    {
                        $result = mysql_query('select id from single_event_reg where a3k_id=\''.$_POST['a3kid'].'\' and event = \''.$value.'\'');
                        check($result) ; 
                        $row = mysql_fetch_row($result);
                        
                        if( is_null($row[0]))
                            {
                                   $result = mysql_query('insert into single_event_reg (event, username, a3k_id) values (\''.$value.'\',\''.$_POST['name'].'\',\''.$_POST['a3kid'].'\')');
                                   check($result) ;
                                   $events = $events.','.$value ;
                            } 
                        else 
                             {
                                 $bd = $bd.'<div id="line"> You have already registered for '.$value.'. </div>' ;
                             }    
                    }
                return $bd. ' <div id="line"> Current registration was succesful for the events : '.$events.' </div>.' ; 
           }           
?>