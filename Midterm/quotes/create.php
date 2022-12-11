<?php
if(!isset($_SESSION['logged'])){
	if(count($_POST)>0){
		
		$error='';

		// Make sure the name is not already in the file
		if(file_exists('../data/quotes.csv')){
			$fh=fopen('../data/quotes.csv', 'r');
			while ($line=fgets($fh)){
				if($_POST['name']==trim($line)){
					//found the name already
					$error='The quote already exits';
				};
			}
			fclose($fh);
		}

		if(strlen($error)>0) echo $error;
		else{
			// Add name to the CSV file)
			$fh=fopen('../data/quotes.csv', 'a');
			fputs($fh,$_POST['authors'].'; '.$_POST['name'].PHP_EOL);
			fclose($fh);
			echo 'Thanks for adding '.$_POST['name'].' to our amazing website!';
		}
	}
	?>

	<a href="index.php">Go back to index</a><br />
	<form method="POST">
	<?php
	// Make sure the name is not already in the file
		if(file_exists('../data/authors.csv')){
			$fh=fopen('../data/authors.csv', 'r');
			
			$index=1;
			?>
			<select name='authors'>
		<?php
			while ($line=fgets($fh)){
				?>
				
				
				<option value='<?php echo $index ?>'><?php echo $line ?></option>
				
				<?php
				$index++;
			}
			
			?>
			</select>
			<?php
			fclose($fh);
		}
}
?>
	Enter the a quote name<br />
	<input type="text" name="name"/><br />
	<button type="submit">Add quote
	</button>
</form>