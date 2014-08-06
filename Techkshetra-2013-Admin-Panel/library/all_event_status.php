<?php


function event_status()

       {
       	    $link = connect() ;

       	    $result = mysql_query('select id,type,name,status,event_heads,event_head_phones,venue,event_time from events') ;
       	    check($result) ;

            $bd = '<table cellspacing="0" cellpadding="1px"> 
                              <tbody> 
                                     <tr> 
                                          <th> ID </th>
                                          <th> Type </th>
                                          <th> Event </th>
                                          <th> Status </th>
                                          <th> Event Heads </th>
                                          <th> Phone </th>
                                          <th> Venue </th>
                                          <th> Date-Time </th> 
                                     </tr>' ;

       	    while( $row = mysql_fetch_row($result) )
                	    {
                             
                            if ( $row[3] == 1 )    {   $row[3]  = 'Open '   ;  }
                            else                   {   $row[3]  = 'Closed ' ;  }

                             $bd = $bd . '
                                     <tr> 
                                          <td> '.$row[0].' </td>
                                          <td> '.$row[1].' </td>
                                          <td> '.$row[2].' </td>
                                          <td> '.$row[3].' </td>
                                          <td> '.str_replace(',', ',<br/>', $row[4]).' </td>
                                          <td> '.str_replace(',', ',<br/>', $row[5]).' </td>
                                          <td> '.$row[6].' </td>
                                          <td> '.$row[7].' </td>
                                     </tr>';  
                	    }

            $bd = $bd . '
                                </tbody>
                         </table>    ';  
            return $bd ; 
       }


?>