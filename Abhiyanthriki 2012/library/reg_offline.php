<?php

include_once('./library/all_event_list.php');

function reg_off()
    {
      $bd = '

<h2><a href="#"> Offline Registration </a></h2>  
      <form method="post" action="index.php?reg=offline">
<div id="line">
<div class="linel"> A3K12 ID : </div> <div class="liner"><input type="text" name="a3kid" maxlength="15" /></div></div>

<div id="line">
<div class="linel">   Name : </div> <div class="liner"><input type="text" name="name" maxlength="100" /></div></div>

<div id="line">
  <div class="linel"> Email :</div> <div class="liner"><input type="text" name="email" maxlength="100" />   </div></div>

<div id="line">
   <div class="linel">Mobile  :   </div> <div class="liner"><input type="text" name="phone" maxlength="10">   </div></div>
<div id="line">
   <div class="linel">College   :   </div> <div class="liner"><input type="text" name="college" maxlength="90">   </div></div>
<div id="line">
   <div class="linel">College id   : </div> <div class="liner">  <input type="text" name="college_id" maxlength="25">   </div></div>
<div id="line">
   <div class="linel">Gender : </div> <div class="liner"><select name="gender"> <option> Male </option> <option>Female</option> </select> </div></div>  
<div id="line">
    <div class="linel">Course :  </div> <div class="liner"> <select name="course"> <option> B.Tech </option> <option> M.Tech </option><option> Others </option></select></div></div>   
<div id="line">
   <div class="linel">Course year : </div> <div class="liner"><select name="year">
  <option> 1st year </option>
  <option> 2nd year </option>
  <option> 3rd year </option>
  <option> 4th year </option>
</select>   </div></div>
<div id="line">
   <div class="linel">Cash Paid   :   </div> <div class="liner"><input type="text" name="cash" maxlength="4">   </div></div>

  <div id="line"> <div class="linel">Events    :   </div> <div class="liner" style = "height:100px;">'.events_list(1).' </div></div>
  <input type="hidden" name="check" value="1" />

  <div id="line"> <div class="liner"> <input type="submit" value="Register Me" style="width:100px;height:35px;"/>  </div></div> 

</form>  ';

      return $bd;
    }

function reg_offline_submit()
     {
               $link = connect();

              //validating email address
               
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))       { $check1 = 1 ; } 
                    else  { $body = ' * Invalid email. Please check the email provided<br/>' ; $check1 = 0 ; return $body ; }
                    $dt = date("Y-m-d h:i:s"); 
               
                    $ev = $_POST['event'] ;
                     if( !is_null($ev[0]) )
                        { $events = implode(',',$_POST['event']) ;  }

               //creating the profile for the user     

                    $result = mysql_query('INSERT INTO profiles ( a3k_id, username,password,name, email, mobile,college, college_id, gender, course, year, events,cash,jdate)
                      values ( \''.$_POST['a3kid'].'\',\''.$_POST['email'].'\',\''.$_POST['phone'].'\',\''.$_POST['name'].'\',\''.$_POST['email'].'\',\''.$_POST['phone'].'\',\''.$_POST['college'].'\',\''.$_POST['college_id'].'\' 
                        ,\''.$_POST['gender'].'\',\''.$_POST['course'].'\',\''.$_POST['year'].'\',\''.$events.'\',\''.$_POST['cash'].'\',\''.$dt.'\')');
                    check($result) ;

               //updating counter
                    
                    $result = mysql_query('update counter set total_reg_offline = total_reg_offline + 1 , total_cash = total_cash + '.$_POST['cash']);
                    check($result) ;

               //registering the user for each event
                 $bd = '';
                 if( !is_null($ev[0]) )
                  {    
                      foreach ($ev as $key => $value) 
                       {
                        $result = mysql_query('insert into single_event_reg (event, username, a3k_id) values (\''.$value.'\',\''.$_POST['name'].'\',\''.$_POST['a3kid'].'\')');
                        check($result) ;
                       }
                     $bd =  ' The events you have registered are : '.$events ;
                  }     
                return '<h2><a href="#"> User Registration </a></h2><br/> You have been succesfully registered. '.$bd.'<br/>' ;    
     }


?>