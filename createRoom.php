<?php

require ("script.php");
session_start();

if ($_SESSION["login"]!=2){
    header("Location:index.php");
}
else{

echo $header;

echo '<main>
<article>
          <form action="addRoom.php" method="post" class = "addRoom">
          <h1>Stwórz nowy pokój</h1>
          <div class = "addRoom">
            <div class = "">
              <label for="nameGame">Nozawa Pokoju</label>
              <input type="text" name="nameGame" id="nameGame" placeholder="Nazwa pokoju" required>
          <label for="game">wybierz gre</label>
          <input type="text" name="game" id="game" placeholder="wybierz gre">
          <label for="opponents">Ilości graczy</label>
          <select name="opponents" id="opponents">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">więcej</option>
          </select>
          <label for="level">Poziom trydności</label>
          <select name="level" id="level">
            <option value="1">Amator</option>
            <option value="2">Średni</option>
            <option value="3">Zaawansowany</option>
          </select>
          <label for="dateGame">Data gry</label>
          <input type="date" name="dateGame" id="dateGame">
        </div>
        <div>
          <label for="discord">Podaj link do Discorda</label>
          <input type="text" name="discord" id="discord" placeholder="link do Discorda" required>
          <label for="description">Opis</label>
          <textarea name="description" id="" cols="30" rows="10" placeholder="opis pokoju"></textarea>
          
        </div>
      </div>
      <input class="submit" type="submit" value="Dodaj pokój"/>
        </form>
    </article>
</main>';


echo $footer;



}

