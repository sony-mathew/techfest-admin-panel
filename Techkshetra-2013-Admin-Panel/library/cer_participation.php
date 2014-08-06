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
                    <div class="linel"> TK13 ID : </div> <div class="liner"><input type="text" name="tk13id" /></div></div>
                    
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
                               $result = mysql_query('update single_event_reg set certificate = 1 where tk13_id = \''.$_GET['id'].'\' and event_id = \''.$_GET['event'].'\'');
                           }

                       elseif ($_POST['type'] == 'Workshop') 
                           {
                               $result = mysql_query('update workshop_reg set certificate = 1 where tk13_id = \''.$_GET['id'].'\' and event_id = \''.$_GET['event'].'\'');
                           }

                       elseif ($_POST['type'] == 'Group') 
                           {
                               $result = mysql_query('update group_event_reg set certificate = 1 where id = \''.$_GET['id'].'\' and event_id = \''.$_GET['event'].'\'');
                           }

                       check($result);
                       $bd = $bd . '<div id="line"> Certificate Details succesfully updated. </div>' ;
                       return $bd ;
                  }  
    

            elseif ( isset( $_POST['type'] ) && ( $_POST['type'] == 'Single' || $_POST['type'] == 'Workshop') )

            {    

               if ( $_POST['type'] == 'Single' )  
                    {  $result = mysql_query('select event_id,certificate from single_event_reg where tk13_id = \''.$_POST['tk13id'].'\''); }
               else 
                    {  $result = mysql_query('select event_id,certificate from workshop_reg where tk13_id = \''.$_POST['tk13id'].'\'');     } 
               check($result) ;

               $tk = $_POST['tk13id'];
               $single = '';
               $flag = 0;
               while ($row = mysql_fetch_row($result) ) 
                 {
                     
                   if( !is_null ( $row[0]) ) 
                    
                    { 
                       $flag = 1 ;
                       if ( $row[1] == '1' )
                            {    $single = $single.' <div id="line"><div class="linel">Certificate Status of '.idn($tk).' for '.etn($row[0]).'</div> <div class="liner"> 
                                                        Certificate already given. </div></div>';   }
                       else
                            {
                                 $single = $single.' <div id="line"><div class="linel">Certificate status of '.idn($tk).' for '.etn($row[0]).' : </div> <div class="liner"> 
                                  <form method="post" action="index.php?cer=participation&id='.$tk.'&event='.$row[0].'"> 
                                  <input type="hidden" name="check" value="1" />
                                  <input type="hidden" name="type" value="'.$_POST['type'].'" />
                                  <input type="submit" value="Give Certificate" style="width:170px;height:25px;"/> 
                                  </form></div></div>';   
                           }
                     }                  
                 }
                
                if ($flag == 1 )

                          {   $bd = $bd . ' <div id="line"><div class="linel"> Name : </div> <div class="liner">'.idn($tk).'</div></div>
                              <div id="line"><div class="linel"> College : </div> <div class="liner">'.idc($tk).'</div></div>
                              <div id="line"><div class="linel"> Email : </div> <div class="liner">'.ide($tk).'</div></div>
                              <div id="line"><div class="linel"> Mobile : </div> <div class="liner">'.idp($tk).'</div></div>
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
                   $result = mysql_query('select *from group_event_reg where head_tk13_id like \'%'.$_POST['tk13id'].'%\' or 
                    members_tk13_id like \'%'.$_POST['tk13id'].'%\'');    
                   check($result) ;

                   while($row = mysql_fetch_row($result) )

                     {
                          if( !is_null($row[0]) && $row[4] != 1 )   
                            {  
                               $flag = 1 ;  
                               $bd = $bd. ' <div id="line"><div class="linel"> '.etn($row[1]).' : </div> <div class="liner"> 
                                            <form action="index.php?cer=participation&details=show" method="post"> 
                                            <input type="hidden" name="check" value="1" />
                                            <input type="hidden" name="type" value="Group" />
                                            <input type="hidden" name="row" value="'.$row[0].'" />
                                            <input type="hidden" name="event" value="'.$row[1].'" />
                                            <input type="hidden" name="head" value="'.$row[2].'" />
                                            <input type="submit" value="Show Details" style="width:100px;height:25px;"/> 
                                            </form></div></div> ' ; 
                            }
                         elseif ( !is_null($row[0]) && $row[4] == 1 ) 
                            {
                              $flag = 1 ;
                               $bd = $bd. ' 
                                            <div id="line"><div class="linel"> '.etn($row[1]).' : </div> 
                                            <div class="liner"> Certificate already given . </div></div>';

                            }                                 
                     }   
                
                 if ( $flag == 0 )  {   $bd = $bd. '<div id="line"> User not registered for any group events.</div>'; }
              }


            else
                {
                            $flag = 0 ;
                            $result = mysql_query('select *from group_event_reg where id = \''.$_POST['row'].'\'');    
                            check($result) ;
             
                            $row = mysql_fetch_row($result);

                            if ( !is_null ( $row[0] ) )
                                {      
                                  $flag = 1 ;
                                  $bd = $bd . '<div id="line"> <div class="linel"> Members :</div> <div class="liner">
                                         '.idn($row[2].','.$row[3]).'</div></div>';
                                  $bd = $bd . '<div id="line"> <div class="linel"> College :</div> <div class="liner">
                                         '.idc($row[2].','.$row[3]).'</div></div>';
                                  $bd = $bd . '<div id="line"> <div class="linel"> TK13 IDs :</div> <div class="liner">
                                         '.($row[2].','.$row[3]).'</div></div>';
                                } 

                          if( $flag == 1 )

                           { 
                            $bd = $bd . '<div id="line"><div class="liner">
                            <form method="post" action="index.php?cer=participation&id='.$row[0].'&event='.$row[1].'">
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