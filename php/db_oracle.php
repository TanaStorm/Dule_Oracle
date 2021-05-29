<?php
$con = mysqli_connect("localhost","dule","dule123","dule");
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
  
?>


