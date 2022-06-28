<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['actiune'])) {
    header("Location: ../utilizatori/index.php");
    die;
}
include("../include/dbconnect.php");

if ($_POST['actiune'] == 'inregistrare') {
    $parola = md5($_POST['parola']);
    $query = $db->prepare("insert into utilizatori (nume, email, parola) values (?, ?, ?)");
    if (!$query->bind_param("sss", $_POST['nume'], $_POST['email'], $parola)) {
        die('{"success":false, "error":"Could not bind the parameters"}');
    }
    if (!$query->execute()) {
        die('{"success":false, "error":"mysql execute error: ' . mysqli_error($db) . '"}');
    }


    die('{"success":true, "id":' . mysqli_insert_id($db) . '}');
}



?>