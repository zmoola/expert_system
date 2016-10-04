<?php

include_once("processing.php")

//Reading in the file.
if (isset($_POST['sub']))
{
	$name = $_FILES['uploadFile']['name'];
	$tmp = $_FILES['uploadFile']['tmp_name'];
	if (move_uploaded_file($tmp, $name))
	{

		$file = $name;
		$document = file_get_contents($file);
		$lines = explode("\n", $document);
		$lines = array_filter($lines);
		$lines = implode("\n", $lines);
		$lines = explode("\n", $lines);
		$pushed_lines = array();
		foreach ($lines as $New_lines)
		{
			$New_line = trim($New_lines);
			if($New_line[0] != '#')
			{
				$New_line = preg_replace('/#.*/', '', $New_line);
				if($New_line[0] === '=')
				$facts = $New_line;
				else if ($New_line[0] === '?')
				$query = $New_line;
				else
				{
				$New_line = trim($New_line);
				array_push($pushed_lines, $New_line);
				}
			}

									//*- Prep -*\\
		}
		$New_array = array("A"=>0, "B"=>0, "C"=>0, "D"=>0, "E"=>0, "F"=>0, "G"=>0, 
		"H"=>0, "I"=>0, "J"=>0, "K"=>0, "L"=>0, "M"=>0, "N"=>0, "O"=>0, "P"=>0, "Q"=>0, 
		"R"=>0, "S"=>0, "T"=>0, "U"=>0, "V"=>0, "W"=>0, "X"=>0, "Y"=>0, "Z"=>0);

		$opp_1st = ('(');
		$opp_2nd = array('|', '^');
		$opp_3rd = array('+', '!');
		$opp_res = array("=>", "<=>");
		function get_string_between($string, $start, $end)
		{
    		$string = ' ' . $string;
   			$ini = strpos($string, $start);
    		if ($ini == 0) return '';
    		$ini += strlen($start);
    		$len = strpos($string, $end, $ini) - $ini;
    		return substr($string, $ini, $len);
		}

		print_r($pushed_lines);
		echo "<BR>". $facts."<BR>".$query."<BR>";
		print_r($New_array);
							//*- The calculations -*\\
		//$cn = 1;
		//echo "<BR>". $query[cn]. '<BR>';
		//$pushed_merge = array($New_array, $facts);
		for ($cn = 0; $cn <= strlen($facts); $cn++)
			if (ctype_alpha($facts[$cn]) && ctype_upper($facts[$cn]))
				$New_array[$facts[$cn]] = 1;
		echo "<br />";
		print_r($New_array);
		process_vars($pushed_lines, $New_array, $query);
		/* while($query[cn])
		 {
			if (ctype_alpha($query) && ctype_upper($query)) // checking - array \\
			 {
				$array_len = count($pushed_lines);
			    for ($counter = 0; $counter <= $array_len - 3; $counter++)
			    {
		 			while ($pushed_lines[counter] <= ($array_len - 3))
		 			{
		 				foreach ($pushed_lines as $rule)
		 				{
		 					$rule = trim.erge_replace("[\s\t]", "", $rule);
		 					for ($i = 0; $i <= (count($rule) - 1); $i++)
		 						{
		 							if ($rule[$cn] == $opp_1st)
		 							{
		 								$bod = get_string_between($rule, '(', ')');
										 $count = 0;
		 								while ($bod[$count])
		 								{
		 									if ($bod = $opp_2nd)
											{
												
											}
										}
									}
								}
								//rule++;
						}
					}

					//if (ctype_upper($query_index) && ctype_upper($fact_index))
					//{
						//*- Definations -*\\

							//
					//}
		   }
		 }
	 }*/
	}
}


						//*- after program is done --- delete textfile -*\\

?>