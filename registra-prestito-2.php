<?php     
    /* DA RIVEREDERE ALCUNI PUNTI */
    include_once("connection_test.php");

    
    $ID = $_POST['ID'];
    $DATA_INIZIO = $_POST['Data'];
    $ISBN = $_POST['ISBN'];
    $NUMEROCOPIA = $_POST['NumeroCopia'];
    $MATRICOLA = $_POST['Matricola'];
    $CODICEBIBLIOTECA = $_POST['CodiceBiblioteca'];
    $CONTPROROGHE = 2;

    // Generazione della data per la scadenza del prestito (30 giorni da DATA_INIZIO)
    $DATA_FINE = date_create($_POST['Data']);
    date_add($DATA_FINE, date_interval_create_from_date_string("30 days"));

    $sql = "INSERT INTO PRESTITO (ID, DataPrestito, ContProroghe, ISBN, NumeroCopia, Matricola, CodiceB)
            VALUES ('$ID', '$DATA_INIZIO', '$CONTPROROGHE', '$ISBN', '$NUMEROCOPIA', '$MATRICOLA', '$CODICEBIBLIOTECA')";
    
    $resInserimento = mysqli_query($link, $sql);

    // Estrazione di NOME, COGNOME per stampa a video
    $sql = "SELECT Nome, Cognome
            FROM STUDENTE
            WHERE Matricola = '$MATRICOLA'";
    $res = mysqli_query($link, $sql);
    $riga = mysqli_fetch_array($res);
    $NOME = $riga['Nome'];
    $COGNOME = $riga['Cognome'];

    // Estrazione del TITOLO per stampa a video
    $sql = "SELECT Titolo
            FROM LIBRO
            WHERE ISBN = '$ISBN'";
    $res = mysqli_query($link, $sql);
    $riga = mysqli_fetch_array($res);
    $TITOLO = $riga['Titolo'];

    // Chiusura della connessione al server
    mysqli_close($link);
?>


<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inserimento nuovo prestito - Biblioteca Universitaria</title>
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

            <?php // Verifica del corretto inserimento del prestito nel database
                if($resInserimento == NULL){ ?>
                <h1>ESITO REGISTRAZIONE NUOVO PRESTITO</h1>
                <p>Qualcosa non è andato a buon fine durante la registrazione del prestito :(</p>
                <p>Prova a controllare che la copia non sia già in prestito.</p>
                <p>Ci scusiamo per l'inconveniente. Prego <a href="registra-prestito-1.php">riprovare</a>. </p>
                <p>Se il problema persiste, contattare l'amministratore.</p>
            <?php }
            else { ?>
                <h1>ESITO REGISTRAZIONE NUOVO PRESTITO</h1>
                <p>Registrazione del prestito completata con successo!</p>
                <p>STUDENTE: <?php echo $NOME . " " . $COGNOME . " (Matr. " . $MATRICOLA . ")"; ?></p>
                <p><b>ID PRESTITO: <?php echo $ID ?></b></p>
                <p>ISBN/NUMERO COPIA: <?php echo $ISBN . "/" . $NUMEROCOPIA; ?></p>
                <p>TITOLO: <?php echo $TITOLO; ?></p>
                <p><b>SCADENZA DEL PRESTITO: <?php echo date_format($DATA_FINE, "d-m-Y"); ?> 
                </b> (a 30 gg da data ordierna).</p>
                <p><button onclick="window.print();">Stampa la pagina</button></p>
                <p><a href="registra-prestito-1.php">Registra un nuovo prestito &#x2934;</a> | <a href="menu.html">Menù &#x2934;</a> |<a href="index.html">Ritorna alla HOME</a>
            <?php } ?>

        </div>

    </body>

</html>