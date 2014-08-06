<?php

function eh_list()
        {

             $event = explode('+',$_COOKIE['tk13eh']);
             
             $link = connect() ;

             $result = mysql_query('select type from events where name = \''.$event[1].'\'');
             check($result);

             $type = mysql_fetch_row($result);
             
             if($type[0] == 'Single')
                   {                        
                      $result = mysql_query('select tk13_id from single_event_reg where event_id = 
                        (select id from events where name = \''.$event[1].'\')');
                      check($result);
                      $bd = '<table cellspacing="0" cellpadding="1px"> <tbody> 
                              <tr> <th>Sl. No.</th> <th> TK13 ID </th><th> Name </th><th> Email ID </th><th> Mobile </th> </tr>' ;
                      $i = 0;
                      while ( $row = mysql_fetch_row($result) )
                        {
                          $bd = $bd.'<tr><td>'.++$i.'</td><td>'.$row[0].'</td><td>'.idn($row[0]).'</td><td>'.ide($row[0]).'</td><td>'.idp($row[0]).'</td></tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd;
                   }

             elseif ($type[0] == 'Group') 
                    { 
                       
                      $result = mysql_query('select head_tk13_id,members_tk13_id from group_event_reg where event_id = 
                        (select id from events where name = \''.$event[1].'\')');
                      check($result);
                      $bd = '<table cellspacing="0" cellpadding="1px"> <tbody> 
                              <tr> <th>Sl. No.</th> <th> TK13 ID </th><th> Name </th><th> Email ID </th><th> Mobile </th> </tr>' ;
                      $i = 0;
                      while ( $row = mysql_fetch_row($result) )
                        {
                          $temp = $row[0].','.$row[1];
                          $bd = $bd.'<tr>
                                          <td>'.++$i.'</td>
                                          <td>'.strtoupper( str_replace(',', ',<br/>', $temp) ).'</td>
                                          <td>'.str_replace(',', ',<br/>', ucwords( idn($temp) ) ).'</td>
                                          <td>'.str_replace(',', ',<br/>', ide($temp)).'</td>
                                          <td>'.str_replace(',', ',<br/>', idp($temp)).'</td>
                                      </tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd;

                    } 
             elseif ($type[0] == 'Workshop') 
                    {
                          
                      $result = mysql_query('select tk13_id from workshop_reg where event_id = 
                        (select id from events where name = \''.$event[1].'\')');
                      check($result);
                      $bd = '<table cellspacing="0" cellpadding="1px"> <tbody> 
                              <tr> <th>Sl. No.</th> <th> TK13 ID </th><th> Name </th><th> Email ID </th><th> Mobile </th> </tr>' ;
                      $i = 0;
                      while ( $row = mysql_fetch_row($result) )
                        {
                          $bd = $bd.'<tr><td>'.++$i.'</td><td>'.$row[0].'</td><td>'.idn($row[0]).'</td><td>'.ide($row[0]).'</td><td>'.idp($row[0]).'</td></tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd;

                    } 

        }



?>
