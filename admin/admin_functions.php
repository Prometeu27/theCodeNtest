<?php

function doLogin($user, $password) {// functie pentru efectuarea logarii in baza numelui si parolei

    global $conexiune;
    $logat = FALSE;
    if (isLogged()) // daca sesiunea de logare e deja activa de data trecuta, delogam
        doLogout();

    $sql = sprintf( // eliminam caracterele speciale din datele introduse, si intoarcem string-ul in variabila $sql
        "SELECT * FROM admin WHERE nume='%s' AND parola= md5('%s')",
        mysqli_real_escape_string($conexiune, $user),
        mysqli_real_escape_string($conexiune, $password)
    );

    if (!($result = mysqli_query($conexiune, $sql))) { // daca operatiunea anterioara esueaza, intoarcem eroare
        echo ('Error: ' . mysqli_error($conexiune));
    }
    if ($row = mysqli_fetch_array($result)) {  // setam valoarea variabilei $user pentru a o afisa in pagina de administrare si setam $logat ca fiind adevarat, pentru a o returna
        $logat = TRUE;
        $_SESSION['user'] = $user;
        $_SESSION['logat'] = TRUE;
    }
    return $logat;
}


function doLogout() {// functie pt resetarea sesiunii 
    unset($_SESSION['user']);
    unset($_SESSION['logat']);
}


function isLogged() { // functie pt verificarea sesiunii de logare

    return isset($_SESSION['logat']) && $_SESSION['logat'] == TRUE;
}


function getLoggedUser() { // functie pentru aflarea userului care este logat in admin panel, pentru afisarea in pagina a numelui sau
    return isset($_SESSION['user']) ? $_SESSION['user'] : NULL;
}

?>