<?php

    // script per la connessione al database BIBLIOTECA_UNIVERSITA
    $link = mysqli_connect("127.0.0.1", "enrico", "password", "BIBLIOTECA_UNIVERSITA");

    // test della connessione
    if(!$link){
        echo "Errore di connessione al DB BIBLIOTECA_UNIVERSITA" . PHP_EOL;
        echo "Errore: " . mysqli_connect_error() . PHP_EOL;
        echo "Codice errore: " . mysqli_connect_errno() . PHP_EOL;
        echo "Exit status: -1" . PHP_EOL;
        exit(-1);
    }

?>