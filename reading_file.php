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

							//*- The calculations -*\\
		}
		$array_len = count($New_line);
		$last_index = $array_len - 1;
		$counter = 0;
		$New_array = array("A"=>0, "B"=>0, "C"=>0, "D"=>0, "E"=>0, "F"=>0, "G"=>0, 
		"H"=>0, "I"=>0, "J"=>0, "K"=>0, "L"=>0, "M"=>0, "N"=>0, "O"=>0, "P"=>0, "Q"=>0, 
		"R"=>0, "S"=>0, "T"=>0, "U"=>0, "V"=>0, "W"=>0, "X"=>0, "Y"=>0, "Z"=>0);

		function array_keys_recursive($New_Array, $MAXDEPTH = 25, $depth = 0, $arrayKeys = array())
		{
			if($depth < $MAXDEPTH)
			{
				$depth++;
				$keys = array_keys($myArray);
				foreach($keys as $key)
				{
					// if(is_array($myArray[$key]))
					// {
						$arrayKeys[$key] = array_keys_recursive($myArray[$key], $MAXDEPTH, $depth);
					}
				}
			}

			return $arrayKeys;
		}

		// if ($New_line[$last_index])
		// {
			
		//     foreach($New_line, as $rules)
		//     {
					//if (ctype_upper(rules))
					//{
						//*- Definations -*\\


					//}
		//     }

		// }
	}
}
	 


						//*- after program is done --- delete textfile -*\\

?>