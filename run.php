<?php
	// POST Data
	$data['ask-rec'] = $_POST['recommend'];
	//$data['user-question'] = "input-chat";

	//echo exec('echo "Hello World"');

	// execute python script 
	$pythonScript = "C:/xampp/htdocs/unklabot/unklabot.py";
	$pythonexe = "C:\Users\jiank\AppData\Local\Programs\Python\Python39\python.exe";
	
	exec($pythonexe.' '.$pythonScript.' "'.$data['ask-rec'].'"', $output);

	// print output obtained by Python script
	foreach ($output as $line) {
		echo $line;
	}
?>