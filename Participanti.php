<?php
include "header.php";
include "db_connection.php";
include "inc.php";
?>

<div class="main-container">

  <div class="column-div">
    <!-- div pentru impartirea paginii in doua coloane -->
    <div class="w50">

      <div class="titlu-div" style="padding-bottom:4%;"><b>Participanti</b></div>
      <div class="tabel-div-part">

        <?php
        /* extragem intrarile din tabela noutati si le afisam in site*/
        $query = "SELECT * FROM participanti";
        $result = mysqli_query($conexiune, $query);
        if (mysqli_num_rows($result)) {
          print("<table class='tabel-part'>\n");
          print("<tr>\n");
          print("<th>#</th><th width='300'>Nume</th><th width='80'>Varsta</th><th width='400'>Facultate</th><th>Email</th>");
          print("</tr>\n");
          while ($row = mysqli_fetch_array($result)) { /* loop pentru afisarea fiecarei intrari in parte */
            print("<tr>\n");
            print("<td class='tdp'>" . $row['id'] . "</td>\n");
            print("<td class='tdp'>" . $row['nume'] . "</td>\n");
            print("<td class='tdp'>" . $row['varsta'] . "</td>\n");
            print("<td class='tdp'>" . $row['loc'] . "</td>\n");
            print("<td class='tdp'>" . $row['email'] . "</td>\n");
            print("</tr>\n");
          }
          print("</table>");
        } else {
          print "Nu exista intrari in agenda!";
        }
        ?>
      </div> <!-- tabel div part -->
    </div> <!-- w50 -->

    <div class="w50">
      <?php
      /* cream si initializam vide variabile */
      $nume = "";
      $varsta = "";
      $loc = "";
      $email = "";
      /* initializam variabilele pt eventualele erori aparute */
      $eroareNume = "";
      $eroareVarsta = "";
      $eroareLoc = "";
      $eroareEmail = "";

      $comanda = isset($_REQUEST["comanda"]) ? $_REQUEST["comanda"] : NULL;
      if (isset($comanda)) {
        switch ($comanda) {
          case 'add': /* adaugarea informatiilor introduse in tabela */
            /* Preluam parametri introdusi din formular */
            $nume = isset($_REQUEST["nume"]) ? $_REQUEST["nume"] : NULL;
            $varsta = isset($_REQUEST["varsta"]) ? $_REQUEST["varsta"] : NULL;
            $loc = isset($_REQUEST["loc"]) ? $_REQUEST["loc"] : NULL;
            $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : NULL;

            /* Validam parametri */
            $valid = true;

            if (empty($nume)) {
              $eroareNume = "Numele nu poate fi vid!";
              $valid = false;
            }

            if (empty($varsta)) {
              $eroareVarsta = "Varsta nu poate fi vid!";
              $valid = false;
            }

            if (empty($loc)) {
              $eroareLoc = "Facultatea nu poate fi vid!";
              $valid = false;
            }

            if (empty($email)) {
              $eroareEmail = "Emailul nu poate fi vid!";
              $valid = false;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { /* verificam daca email-ul are o forma valida */
              $eroareEmail = "Emailul este invalid!";
              $valid = false;
            }


            if ($valid) {
              /* introducem datele participantului in database */
              $stmt = mysqli_prepare(
                $conexiune,
                "INSERT INTO participanti(nume, varsta, loc, email) VALUES (?, ?, ?, ?)"
              );
              if (!mysqli_stmt_bind_param($stmt, "ssss", $nume, $varsta, $loc, $email)) { /* returnam eroare daca parametri introdusi nu corespund tipului de date necesar */
                die('Eroare legare parametri: ' . mysqli_stmt_error($stmt));
              }
              if (!mysqli_stmt_execute($stmt)) { /* returnam eroare daca operatiunea de introducere a parametrilor esueaza */
                die('Eroare : ' . mysqli_stmt_error($stmt));
              }

              $nume = $email = $varsta = $loc = ""; /* golim variabilele */
            }
            break;
        }
      }

      ?>

      <div class="form-div-part">
        <h2 class="h2-part">Inscrie-te in concurs!</h2>
        <!-- Formularul pentru inscrierea in concurs -->
        <form action="Participanti.php" name="formaPart" method="post" class="form-part" onsubmit="return validareParticipanti();">
          <input name="comanda" type="hidden" value="add" />

          <table cellspacing="10">
            <tr>
              <td>Nume*:</td>
              <td><input type="text" name="nume" value="<?php echo htmlspecialchars($nume); ?>" size="30" minlength="2" maxlength="20" required placeholder="Marian Popescu" />
              </td>
            </tr>

            <tr>
              <td>Varsta*:</td>
              <td><input type="number" name="varsta" value="<?php echo htmlspecialchars($varsta); ?>" size="5%" minlength="1" maxlength="2" required placeholder="20" />
              </td>
            </tr>

            <tr>
              <td>Facultate*:</td>
              <td><input type="text" name="loc" value="<?php echo htmlspecialchars($loc); ?>" size="30" minlength="5" required placeholder="Facultatea de Stiinte Exacte" />
              </td>
            </tr>

            <tr>
              <td>Email*:</td>
              <td><input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" size="30" placeholder="nume@exemplu.com" minlenght="5" required />
              </td>
            </tr>
          </table>
          <input type="submit" value="Adauga" />
          <input type="reset" value="Reset" />
        </form>
      </div> <!-- form div part -->
    </div> <!-- w50 -->
  </div> <!-- display flex div -->
</div><!--  main container -->

<?php include "footer.php" ?>