<?php
 								// isolate result
function calc($str, $values, $rules)
{
	for ($cn = 0; $cn < strlen($str); $cn++)
	{
		if (ctype_alpha($str[$cn]) && ctype_upper($str[$cn]))
		{
			if (check_val($str[$cn], $values, $rules))
			{
				if ($str[$cn - 1] === '!')
				{
					$str = trim(preg_replace('/!'.$str[$cn].'/', $str[$cn], $str));
					$str[$cn - 1] = 0;
				}
				else
					$str[$cn] = 1;
			}
			else
			{
				if ($str[$cn - 1] === '!')
				{
					$str = trim(preg_replace('/!'.$str[$cn].'/', $str[$cn], $str));
					$str[$cn - 1] = 1;
				}
				else
					$str[$cn] = 0;
			}
		}
	}
	for ($cn = 0; $cn < strlen($str); $cn++)
	{
		if ($str[$cn] === '+')
		{
			if (($str[$cn -1] === 1) && ($str[$cn +1] === 1))
				$rs = 1;
			else
				$rs = 0;
		}
		else if ($str[$cn] === '|')
		{
			if (($str[$cn -1] === 1) || ($str[$cn +1] === 1))
				$rs = 1;
			else
				$rs = 0;
		}
		else if ($str[$cn] === '^')
		{
			if ((($str[$cn -1] === 1) && ($str[$cn +1] !== 1)) || 
			(($str[$cn -1] !== 1) && ($str[$cn +1] === 1)))
				$rs = 1;
			else
				$rs = 0;
		}
	}
	return ($rs);
}
/* do backward reference */
function do_rules($query, $values, $rules)
{
	$rt = 0;
	foreach ($rules as $str)
	if (preg_match('/>(.*)'.$query.'/', $str))
	{
		if (preg_match('/</', $str))
			$end = strpos($str, '<');
		else
			$end = strpos($str, '=');
		$rt = calc(substr($str, 0, $end), $values, $rules);
		if (preg_match('/</', $str))
			break;
	}
	if ($rt === 1)
		$values[$query] = 1;
	return ($rt);
}
/* check value if true, else read rules */
function check_val($query, $values, $rules)
{
	if ($values[$query] === 1)
		return (1);
	else
		return (do_rules($query, $values, $rules));
}
/* send values for checking */
function process_rules($query, $values, $rules)
{
	for ($cn = 0; $cn < strlen($query); $cn++)
		if (ctype_alpha($query[$cn]) && ctype_upper($query[$cn]))
			{
				if (check_val($query[$cn], $values, $rules))
	   				echo $query[$cn]. " is true<br />";
				else
					echo $query[$cn]. " is false<br />";
			}
}
	
								//Results\\
//$results = array();
// foreach ($pushed_line as $rules)
//{
		//$array_len = count($rule);
		//$pos1 = strpos('>', $rules);
		//$pos2 = strpos($rules[$array_len - 1], $rules);
		//$res = get_string_between($rules, $pos1, $pos2);
		//$results = array_push($pushed_lines, $New_line);
// }
//function Cap_check($query)
//{
//	for
//}
// 	$cn = 1;
// if (isset($query))
// {
// 		while($query[cn] && $query != NULL && count($query) != 0)
// 		{
// 			if (ctype_alpha($query[$cn]) && ctype_upper($query[$cn])) // checking - array \\
// 			{
	//			foreach ($pushed_line as $rule) //work from results(backwards)\\
	//			{
// 					$array_len = count($pushed_lines);
// 		    		for ($counter = 0; $counter <= $array_len - 3; $counter++)
// 		    		{
// 						while ($pushed_lines[counter] <= ($array_len - 3))
// 						{
// 							foreach ($pushed_lines as $rule)
// 							{
// 								$rule = trim.erge_replace("[\s\t]", "", $rule);
// 								for ($i = 0; $i <= (count($rule) - 1); $i++)
// 								{
// 		 							if ($rule[$cn] == $opp_1st)
// 		 							{
// 		 								$bod = get_string_between($rule, '(', ')');
// 										 $count = 0;
// 		 								while ($bod[$count])
// 		 								{
// 		 									if ($bod = $opp_2nd)
// 											{
												
// 											}
// 										}
// 									}
//									else if ($rule[$cn] == $opp_2nd)
//									{
//
//									}
//									else if($rule[$cn] == $opp_3rd)
//									{
//	
//									}
//									else if ($rule[$cn] == $res)
//									{
//	
//									}
//									else
//									{
//
//									}
// 								}
// 								rule++;
// 						}
// 					}

// 					if (ctype_upper($query_index) && ctype_upper($fact_index))
// 					{
// 						*- Definations -*\\

							
// 					}
// 		   }
// 		 }
// 	 }
// 	}
// }


// 						//*- after program is done --- delete textfile -*\\









?>