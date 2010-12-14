<html>
	<body>
		<?php			
			/* verifies whether the story context should be set to He or She*/
			function check_sex($sex)
			{
				if($sex == "male")
					$sex = "He";
					
				else
					$sex = "She";
					
				return $sex;	
			}
			
			/* outputs the story in Bear.txt substituting the '*' place holders accordingly */
			function print_story($values)
			{	
				// try and open the file
				$file = fopen("Bear.txt","r") or exit("Sorry, unable to open file!");
				$i = 0;
								
				// go through until we reach the end of the file
				while(!feof($file))
				{
					$current = fgetc($file);
					
					// if we're at the end of the line, start a new line and get the next character
					if($current == "\n")
					{
						echo "<br />";
						$current = fgetc($file);
					}
					
					// if we are at a place holder, substitute it with the appropriate value
					if($current == "*")
					{
						$current = $values[$i];
						$i++;
					}
						
					// output the current token to the screen
					echo $current;						
				}
				
				// close the file
				fclose($file);
				return;
			}
			
			// verify the sex so we know whether to output He or She
			$sex = check_sex($_POST["sex"]);
			
			// collect the values passed into the form and use them to out put the story in Bear.txt
			$values = array($_POST["age"], $_POST["fname"], $_POST["lname"], $sex, $_POST["fruits"], $_POST["supers"]);
			print_story($values);
		?>
	</body>	
</html>