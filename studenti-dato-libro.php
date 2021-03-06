<?php

    include_once("connection_test.php");

    $Titolo = $_POST['Titolo'];
    $counter = 0;
    $INVALID = 0;

    $sql = "SELECT ISBN
            FROM LIBRO
            WHERE Titolo = '$Titolo'";
    $resTemp = mysqli_query($link, $sql);
    $rigaTemp = mysqli_fetch_array($resTemp);
    if($rigaTemp['ISBN'] == "") {
        $INVALID = 1;
    }
    
    $sql = "SELECT STUDENTE.Matricola, STUDENTE.Nome, STUDENTE.Cognome, STUDENTE.CdS
            FROM STUDENTE,
            
                (SELECT PRESTITO.Matricola
                FROM PRESTITO,
                
                            (SELECT LIBRO.ISBN
                            FROM LIBRO
                            WHERE LIBRO.Titolo='$Titolo') AS ISBN_VAL
                            
                WHERE ISBN_VAL.ISBN=PRESTITO.ISBN) AS MATRICOLE_DATO_LIBRO
                        
            WHERE STUDENTE.Matricola=MATRICOLE_DATO_LIBRO.Matricola";

    $res = mysqli_query($link, $sql);
    $resCopy = mysqli_query($link, $sql);

    while($rigaCounting = mysqli_fetch_array($resCopy)) {
        if($rigaCounting['Matricola'] != "") {
            $counter++;
        }
    }

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Studenti dato libro - Biblioteca Universitaria</title>
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

        <div id="formRes">

            <br/><a href="./studenti-dato-libro.html">Indietro &#x2934;</a> | <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <h1>VISUALIZZA CHI HA PRESO IN PRESTITO UN LIBRO</h1>
            
            <?php if($INVALID == 1) { 
                // Controllo su titolo libro ?>
                <p>OPS :(</p>
                <p>Pare non ci sia nessun libro nella collezione con il titolo '<b><?php echo $Titolo; ?></b>'</p>
                <p><a href="studenti-dato-libro.html">Riprova con un altro libro</a></p>   
                <?php } ?>

            <?php if($counter == 0 && $INVALID == 0) { ?>
                <p>Pare che ancora nessuno studente abbia preso in prestito '<b><?php echo $Titolo; ?></b>'</p>  
                <p><a href="studenti-dato-libro.html">Riprova con un altro libro</a></p>  
            <?php } 
            if($counter != 0 && $INVALID == 0) { ?>
                
                <p>Ci sono '<b><?php echo $counter;?></b>' studenti che hanno preso in prestito '<b><?php echo $Titolo; ?></b>':</p>
                
                <table id="TableStyle">
                    <thead>
                        <tr>
                            <th>Matricola</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>CdS</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php while($riga = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td> <?php echo $riga['Matricola']; ?> </td>
                                <td> <?php echo $riga['Nome']; ?> </td>
                                <td> <?php echo $riga['Cognome']; ?> </td>
                                <td> <?php echo $riga['CdS']; ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            <?php } ?>
            <br/><a href="./studenti-dato-libro.html">Indietro &#x2934;</a> | <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
        </div>

    </body>

</html>