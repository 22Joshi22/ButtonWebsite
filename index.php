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

    echo('<input type="button" name="leaderboard" value="Push to Leaderboard">'); 
    //Set variables
    $currentpoints=0;
    $maxpoints=0;
    $resets=0;
    //set cookies
    setcookie("currentpoints", $currentpoints); 
    setcookie("maxpoints", $maxpoints);   
    setcookie("resets", $resets);
    ?>
</body>
</html>