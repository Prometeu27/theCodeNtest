<?php
include "header.php";
include "db_connection.php";
include "inc.php";
?>
<style>
    body {
        background-color: #2B2B2B;
    }
</style>
<div class="main-container">
    <div class="titlu-div"><b> Noutati </b></div>

    <div class="tabel-div-noutati">
        <?php 
        /* extragem intrarile din tabela noutati si le afisam in site*/
        $query = "SELECT * FROM noutati"; 
        $result = mysqli_query($conexiune, $query);
        if (mysqli_num_rows($result)) {
            print("<table class='tabel-noutati'>\n");
            while ($row = mysqli_fetch_array($result)) { /* loop pentru afisarea fiecarei intrari in parte */
                print("<tr>\n");
                print("<td class='tdn-spacing'>" . $row['nume_stire'] . "<hr align='left' width='20%'  color='#D08510' style='margin-left:-3%; margin-top:1%; height: 0.01em;'> </td> \n");
                print("</tr>\n ");
                print("<tr>\n");
                print("<td class='tdn'>" . $row['text_stire'] . "</td>\n");
                print("</tr>\n");
            }
            print("</table>");
        } else {
            print "Nu exista intrari in agenda!";
        }
        ?>
    </div> <!-- tabel div noutati -->
</div> <!-- main container -->
<?php
include "footer.php";
?>