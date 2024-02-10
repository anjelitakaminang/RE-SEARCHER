<?php
	// POST Data
	$data['user-question'] = $_POST['input-chat'];

	// execute python script 
	$pythonScript = "C:/xampp/htdocs/unklabot/unklabot.py";
	$pythonexe = "C:\Users\jiank\AppData\Local\Programs\Python\Python39\python.exe";

	exec($pythonexe.' '.$pythonScript.' "'.$data['user-question'].'"', $output);

	// print output obtained by Python script
	foreach ($output as $line) {
		echo $line;
	}
?>