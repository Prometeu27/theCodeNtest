<?php
include "db_connection.php";
include "header.php";
include "inc.php";
?>

<div class="main-container">
    <div class="titlu-div" style="padding-bottom: 2%;"><b>Rezultate</b></div>

    <div class="tabel-rez-div">
        <?php 
        /* extragem intrarile din tabela participanti si le afisam in site */
        $query = "SELECT * FROM participanti";
        $result = mysqli_query($conexiune, $query);
        if (mysqli_num_rows($result)) {
            print("<table class='tabel-rez'>\n");
            print("<tr>\n");
            print("<th width='50px'>#</th><th width='570'>Nume</th><th width='90'>Subiectul 1</th><th width='90'>Subiectul 2</th><th width='90'>Subiectul 3</th><th width='60'>Total</th>");
            print("</tr>\n");
            while ($row = mysqli_fetch_array($result)) { /* loop pentru afisarea fiecarei intrari in parte */
                print("<tr>\n");
                print("<td class='tdp'>" . $row['id'] . "</td>\n");
                print("<td class='tdp'>" . $row['nume'] . "</td>\n");
                print("<td class='tdp'>" . $row['punctaj_subiect1'] . "</td>\n");
                print("<td class='tdp'>" . $row['punctaj_subiect2'] . "</td>\n");
                print("<td class='tdp'>" . $row['punctaj_subiect3'] . "</td>\n");
                print("<td class='tdp'>" . $row['punctaj_total'] . "</td>\n");
                print("</tr>\n");
            }
            print("</table>");
        } else {
            print "Nu exista intrari in agenda!";
        }
        ?>
    </div> <!-- tabel rez div -->
</div> <!-- main container -->
<!--bgdiv-->
<?php include "footer.php"; ?>