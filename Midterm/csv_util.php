<?php
function readAll($path_to_file){
	//open the file in read mode
	$path_to_file = '/data/quotes.csv';
	$fall = fopen($path_to_file, "r");
	// read all lines as a PHP array
	print_r(file($path_to_file));
	// close the file
	fclose($path_to_file);
	// return the array
	$scan = scandir($path_to_file);
	print_r($scan);
}


function readOneLine($path_to_file,$line_number){
	//open the file in read mode
	$path_to_file = '/data/quotes.csv';
	// read all lines 
	$fone = fopen($path_to_file, "r");
	while(!feof($fone)) echo fgets($fone)."<br />";
	// when you reach line $line_number
	$line = file($fone);
	$line[5]= 'This line was read';
		// close the file
		fclose($fone);
		// return the array in that line
		$scan = scandir($path_to_file);
}

function modifyLine($path_to_file,$line_number,$new_content){
	//open the file in write mode
	$path_to_file = '/data/quotes.csv';
	// read all lines 
	$fmod = fopen($path_to_file, "w");
	fputs($fmod, '');
	// when you reach line $line_number
	$line = file($fone);
	line[6]= 'This line was modified';
		// replace with $new_content
		fputs($new_content);
		// close the file
		fclose($fone);
}

function deleteLine($path_to_file,$line_number){
	//open the file in write mode
	$path_to_file = '/data/quotes.csv';
	// read all lines
	$fdel = fopen($path_to_file, "w+");
	// when you reach line $line_number
	$line = file($fone);
	line[3]= '';
		// replace with nothing
		fputs($fdel, '');
		// close the file	
		fclose($fone);
}

function addLine($path_to_file,$new_content){
	//open the file in append mode
	$path_to_file = '/data/quotes.csv';
	$fmod = fopen($path_to_file, "a");
	//write $new_content into the file
	$new_content = fputs($path_to_file, 'This is a new line!');
	// close the file
	fclose($fone);
	
}

?>