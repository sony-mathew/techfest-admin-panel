<?php

include_once("./library/db_common.php");


function add_event()

        {
              $bd = '

<h2><a href="#">Admin Panel > Add Event</a></h2>

<form method="post" action="index.php?q=add_event">


<div id="line">
<div class="linel"> Event Name : </div> <div class="liner"> <input type="text" name="name" maxlength="20"> </div></div>

<div id="line">
<div class="linel">Event Type  : </div> <div class="liner">  <select name="type"> <option>Single</option>  <option>Group</option> <option>Workshop</option> </select> </div></div>

<div id="lineexp">
<div class="linel"> Description : </div> <div class="liner"> <textarea rows="10" cols="60" name="description" > </textarea> </div></div>

<div id="line">
<div class="linel"> Event heads  : </div> <div class="liner">  <input type="text" name="eh1" maxlength="50"> </div></div>

<div id="line">
<div class="linel">  Event head  Emails : </div> <div class="liner">  <input type="text" name="eh1_email" maxlength="200"> </div></div>
<div id="line">
<div class="linel">  Event head Phones : </div> <div class="liner">  <input type="text" name="eh1_phone" maxlength="40"> </div></div>

<div id="line">
<div class="linel">  Username  : </div> <div class="liner">  <input type="text" name="username" maxlength="15"> </div></div>

<div id="line">
<div class="linel">  Password  : </div> <div class="liner">  <input type="text" name="pass" maxlength="15"> </div></div>

<div id="line">
<div class="linel">  Venue  : </div> <div class="liner">  <input type="text" name="venue" maxlength="50"></div></div>

<div id="lineexp">
<div class="linel"> Time : </div> <div class="liner"> Hour  : <input type="text" name="hh" maxlength="2" style="width:20px"/>  Minute  : <input type="text" name="mm" maxlength="2" style="width:20px"/>
</div></div>

<div id="line">
<div class="linel"></div> <div class="liner"><input type="submit" value="Add Event" style="width:75px;height:35px;"/> </div></div>
<input type="hidden" name="check" value="1" />
</form>' ;


              return $bd ;
        }









function add_event_submit()


         {
              
                $link = connect() ;
                //  $dt = date("Y-m-d H:i:s");            
                    
                $edt = '2013-09-06 '.$_POST['hh'].':'.$_POST['mm'].':00';
                  
               //entering the event details to database     
               
                    $result = mysql_query('INSERT INTO events   ( name , description, event_heads , event_head_emails,event_head_phones,
                      username, password, venue,event_time,reg_count,type,status ) 
                      VALUES ( \''.$_POST['name'].'\',\''.$_POST['description'].'\',\''.$_POST['eh1'].'\',\''.$_POST['eh1_email'].'\',
                        \''.$_POST['eh1_phone'].'\',\''.$_POST['username'].'\',\''.$_POST['pass'].
                        '\',\''.$_POST['venue'].'\',\''.$edt.'\',0,\''.$_POST['type'].'\',1)');
            
                    check($result);

           return 'Event was succesfully added to the database.';



         }











?>