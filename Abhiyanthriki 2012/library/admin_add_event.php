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
<div class="linel"> Event head 1  : </div> <div class="liner">  <input type="text" name="eh1" maxlength="50"> </div></div>

<div id="line">
<div class="linel">  Event head 1  Email : </div> <div class="liner">  <input type="text" name="eh1_email" maxlength="200"> </div></div>
<div id="line">
<div class="linel">  Event head 1  Phone : </div> <div class="liner">  <input type="text" name="eh1_phone" maxlength="10"> </div></div>
<div id="line">
<div class="linel">  Event head 2  : </div> <div class="liner">   <input type="text" name="eh2" maxlength="50"> </div></div>

<div id="line">
<div class="linel">  Event head 2  Email : </div> <div class="liner">   <input type="text" name="eh2_email" maxlength="200"> </div></div>

<div id="line">
<div class="linel">  Event head 2  Phone : </div> <div class="liner">  <input type="text" name="eh2_phone" maxlength="10"> </div></div>

<div id="line">
<div class="linel">  Username  : </div> <div class="liner">  <input type="text" name="username" maxlength="15"> </div></div>

<div id="line">
<div class="linel">  Password  : </div> <div class="liner">  <input type="text" name="pass" maxlength="15"> </div></div>

<div id="line">
<div class="linel">  Venue  : </div> <div class="liner">  <input type="text" name="venue" maxlength="50"></div></div>

<div id="lineexp">
<div class="linel">   Date :  
  </div> <div class="liner"> Day : <input type="text" name="day" maxlength="2" style="width:20px"/>  Month : <input type="text" name="month" maxlength="1" style="width:20px;"/></div></div>

<div id="lineexp">
<div class="linel"> Time : </div> <div class="liner"> Hour  : <input type="text" name="hh" maxlength="2" style="width:20px"/>  Minute  : <input type="text" name="mm" maxlength="2" style="width:20px"/>
</div></div>
<div id="line">
<div class="linel">   First price  : </div> <div class="liner">  <input type="text" name="fp" maxlength="5"> </div></div>
<div id="line">
<div class="linel">   Second price : </div> <div class="liner">  <input type="text" name="sp" maxlength="5"> </div></div>

<div id="line">
<div class="linel">   Third price  : </div> <div class="liner">  <input type="text" name="tp" maxlength="5"> </div></div>


<div id="line">
<div class="linel"></div> <div class="liner"><input type="submit" value="Add Event" style="width:75px;height:35px;"/> </div></div>
<input type="hidden" name="check" value="1" />
</form>' ;


              return $bd ;
        }









function add_event_submit()


         {
              
                $link = connect() ;
              //validating email address
               
                    if (filter_var($_POST['eh1_email'], FILTER_VALIDATE_EMAIL))       { $check1 = 1 ; } 
                    else  { $body = ' * Invalid email of first event head.<br/>' ; $check1 = 0 ; return $body ; }
                                     
               
                       if($check1 == 0 )
                                {     if (filter_var($_POST['eh2_email'], FILTER_VALIDATE_EMAIL))       { $check1 = 1 ; } 
                                     else  {  $body = ' * Invalid email of 2nd event head. <br/>' ; 
                                              $check1 = 0 ; 
                                              return $body ; }
                                }

               
                    $dt = date("Y-m-d h:i:s");            
                    
                    $edt = '2012-'.$_POST['month'].'-'.$_POST['day'].' '.$_POST['hh'].':'.$_POST['mm'].':00';
                  
               //entering the event details to database     
               
                    $result = mysql_query('INSERT INTO events   ( name , description, EH_1 , EH_2 , EH_1_email,EH_2_email,EH_1_phone,EH_2_phone, 
                      username, password, venue, edate,fp, sp, tp, reg_counter , reg_status, ldate ,type ) 
                      VALUES ( \''.$_POST['name'].'\',\''.$_POST['description'].'\',\''.$_POST['eh1'].'\',\''.$_POST['eh2'].'\',\''.$_POST['eh1_email'].
                        '\',\''.$_POST['eh2_email'].'\',\''.$_POST['eh1_phone'].'\',\''.$_POST['eh2_phone'].'\',\''.$_POST['username'].'\',\''.$_POST['pass'].
                        '\',\''.$_POST['venue'].'\',\''.$edt.'\','.$_POST['fp'].','.$_POST['sp'].','.$_POST['tp'].' , 0 , 1 ,\''.$dt.'\',\''.$_POST['type'].'\')');
            
                    check($result);

               //send email notifications to event heads with login credentials
              for( $i = 1 ; $i < 3 ; ++$i )
              
              {      
              $to = $_POST['eh'.$i.'_email'];
              $subject = "Abhiyanthriki 2012 - Notification for event heads . ";
              $message = 'Dear '.$_POST['eh'.$i].', 
                          \n\n You have been selected as the event head of '.$_POST['name'].' ( '.$_POST['type'].' Event) for Abhiyanthriki 2012.\n
                           \n Your authentication details are as follows : 
                           \n\n Username : '.$_POST['username'].'
                           \n Password : '.$_POST['pass'].' 
                           \n\n\n\n You can edit the details of the event any time you want. Thank you.';
              $from = "admin@abhiyanthriki.com";
              $headers = "From:" . $from;
              mail($to,$subject,$message,$headers);
              } 



           return 'Event was succesfully added to the database.';



         }











?>