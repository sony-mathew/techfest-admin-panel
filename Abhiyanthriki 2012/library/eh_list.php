<?php

function eh_list()
        {

             $event = explode('+',$_COOKIE['a3k12eh']);
             
             $link = connect() ;

             $result = mysql_query('select type from events where name = \''.$event[1].'\'');
             check($result);

             $type = mysql_fetch_row($result);
             
             if($type[0] == 'Single')
                   {                        
                      $result = mysql_query('select profiles.a3k_id,name,email,mobile from profiles,single_event_reg where 
                         profiles.a3k_id=single_event_reg.a3k_id and single_event_reg.event = \''.$event[1].'\'');
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

             elseif ($type[0] == 'Group') 
                    { 
                       
                       $result = mysql_query('select *from grp_event_reg where event = \''.$event[1].'\'');
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
             elseif ($type[0] == 'Workshop') 
                    {
                          
                      $result = mysql_query('select profiles.a3k_id,workshop_reg.name,email,mobile,dd from profiles,workshop_reg where 
                         profiles.a3k_id=workshop_reg.a3k_id and workshop_reg.event = \''.$event[1].'\'');
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
