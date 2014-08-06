<?php

function reg_on()
    {
      $bd = '       <h2><a href="#"> Already Registered Guys Info </a></h2>  
                    <form method="post" action="index.php?reg=online">
                    <div id="line">
                    <div class="linel" style="width :70px;"> Email : </div> <div class="liner" style="width : 280px;"><input type="text" name="email" maxlength="80"/> 
                    <input type="submit" value="Search" style="width:60px;height:25px; margin-left : 20px;"/></div></div>
                    <input type="hidden" name="check" value="1" />
                    <input type="hidden" name="which" value="email" />
                    </form>
                    <form method="post" action="index.php?reg=online">
                    <div id="line">
                    <div class="linel" style="width :70px;"> Mobile : </div> <div class="liner" style="width : 280px;"><input type="text" name="mobile" maxlength="80"/> 
                    <input type="submit" value="Search" style="width:60px;height:25px; margin-left : 20px;"/></div></div>
                    <input type="hidden" name="check" value="1" />
                    <input type="hidden" name="which" value="mobile" /> 
                    </form>
                    <form method="post" action="index.php?reg=online">
                    <div id="line">
                    <div class="linel" style="width :70px;"> TK13 ID : </div> <div class="liner" style="width : 280px;"><input type="text" name="tk13_id" maxlength="80"/> 
                    <input type="submit" value="Search" style="width:60px;height:25px; margin-left : 20px;"/></div></div>
                    <input type="hidden" name="check" value="1" />
                    <input type="hidden" name="which" value="tk13id" />
                    </form>
                    ';

      return $bd;
    }

function reg_on_status()
     {
            
        $link = connect() ;

              $common_q = 'select tk13_id,name,phone,email,college,course,events_registered_online,events_registered_offline from user_profiles ';
              if( $_POST['which'] == 'email' )
                 {              
                            	$result = mysql_query($common_q.'where email=\''.$_POST['email'].'\'');
    	                        check($result);
                 }

              elseif( $_POST['which'] == 'mobile' )
                 {              
                            	$result = mysql_query($common_q.'where phone=\''.$_POST['mobile'].'\'');
    	                        check($result);
                 }
              
              elseif( $_POST['which'] == 'tk13id' )
                 {              
                            	$result = mysql_query($common_q.'where tk13_id=\''.str_replace('tk13', '', strtolower($_POST['tk13_id'])).'\'');
    	                        check($result);
                 }      
             
             $row = mysql_fetch_row($result) ;

             if( is_null($row[0]) )
             	  { return 'Sorry no such user profile found.' ; }


               $bd = '
<h2><a href="#"> Update User Details </a></h2>  
      <form method="post" action="index.php?reg=online">
<div id="line">
<div class="linel"> TK13 ID : </div> <div class="liner">'.tk13id($row[0]).'</div></div>

<div id="line">
<div class="linel">   Name : </div> <div class="liner"><input type="text" name="name" maxlength="100" value="'.$row[1].'"/></div></div>

<div id="line">
  <div class="linel"> Email :</div> <div class="liner"><input type="text" name="email" maxlength="100" value="'.$row[3].'"/>   </div></div>

<div id="line">
   <div class="linel">Mobile  :   </div> <div class="liner"><input type="text" name="phone" maxlength="10" value="'.$row[2].'">   </div></div>
<div id="line">
   <div class="linel">College   :   </div> <div class="liner">'.$row[4].'   </div></div>
<div id="line">
    <div class="linel">Course :  </div> <div class="liner"> '.$row[5].'</div></div>   

  <div id="line"> <div class="linel">Events    :   </div> <div class="liner"> '.$row[6].','.$row[7].'  </div></div>
  <input type="hidden" name="check" value="2" />
  <input type="hidden" name="tk13id" value="'.$row[0].'" />

  <div id="line"> <div class="liner"> <input type="submit" value="Update Profile" style="width:100px;height:35px;"/>  </div></div> 

</form>  ';    	
      
      return $bd ;

     }    

function reg_on_update()
      {
            
             $link = connect();

              //validating email address
               
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))       { $check1 = 1 ; } 
                    else  { $body = ' * Invalid email. Please check the email provided<br/>' ; $check1 = 0 ; return $body ; }
                    
    
               //creating the profile for the user     

                    $result = mysql_query('update user_profiles set name=\''.$_POST['name'].'\', email = \''.$_POST['email'].'\' , 
                    	phone = \''.$_POST['phone'].'\' where tk13_id = \''.$_POST['tk13id'].'\' '); 
                    check($result) ;
                    
                   return '<h2><a href="#"> Update User Details </a></h2><br/><br/> User Profile has been succesfully updated. <br/>' ; 

      }

?>