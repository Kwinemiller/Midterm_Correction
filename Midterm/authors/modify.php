<?php
if(!isset($_SESSION['logged'])){
	
	if(count($_POST)>0){
		//save the authors name into the file
		if(file_exists('../data/authors.csv')){
			$line_counter=0;
			$new_file_content=''; //ROD C
			$fh=fopen('../data/authors.csv', 'r');
			while ($line=fgets($fh)){
				if($line_counter==$_GET['index']) $new_file_content.=$_POST['name'].PHP_EOL;
				else $new_file_content.=$line;

				$line_counter++;
		}
		fclose($fh);

		file_put_contents('../data/authors.csv',$new_file_content);
		echo 'You have successfully modified the author ';
		}
	}

		$author_name='';
		$line_counter=0;
		$fh=fopen('../data/authors.csv', 'r');
		while($line=fgets($fh)){
			if($line_counter==$_GET['index']){
				//display the authors
				$author_name=trim($line);
			}
			$line_counter++;
				
		}
		$new_file_content = explode(';', $author_name, );
		foreach($new_file_content as $author_name){
			echo $author_name."<br />";
		}
}
?>
<form method="POST">
	Modify the author's name<br />
	<input type="text" name="name" value="<?= $author_name ?>"><br />
	<button type="submit">Modify author
	</button>
</form>
