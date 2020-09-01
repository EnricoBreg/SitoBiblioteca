<?php
    include_once("connection_test.php");

    $CODICEAUTORE   = $_POST['CodiceAutore'];
    $NOME           = $_POST['Nome'];
    $COGNOME        = $_POST['Cognome'];
    $DATANASCITA    = $_POST['DataNascita'];
    $LUOGONASCITA   = $_POST['LuogoNascita'];

    $sql = "INSERT INTO AUTORE (CodiceAutore, Nome, Cognome, DataNascita, LuogoNascita)
            VALUES ('$CODICEAUTORE', '$NOME', '$COGNOME', '$DATANASCITA', '$LUOGONASCITA')";

    $res = mysqli_query($link, $sql);

    mysqli_close($link);
?>

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inserimento nuovo autore - Biblioteca Universitaria</title>
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
            <h1>REGISTRA NUOVO AUTORE</h1>     
            <?php 
                if($res == NULL) {
                    echo "ERRORE NELLA FASE DI RESTRAZIONE DELL'AUTORE.". PHP_EOL . "SE IL PROBLEMA PERSISTE CONTATTA L'AMMINISTRATORE";
                    ?> <br/>Torna alla pagine di inserimento dell'autore <a href="author-reg.php">cliccando qui</a>.
                    <?php
                }

                if($res != NULL) { ?> 
            <ul><b>
                <p>&nbsp;Registrazione della/o autrice/autore completata con successo!</p>
                <p>&#x2192;Riepilogo dei dati inseriti:<p>
                <li>Codice autore: <?php echo $CODICEAUTORE ?></li>
                <li>Nome: <?php echo $NOME ?></li>
                <li>Cognome: <?php echo $COGNOME ?></li>
                <li>Data Nascita: <?php echo $DATANASCITA ?></li>
                <li>Luogo Nascita: <?php echo $LUOGONASCITA ?></li>
            </b></ul>
            <?php } ?>

    </body>

</html>