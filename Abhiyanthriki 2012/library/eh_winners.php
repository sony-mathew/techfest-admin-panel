<?php


function eh_winners()
        {
         

               $link = connect();
               $event = explode('+',$_COOKIE['a3k12eh']);

               $result = mysql_query('select *from winners where event = \''.$event[1].'\'');
               check($result) ;
               $row = mysql_fetch_row($result);

               if( is_null($row[0]) )
                   {  
                      $bd = '
                              <h2><a href="#"> Winners for '.$event[1].' </a></h2>  
      
                              <form method="post" action="index.php?eh=winners">
                          
                              <div id="line" > <h4><a href="#"> First Price</a></h4>  </div> 
                              <div id="line"><div class="linel"> Names  : </div> <div class="liner">  <input type="text" name="fpn"> </div></div>
                              <div id="line"><div class="linel"> A3k12 ID\'s : </div> <div class="liner">  <input type="text" name="fpid"> </div></div>
                          
                              <div id="line" > <h4><a href="#"> First Price</a></h4>  </div> 
                              <div id="line"><div class="linel"> Names  : </div> <div class="liner">  <input type="text" name="spn"> </div></div>
                              <div id="line"><div class="linel"> A3k12 ID\'s : </div> <div class="liner">   <input type="text" name="spid"> </div></div>
                          
                              <div id="line" > <h4><a href="#"> First Price</a></h4>  </div> 
                              <div id="line"><div class="linel"> Names  : </div> <div class="liner">   <input type="text" name="tpn"> </div></div>
                              <div id="line"><div class="linel"> A3k12 ID\'s : </div> <div class="liner">  <input type="text" name="tpid"> </div></div>
                              
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
                             <div id="line"> <div class="linel"> Names : </div> <div class="liner"> '.$row[3].' </div></div>
                             <div id="line"> <div class="linel"> A3K12 ID\'s : </div> <div class="liner"> '.$row[4].' </div></div>

                             <div id="line" > <h4><a href="#"> Second Price </a></h4>  </div>
                             <div id="line"> <div class="linel"> Names  : </div> <div class="liner"> '.$row[6].' </div></div>
                             <div id="line"> <div class="linel"> A3K12 ID\'s  : </div> <div class="liner"> '.$row[7].' </div></div>

                             <div id="line" > <h4><a href="#"> Third Price </a></h4>  </div>
                             <div id="line"> <div class="linel">Names  : </div> <div class="liner"> '.$row[9].' </div></div>
                             <div id="line"> <div class="linel"> A3K12 ID\'s : </div> <div class="liner"> '.$row[10].' </div></div>';   
                    }     
         return $bd ;
        }

function eh_winners_submit()

         {
                
               $link = connect();
               $event = explode('+',$_COOKIE['a3k12eh']);

               $result = mysql_query('insert into winners (event, first_name, first_id, second_name, second_id,third_name,third_id ) values 
                          (\''.$event[1].'\',\''.$_POST['fpn'].'\',\''.$_POST['fpid'].'\',\''.$_POST['spn'].'\',\''.$_POST['spid'].'\',\''.$_POST['tpn'].'\',\''.$_POST['tpid'].'\')');
               check($result) ;
               return 'The winners was published succesfully.' ;                
         }        


?>