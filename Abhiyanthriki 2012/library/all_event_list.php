<?php


include_once('db_common.php');


function events_list($i)

    {
        $link = connect();

        $bd = '';

        if( $i ==1 )
             {
                    $result = mysql_query('select name from events where reg_status = 1 and type = \'Single\'');
    	            while($row = mysql_fetch_row($result))
    	             { 
                          $bd = $bd .'<input type="checkbox" name="event[]" value="'.$row[0].'" />&nbsp;&nbsp;'.ucwords($row[0]).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	
                      }  
              }
         elseif( $i == 2 )
              {
                    $bd = '<select name="group_event"> ';
                    $result = mysql_query('select name from events where reg_status = 1 and type = \'Group\'');
                  while($row = mysql_fetch_row($result))
                   { 
                          $bd = $bd .'<option>'.$row[0].'</option>';  
                      } 
                   $bd = $bd.'</select>'  ; 
              } 

         elseif( $i == 3 )
              {
                    $bd = '<select name="event"> ';
                    $result = mysql_query('select event from winners');   
                  while($row = mysql_fetch_row($result))
                   { 
                          $bd = $bd .'<option>'.$row[0].'</option>';  
                      } 
                   $bd = $bd.'</select>' ; 
              }    

         elseif( $i == 4 )
              {
                    $bd = '<select name="workshop"> ';
                    $result = mysql_query('select name from events where reg_status = 1 and type = \'Workshop\'');   
                  while($row = mysql_fetch_row($result))
                   { 
                          $bd = $bd .'<option>'.$row[0].'</option>';  
                      } 
                   $bd = $bd.'</select>' ; 
              }         

         elseif( $i == 5 )
              {
                    $bd = '<select name="event"> ';
                    $result = mysql_query('select name from events where type = \'Group\'');
                  while($row = mysql_fetch_row($result))
                   { 
                          $bd = $bd .'<option>'.$row[0].'</option>';  
                      } 
                   $bd = $bd.'</select>'  ; 
              } 

         elseif( $i == 6 )
              {
                    $bd = '<select name="event"> ';
                    $result = mysql_query('select name from events where type = \'Single\'');
                  while($row = mysql_fetch_row($result))
                   { 
                          $bd = $bd .'<option>'.$row[0].'</option>';  
                      } 
                   $bd = $bd.'</select>'  ; 
              } 

         elseif( $i == 7 )
              {
                    $bd = '<select name="event"> ';
                    $result = mysql_query('select name from events where type = \'Workshop\'');
                  while($row = mysql_fetch_row($result))
                   { 
                          $bd = $bd .'<option>'.$row[0].'</option>';  
                      } 
                   $bd = $bd.'</select>'  ; 
              } 

         return $bd;
     }    

?>