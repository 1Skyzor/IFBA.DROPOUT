<?php

//data.php

$connect = new PDO("mysql:host=remotemysql.com;dbname=w4zimpQNrp", "w4zimpQNrp", "PGG4UgZ9vS");

	
		$query = "
		SELECT language, COUNT(survey_id) AS Total 
		FROM survey_table 
		GROUP BY language
		";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'language'		=>	$row["language"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data);
	
?>