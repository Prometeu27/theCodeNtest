<?php
include "db_connection.php";
include "header.php";
include "inc.php";
?>

<div class="main-container">
    <div class="titlu-div" style="padding-bottom: 2%"><b>Contact</b></div>

    <div class="orange-box-div">
        <div style="flex:1; background-color:#D08510;">
            <div class="contact-content" >
                <table cellspacing="20">
                    <tr>
                        <td><i class="fab fa-facebook-square"></i> <a href="www.facebook.com">Facebook</a></td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-instagram" ></i> <a href="www.instagram.com">Instagram</a></td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-youtube"></i> <a href="www.youtube.com">Youtube</a></td>
                    </tr>
                    <tr>
                        <td><i class="fab fa-twitter"></i> <a href="www.twitter.com">Twitter</a></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-mail-bulk"></i> <font color="#ddd">contact@codentest.com</font></td>
                    </tr>
                    <tr>
                        <td><i class="far fa-window-maximize"></i> <a href="www.codentest.com">www.codentest.com</a></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-walking"></i> <font color="#ddd">Strada Calea Bucurestilor, nr. 34, Craiova, Dolj, România</font></td>
                    </tr>
                </table>
            </div>

        </div>
        <div id="googleMap" style="flex:1;"></div>

        <script>
            function myMap() {
                var mapProp = {
                    center: new google.maps.LatLng(44.3084207, 23.8054763, 15),
                    zoom: 5,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            }
        </script>
    </div>
</div> <!-- main container -->
<script src="https://maps.googleapis.com/maps/api/js?AIzaSyCTp0kKW5YDwn61_V4r3GkXG7b_TqM_scc&callback=myMap"></script>

<?php include "footer.php"; ?>