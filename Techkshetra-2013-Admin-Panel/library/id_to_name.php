<?php

function idn( $text )
		{
				$text = strtolower($text);
				$link = connect();

				if( substr_count($text, ',') > 0 )
					{
						$temp = explode(',', $text);
						$names = '';
						foreach ($temp as $key => $value) 
							{
								$raw = str_replace('tk13', '', $value);
								$query = 'select name from user_profiles where tk13_id=\''.$raw.'\'';
								check($result = mysql_query($query));
								if(mysql_num_rows($result) > 0 )
									{ 	
										$name = mysql_fetch_row($result);	
										$names .= $name[0].',';	
									}
								else
									{	
										$names .= 'Invalid ID.,';
									}						
							}
						return $names;	
					}
				else
					{
						$temp = str_replace('tk13', '', $text);
						$query = 'select name from user_profiles where tk13_id=\''.$temp.'\'';
						check($result = mysql_query($query));
						if(mysql_num_rows($result) > 0 )
							{ 	
								$name = mysql_fetch_row($result);	
								return $name[0];	
							}
						else
							{	
								return 'Invalid ID.';
							}
					}	
		}

function ide( $text )
		{
				$text = strtolower($text);
				$link = connect();

				if( substr_count($text, ',') > 0 )
					{
						$temp = explode(',', $text);
						$names = '';
						foreach ($temp as $key => $value) 
							{
								$raw = str_replace('tk13', '', $value);
								$query = 'select email from user_profiles where tk13_id=\''.$raw.'\'';
								check($result = mysql_query($query));
								if(mysql_num_rows($result) > 0 )
									{ 	
										$name = mysql_fetch_row($result);	
										$names .= $name[0].',';	
									}
								else
									{	
										$names .= 'Invalid ID.,';
									}						
							}
						return $names;	
					}
				else
					{
						$temp = str_replace('tk13', '', $text);
						$query = 'select email from user_profiles where tk13_id=\''.$temp.'\'';
						check($result = mysql_query($query));
						if(mysql_num_rows($result) > 0 )
							{ 	
								$name = mysql_fetch_row($result);	
								return $name[0];	
							}
						else
							{	
								return 'Invalid ID.';
							}
					}	
		}
function idp( $text )
		{
				$text = strtolower($text);
				$link = connect();

				if( substr_count($text, ',') > 0 )
					{
						$temp = explode(',', $text);
						$names = '';
						foreach ($temp as $key => $value) 
							{
								$raw = str_replace('tk13', '', $value);
								$query = 'select phone from user_profiles where tk13_id=\''.$raw.'\'';
								check($result = mysql_query($query));
								if(mysql_num_rows($result) > 0 )
									{ 	
										$name = mysql_fetch_row($result);	
										$names .= $name[0].',';	
									}
								else
									{	
										$names .= 'Invalid ID.,';
									}						
							}
						return $names;	
					}
				else
					{
						$temp = str_replace('tk13', '', $text);
						$query = 'select phone from user_profiles where tk13_id=\''.$temp.'\'';
						check($result = mysql_query($query));
						if(mysql_num_rows($result) > 0 )
							{ 	
								$name = mysql_fetch_row($result);	
								return $name[0];	
							}
						else
							{	
								return 'Invalid ID.';
							}
					}	
		}

function idc( $text )
		{
				$text = strtolower($text);
				$link = connect();

				if( substr_count($text, ',') > 0 )
					{
						$temp = explode(',', $text);
						$names = '';
						foreach ($temp as $key => $value) 
							{
								$raw = str_replace('tk13', '', $value);
								$query = 'select college from user_profiles where tk13_id=\''.$raw.'\'';
								check($result = mysql_query($query));
								if(mysql_num_rows($result) > 0 )
									{ 	
										$name = mysql_fetch_row($result);	
										$names .= $name[0].',';	
									}
								else
									{	
										$names .= 'Invalid ID.,';
									}						
							}
						return $names;	
					}
				else
					{
						$temp = str_replace('tk13', '', $text);
						$query = 'select college from user_profiles where tk13_id=\''.$temp.'\'';
						check($result = mysql_query($query));
						if(mysql_num_rows($result) > 0 )
							{ 	
								$name = mysql_fetch_row($result);	
								return $name[0];	
							}
						else
							{	
								return 'Invalid ID.';
							}
					}	
		}

function etn( $text )
		{
				$text = strtolower($text);
				$link = connect();

				$result = mysql_query('select name from events where id=\''.$text.'\'');
				check($result);
				$row = mysql_fetch_row($result);
				return $row[0];
		}

function idtid ( $text )
		{
			return str_replace('tk13', '',  strtolower($text));
		}		
?>