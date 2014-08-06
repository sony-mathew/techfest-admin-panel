<?php

function eh_status()

          {
               $bd = '';
               $link = connect();
               $event = explode('+',$_COOKIE['tk13eh']);
               
               $result = mysql_query('select status from events where name = \''.$event[1].'\'');
               check($result) ;

               $row = mysql_fetch_row($result);

               if($row[0] == 1 )
                  { $bd = 'This event is currenly open for registration.' ; }
               else
                   { $bd = 'Registration for this event has been closed.' ; } 
               
               $bd = $bd . '<div id="line">
                                    <form method="post" action="index.php?eh=status">
                                     <div class="linel" style="width :70px;"> 
                                          <input type="submit" value="Open Registration" style = "width : 130px ; height : 30px;"/> 
                                          <input type="hidden" name="status" value="open" /> 
                                          <input type="hidden" name="check" value="1" /> 
                                    </form>
                                    </div> 
                                    <form method="post" action="index.php?eh=status">
                                    <div class="liner">
                                          <input type="submit" value="Close Registration" style = "width : 130px ; height : 30px;"/> 
                                          <input type="hidden" name="status" value="close" />
                                          <input type="hidden" name="check" value="1" />  
                                    </div>
                                    </form>
                            </div>';    
               return $bd;
          }

function eh_status_submit()
          {
              
              $bd = '';
               $link = connect();
               $event = explode('+',$_COOKIE['tk13eh']);
               
               if($_POST['status'] == 'open')
                     {  
                         $result = mysql_query('update events set status = 1 where name = \''.$event[1].'\'');
                         check($result) ;
                         $bd = 'Registration is now open for '.$event[1];
                      }
               elseif($_POST['status'] == 'close')
                       {
                          $result = mysql_query('update events set status = 0 where name = \''.$event[1].'\'');
                          check($result) ;
                         $bd = 'Registration is closed for '.$event[1].'.';
                       }       
                return $bd;       
          }
?>
