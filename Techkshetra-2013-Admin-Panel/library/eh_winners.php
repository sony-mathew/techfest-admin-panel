<?php


function eh_winners()
        {
         

               $link = connect();
               $event = explode('+',$_COOKIE['tk13eh']);

               $result = mysql_query('select *from winners where event_id = 
                                      ( select id from events where name = \''.$event[1].'\')');
               check($result) ;
               $row = mysql_fetch_row($result);

               if( mysql_num_rows($result) == 0 )
                   {  
                      $bd = '
                              <h2><a href="#"> Winners for '.$event[1].' </a></h2>  
      
                              <form method="post" action="index.php?eh=winners">
                          
                              <div id="line" > <h4><a href="#"> First Price</a></h4>  </div> 
                              <div id="line"><div class="linel"> TK13 ID\'s : </div> <div class="liner">  <input type="text" name="fpid"> </div></div>
                          
                              <div id="line" > <h4><a href="#"> Second Price</a></h4>  </div> 
                              <div id="line"><div class="linel"> TK13 ID\'s : </div> <div class="liner">   <input type="text" name="spid"> </div></div>
                          
                              <div id="line" > <h4><a href="#"> Third Price</a></h4>  </div> 
                              <div id="line"><div class="linel"> TK13 ID\'s : </div> <div class="liner">  <input type="text" name="tpid"> </div></div>
                              
                              <input type="hidden" name="check" value="1" />
                              <div id="line"> <div class="liner"> <input type="submit" value="Publish Winners" style="width:130px;height:35px;"/>  </div></div> 
                              </form> ';
                    }

               else 
                    {
                      $bd = '
                             <h2><a href="#"> Winners of '.$event[1].'</a></h2>  

                             <div id="line" > The winners for this event ('.$event[1].') has already been published as follows : </div>
   
                             <div id="line" > <h4><a href="#"> First Price</a></h4>  </div>                            
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.idn($row[2]).' </div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s : </div> <div class="liner"> '.$row[2].' </div></div>

                             <div id="line" > <h4><a href="#"> Second Price </a></h4>  </div>
                             <div id="line"> <div class="linel"> Names  : </div> <div class="liner"> '.idn($row[3]).' </div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s  : </div> <div class="liner"> '.$row[3].' </div></div>

                             <div id="line" > <h4><a href="#"> Third Price </a></h4>  </div>
                             <div id="line"> <div class="linel">Names  : </div> <div class="liner"> '.idn($row[4]).' </div></div>
                             <div id="line"> <div class="linel"> TK13 ID\'s : </div> <div class="liner"> '.$row[4].' </div></div>';   
                    }     
         return $bd ;
        }

function eh_winners_submit()

         {
                
               $link = connect();
               $event = explode('+',$_COOKIE['tk13eh']);

               $result = mysql_query('insert into winners (event_id, first, second, third) values 
                          (( select id from events where name = \''.$event[1].'\'),
                            \''.$_POST['fpid'].'\',\''.$_POST['spid'].'\',\''.$_POST['tpid'].'\')');
               check($result) ;
               return 'The winners have been published succesfully.' ;                
         }        


?>