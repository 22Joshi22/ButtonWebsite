<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheButton</title>
</head>
<body>
    <style>
        <?php include "style.css"; ?>
    </style>
    
    <?php
    //echo the button
    echo('<input type="button" name="button" value="Press Me">'); 

    //set cookies
    setcookie("currentpoints", string $value = "187", array $options = []): bool   
    // setcookie(string $maxpoints, string $value = "150", array $options = []): bool   
    // setcookie(string $resets, string $value = "7", array $options = []): bool   
    ?>
</body>
</html>