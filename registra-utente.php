<?php
    // codice per pagina PHP registra_utente
    include_once("./connection_test.php");

    $Matricola = $_POST["Matricola"];
    $Nome = $_POST["Nome"];
    $Cognome = $_POST["Cognome"];
    $Sesso = $_POST["Sesso"];
    $DataNascita = $_POST["Data_n"];
    $CdS = $_POST["CdS"];
    $Via = $_POST["Via"];
    $NumeroCivico = $_POST['NumeroCivico'];
    $Citta = $_POST["Citta"];
    $CAP = $_POST["CAP"];
    $Email = $_POST["Email"];
    $Telefono = $_POST["Telefono"];

    $mysql = "INSERT INTO STUDENTE (Matricola, Nome, Cognome, Sesso, DataNascita, CdS, Via, NumeroCivico, Citta, CAP, Email, Telefono)
            VALUES ('$Matricola', '$Nome', '$Cognome', '$Sesso', '$DataNascita', '$CdS', '$Via', '$NumeroCivico', '$Citta', '$CAP', '$Email', '$Telefono')";

    $query_res = mysqli_query($link, $mysql);

    if(!$query_res){
        echo $mysql . PHP_EOL;
        echo "Errore Query MySQL" . PHP_EOL;
        echo "Exit Status: -2" . PHP_EOL;
        exit(-2);
    }

    mysqli_close($link);

?>

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrazione nuovo utente - Biblioteca Universitaria</title>
        <link rel="stylesheet" style="text/css" href="./myStyles.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    </head>

    <body>

        <div id="Titolo">
            <p id="titolo">BIBLIOTECA UNIVERSITARIA DI FERRARA</p>
            <a href="http://www.unife.it/it" target="blank"><img id="logo" src="./immagini/logo.jpg" alt="logo"></a>
        </div>

        <!-- barra di navigazione -->
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
                    <li><a href="./book-sigin-1.php">Registra nuovo libro</a>
                    <li><a>Registra nuova copia (libro esistente)</a></li>
                    <li><a href="./all-books.php">Visualizza tutti i libri nel DB</a></li>
                </ul>
                </li>
                <li><a href="./menu.html">Prestiti</a>
                    <ul>
                        <li><a href="./registra_prestito.php">Registra nuovo prestito</a></li>
                        <li><a href="./registra_proroga.html">Proroga un prestito</a></li>
                        <li><a href="./registra_rientro.html">Registra un rientro</a></li>
                        <li>Consulta situazione prestiti</li>
                        <li>Consulta situazione prestiti per codice matricola</li>
                    </ul>
                </li>
                <li><a href="./menu.html">Utenti</a>
                    <ul>
                        <li><a href="./registra_utente.html">Registra nuovo utente</a></li>
                        <li><a href="./aggiornamento_utente1.html">Aggiorna/Modifica utente</a></li>
                        <li><a href="./cancella_utente.html">Cancella utente</a></li>
                    </ul>
                </li>
                <li><a href="./menu.html">Autori/Editori</a>
                    <ul>
                        <li><a href="./all-pubs.php">Visualizza tutti gli Editori dei libri</a></li>
                        <li><a href="./all-authors.php">Visualizza tutti gli Autori dei libri</a></li>
                        <li><a href="./pub-reg.php">Nuovo Editore</a></li>
                        <li><a href="./author-reg.php">Nuovo Autore</a></li>
                    </ul>
                </li>
        </ul>
    </div>
    <!-- fine barra di navigazione -->

        <div id="formRes">
            <h1>REGISTRA NUOVO UTENTE</h1>
            <p>Registrazione della/o studentessa/studente completata con successo!</p>
            <p>Riepilogo dei dati inseriti:<p>
            <ul>
                <li>Matricola: <b><?php echo $Matricola ?></b></li>
                <li>Nome: <b><?php echo $Nome ?></b></li>
                <li>Cognome: <b><?php echo $Cognome ?></b></li>
                <li>Genere: <b><?php echo $Sesso ?></b></li>
                <li>Data di nascita: <b><?php echo $DataNascita ?></b></li>
                <li>Corso di studi: <b><?php echo $CdS ?></b></li>
                <li>Email: <b><?php echo $Email ?></b></li>
                <li>Telefono: <b><?php echo $Telefono ?></b></li>
                <li>Indirizzo: <b><?php echo $Via ?></b></li>
                <li>Numero civico: <b><?php echo $NumeroCivico ?></b></li>
                <li>CAP: <b><?php echo $CAP ?></b></li>
                <li>Città: <b><?php echo $Citta ?></b></li><br/>
            </ul>

            <a href="./index.html">Ritorna all HOME</a><br/>
            <a href="./registra_utente.html">Registra un altro utente</a><br/>
    
        </div>

    </body>

</html>