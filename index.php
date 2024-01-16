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
        function ToggleLeaderboard() {
            var modalLeaderboard = document.getElementById("modalLeaderboard");
            if (open) {
                modalLeaderboard.style.display = "none";
            } else {
                modalLeaderboard.style.display = "block";
            }
        }
    </script>
    <?php
    //echo the button
    //Main Button
    echo ('<input class="button" type="button" name="button" value="Press Me">');

    //Leaderboard
    echo ('<input type="button" name="leaderboard" value="Leaderboard" onclick="showLeaderboard()">');
    //Set variables
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