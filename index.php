<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheButton</title>
    <link rel="icon" type="image/x-icon" href="byuntear-sad.ico">
</head>

<body>
    <style>
        <?php include "style.css"; ?>
    </style>
    <!-- -->

    <!--Scripts-->
    <script>
        let open = false;
        let clicks = 0;
        function ToggleLeaderboard() {
            var modalLeaderboard = document.getElementById("modalLeaderboard");
            if (open) {
                modalLeaderboard.style.display = "none";
                open = false;
            } else {
                modalLeaderboard.style.display = "block";
                open = true;
            }
        }
        function Click() {
            var Clickbutton = document.getElementById("ClickButton");
            clicks++;
            Clickbutton.setAttribute("value", clicks+"");
        }
    </script>
    <?php
    //echo the button
    //Main Button
    echo ('<input class="button" type="button" id="ClickButton" name="button" value="Press Me" onClick="Click()">');
    //Leaderboard
    echo ('<input type="button" name="leaderboard" value="Leaderboard" onclick="ToggleLeaderboard()">');
    //Set variables
    echo ('<div class="modalLeaderboard" id="modalLeaderboard">TEST</div>');
    $currentpoints = 0;
    $maxpoints = 0;
    $resets = 0;
    //set cookies
    setcookie("currentpoints", $currentpoints);
    setcookie("maxpoints", $maxpoints);
    setcookie("resets", $resets);
    ?>
</body>

</html>