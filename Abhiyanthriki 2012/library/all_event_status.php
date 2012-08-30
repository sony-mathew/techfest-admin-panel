<?php


function event_status()

       {
       	    $link = connect() ;

       	    $result = mysql_query('select type,name,reg_status,EH_1,EH_2,EH_1_phone,EH_2_phone,venue,date_format(edate,\'%a %D %M %Y\') from events') ;
       	    check($result) ;

            $bd = '<table cellspacing="0" cellpadding="1px"> 
                              <tbody> 
                                     <tr> 
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
                             
                            if ( $row[2] == 1 )    {   $row[2]  = 'Open '   ;  }
                            else                   {   $row[2]  = 'Closed ' ;  }

                             $bd = $bd . '
                                     <tr> 
                                          <td> '.$row[0].' </td>
                                          <td> '.$row[1].' </td>
                                          <td> '.$row[2].' </td>
                                          <td> '.$row[3].'<br/>'.$row[4].' </td>
                                          <td> '.$row[5].'<br/>'.$row[6].' </td>
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