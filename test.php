<?php

    /*$data = "04/06/2019";

    list($giorno, $mese, $anno) = explode("/", $data);

    echo $data . "<br/>";
    //echo mktime(0,0,0,$mese,$giorno+30,$anno);
    echo date('d-m-Y', mktime(0,0,0,$mese,$giorno+30,$anno)) . "<br/>";
    echo time(); */


    include_once("connection_test.php");

    $sql = "SELECT ID FROM PRESTITO WHERE Matricola = 144599";

    $res = mysqli_query($link, $sql);

    $riga = mysqli_fetch_array($res);
    echo $riga['ID'];

    mysqli_close($link);
?>