<?php




function ge_reg()
               {
                   
              $bd = '
              <h2><a href="#"> Group Event Registration </a></h2>  
              <form method="post" action="index.php?reg=group_event">
              <div id="line"> <div class="linel">Group Event    :   </div> <div class="liner" style = "height:100px;">'.events_list(2).' </div></div>
              <div id="line"><div class="linel"> Group Head\'s A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid1" maxlength="15" /></div></div>
              <div id="line"><div class="linel"> Member 1 A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid2" maxlength="15" /></div></div>
              <div id="line"><div class="linel"> Member 2 A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid3" maxlength="15" /></div></div>
              <div id="line"><div class="linel"> Member 3 A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid4" maxlength="15" /></div></div>
              <div id="line"><div class="linel"> Member 4 A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid5" maxlength="15" /></div></div>
              <input type="hidden" name="check" value="1" />
              <div id="line"> <div class="liner"> <input type="submit" value="Register Me" style="width:100px;height:35px;"/>  </div></div> ';

              return $bd ;
               }


function ge_reg_submit()
                {
                  
                   $link = connect();
                    
                   $team = '';
                   $grpHead = '';
                   
                for( $i = 1 ; $i < 6 ; ++$i ) 

                 { 

                   if( !is_null($_POST['a3kid'.$i]) ) 
                   { //updating the events in the profiles table for the user     
                       $result = mysql_query('select events,name from profiles where a3k_id = \''.$_POST['a3kid'.$i].'\'');
                       check($result) ;

                       $row = mysql_fetch_row($result);
                       
                       $team = $team.'Member '.$i.' : '.$row[1].'<br/>';
                       //name of the group head
                       if( $i == 1 )  { $grpHead = $row[1] ; }
                       
                       $row[0] = $row[0].','.$_POST['group_event'] ;
                       
                       $result = mysql_query('update profiles set events = \''.$row[0].'\'  where a3k_id = \''.$_POST['a3kid'.$i].'\'');
                       check($result) ;
                   }

               //registering the user for each event in single_event_reg table
                 }   
                    
                    
                 $result = mysql_query('insert into grp_event_reg (event, username, a3k_1, a3k_2, a3k_3, a3k_4, a3k_5) values 
                                      (\''.$_POST['group_event'].'\',\''.$grpHead.'\',\''.$_POST['a3kid1'].'\',\''.$_POST['a3kid2'].'\',\''.$_POST['a3kid3'].'\',\''.$_POST['a3kid4'].'\',\''.$_POST['a3kid5'].'\')');
                 check($result) ;
                             
                return '<h2><a href="#"> Group Event Registration </a></h2>  
                        <div id="line"> Current registration was succesful for the event : '.$_POST['group_event'].' </div>
                        <div id="line"> Team Head is  '.$grpHead.'.</div> 
                        <div id="line"> The registered team is : '.$team .'. </div>'; 
                }               

?>