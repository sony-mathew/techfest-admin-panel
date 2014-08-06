<?php



function admin_winners()
    {

      $bd = '       <h2><a href="#"> Published Winners  </a></h2>  
                    <form method="post" action="index.php?q=winners">
                    <div id="line">
                    <div class="linel"> Select Event : </div> <div class="liner">'.events_list(3).'</div></div>
                    
                    <input type="hidden" name="check" value="1" />
                    <div id="line"> <div class="liner"> <input type="submit" value="Submit" style="width:100px;height:35px;"/>  </div></div> 
                    </form> ';

      return $bd;
    }


function admin_winners_submit()
    {
               $link = connect();

                    $event = $_POST['event'];

                    $result = mysql_query('select *from winners where event_id = ( select id from events where name=\''.$event.'\')');
                    check($result) ;
                    $row = mysql_fetch_row($result);

                      $bd = '

                            <h2><a href="#"> Winners </a></h2>  

                             <div id="line" > The winners for the event <b>'.$_POST['event'].'</b> has been published as follows: </div>
                              
                             <div id="line" > <h4><a href="#"> First Price</a></h4>  </div>                            
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.idn($row[2]).' </div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s : </div> <div class="liner"> '.$row[2].' </div></div>

                             <div id="line" > <h4><a href="#"> Second Price </a></h4>  </div>
                             <div id="line"> <div class="linel"> Names  : </div> <div class="liner"> '.idn($row[3]).'</div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s  : </div> <div class="liner"> '.$row[3].' </div></div>

                             <div id="line" > <h4><a href="#"> Third Price </a></h4>  </div>
                             <div id="line"> <div class="linel">Names  : </div> <div class="liner">'.idn($row[4]).'</div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s : </div> <div class="liner">'.$row[4].'</div></div>';      
                    return $bd ;
    }

?>