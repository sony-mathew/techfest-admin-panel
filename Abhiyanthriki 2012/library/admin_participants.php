<?php

function admin_participants()
           {
             


   if ( !isset($_POST['type'] ) )
   	      {
              $bd = '<h2><a href="#"> Participation  > Event Type </a></h2>  
                    <form method="post" action="index.php?q=list">
                       <div id="line">
                               <div class="linel"> Select Event Type : </div> 
                               <div class="liner">
                                     <select name="type">
                                             <option>Single</option>
                                             <option>Group</option>
                                             <option>Workshop</option>
                                     </select>
                                 </div>
                       </div>
                       <div id="line"> 
                                <div class="liner"> <input type="submit" value="Submit" style="width:100px;height:35px;"/>  </div>
                       </div> 
                    </form> ';
             return $bd;
          }    
   else
          {
           
            if( $_POST['type'] == 'Single' )  { $i = 6 ; }
            elseif( $_POST['type'] == 'Group' )  { $i = 5 ; }
            elseif( $_POST['type'] == 'Workshop' )  { $i = 7 ; } 

             $bd = '<h2><a href="#"> Participation > Select Event  </a></h2>  
                    <form method="post" action="index.php?q=list">
                       <div id="line">
                               <div class="linel"> Select Event Type : </div> 
                               <div class="liner">'.events_list($i).'
                                 </div>
                       </div>
                       <input type="hidden" name="type" value="'.$_POST['type'].'" /> 
                       <input type="hidden" name="check" value="1" />
                       <div id="line"> 
                                <div class="liner"> <input type="submit" value="Submit" style="width:100px;height:35px;"/>  </div>
                       </div> 
                    </form> ';
             return $bd;   
          }
           

           }





function admin_participants_submit()
            {
                  
                   
             $link = connect() ;

             $type = $_POST['type'];
             $event = $_POST['event'] ;
             

             if($type == 'Single')
                   {                        
                      $result = mysql_query('select profiles.a3k_id,name,email,mobile from profiles,single_event_reg where 
                         profiles.a3k_id=single_event_reg.a3k_id and single_event_reg.event = \''.$event.'\'');
                      check($result);
                      $bd = '<table cellspacing="0" cellpadding="1px"> <tbody> 
                              <tr> <th> A3K12 ID </th><th> Name </th><th> Email ID </th><th> Mobile </th> </tr>' ;
                      while ( $row = mysql_fetch_row($result) )
                        {
                          $bd = $bd.'<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td></tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd;
                   }


             elseif ($type == 'Group') 
                    { 
                       
                       $result = mysql_query('select *from grp_event_reg where event = \''.$event.'\'');
                       check($result);

                      $bd = '<table cellspacing="0" cellpadding="1px"> <tbody><tr><th> Team </th> <th> A3K12 ID </th><th> Name </th><th> Email ID </th><th> Mobile </th> </tr>' ;
                      $j = 0 ;
                      while ( $row = mysql_fetch_row($result) )
                        {
                           $a3kids = '';
                           $name = '';
                           $email = '';
                           $mobile = '' ;
                           for ( $i=1 ;  $i < 6  ;  $i++ ) 
                              { 
                                
                                $res = mysql_query('select a3k_id,name,email,mobile from profiles where a3k_id= \''.$row[3+$i].'\'');
                                check($res);
                                
                                $qres = mysql_fetch_row($res) ;

                                $a3kids = $a3kids.$qres[0].'</br>';
                                $name = $name.$qres[1].'</br>';
                                $email = $email.$qres[2].'</br>';
                                $mobile = $mobile.$qres[3].'</br>';
                              }  

                          $bd = $bd.'<tr><td>'.++$j.'</td><td>'.$a3kids.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$mobile.'</td></tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd; 

                    } 

             elseif ($type == 'Workshop') 
                    {
                         
                      $result = mysql_query('select profiles.a3k_id,workshop_reg.name,email,mobile,dd from profiles,workshop_reg where 
                         profiles.a3k_id=workshop_reg.a3k_id and workshop_reg.event = \''.$event.'\'');
                      check($result);
                      $bd = '<table cellspacing="0" cellpadding="1px"> <tbody> 
                              <tr> <th> A3K12 ID </th><th> Name </th><th> Email ID </th><th> Mobile </th><th> DD Number </th> </tr>' ;
                      while ( $row = mysql_fetch_row($result) )
                        {
                          $bd = $bd.'<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td></tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd;      
                    } 

            }           




?>