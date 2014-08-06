<?php

include_once('./library/all_event_list.php');

function reg_off()
    {
      $bd = '

<h2><a href="#"> Offline Registration </a></h2>  
      <form method="post" action="index.php?reg=offline">
<div id="line">
<div class="linel">   Name : </div> <div class="liner"><input type="text" name="name" maxlength="100" /></div></div>

<div id="line">
  <div class="linel"> Email :</div> <div class="liner"><input type="text" name="email" maxlength="100" />   </div></div>

<div id="line">
   <div class="linel">Mobile  :   </div> <div class="liner"><input type="text" name="phone" maxlength="10">   </div></div>
<div id="line">
   <div class="linel">College   :   </div> <div class="liner"><input type="text" name="college" maxlength="90">   </div></div>
<div id="line">
    <div class="linel">Course :  </div> <div class="liner"> <select name="course"> <option> B.Tech </option> <option> M.Tech </option><option> Others </option></select></div></div>   
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

              $query = 'select tk13_id from user_profiles where email=\''.$_POST['email'].'\'';
              check( $result = mysql_query($query));

              if( mysql_num_rows($result) == 0 )      
                    {
                            $result = mysql_query('select max(tk13_id) from user_profiles');
                            $max_id = mysql_fetch_row($result);
                            $dt = date("Y-m-d H:i:s");            

                      //creating the profile for the user     
                            $result = mysql_query('INSERT INTO user_profiles ( name,username,password,email, phone,college, course,reg_date)
                              values ( \''.$_POST['name'].'\',\''.$_POST['email'].'\',\''.(++$max_id[0]).'\',\''.$_POST['email'].'\',\''.$_POST['phone'].'\'
                                ,\''.$_POST['college'].'\',\''.$_POST['course'].'\',\''.$dt.'\')');
                            check($result) ;

                            $result = mysql_query('select tk13_id from user_profiles where email =\''.$_POST['email'].'\'');
                            $idf = mysql_fetch_row($result);

                            if( mysql_num_rows($result) > 0 )
                              {
                                //updating counter
                                      $result = mysql_query('update counter set total_offline_reg = total_offline_reg + 1 ');
                                      check($result) ;

                                      $bd = 'You have been succesfully registered. <br/><br/>
                                              <div id="line"> YOur registration id is : 
                                              <div class="large" style="font-size:200%;padding-left:150px;"><b> '.strtoupper(tk13id($idf[0])).' </b> .</div></div>';
                              }        
                            else
                              {
                                      $bd = 'Sorry. Your Registration was unsuccessfull. Please try again.';
                              }  
                    }
              else 
                    {
                        $bd = 'You have registered with this email already.';                      
                    }              

                return '<h2><a href="#"> User Registration </a></h2><br/>'.$bd.'<br/>' ;    
     }


?>