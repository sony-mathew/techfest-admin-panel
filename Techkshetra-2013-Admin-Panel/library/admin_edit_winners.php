<?php


function admin_winners_edit()
        {
         
            if( !isset ( $_POST['event'] ) )

               {

                  $bd = '<h2><a href="#"> Published Winners  </a></h2>  
                    <form method="post" action="index.php?q=edit_winners">
                    <div id="line">
                    <div class="linel"> Select Event : </div> <div class="liner">'.events_list(3).'</div></div>
                    
                    <input type="hidden" name="check" value="1" />
                    <div id="line"> <div class="liner"> <input type="submit" value="Submit" style="width:100px;height:35px;"/>  </div></div> 
                    </form> ';

                  return $bd;
               } 
            else

               { 
                    $link = connect();
                    $event = $_POST['event'];

                    $result = mysql_query('select *from winners where event_id = ( select id from events where name=\''.$event.'\')');
                    check($result) ;
                    $row = mysql_fetch_row($result);

                      $bd = '

                            <h2><a href="#"> Winners </a></h2>  

                             <div id="line" > The winners for this event ('.$_POST['event'].') has been published as follows: </div>
                              
                             <form method="post" action="index.php?q=edit_winners">

                             <div id="line" > <h4><a href="#"> First Price</a></h4>  </div>                            
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.idn($row[2]).' </div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s : </div> <div class="liner"> <input type="text" name="fpid" value="'.$row[2].'" /> </div></div>

                             <div id="line" > <h4><a href="#"> Second Price </a></h4>  </div>
                             <div id="line"> <div class="linel"> Names  : </div> <div class="liner"> '.idn($row[3]).'</div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s  : </div> <div class="liner"> <input type="text" name="spid" value="'.$row[3].'" /> </div></div>

                             <div id="line" > <h4><a href="#"> Third Price </a></h4>  </div>
                             <div id="line"> <div class="linel">Names  : </div> <div class="liner">'.idn($row[4]).'</div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s : </div> <div class="liner"> <input type="text" name="tpid" value="'.$row[4].'" /> </div></div>
                               <input type="hidden" name="check" value="2" />
                               <input type="hidden" name="event" value="'.$_POST['event'].'" />
                               <input type="hidden" name="eventid" value="'.$row[1].'" />
                              <div id="line"> <div class="liner"> <input type="submit" value="Update Winners" style="width:130px;height:35px;"/>  </div></div> 
                            </form>';      
                    return $bd ;
               }     
        }

function admin_winners_edit_submit()

         {
                
               $link = connect();
               $result = mysql_query('update winners set first=\''.$_POST['fpid'].'\',second=\''.$_POST['spid'].'\',third=\''.$_POST['tpid'].'\' where event_id=\''.$_POST['eventid'].'\'');

               check($result) ;
               return ' <h2><a href="#"> Edit Winners </a></h2>  
                        <div id="line" > The winners for  ('.$_POST['event'].') was edited and updated succesfully. </div>' ;                
         }        


?>