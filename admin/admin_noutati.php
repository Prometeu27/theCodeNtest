<!-- Control Panel noutati -->

<?php
/* variabile pentru introducerea titlului si textului noilor stiri */
$numeStire = "";
$textStire = "";

/* initializam variabilele pt eventualele erori aparute */
$eroareNumeStire = "";
$eroareTextStire = "";

$comandaAdaugareNoutati = isset($_REQUEST["comanda"]) ? $_REQUEST["comanda"] : NULL; /* verificam daca 'comanda' este nula sau nu si atribuim rezultatul variabilei */
if (isset($comandaAdaugareNoutati)) {
    switch ($comandaAdaugareNoutati) {
        case 'add': 
            $numeStire = isset($_REQUEST["nume_stire"]) ? $_REQUEST["nume_stire"] : NULL; /* verificam parametri introdusi */
            $textStire = isset($_REQUEST["text_stire"]) ? $_REQUEST["text_stire"] : NULL;
            
            /* Validam parametri primiti. */
            $valid = true;
            if (empty($numeStire)) {
                $eroareNumeStire = "Numele nu poate fi vid!";
                $valid = false;
            }
            if (empty($textStire)) {
                $eroareTextStire = "Textul nu poate fi vid!";
                $valid = false;
            }

            if ($valid) { /* daca parametri introdusi sunt corespunzatori, ii introducem in tabela database-ului */
                $stmt = mysqli_prepare(
                    $conexiune,
                    "INSERT INTO noutati(nume_stire, text_stire) VALUES (?,?)"
                );
                if (!mysqli_stmt_bind_param($stmt, "ss", $numeStire, $textStire)) { /* returnam eroare daca parametri introdusi nu corespund tipului de date necesar */
                    die('Eroare legare parametri: ' . mysqli_stmt_error($stmt));
                }
                if (!mysqli_stmt_execute($stmt)) { /* returnam eroare daca operatiunea de introducere a parametrilor esueaza */
                    die('Eroare : ' . mysqli_stmt_error($stmt));
                }

                $numeStire = $textStire = ""; /* golim variabilele */
                echo "<div class='succes'>Mesajul tau a fost adaugat cu succes</div>";
            }

            break;
    }
}
?>

<h2 style="color:#D08510; padding-left:20px">CP Noutati</h2>

<!-- Formular pentru adaugarea stirilor -->

<form action="admin_index.php" method="post" style="color:#ddd; padding-left: 2%">
    <input name="comanda" type="hidden" value="add" />

    <table cellspacing="10">
        <tr>
            <td>Nume*:</td>
            <td><input type="text" name="nume_stire" value="<?php echo htmlspecialchars($numeStire); ?>" size="30" />
                <span class="error"><?php echo $eroareNumeStire; ?></span>
            </td>
        </tr>
        <tr>
            <td>Text*:</td>
            <td><span class="error"><?php echo $eroareTextStire; ?></span><br />
                <textarea name="text_stire" rows="5" cols="60"><?php echo htmlspecialchars($textStire); ?></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" value="Adauga" />
    <input type="reset" value="Reset" />
</form>

<?php

$comandaTabelNoutati = isset($_REQUEST['comanda']) ? $_REQUEST['comanda'] : ""; /* verificam daca 'comanda' este goala sau nu si atribuim rezultatul variabilei */

if (!empty($comandaTabelNoutati)) {
    switch ($comandaTabelNoutati) {
        case 'delete':
            $idStire = $_REQUEST["id"]; /* ii atribuim variabilei elementul din intrare pe care trebuie sa il foloseasca */
            //TODO: Aici trebuie adaugat cod ce valideaza datele.
            $sql = "DELETE FROM noutati WHERE id=$idStire"; /* stergem intrarea selectata din tabela */
            if (!mysqli_query($conexiune, $sql)) { /* returnam eroare daca intervin probleme de comunicare cu database-ul */
                die('Error: ' . mysqli_error($conexiune));
            }
            echo "<br>" . "<div class='succes'>Intrarea cu id-ul $idStire a fost stearsa!</div>";
            break;

        case 'edit':
            $idStire = $_REQUEST["id"];
            //TODO: Aici trebuie adaugat cod ce valideaza datele.
            $sql = "SELECT * FROM noutati WHERE id=$idStire"; /* ii spunem variabilei ce intrare din tabela trebuie sa preia */
            $result = mysqli_query($conexiune, $sql); /* atribuim variabilei intrarea din tabela, in functie de ID */
            if ($row = mysqli_fetch_array($result)) { /* daca rezultatul este valid, extragem datele care ne intereseaza */
                $numeStire = $row['nume_stire'];
                $text = $row['text_stire'];
?>
                <!-- Formularul de editare a stirilor  -->
                <div style="color:#ddd; padding-left: 2%">
                    <h3>Editare</h3>
                    <form action="admin_index.php" method="post">
                        <input name="comanda" type="hidden" value="update" />
                        <input name="id" type="hidden" value="<?php echo $idStire; ?>" />
                        <table>
                            <tr>
                                <td>Nume:</td>
                                <td><input type="text" name="nume_stire" value="<?php echo $numeStire; ?>" /></td>
                            </tr>
                            <tr>

                                <td>Text:</td>
                                <td><textarea name="text_stire" rows="5" cols="60"><?php echo htmlspecialchars($text); ?></textarea></td>
                            </tr>
                        </table>
                        <input type="submit" value="Update" />
                    </form>
                </div>
                <br \>
<?php
            } else {
                echo "<br>" . "\n<div class='error'>Intrarea cu id-ul $idStire nu exista!</div>" . "<br>";
            }
            break;
        case 'update':
            $idStire = $_REQUEST["id"];
            $numeStire = $_REQUEST["nume_stire"];
            $text = $_REQUEST["text_stire"];
            //TODO: Aici trebuie adaugat cod ce valideaza datele.
            $sql = "UPDATE noutati SET nume_stire='$numeStire', text_stire='$text' WHERE id=$idStire"; /* trimitem intrarii din tabela elementele pe care tocmai ce le-am operat, inlocuindu-le pe cele vechi */
            if (!mysqli_query($conexiune, $sql)) { /* returnam eroare daca intervin probleme de comunicare cu database-ul */
                die('Error: ' . mysqli_error($conexiune));
            } else {
                echo "<br>" . "<div class='succes'>Intrarea cu id-ul $idStire a fost actualizata cu succes!</div>" . "<br>";
            }
            break;
    }
}

/* Afisarea anunturilor */
$query = "SELECT * FROM noutati"; /* spunem variabilei din ce tabela trebuie sa extraga date */
$result = mysqli_query($conexiune, $query);  /* extragem din database informatiile necesare prin query-ul setat anterior */
if (mysqli_num_rows($result)) {
    print("<br>");
    print("<table border='1' cellspacing='0' class='tabelan'>\n");
    print("<tr>\n");
    print("<th width='10px'>#</th>
    <th width='100px'>Titlu</th>
    <th width='20px'>Sterge</th>
    <th width='20px'>Edit</th>");
    print("</tr>\n");
    while ($row = mysqli_fetch_array($result)) { /* loop pentru a extrage toate randurile din tabela */
        print("<tr>\n");
        print("<td>" . $row['id'] . "</td>\n");
        print("<td>" . $row['nume_stire'] . "</td>\n");
        print("<td><a href='admin_index.php?comanda=delete&id=" . $row['id'] . "'>Stergere</a></td>\n");
        print("<td><a href='admin_index.php?comanda=edit&id=" . $row['id'] . "'>Editare</a></td>\n");
        print("</tr>\n");
    }
    print("</table>");
} else {
    print "Nu exista stiri in baza de date!";
}
?>