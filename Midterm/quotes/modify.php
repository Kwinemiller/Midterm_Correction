<?php
	if(!isset($_SESSION['logged'])){
	if(count($_POST)>0){
		//save the quotes name into the file
		if(file_exists('../data/quotes.csv')){
			$line_counter=0;
			$new_file_content=''; //ROD C
			$fh=fopen('../data/quotes.csv', 'r');
			while ($line=fgets($fh)){
				if($line_counter==$_GET['index']){
					$line=explode('; ', $line);
					$line[1]=$_POST['name'];
					$line=implode('; ', $line).PHP_EOL;
					$new_file_content.=$line;
				}
				else $new_file_content.=$line;
				$line_counter++;
		}
		fclose($fh);

		file_put_contents('../data/quotes.csv',$new_file_content);
		echo 'You have successfully modified the quote ';
		}
		
	}

	$quote_name='';
	$line_counter=0;
	$fh=fopen('../data/quotes.csv', 'r');
	while($line=fgets($fh)){
		if($line_counter==$_GET['index']){
			//display the quotes
			$quote_name=trim($line);
		}
		$line_counter++;
	}
	$quote_name = explode('; ', $quote_name);
	echo 'Author ID: '.$quote_name[0];

}

// explode function
?>
<form method="POST">
	Modify quote<br />
	<input type="text" name="name" value="<?= $quote_name[1] ?>"><br />
	<button type="submit"> Modify quote
	</button>
</form>
