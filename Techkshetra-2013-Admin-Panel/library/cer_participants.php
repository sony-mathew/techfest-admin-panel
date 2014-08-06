<?php

function cer_participants()
           {
             


   if ( !isset($_POST['type'] ) )
   	      {
              $bd = '<h2><a href="#"> Participation  > Event Type </a></h2>  
                    <form method="post" action="index.php?cer=events&q=list">
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
                    <form method="post" action="index.php?cer=events&q=list">
                       <div id="line">
                               <div class="linel"> Select Event : </div> 
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





function cer_participants_submit()
            {
                  
                   
             $link = connect() ;

             $type = $_POST['type'];
             $event = $_POST['event'] ;
             

            if($type == 'Single')
                   {                        
                      $result = mysql_query('select *from single_event_reg where event_id = (select id from events where name = \''.$event.'\')');
                      check($result);
                      $i = 0; 
                      $bd = ' Registration for <b>'.$event.'</b><br/>
                              <table cellspacing="0" cellpadding="1px"> <tbody> 
                              <tr> <th> Sl. No.</th><th> Name </th><th> TK13 ID </th><th> College </th><th> Mobile </th> </tr>' ;
                      while ( $row = mysql_fetch_row($result) )
                        {
                          $bd = $bd.'<tr><td>'.(++$i).'</td><td>'.idn($row[2]).'</td><td>'.$row[2].'</td><td>'.idc($row[2]).'</td><td>'.idp($row[2]).'</td></tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd;
                   }



             elseif ($type == 'Group') 
                    { 
                       
                       $result = mysql_query('select event_id,members_tk13_id,head_tk13_id from group_event_reg,events where 
                        group_event_reg.event_id=events.id and events.name = \''.$event.'\'');
                       check($result);

                      $bd = '<table cellspacing="0" cellpadding="1px"> <tbody><tr><th> Team </th> <th> TK13 ID </th><th> Name </th><th> College </th><th> Mobile </th> </tr>' ;
                      $j = 0 ;
                      while ( $row = mysql_fetch_row($result) )
                        {
                          $temp = $row[2].','.$row[1];
                          $bd = $bd.'<tr>
                                          <td>'.++$j.'</td><td>'.str_replace(',', '<br />', $temp).'</td>
                                          <td>'.str_replace(',', '<br />', idn($temp)).'</td>
                                          <td>'.str_replace(',', '<br />', idc($temp)).'</td>
                                          <td>'.str_replace(',', '<br />', idp($temp)).'</td>
                                      </tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd; 

                    } 

             elseif ($type == 'Workshop') 
                    {
                         
                      $result = mysql_query('select *from workshop_reg where event_id = (select id from events where name = \''.$event.'\')');
                      check($result);
                      $i = 0; 
                      $bd = ' Registration for <b>'.$event.'</b><br/>
                              <table cellspacing="0" cellpadding="1px"> <tbody> 
                              <tr> <th> Sl. No.</th><th> Name </th><th> TK13 ID </th><th> College </th><th> Mobile </th> </tr>' ;
                      while ( $row = mysql_fetch_row($result) )
                        {
                          $bd = $bd.'<tr><td>'.(++$i).'</td><td>'.idn($row[2]).'</td><td>'.$row[2].'</td><td>'.idc($row[2]).'</td><td>'.idp($row[2]).'</td></tr>' ;
                        }
                        $bd = $bd . '</tbody></table>';
                        return $bd;
                    }

            }           


?>