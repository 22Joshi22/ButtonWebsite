<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheButton</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="byuntear-sad.ico">
    <!-- Styles -->
    <style>
        <?php include "style.css"; ?>
    </style>
</head>

<body>
    <!-- Scripts -->
    <script>
        // Button and leaderboard toggling functions
        let open = false;
        let clicks = 0;
        let maxclicks = 0;
        var chance = 0.99;
        let baseChance = 0.3; // Initial chance

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
            if (chanceFunc() === 'alive') {
                // User Alive
                clicks++;
                if (clicks > maxclicks) {
                    maxclicks = clicks;
                    chance *= 1.2; // Increase the chance for reset by 20%
                }
            } else {
                // User DED
                if (clicks > maxclicks) {
                    maxclicks = clicks;
                }
                clicks = 0;
                chance = baseChance; // Reset the chance
            }

            Clickbutton.setAttribute("value", clicks + "");
        }

        function chanceFunc() {
            // Calculate chance based on the parable
            let currentChance = baseChance * 0.2;
            return (Math.random() < currentChance) ? 'dead' : 'alive' ;
        }
    </script>

    <?php
    // Echo the Scoreboard
    echo ('<textarea class="scoreboard" name="scoreboard">TestValue</textarea>');
    // Echo the button and leaderboard
    // Main Button
    echo ('<input class="input" type="button" id="ClickButton" name="button" value="Press Me" onClick="Click()">');
    // Leaderboard
    echo ('<input class="leaderboard" type="button" name="leaderboard" value="Leaderboard" onclick="ToggleLeaderboard()">');
    echo ('<div class="modalLeaderboard" id="modalLeaderboard">');
    echo ('4090 ala Pube gi');
    echo ('<input class="xbutton input" onclick="ToggleLeaderboard()" type="button" value="x">');
    echo ('</div>');

    // Set variables and cookies
    $currentpoints = 0;
    $maxpoints = 0;
    $resets = 0;

    setcookie("currentpoints", $currentpoints);
    setcookie("maxpoints", $maxpoints);
    setcookie("resets", $resets);
    ?>
</body>

</html>
