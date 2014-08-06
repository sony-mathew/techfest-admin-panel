<?php



function cer_winners()
    {

      $bd = '       <h2><a href="#"> Published Winners  </a></h2>  
                    <form method="post" action="index.php?cer=winners">
                    <div id="line">
                    <div class="linel"> Select Event : </div> <div class="liner">'.events_list(3).'</div></div>
                    
                    <input type="hidden" name="check" value="1" />
                    <div id="line"> <div class="liner"> <input type="submit" value="Submit" style="width:100px;height:35px;"/>  </div></div> 
                    </form> ';

      return $bd;
    }


function cer_winners_submit()
    {
               $link = connect();

               $result = mysql_query('select *from winners where event_id = ( select id from events where name=\''.$_POST['event'].'\')');
               check($result) ;
               $row = mysql_fetch_row($result);                           
              $bd = '
                             <h2><a href="#"> Winners of '.$_POST['event'].'</a></h2>  

                             <div id="line" > The winners for this event ('.$_POST['event'].') has  been published as follows : </div>
   
                             <div id="line" > <h4><a href="#"> First Price</a></h4>  </div>                            
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.str_replace(',', ',<br />', idn($row[2])).' </div></div>
                             <div id="line"> <div class="linel"> College : </div> <div class="liner"> '.str_replace(',', ',<br />', idc($row[2])).' </div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s : </div> <div class="liner"> '.$row[2].' </div></div>

                             <div id="line" > <h4><a href="#"> Second Price </a></h4>  </div>
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.str_replace(',', ',<br />', idn($row[3])).' </div></div>
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.str_replace(',', ',<br />', idc($row[3])).' </div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s  : </div> <div class="liner"> '.$row[3].' </div></div>

                             <div id="line" > <h4><a href="#"> Third Price </a></h4>  </div>
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.str_replace(',', ',<br />', idn($row[4])).' </div></div>
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.str_replace(',', ',<br />', idc($row[4])).' </div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s : </div> <div class="liner"> '.$row[4].' </div></div>';   
               return $bd;
    }

?>