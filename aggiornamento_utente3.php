<?php

    include_once("connection_test.php");

    $Matricola = $_POST['Matricola'];
    $Nome = $_POST['Nome'];
    $Cognome= $_POST['Cognome'];
    $DataNascita = $_POST['DataNascita'];
    $Sesso = $_POST['Sesso'];
    $CdS = $_POST['CdS'];
    $Via = $_POST['Via'];
    $NumeroCivico = $_POST['NumeroCivico'];
    $Citta = $_POST['Citta'];
    $CAP = $_POST['CAP'];
    $Email = $_POST['Email'];
    $Telefono = $_POST['Telefono'];

    $sql = "SELECT * FROM STUDENTE WHERE Matricola='$Matricola'";

    $res1 = mysqli_query($link, $sql);
    $riga = mysqli_fetch_array($res1);

    $sql = "UPDATE STUDENTE
            SET Nome='$Nome', Cognome='$Cognome', DataNascita='$DataNascita', Sesso='$Sesso', CdS='$CdS', Via='$Via', 
                NumeroCivico='$NumeroCivico', Citta='$Citta', CAP='$CAP', Email='$Email', Telefono='$Telefono'
            WHERE Matricola='$Matricola'";
    
    $res2 = mysqli_query($link, $sql);

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aggiornamento utente - Biblioteca Universitaria</title>
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

        <!-- inizio form -->
        <div id="formRes">
            <h1>AGGIORNA/MODIFICA UTENTE</h1>
            <p>Aggiornamento dello studente terminato con successo!</p>
            <p>Riepilogo dei dati aggiornati/modificati:</p>
            <table id="userChangesTable">
                <thead>
                    <tr>
                        <td>Campo</td>
                        <td>VECCHIO</td>
                        <td>&#x279C;</td>
                        <td><b>NUOVO</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Matricola:</td>
                        <td> <?php echo $riga['Matricola'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $Matricola ?> </b> </td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td> <?php echo $riga['Nome'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $Nome ?> </b> </td>
                    </tr>
                    <tr>
                        <td>Cognome:</td>
                        <td> <?php echo $riga['Cognome'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $Cognome ?> </b> </td>
                    </tr>
                    <tr>
                        <td>Data di nascita:</td>
                        <td> <?php echo $riga['DataNascita'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $DataNascita ?> <b> </td>
                    </tr>
                    <tr>
                        <td>Genere:</td>
                        <td> <?php echo $riga['Sesso'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $Sesso ?> </b> </td>
                    </tr>
                    <tr>
                        <td>CdS:</td>
                        <td> <?php echo $riga['CdS'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $CdS ?> </b> </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td> <?php echo $riga['Email'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $Email ?> </b> </td>
                    </tr>
                    <tr>
                        <td>Telefono:</td>
                        <td> <?php echo $riga['Telefono'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $Telefono ?> </b> </td>
                    </tr>
                    <tr>
                        <td>Indirizzo:</td>
                        <td> <?php echo $riga['Via'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $Via ?> </b> </td>
                    </tr>
                    <tr>
                        <td>Numero civico:</td>
                        <td> <?php echo $riga['NumeroCivico'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $NumeroCivico ?> </b> </td>
                    </tr>
                    <tr>
                        <td>Città:</td>
                        <td> <?php echo $riga['Citta'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $Citta ?> </b> </td>
                    </tr>
                    <tr>
                        <td>CAP:</td>
                        <td> <?php echo $riga['CAP'] ?> </td>
                        <td>&#x279C;</td>
                        <td> <b> <?php echo $CAP ?> </b> </td>
                    </tr>
                </tbody>
            </table>
            <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a>
        </div>
        <!-- fine form -->

    </body>

</html>