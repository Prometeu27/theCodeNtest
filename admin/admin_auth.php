<!-- Operatiile de logare si delogare din Admin Panel -->

<?php
  $comanda = isset($_REQUEST["comanda"]) ? $_REQUEST["comanda"] : NULL; /* verificam daca 'comanda' este nula sau nu si atribuim rezultatul variabilei */
  if (isset($comanda)) {
    switch ($comanda) {
      case 'login':
        $nume = $_REQUEST["nume"];
        $parola =  $_REQUEST["parola"];
        if (!doLogin($nume, $parola)) { /* verificam daca datele introduse sunt valide */
          echo "<div class='error' style='text-align:center;'>Autentificare esuata!</div>";
        }
        break;

      case 'logout':
        doLogout();
        break;
    }
  }
?>