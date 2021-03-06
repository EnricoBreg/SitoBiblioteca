<?php

    include_once("connection_test.php");

    $ISBN = $_POST['ISBN'];
    $NumeroCopia = $_POST['NumeroCopia'];
    $affected_rows = 0;

    // Verifica delle proroghe rimaste
    $sql = "SELECT ContProroghe
            FROM PRESTITO
            WHERE ISBN = '$ISBN' AND NumeroCopia = '$NumeroCopia'";
    $res = mysqli_query($link, $sql);
    $riga = mysqli_fetch_array($res);
    $proroghe_rimaste = $riga['ContProroghe'];
    
    if($proroghe_rimaste == "") {
        $proroghe_rimaste = -1;
    }
    

    if($proroghe_rimaste > 0) {
        $sql = "UPDATE PRESTITO
        SET DataPrestito = DATE_ADD(DataPrestito, INTERVAL 60 DAY), ContProroghe = ContProroghe - 1
        WHERE ISBN = '$ISBN' AND NumeroCopia = '$NumeroCopia'";

        mysqli_query($link, $sql);
        $affected_rows = mysqli_affected_rows($link);
        $proroghe_rimaste--;
    }

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Proroga un prestito - Biblioteca Universitaria</title>
        <link rel="stylesheet" style="text/css" href="./myStyles.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    </head>

    <body>

        <div id="Titolo">
            <p id="titolo">BIBLIOTECA UNIVERSITARIA DI FERRARA</p>
            <a href="http://www.unife.it/it" target="blank"><img id="logo" src="./immagini/logo.jpg" alt="logo"></a>
        </div>

<!-- inizio barra di navigazione -->
<div id="navBar">
        <!-- *id="navBar"> -->
        <ul>
            <!-- dentro agli li ci andranno i link alle relative pagine -->
            <li>
                <a href="./index.html">Home</a>
            </li>
            <li><a href="http://www.unife.it/it/ateneo/strutture-uffici/dipartimenti-e-facolta" target="__blank">Dipartimenti</a></li>
            <li><a href="./menu.html">Libri</a>
                    <ul>
                        <li><a href="registra-copia-1.php">Registra nuova copia (libro esistente)</a></li>
                        <li><a href="./book-signup-1.php">Registra nuovo libro</a>
                        <li><a href="studenti-dato-libro.html">Ricerca studenti per libro</a></li>
                        <li><a href="./ricerca-libro.html">Ricerca un libro</a></li>
                        <li><a href="./all-books.php">Visualizza tutti i libri nel DB</a></li>
                    </ul>
                </li>
                <li><a href="./menu.html">Prestiti</a>
                    <ul>
                        <li><a href="./consulta-prestiti.html">Consulta situazione prestiti per codice matricola</a></li>
                        <li><a href="./registra_proroga.html">Proroga un prestito</a></li>
                        <li><a href="./registra-prestito-1.php">Registra nuovo prestito</a></li>
                        <li><a href="./registra_rientro.html">Registra un rientro</a></li>
                        <li><a href="./prestiti-in-scadenza.html">Visualizza prestiti in scadenza</a></li>
                        <li><a href="./tutti-prestiti.php">Visualizza tutti i prestiti</a></li>
                    </ul>
                </li>
                <li><a href="./menu.html">Utenti</a>
                    <ul>
                        <li><a href="./aggiornamento_utente1.html">Aggiorna/Modifica utente</a></li>
                        <li><a href="./cancella_utente.html">Cancella utente</a></li>
                        <li><a href="./registra_utente.html">Registra nuovo utente</a></li>
                        <li><a href="./user-search.html">Ricerca uno studente</a></li>
                    </ul>
                </li>
                <li><a href="./menu.html">Autori/Editori</a>
                    <ul>
                        <li><a href="./author-reg.php">Nuovo Autore</a></li>
                        <li><a href="./pub-reg.php">Nuovo Editore</a></li>
                        <li><a href="./all-authors.php">Visualizza tutti gli Autori</a></li>
                        <li><a href="./all-pubs.php">Visualizza tutti gli Editori</a></li>
                    </ul>
                </li>
                <li>
                    <a href="usefull-info.php">Usefull Info</a>
                </li>
        </ul>
    </div>
    <!-- fine barra di navigazione -->

        <!-- inizio form res -->
        <div id="formRes">
            
            <h1>ESITO REGISTRAZIONE PROROGA</h1>
            <?php if($affected_rows > 0) { ?>
                <p>Registrazione della proroga avvenuta con successo!</p>
                <p>Proroghe rimaste per il prestito: <?php echo $proroghe_rimaste; ?></p>
               <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <?php } 
            else { ?>
                <!-- L'errore è in proroghe -->
                <?php if($proroghe_rimaste == 0) { ?>
                    <p>ATTENZIONE! Il prestito inserito non ha più proroghe disponibili.</p>
                    <p>Registrazione proroga non disponibile.</p>
                    <?php exit(-1); 
                } ?>
                
                <!-- Allora affected_rows = 0 -->
                <p>OPS :(</p>
                <p>Qualcosa è andato storto durante la registrazione della proroga.</p>
                <p>Verifica che i dati inseriti siano corretti e riprova.</p>
                
            <?php } ?>

        </div>
        <!-- fine form res -->

    </body>

</html>