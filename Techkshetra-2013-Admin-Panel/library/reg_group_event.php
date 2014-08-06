<?php


function ge_reg()
               {
                  $bd = '
                  <h2><a href="#"> Group Event Registration </a></h2>  
                  <form method="post" action="index.php?reg=group_event">
                  <div id="line"> <div class="linel">Group Event    :   </div> <div class="liner" style = "height:30px;">'.events_list(2).' </div></div>
                  <div id="line"><div class="linel"> Group Head\'s TK13 ID : </div> <div class="liner"><input type="text" name="headid" maxlength="15" /></div></div>
                  <div id="line"><div class="linel"> Members TK13 IDs : </div> <div class="liner"><input type="text" name="memberids" maxlength="50" /></div></div>
                  <div id="line"><div class="linel"> Cash : </div> <div class="liner"><input type="text" name="cash" maxlength="4" /></div></div>
                  <input type="hidden" name="check" value="1" />
                  <div id="line"> <div class="liner"> <input type="submit" value="Register Me" style="width:100px;height:35px;"/>  </div></div> ';

                  return $bd ;
               }


function ge_reg_submit()
                {
                  
                  $link = connect();
                    
                  $result = mysql_query('insert into group_event_reg (event_id, head_tk13_id,members_tk13_id,cash) values 
                                      ((select id from events where name = \''.$_POST['group_event'].'\'),\''.$_POST['headid'].'\',
                                        \''.$_POST['memberids'].'\',\''.$_POST['cash'].'\')');
                  check($result) ;

                  $result = mysql_query('update counter set total_cash=total_cash+'.(is_numeric(trim($_POST['cash']))?trim($_POST['cash']):0));
                  check($result);
                             
                  return '<h2><a href="#"> Group Event Registration </a></h2>  
                          <div id="line"> Current registration was succesful for the event : <b>'.$_POST['group_event'].' </b></div>
                          <div id="line"> Team Head is  <b>'.idn($_POST['headid']).'.</b></div> 
                          <div id="line"> The registered team is :<br /> <b>'.str_replace(',', ',<br/>',  idn($_POST['memberids'])).'</b></div>'; 
                }               

?>