<?php


function admin_event_heads()

       {
       	    $link = connect() ;

       	    $result = mysql_query('select id,type,name,event_heads,event_head_phones,username,password,venue,event_time from events') ;
       	    check($result) ;

            $bd = '<table cellspacing="0" cellpadding="1px"> 
                              <tbody> 
                                     <tr> 
                                          <th> ID </th>
                                          <th> Type </th>
                                          <th> Event </th>
                                          <th> Event Heads </th>
                                          <th> Phone </th>
                                          <th> Username </th>
                                          <th> Password </th>
                                          <th> Venue </th>
                                          <th> Date-Time </th> 
                                     </tr>' ;

       	    while( $row = mysql_fetch_row($result) )
                	    {
                             $bd = $bd . '
                                     <tr> 
                                          <td> '.$row[0].' </td>
                                          <td> '.$row[1].' </td>
                                          <td> '.$row[2].' </td>
                                          <td> '.str_replace(',', ',<br/>', $row[3]).' </td>
                                          <td> '.str_replace(',', ',<br/>', $row[4]).' </td>
                                          <td> '.$row[5].' </td>
                                          <td> '.$row[6].' </td>
                                          <td> '.$row[7].' </td>
                                          <td> '.$row[8].' </td>
                                     </tr>';  
                	    }

            $bd = $bd . '
                                </tbody>
                         </table>    ';  
            return $bd ; 
       }


?>