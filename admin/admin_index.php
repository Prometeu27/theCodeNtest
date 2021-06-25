<!DOCTYPE html>
<html>

<head>
  <title>CodeNtest - Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/cssStyle.css" rel="stylesheet" type="text/css" />
</head>

<body class="admin-body">
  <h1 class="admin-h1">Admin Panel</h1>
  <?php
  session_start();
  include "../db_connection.php";
  include "../admin/admin_functions.php";
  include "../admin/admin_auth.php";

  if (!isLogged()) {
    include "admin_login.php";
  } else {
    printf('<div style="color:black; border:1px solid white; width:150px; margin:auto; padding:5px; background-color:darkgray"><div align="center">Bun venit, <b>%s</b> | <a href="admin_index.php?comanda=logout">Logout</a></div>', getLoggedUser());
    printf('<div align="center"><a href="../home.php">Pagina Principala</a></div></div>');
    include "admin_noutati.php";
    include "admin_rezultate.php";
  }
  ?>

</body>

</html>