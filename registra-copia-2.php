<?php 

    include_once("connection_test.php");

    $INVALID = 0; // Variabile di controllo
    $ISBN = $_POST['ISBN'];
    $Scaffale = $_POST['Scaffale'];
    $CodiceBiblioteca = $_POST['CodiceBiblioteca'];

    $sql = "SELECT Numero
            FROM COPIA
            WHERE ISBN = '$ISBN'";
    $res = mysqli_query($link, $sql);

    if($res == NULL){
        $INVALID = 1;
    }

    // Generazione del NumeroCopia
    $MAX_NUMERO = 0;
    while($riga = mysqli_fetch_array($res)) {
        $NUMERO = $riga['Numero'];
        if($MAX_NUMERO < $NUMERO) {
            $MAX_NUMERO = $NUMERO;
        }
    }
    $NumeroCopia = $MAX_NUMERO + 1;

    $sql_inserimento = "INSERT INTO COPIA (Numero, ISBN, Scaffale, CodiceB)
            VALUE ('$NumeroCopia', '$ISBN', '$Scaffale', '$CodiceBiblioteca')";
    $res = mysqli_query($link, $sql_inserimento);
    if($res == NULL) {
        $INVALID = 1;
    }

    $sql = "SELECT Titolo
            FROM LIBRO
            WHERE ISBN = '$ISBN'";
    $res = mysqli_query($link, $sql);
    $riga = mysqli_fetch_array($res);
    $Titolo = $riga['Titolo'];

    $sql = "SELECT NomeDipartimento
            FROM BIBLIOTECA
            WHERE CodiceBiblioteca = '$CodiceBiblioteca'";
    $res = mysqli_query($link, $sql);
    $riga = mysqli_fetch_array($res);
    $NomeDipartimento = $riga['NomeDipartimento'];

    mysqli_close($link);

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ricerca stutente - Biblioteca Universitaria</title>
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
                    <li><a href="./book-sigin-1.php">Registra nuovo libro</a>
                    <li><a>Registra nuova copia (libro esistente)</a></li>
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

        <!-- inizio form res -->
        <div id="formRes">
            <h1>ESITO REGISTRAZIONE DELLA COPIA DI UN LIBRO ESISTENTE</h1>
            
            <?php if($INVALID == 1) { ?>
                <p>OPS :(</p>
                <p>Qualcosa è andato storto durante la registrazione della copia.</p>
                <p>Verifica che il campo ISBN sia corretto.</p>
                <p>Se l'errore persiste contattare l'amministratore del sistema.</p>
                <p>ERROR IN: <?php echo $sql_inserimento; ?></p>
            <?php } 
            else { ?>
                <p>Registrazione della copia avvenuta con successo!</p>
                <p>Dati inseriti:</p>
                <p>ISBN: <b><?php echo $ISBN . " (" . $Titolo . ")";?></b></p>
                <p>NumeroCopia: <b><?php echo $NumeroCopia; ?></b> &#x2192; Annotalo da quale parte!!</p> 
                <p>Scaffale: <b><?php echo $Scaffale; ?></b></p>
                <p>Biblioteca: <b><?php echo $CodiceBiblioteca . " - " . $NomeDipartimento; ?></b></p>
            <?php } ?>
            <a href="./registra-copia-1.php">Registra un'altra copia &#x2934;</a> | <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
        </div>
        <!-- fine form res -->

    </body>

</html>