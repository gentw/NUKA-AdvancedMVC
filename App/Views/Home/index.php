<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Welcome</h1>
    <p>Hello from the view! My name is: <?php echo $name; ?></p>

    <br>
    <p>Colours that I like :</p>
    <ul>
    	<?php
        	foreach($colours as $color) {
            echo "<li>$color</li>";
            }
    	?>
  
    </ul>
</body>
</html>
