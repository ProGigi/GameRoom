<?php

$username = "m1188_gemeRoom";
$password = "Django0812";
$localhost = "mysql29.mydevil.net";
$database = "m1188_game_room";

$registerAct = "";
$logOutAct = "display";

$connect = @new mysqli($localhost, $username, $password, $database);
session_start();
if ($_SESSION["login"]==2){
   $registerAct = "display";
   $logOutAct = "";
}

if ($connect->connect_errno) {
    echo "Failed to connect to MySQL: " . $connect->connect_error;
}




$header = '<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />



    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">GR game room</div>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">
                        <span class="material-symbols-outlined icon">
                            home
                        </span>
                        <span class="list"> Strona Główna</span>
                    </a>
                </li>
                <li><a href="game.html">
                        <span class="material-symbols-outlined icon">
                            extension
                        </span>
                        <span class="list">Gry</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="material-symbols-outlined">
                            person
                        </span><span class="list">Profil</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="material-symbols-outlined icon">
                            meeting_room
                        </span>
                        <span class="list">Pokoje</span>
                    </a>
                </li>
                <li class="'.$registerAct.'" ><a href="register1.php">
                        <span class="material-symbols-outlined icon">
                            login
                        </span>
                        <span class="list"> Zaloguj</span>
                    </a>

                </li>
                <li class="'.$logOutAct.'" ><a href="logOut.php">
                        <span class="material-symbols-outlined">
                            logout
                        </span>
                        <span class="list">Wyloguj</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="search">
            <label for="search">Czego szukasz ziomeczku?</label>
            <input type="text" name="search" placeholder="search" id="search" placeholder="nr.Pokoju lub Nazwa Pokoju">
            <input type="submit" value="wyszukaj" class="subSearch">
        </div>';  

        
$footer = '<footer>
<p class="footer">Could we play?</p>
</footer>
</div>
</body>

</html>';