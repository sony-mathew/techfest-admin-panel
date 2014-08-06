<?php


function admin_details()
    {
       $link = connect() ;

       $result = mysql_query('select *from counter') ; 
       check ( $result ) ;

       $row = mysql_fetch_row($result) ;
       
       $bd = '<table cellspacing="0" cellpadding="3">
                         <tr>
                            <th scope="row">Total Online Registration</th>
                            <td>'.$row[4].'</td>
                         </tr>
                         <tr>
                            <th scope="row">Total Offline Registration</th>
                            <td>'.$row[5].'</td>
                         </tr>
                         <tr>
                            <th scope="row">Total Cash</th>
                            <td>'.$row[6].'</td>
                         </tr>
                         <tr>
                            <th scope="row">Total Hits</th>
                            <td>'.$row[1].'</td>
                         </tr>    
              </table> ' ;   

   return $bd ; 

    }




?>    