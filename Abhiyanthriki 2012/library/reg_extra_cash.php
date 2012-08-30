<?php



function reg_cash()
    {
      $bd = '       <h2><a href="#"> Buy Cash </a></h2>  
                    <form method="post" action="index.php?reg=cash">
                    <div id="line">
                    <div class="linel"> A3k12 ID : </div> <div class="liner"><input type="text" name="a3kid" maxlength="15" /></div></div>
                    <div id="line">
                    <div class="linel"> Cash Coupon : </div> <div class="liner"><input type="text" name="cash" maxlength="4" /></div></div>
                    <input type="hidden" name="check" value="1" />
                    <div id="line"> <div class="liner"> <input type="submit" value="Buy Now" style="width:100px;height:35px;"/>  </div></div> 
                    </form> ';

      return $bd;
    }

function reg_cash_submit()
    {

        $link = connect() ;

    	$result = mysql_query('select name,college,events,cash from profiles where a3k_id='.$_POST['a3kid']);
    	check($result);

    	$row = mysql_fetch_row($result);
    	if ( is_null($row[0]) )
    	    {
    	    	return 'No user with A3k12 ID '.$_POST['a3kid'].' was found. Please check the A3K12 ID you have given.';
    	    } 
    	else
    		{
    			$row[3] = $row[3] + $_POST['cash'] ;
    			$result = mysql_query('update profiles set cash = '.$row[3].' where a3k_id = \''.$_POST['a3kid'].'\'');
    			check($result) ;

                  //updating counter
                    $result = mysql_query('update counter set total_cash = total_cash + '.$_POST['cash']);
                    check($result) ;
  
    			return '<h2><a href="#"> Cash Details </a></h2>Succesfully credited. <br/> Rs. '.$_POST['cash'].' was succesfully credited to account of '.$row[0].' from '.$row[1].' <br/> 
    			Events Registered : '.$row[2].'<br/> Total Account balance is : '.$row[3] ;  
    		} 
    } 

?>