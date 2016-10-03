<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'An error occurred.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error during secured connection</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <h1>An error occurred.</h1>
        <p class="error"><?php echo $error; ?></p>  
    </body>
</html>
