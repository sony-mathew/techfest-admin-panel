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
                    <div class="linel" style="width :70px;"> A3K12 ID : </div> <div class="liner" style="width : 280px;"><input type="text" name="a3kid" maxlength="80"/> 
                    <input type="submit" value="Search" style="width:60px;height:25px; margin-left : 20px;"/></div></div>
                    <input type="hidden" name="check" value="1" />
                    <input type="hidden" name="which" value="a3kid" />
                    </form>
                    ';

      return $bd;
    }

function reg_on_status()
     {
            
        $link = connect() ;

              if( $_POST['which'] == 'email' )
                 {              
                            	$result = mysql_query('select *from profiles where email=\''.$_POST['email'].'\'');
    	                        check($result);
                 }

              elseif( $_POST['which'] == 'mobile' )
                 {              
                            	$result = mysql_query('select *from profiles where mobile=\''.$_POST['mobile'].'\'');
    	                        check($result);
                 }
              
              elseif( $_POST['which'] == 'a3kid' )
                 {              
                            	$result = mysql_query('select *from profiles where a3k_id=\''.$_POST['a3kid'].'\'');
    	                        check($result);
                 }      
             
             $row = mysql_fetch_row($result) ;

             if( is_null($row[0]) )
             	  { return 'Sorry no such user profle found.' ; }


               $bd = '
<h2><a href="#"> Update User Details </a></h2>  
      <form method="post" action="index.php?reg=online">
<div id="line">
<div class="linel"> A3K12 ID : </div> <div class="liner">'.$row[1].'</div></div>

<div id="line">
<div class="linel">   Name : </div> <div class="liner"><input type="text" name="name" maxlength="100" value="'.$row[4].'"/></div></div>

<div id="line">
  <div class="linel"> Email :</div> <div class="liner"><input type="text" name="email" maxlength="100" value="'.$row[10].'"/>   </div></div>

<div id="line">
   <div class="linel">Mobile  :   </div> <div class="liner"><input type="text" name="phone" maxlength="10" value="'.$row[11].'">   </div></div>
<div id="line">
   <div class="linel">College   :   </div> <div class="liner">'.$row[5].'   </div></div>
<div id="line">
   <div class="linel">College id   : </div> <div class="liner"> '.$row[6].'  </div></div>
<div id="line">
   <div class="linel">Gender : </div> <div class="liner"> '.$row[9].' </div></div>  
<div id="line">
    <div class="linel">Course :  </div> <div class="liner"> '.$row[8].'</div></div>   
<div id="line">
   <div class="linel">Course year : </div> <div class="liner">'.$row[7].'</div></div>
<div id="line">
   <div class="linel">Cash Paid   :   </div> <div class="liner"><input type="text" name="cash" maxlength="4" value="'.$row[13].'">   </div></div>
   <input type="hidden" name="cash_pre" value="'.$row[13].'" />
  <div id="line"> <div class="linel">Events    :   </div> <div class="liner"> '.$row[12].'  </div></div>
  <input type="hidden" name="check" value="2" />
  <input type="hidden" name="a3kid" value="'.$row[1].'" />

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
                    
                    $dt = date("Y-m-d h:i:s"); 
                    
               //creating the profile for the user     

                    $result = mysql_query('update profiles set name=\''.$_POST['name'].'\', email = \''.$_POST['email'].'\' , 
                    	mobile = \''.$_POST['phone'].'\', cash = \''.$_POST['cash'].'\' where a3k_id = \''.$_POST['a3kid'].'\' '); 
                    check($result) ;
                    
               //updating the counter
                    $sum = $_POST['cash'] - $_POST['cash_pre'];
                    $result = mysql_query('update counter set total_reg_online = total_reg_online + 1 , total_cash = total_cash + '.$sum);
                    check($result) ;

                   return '<h2><a href="#"> Update User Details </a></h2><br/><br/> User Profile has been succesfully updated. <br/>' ; 

      }

?>