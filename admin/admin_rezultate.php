<!-- Control Panel editare rezultate/stergere participanti-->
<br>
<hr align="left" color="#ddd" width="20%" height="4">
<h2 style="color:#D08510; padding-left:20px">CP Rezultate</h2>

<!-- Tabel afisare/editare/stergere participanti -->
<?php
$comandaRez = isset($_REQUEST['comandaRez']) ? $_REQUEST['comandaRez'] : ""; /* verificam daca 'comanda' este goala sau nu si atribuim rezultatul variabilei */

if (!empty($comandaRez)) {
    switch ($comandaRez) {
        case 'delete':
            $id = $_REQUEST["id"]; /* se afla ID-ul intrarii selectate */
            //TODO: Aici trebuie adaugat cod ce valideaza datele.
            $sql = "DELETE FROM participanti WHERE id=$id"; /* se sterge intrarea din database, in functie de ID-ul gasit anterior */
            if (!mysqli_query($conexiune, $sql)) {
                die('Error: ' . mysqli_error($conexiune));  /* se returneaza eroare daca exista probleme in extragerea intrarii din database */
            }
            echo "<div class='succes'>Intrarea cu id-ul $id a fost stearsa!</div>";
            break;

        case 'edit':
            $id = $_REQUEST["id"];
            //TODO: Aici trebuie adaugat cod ce valideaza datele.
            $sql = "SELECT * FROM participanti WHERE id=$id";
            $result = mysqli_query($conexiune, $sql); /* se extrage intrarea in functie de ID-ul selectat */
            if ($row = mysqli_fetch_array($result)) { /* daca rezultatul este returnat, se atribuie valorile din tabela variabilelor */
                $nume = $row['nume'];
                $sb1 = $row['punctaj_subiect1'];
                $sb2 = $row['punctaj_subiect2'];
                $sb3 = $row['punctaj_subiect3'];

?>
                <!-- Formular de modificare rezultate -->
                <h3 style="color: #ddd">Editare</h3>

                <form action="admin_index.php" method="post" style="color:#ddd">
                    <input name="comandaRez" type="hidden" value="update" />
                    <input name="id" type="hidden" value="<?php echo $id; ?>" />
                    <table>
                        <tr>
                            <th>Nume:</th>
                            <th>Subiectul 1:</th>
                            <th>Subiectul 2:</th>
                            <th>Subiectul 3:</th>
                        </tr>
                        <tr>
                            <td><?php echo $nume; ?></td>
                            <td><input type="number" size="2" name="punctaj_subiect1" value="<?php echo $sb1; ?>" /></td>
                            <td><input type="number" size="2" name="punctaj_subiect2" value="<?php echo $sb2; ?>" /></td>
                            <td><input type="number" size="2" name="punctaj_subiect3" value="<?php echo $sb3; ?>" /></td>
                        </tr>
                    </table>
                    <input type="submit" value="Update" />
                </form><br \>

<?php
            } else {
                echo "<br>" . "\n<div class='error'>Intrarea cu id-ul $id nu exista!</div>" . "<br>";
            }
            break;
        case 'update':
            $id = $_REQUEST["id"];
            $sb1 = $_REQUEST["punctaj_subiect1"];
            $sb2 = $_REQUEST["punctaj_subiect2"];
            $sb3 = $_REQUEST["punctaj_subiect3"];
            $total = $sb1 + $sb2 + $sb3;
            //TODO: Aici trebuie adaugat cod ce valideaza datele.
            $sql = "UPDATE participanti SET punctaj_subiect1='$sb1', punctaj_subiect2='$sb2', punctaj_subiect3='$sb3', punctaj_total='$total' WHERE id=$id"; /* se inlocuiesc valorile din tabela cu noile valori introduse */
            if (!mysqli_query($conexiune, $sql)) {
                die('Error: ' . mysqli_error($conexiune)); /* se returneaza eroare daca intervine o problema a conexiunii in timpul operatiunii */
            } else {
                echo "<br>" . "<div class='succes'>Intrarea cu id-ul $id a fost actualizata cu succes!</div>" . "<br>";
            }
            break;
    }
}

/* Afisarea tabelului de administrare a rezultatelor si participantilor */
$query = "SELECT * FROM participanti";
$result = mysqli_query($conexiune, $query); /* se extrag datele din tabela participanti, pentru a fi afisate in pagina */
if (mysqli_num_rows($result)) {
    print("<br>");
    print("<table border='1' cellspacing='0' class='tabelan'>\n");
    print("<tr>\n");
    print("<th width='10px'>#</th><th width='100px'>Nume</th><th width='20px'>Sterge</th><th width='20px'>Edit</th>");
    print("</tr>\n");
    while ($row = mysqli_fetch_array($result)) { /* loop pentru extragerea fiecarui rand din tabela */
        print("<tr>\n");
        print("<td>" . $row['id'] . "</td>\n");
        print("<td>" . $row['nume'] . "</td>\n");
        print("<td><a href='admin_index.php?comandaRez=delete&id=" . $row['id'] . "'>Stergere</a></td>\n");
        print("<td><a href='admin_index.php?comandaRez=edit&id=" . $row['id'] . "'>Editare</a></td>\n");
        print("</tr>\n");
    }
    print("</table>");
} else {
    print "Nu exista participanti!";
}


?>