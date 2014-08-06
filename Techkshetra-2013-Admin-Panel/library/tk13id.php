<?php

function tk13id($id)
		{
			$idr = '';
			if($id > 999 )
				{	$idr = 'tk13'.$id ;  }
			else if($id > 99 )
				{	$idr = 'tk130'.$id ;  }
			else if($id > 9 )
				{	$idr = 'tk1300'.$id ;  }
			else
				{	$idr = 'tk13000'.$id ;  }
			
			return $idr;
		}


?>