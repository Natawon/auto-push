<!DOCTYPE html>
<html>
<head>
<title>Edit Text File</title>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    <style>
        textarea
            {
            border:1px solid #999999;
            width:60%;
            margin:5px 0;
            padding:3px;
            }

        </style>
</head>
<body>
	<h1>Edit Project</h1>
	<?php
	// Define the file path
	$file_path = '/raid/Jenkins-ansible-FGN/hosts';

	// Check if the form has been submitted
	if(isset($_POST['submit'])) {
		// Get the new file contents from the form
		$new_file_contents = $_POST['file_contents'];

		// Write the new file contents to the file
		file_put_contents($file_path, $new_file_contents);

        
		// Display a success message
		echo '<p>File saved successfully.</p>';
	}

	// Read the current contents of the file
	$current_file_contents = file_get_contents($file_path);
	?>

    <body>
    <form method="post">
		<textarea name="file_contents" cols="2" rows="10"><?php echo $current_file_contents; ?></textarea>
		<br>
		<input type="submit" name="submit" value="Save">
	</form>
        
    </body>
    </html>
	
</body>
</html>