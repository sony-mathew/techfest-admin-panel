<?php


function admin_event_heads()

       {
       	    $link = connect() ;

       	    $result = mysql_query('select type,name,EH_1,EH_2,EH_1_phone,EH_2_phone,username,password,venue,date_format(edate,\'%a %D %M %Y\') from events') ;
       	    check($result) ;

            $bd = '<table cellspacing="0" cellpadding="1px"> 
                              <tbody> 
                                     <tr> 
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
                                          <td> '.$row[2].'<br/>'.$row[3].' </td>
                                          <td> '.$row[4].'<br/>'.$row[5].' </td>
                                          <td> '.$row[6].' </td>
                                          <td> '.$row[7].' </td>
                                          <td> '.$row[8].' </td>
                                          <td> '.$row[9].' </td>
                                     </tr>';  
                	    }

            $bd = $bd . '
                                </tbody>
                         </table>    ';  
            return $bd ; 
       }


?>