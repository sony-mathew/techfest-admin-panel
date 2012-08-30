<?php



function cer_participation()

        {
              $bd = ' <h2><a href="#"> Participation  </a></h2>  
                    <form method="post" action="index.php?cer=participation">
                    <div id="line">
                    <div class="linel"> Select Event Type : </div> <div class="liner">

                    <select name="type">
                    <option>Single</option>
                    <option>Group</option>
                    <option>Workshop</option>
                    </select>
                     </div></div>
                    
                    <div id="line">
                    <div class="linel"> A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid" /></div></div>
                    
                    <input type="hidden" name="check" value="1" />
                    <div id="line"> <div class="liner"> <input type="submit" value="Submit" style="width:100px;height:35px;"/>  </div></div> 
                    </form> ';
             return $bd;
        }



function cer_participation_submit()

        {
            
            $bd = ' <h2><a href="#"> Participation Certificate Details </a></h2>  ';

            $link = connect();


            if ( isset ( $_GET['id'] ) )
                  {
                       
                       if( $_POST['type'] == 'Single') 
                           {
                               $result = mysql_query('update single_event_reg set certificate = 1 where a3k_id = \''.$_GET['id'].'\' and event = \''.$_GET['event'].'\'');
                           }

                       elseif ($_POST['type'] == 'Workshop') 
                           {
                               $result = mysql_query('update workshop_reg set certificate = 1 where a3k_id = \''.$_GET['id'].'\' and event = \''.$_GET['event'].'\'');
                           }

                       elseif ($_POST['type'] == 'Group') 
                           {
                               $result = mysql_query('update grp_event_reg set certificate = 1 where a3k_1 = \''.$_GET['id'].'\' and event = \''.$_GET['event'].'\'');
                           }

                       check($result);
                       $bd = $bd . '<div id="line"> Certificate Details succesfully updated. </div>' ;
                       return $bd ;
                  }  
    

            elseif ( isset( $_POST['type'] ) && ( $_POST['type'] == 'Single' || $_POST['type'] == 'Workshop') )

            {    
               
               $flag = 0 ;
               $result = mysql_query('select a3k_id,name,college,email,mobile from profiles where a3k_id = \''.$_POST['a3kid'].'\'');    
               check($result) ;
               $details = mysql_fetch_row($result);
            
               $single = '';
               

               if ( $_POST['type'] == 'Single' )  
                    {  $result = mysql_query('select event,certificate from single_event_reg where a3k_id = \''.$_POST['a3kid'].'\''); }
               else 
                    {  $result = mysql_query('select event,certificate from workshop_reg where a3k_id = \''.$_POST['a3kid'].'\'');     } 
               check($result) ;


               while ($row = mysql_fetch_row($result) ) 
                 {
                     
                   if( !is_null ( $row[0]) ) 
                    
                    { 
                       $flag = 1 ;
                       if ( $row[1] == '1' )
                            {    $single = $single.' <div id="line"><div class="linel"> '.$row[0].' : </div> <div class="liner"> Certificate already given. </div></div>';   }
                       else
                            {
                                 $single = $single.' <div id="line"><div class="linel"> '.$row[0].' : </div> <div class="liner"> 
                                  <form method="post" action="index.php?cer=participation&id='.$details[0].'&event='.$row[0].'"> 
                                  <input type="hidden" name="check" value="1" />
                                  <input type="hidden" name="type" value="'.$_POST['type'].'" />
                                  <input type="submit" value="Give Certificate" style="width:170px;height:25px;"/> 
                                  </form></div></div>';   
                           }
                     }                  
                 }
                
                if ($flag == 1 )

                          {   $bd = $bd . ' <div id="line"><div class="linel"> Name : </div> <div class="liner">'.$details[1].'</div></div>
                              <div id="line"><div class="linel"> College : </div> <div class="liner">'.$details[2].'</div></div>
                              <div id="line"><div class="linel"> Email : </div> <div class="liner">'.$details[3].'</div></div>
                              <div id="line"><div class="linel"> Mobile : </div> <div class="liner">'.$details[4].'</div></div>
                              <div id="line"><h3><a href="#"> Details  ( '.$_POST['type'].' )</a></h3></div>'.$single;
                           }
                 else
                            {
                              $bd = $bd . ' <div id="line"> User not registered for any '.$_POST['type'].' Event.</div>' ;
                            }             
                return $bd;              
            }


            elseif ( isset ( $_POST['type'] ) && $_POST['type'] == 'Group' )

            {    
               

            if( !isset ( $_POST['row'] ) )
              {
                
                $flag = 0 ;

                for( $i = 1 ; $i < 6 ; ++ $i )

                {
                   $result = mysql_query('select *from grp_event_reg where a3k_'.$i.' = \''.$_POST['a3kid'].'\'');    
                   check($result) ;

                   while($row = mysql_fetch_row($result) )

                     {
                          if( !is_null($row[0]) && $row[9] != 1 )   
                            {  
                               $flag = 1 ;  
                               $bd = $bd. ' 
                                            <div id="line"><div class="linel"> '.$row[2].' : </div> <div class="liner"> 
                                            <form action="index.php?cer=participation&details=show" method="post"> 
                                            <input type="hidden" name="check" value="1" />
                                            <input type="hidden" name="type" value="Group" />
                                            <input type="hidden" name="row" value="'.$i.'" />
                                            <input type="hidden" name="event" value="'.$row[2].'" />
                                            <input type="hidden" name="a3kid" value="'.$_POST['a3kid'].'" />
                                            <input type="submit" value="Show Details" style="width:100px;height:25px;"/> 
                                            </form></div></div> ' ; 
                            }
                         elseif ( !is_null($row[0]) && $row[9] == 1 ) 
                            {
                              $flag = 1 ;
                               $bd = $bd. ' 
                                            <div id="line"><div class="linel"> '.$row[2].' : </div> 
                                            <div class="liner"> Certificate already given . </div></div>';

                            }                                 
                     }   
                }  
                
                
                 if ( $flag == 0 )  {   $bd = $bd. '<div id="line"> User not registered for any group events.</div>'; }
              }


            else
                {
                            $flag = 0 ;

                            $result = mysql_query('select *from grp_event_reg where a3k_'.$_POST['row'].' = \''.$_POST['a3kid'].'\' and event = \''.$_POST['event'].'\'');    
                            check($result) ;
             
                            $details = mysql_fetch_row($result);

                            for ( $i = 0 ; $i < 5 ; ++$i )
                               {
                                
                                $j = 4 + $i ;
                                $result = mysql_query('select name,college,mobile from profiles where a3k_id = \''.$details[ $j ].'\'');
                                check($result) ;
                                $row = mysql_fetch_row ( $result ) ;
                                
                                $j = $j - 3 ;
                                if ( !is_null ( $row[0] ) )
                                    {      
                                      $flag = 1 ;
                                      $bd = $bd . '<div id="line"> <div class="linel"> Member '. $j .' :</div> <div class="liner">
                                             '.$row[0].'<br/>'.$row[1].'<br/>'.$row[2].'</div></div>';
                                    } 
                               }

                          if( $flag == 1 )

                           { 
                            $bd = $bd . '<div id="line"><div class="liner">
                            <form method="post" action="index.php?cer=participation&id='.$details[4].'&event='.$details[2].'">
                            <input type="hidden" name="check" value="1" />
                            <input type="hidden" name="type" value="Group" />
                            <input type="submit" value="Give Certificate" style="width:100px;height:25px;"/> 
                            </form></div></div>';
                           }

                           else
                              {
                                $bd = $bd.'No details found.';
                              }
                              
                }

              return $bd; 
            }


        }

?>