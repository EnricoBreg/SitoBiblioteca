<?php
    include_once("connection_test.php");

    $CODICEEDITORE  = $_POST['CodiceEditore'];
    $NOME           = $_POST['Nome'];
    $VIA            = $_POST['Via'];
    $NUMEROCIVICO   = $_POST['NumeroCivico'];
    $CITTA          = $_POST['Citta'];
    $CAP            = $_POST['CAP'];
    $EMAIL          = $_POST['Email'];
    $TELEFONO       = $_POST['Telefono'];

    $sql = "INSERT INTO EDITORE (CodiceEditore, Nome, Via, NumeroCivico, Citta, CAP, Email, Telefono)
            VALUES ('$CODICEEDITORE', '$NOME', '$VIA', '$NUMEROCIVICO', '$CITTA', '$CAP', '$EMAIL', '$TELEFONO')";

    $res = mysqli_query($link, $sql);

    mysqli_close($link);
?>

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrazione nuovo editore - Biblioteca Universitaria</title>
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
                    <li><a href="./book-signup-1.php">Registra nuovo libro</a>
                    <li><a href="registra-copia-1.php">Registra nuova copia (libro esistente)</a></li>
                    <li><a href="./ricerca-libro.html">Ricerca un libro</a></li>
                    <li><a href="./all-books.php">Visualizza tutti i libri nel DB</a></li>
                </ul>
                </li>
                <li><a href="./menu.html">Prestiti</a>
                    <ul>
                        <li><a href="./consulta-prestiti.html">Consulta situazione prestiti per codice matricola</a></li>
                        <li><a href="./registra-prestito-1.php">Registra nuovo prestito</a></li>
                        <li><a href="./registra_proroga.html">Proroga un prestito</a></li>
                        <li><a href="./registra_rientro.html">Registra un rientro</a></li>
                        <li><a href="./tutti-prestiti.php">Visualizza tutti i prestiti</a></li>
                    </ul>
                </li>
                <li><a href="./menu.html">Utenti</a>
                    <ul>
                        <li><a href="./registra_utente.html">Registra nuovo utente</a></li>
                        <li><a href="./aggiornamento_utente1.html">Aggiorna/Modifica utente</a></li>
                        <li><a href="./cancella_utente.html">Cancella utente</a></li>
                        <li><a href="./user-search.php">Ricerca uno studente</a></li>
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
                <li>
                    <a href="usefull-info.php">Usefull Info</a>
                </li>
        </ul>
    </div>
    <!-- fine barra di navigazione -->

        <div id="formRes">       
            <h1>REGISTRA NUOVO EDITORE</h1>     
            <?php 
                if($res == NULL) {
                    echo "ERRORE NELLA FASE DI RESTRAZIONE DELL'EDITORE.". PHP_EOL . "SE IL PROBLEMA PERSISTE CONTATTA L'AMMINISTRATORE";
                    ?> <br/>Torna alla pagine di inserimento dell'autore <a href="pub-reg.php">cliccando qui</a>.
                    <?php
                }

                if($res != NULL) { ?> 
            <ul>
                <p>&nbsp;Registrazione dell'Editore completata con successo!</p>
                <p>&#x2192;Riepilogo dei dati inseriti:<p>
                <b>
                <li>Codice Editore: <?php echo $CODICEEDITORE ?></li>
                <li>Nome: <?php echo $NOME ?></li>
                <li>Città: <?php echo $CITTA ?></li>
                <li>Via: <?php echo $VIA ?></li>
                <li>Numero civico: <?php echo $NUMEROCIVICO ?></li>
                <li>Telefono: <?php echo $TELEFONO ?></li>
                <li>E-mail: <?php echo $EMAIL ?></li>
                </b>
            </ul>
            <?php } ?>
        </div>
        <a href="./pub-reg.php">Registra un altro editore &#x2934;</a>| <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a>

    </body>

</html>