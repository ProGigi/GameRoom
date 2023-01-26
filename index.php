<?php

require ("script.php");
session_start();

$createRoomAct = "display";
$logInAct = "";

if ($_SESSION["login"]==2){
    $createRoomAct = "";
    $logInAct = "display";
}


echo $header;

echo '  <main>
<article class="searchRoom index">
    <h1>Szukasz pokoju???</h1>
    <label for="searchRoom">Szukaj mnie cierpliwie po nr.pokoju albo po jego nazwie!!!</label>
    <input type="text" name="searchRoom" id="searchRoom" placeholder="nr.Pokoju lub Nazwa Pokoju">
    <input type="submit" value="no szukaj" class="searchRoom submit">
</article>
<article class="createRoom index '.$rocreateRoomAct.'">
    <h1>Stwórz swój własny pokój</h1>
    <input type="button" class="submit" value="Stwórz">
</article>
<article class="logIn index '.$logInAct.'">
<form action="login.php" method="post">
    <h1>Zaloguj się</h1>
    <label for="username">Login</label>
    <input type="text" class="username" name="username" placeholder="Login">
    <label for="userPass" class="pass1">password</label>
    <input type="password" name="pass1" id="">
    <input type="submit" class="submit" value="zaloguj się">
<form>
    <input type="submit" class="submit" value="zarejestruj">


</article>
</main>';


echo $footer;

