<?php

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
		foreach ($lines as $New_line)
		{
			$New_line = trim($New_line);
			if($New_line[0] != '#')
			{
				$New_line = trim($New_line);
				$New_line = preg_replace('/#.*/', '', $New_line);
				echo $New_line . '<br>';
			}

									//*- Prep -*\\
		}
		$array_len = count($New_line);
		$query_index = $array_len - 1;
		$fact_index = $array_len - 2;
		$rule_index = $array_len - 2;
		$New_array = array("A"=>0, "B"=>0, "C"=>0, "D"=>0, "E"=>0, "F"=>0, "G"=>0, 
		"H"=>0, "I"=>0, "J"=>0, "K"=>0, "L"=>0, "M"=>0, "N"=>0, "O"=>0, "P"=>0, "Q"=>0, 
		"R"=>0, "S"=>0, "T"=>0, "U"=>0, "V"=>0, "W"=>0, "X"=>0, "Y"=>0, "Z"=>0);

		$opp_1st = ('(');
		$opp_2nd = array('|', '^');
		$opp_3rd = array('+', '!');
		$opp_res = array("=>", "<=>");
		$rc = 0;
		$Rules = array_slice($New_line, $rc, $rule_index);
		function get_string_between($string, $start, $end)
		{
    		$string = ' ' . $string;
   			$ini = strpos($string, $start);
    		if ($ini == 0) return '';
    		$ini += strlen($start);
    		$len = strpos($string, $end, $ini) - $ini;
    		return substr($string, $ini, $len);
		}
							//*- The calculations -*\\

							
		// if ($New_line[$last_index])
		// {
			
		//     for ($counter = 0; $counter <= $array_len - 3; counter++)
		//     {
					//while ($New_line[counter] <= )
					//{
						//foreach ($Rules as $rule)
						//{
							//$rule = trim.erge_replace("[\s\t]", "", $rule)
							//for ($i = 0; $i <= (count($rule) - 1); $i++)
								//{
									//if ($rule[$cn] == $opp_1st)
									//{
										//$bod = get_string_between($rule, '(', ')');
										//
									//}
								//}
								//rule++;
						//}
					//}

					//if (ctype_upper($query_index) && ctype_upper($fact_index))
					//{
						//*- Definations -*\\

							//
					//}
		//     }

		// }
	}
}
	 


						//*- after program is done --- delete textfile -*\\

?>