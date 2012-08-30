<?php
	

function login_page()
            {
                        

                        if ( $_GET['login'] == 'rc')    
                                           { $link = 'rc' ;}
                        elseif ( $_GET['login'] == 'cc') 
                                           { $link = 'cc' ;}
                        elseif ( $_GET['login'] == 'eh') 
                                           { $link = 'eh' ;}
                        elseif ( $_GET['login'] == 'ba') 
                                           { $link = 'ba' ;}
                        else 
                                           { $link = 'rc' ;}                                       

                         $bd = '<h2><a href="#">Abhiyanthriki 2012 Login</a></h2>
                                    <div style="width : 300px ; height : 200px ; margin : auto; margin-top : 50px;" >
                                             <form method="post" action="index.php?login='.$link.'">
                                                        	Username   &nbsp;: <input type="text" name="name" /> <br/><br/>
                                                        	Password   &nbsp; : <input type="password" name="pass" /><br/><br/>
	                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	                                                        <input type="submit" value="Login" style="width:60px ; height :35px;float:right;" />
                                             </form>	
                                </div>' ;
                         return $bd ;
            }

	
?>