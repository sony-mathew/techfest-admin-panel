<?php


include_once('db_common.php');


function events_list($i)

    {
        $link = connect();

        $bd = '';

        if( $i ==1 )
             {
                    $bd = '<select name="single_event"> ';
                    $result = mysql_query('select name from events where status = 1 and type = \'Single\'');
      	            while($row = mysql_fetch_row($result))
        	             { 
                         $bd = $bd .'<option>'.$row[0].'</option>';  
                       }  
                     $bd = $bd.'</select>'  ;   
              }
         elseif( $i == 2 )
              {
                    $bd = '<select name="group_event"> ';
                    $result = mysql_query('select name from events where status = 1 and type = \'Group\'');
                  while($row = mysql_fetch_row($result))
                   { 
                          $bd = $bd .'<option>'.$row[0].'</option>';  
                      } 
                   $bd = $bd.'</select>'  ; 
              } 

         elseif( $i == 3 )
              {
                    $bd = '<select name="event"> ';
                    $result = mysql_query('select events.name from events,winners where winners.event_id=events.id');   
                  while($row = mysql_fetch_row($result))
                   { 
                          $bd = $bd .'<option>'.$row[0].'</option>';  
                      } 
                   $bd = $bd.'</select>' ; 
              }    

         elseif( $i == 4 )
              {
                    $bd = '<select name="workshop"> ';
                    $result = mysql_query('select name from events where status = 1 and type = \'Workshop\'');   
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