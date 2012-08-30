<?php




/* authentication codes for mysql database are set here */



define(user , 'root');



define(domain , 'localhost');



define(pass , 'cool');



define(db , 'abhiyanthriki_2012');






/* common functions for database connectivity and handling */





function connect( )

    {

     $link = mysql_connect( domain , user, pass ) ;

     if (!$link)
             {     
               die('<br/><br/>Could not connect to the database: <b>' . mysql_error()).'</b>';
               exit;        
             }

     mysql_select_db( db , $link ) ;

     return $link ;

     }


/* if there is any problem with databse connectivty , then the thread is ended. */

function check($result)
     {

      if(!$result)
         {
             print '<div style="width:700px; height : 60px; margin : auto; margin-top: 200px;"> <b><br/><br/> Sorry , We are facing some problem with the database connectivity. Please return after some time.<br/> Thank You. </b></div><br/>'.mysql_error();
             exit ;
         }
     }   



//function to desterilise the variables to obtain the original data from mysql database.

function d ( $text )

   {
     
    $vlaid_html_tags = '<p> <a> <b> <br> <i> <li> <ul> <h1> <h2> <h3> <h4> <div> <code> <style>' ;

    $text = strip_tags( $text , $vlaid_html_tags ) ;    
    $text =  stripcslashes($text); 

    $text = str_replace("&#039;", "'", $text); 
    $text = str_replace("&gt;", ">", $text); 
    $text = str_replace("&quot;", "\"", $text);    
    $text = str_replace("&lt;", "<", $text); 
        
    return $text;
   }




// sanitization 
function sanitizeVariables(&$item, $key) 
{ 
    if (!is_array($item)) 
    { 
        // undoing 'magic_quotes_gpc = On' directive 
        if (get_magic_quotes_gpc()) 
            $item = stripcslashes($item); 
        
        $item = sanitizeText($item); 
    } 
} 


// does the actual 'html' and 'sql' sanitization. 

function sanitizeText($text) 
{ 
    $text = str_replace("<", "&lt;", $text); 
    $text = str_replace(">", "&gt;", $text); 
    $text = str_replace("\"", "&quot;", $text); 
    $text = str_replace("'", "&#039;", $text); 
    
    $text = addslashes($text); 

    return $text; 
}



?>
