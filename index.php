<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Button</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="ico.ico">
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
        var totalclicks = 0;
        let maxclicks = 0;
        var chance = 0.99;
        let baseChance = 0.3; // Initial chance
        var resets = 0;

        function getCookieValue(name) {
            const regex = new RegExp(`(^| )${name}=([^;]+)`)
            const match = document.cookie.match(regex)
            if (match) {
                return match[2]
            }
        }
        function debounce(func, timeout = 300) {
            let timer;
            return (...args) => {
                clearTimeout(timer);
                timer = setTimeout(() => { func.apply(this, args); }, timeout);
            };
        }
        function checkCookies() {
            if (getCookieValue("totalclicks") == undefined) {
                return false;
            }

            if (getCookieValue("maxclicks") == undefined) {
                return false;
            }

            if (getCookieValue("resets") == undefined) {
                return false;
            }

            return true
        }

        if (document.cookie == "" || checkCookies() == false) {
            document.cookies = "";
            document.cookie = "totalclicks=0";
            document.cookie = "maxclicks=0";
            document.cookie = "resets=0";
        }

        if (document.cookie != "") {
            totalclicks = getCookieValue("totalclicks");
            maxclicks = getCookieValue("maxclicks");
            resets = getCookieValue("resets");
        }

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

        // Click function 
        //Calculate the chance for reset
        function Click() {
            var Clickbutton = document.getElementById("idkfuckyou");
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
                resets++;

            }
            totalclicks++;
            updateScoreboard(); // Update the scoreboard dynamically
            saveCookies(); // Update the cookies dynamically
            Clickbutton.innerHTML = clicks;
        }
        const saveCookies = debounce( () => updateCookies(),500)
        function updateCookies() {
            document.cookie = "totalclicks=" + totalclicks;
            document.cookie = "maxclicks=" + maxclicks;
            document.cookie = "resets=" + resets;
        }
        function chanceFunc() {
            // Calculate chance based on the parable
            let currentChance = chance * 0.4;
            return (Math.random() < currentChance) ? 'dead' : 'alive';
        }

        function updateScoreboard() {
            // Update the scoreboard
            var scoreboardTextarea = document.getElementById("scoreboard");
            scoreboardTextarea.innerHTML = 'Highscore: ' + maxclicks + '&#013; &#010;<br>Resets: ' + resets + "<br> Total Clicks: " + totalclicks;
        }
    </script>

    <?php
    // Echo the Scoreboard
    echo '<p class="scoreboard" id="scoreboard">Highscore: 0&#013; &#010;<br>Resets: 0<br> Total Clicks: 0</p>';
    // Echo the button and leaderboard
    // Main Button
    echo '<button class="btn-class-name input" type="button" id="ClickButton" name="button" value="Press Me" onClick="Click()">  <span class="back"></span>
    <span class="front" id="idkfuckyou">Click</span></button>';
    // Leaderboard
    echo '<button class="leaderboard" name="leaderboardbutton" value="Leaderboard" onclick="ToggleLeaderboard()">Leaderboard</button>';
    echo '<div class="modalLeaderboard" id="modalLeaderboard">';
    echo 'TBD';
    echo '<input class="xbutton input" onclick="ToggleLeaderboard()" type="button" value="x">';
    echo '</div>';
    // Update Scoreboard
    echo '<script type="text/javascript">updateScoreboard()</script>';
    ?>
</body>

</html>