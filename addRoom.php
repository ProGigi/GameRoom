<?php
session_start();
require('script.php');

if (isset($_POST['nameGame'])){
    $liczba = $_post['liczba'];

//sprawdzamy czy jest to liczba
if (is_numeric($_POST["opponents"])) {
     //jeżeli jest to liczba wykonujemy dalej kod


    $nameRoom = $_POST['nameGame'];
    $game = $_POST["game"];
    $opponents = $_POST["opponents"];
    $level = $_POST["level"];
    $dateGame = $_POST["dateGame"];
    $discord = $_POST["discord"];
    $description = $_POST["description"];


    $task ='INSERT INTO `Room`(`RoomId`, `RoomName`, `RoomGame`, `RoomAdmin`, `RoomDate`, `RoomLimite`, `RoomPlayers`, `RoomLink`, `RoomLevel`,`RoomDescription`) VALUES (NULL,"'.$nameRoom.'","'.$game.'","'.$_SESSION['UserId'].'","'.$dateGame.'","'.$opponents.'","'.$_SESSION['UserId'].'~","'.$discord.'","'.$level.'","'.$description.'")';
    
 $queryRegister = mysqli_query($connect, $task);
 header("Location: index.php?addBook"); 
} else {
    //jeżeli nie wyświetlamy komunikat
    header("Location: createRoom.php?error");
    }
}
else
header("Location: index.php?error");