<?php

require ("script.php");
session_start();

if($_SESSION["login"]==2){
    header("Location:index.php");
}
else{

echo $header;

echo '<main>
<article>

  <div class="register">
    <div class="login">
      <form action="login.php" method="post">
        <h1>Zaloguj się</h1>
          <label for="username">Podaj nick</label>
          <input
            type="text"
            name="username"
            id="username"
            placeholder="nick"
            required
          />
          <label for="pass1">Pdaj hasło</label>
          <input type="password" name="pass1" id="pass1" required />
          <input class="submit" type="submit" value="Zaloguj się" />
        </form>
  </div>
    <div class="registerManual">
      <form action="register.php" method="post">
      <h1>Zarejestruj się</h1>
      <label for="username">Podaj nick</label>
      <input
        type="text"
        name="username"
        id="username"
        placeholder="nick"
        required
      />
      <label for="email">Podaj E-mail</label>
      <input
        type="text"
        name="email"
        id="email"
        placeholder="E-mail"
        required
      />
      <label for="pass1">Pdaj hasło</label>
      <input type="password" name="pass1" id="pass1" required />
      <label for="pass2">Powtórz hasło </label>
      <input type="password" name="pass2" id="pass2" required />
      <input class="submit" type="submit" value="zarejestruj" />
    </form>
    </div>

    

</article>
</main>';


echo $footer;



}

