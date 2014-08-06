<?php



function workshop_reg()
           {
              $bd = '
              <h2><a href="#"> Workshop Registration </a></h2>  
              <form method="post" action="index.php?reg=workshop">
              <div id="line"> <div class="linel">Events    :   </div> <div class="liner" style = "height:30px;">'.events_list(4).' </div></div>
              <div id="line">
              <div class="linel"> TK13 ID : </div> <div class="liner"><input type="text" name="tk13id" maxlength="15" /></div></div>
              <div id="line">
              <div class="linel"> Cash : </div> <div class="liner"><input type="text" name="cash" maxlength="15" /></div></div>
              <input type="hidden" name="check" value="1" />
              <div id="line"> <div class="liner"> <input type="submit" value="Register Me" style="width:100px;height:35px;"/>  </div></div> ';

              return $bd ;
           }

function workshop_reg_submit()
           {
                    $link = connect();
                       
                    $event = $_POST['workshop'] ;

                    $query = 'insert into workshop_reg (event_id,tk13_id,cash) values 
                              ( (select id from events where name = \''.$event.'\'), \''.$_POST['tk13id'].'\',\''.$_POST['cash'].'\')';
                    check( mysql_query($query));           
                    
                    $result = mysql_query('update counter set total_cash = total_cash +'.trim($_POST['cash']));
                    check($result);

                    return '<div id="line"> Current registration was succesful for <b>'.idn($_POST['tk13id']).'</b> for the workshop : <b>'.$event.' </b></div>.' ;
                     
           }           
?>