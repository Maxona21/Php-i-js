<?php
    echo "Dodano rezerwację do bazy";
    $data = $_POST["data"];
    $osoby = $_POST["osoby"];
    $telefon = $_POST["telefon"];
    $conn = mysqli_connect("localhost", "root", "", "baza");
    $query = "INSERT INTO rezerwacje (data_rez, liczba_osob, telefon) VALUES ('".$data."','".$osoby."','".$telefon."')";
    $result = mysqli_query($conn, $query);
    if ($result) echo "dodano rekordy do bazy - szt ".mysqli_affected_rows($conn);
    mysqli_close($conn);
?>