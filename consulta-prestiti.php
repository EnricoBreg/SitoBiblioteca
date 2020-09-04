<?php

    include_once("connection_test.php");

    $MATRICOLA = $_POST["MATRICOLA"];
    $COUNTER = 0;
    $i = 0;

    $sql = "SELECT LIBRO.Titolo AS Titolo, LIBRO.ISBN as ISBN, PRESTATI_A_STUDENTE.NumeroCopia AS NumeroCopia, PRESTATI_A_STUDENTE.DataPrestito AS DataPrestito, PRESTATI_A_STUDENTE.ContProroghe AS ProrogheRimaste, PRESTATI_A_STUDENTE.ID AS ID_PRESTITO
            FROM LIBRO,

                (SELECT PRESTITO.ID, PRESTITO.ISBN, PRESTITO.NumeroCopia, PRESTITO.DataPrestito, PRESTITO.ContProroghe
                FROM PRESTITO
                WHERE PRESTITO.Matricola = '$MATRICOLA') AS PRESTATI_A_STUDENTE

            WHERE LIBRO.ISBN = PRESTATI_A_STUDENTE.ISBN";

    $res = mysqli_query($link, $sql);
    $resCopy = mysqli_query($link, $sql);
    $resCopy2 = mysqli_query($link, $sql);
    
    /* INVALID è una variabile dummy per indicare se lo studente ha effettivamente dei libri in prestito 
     * INVALID = 0 -> Ha dei libri in prestito 
     * INVALID = 1 -> viceversa 
     * Serve anche per vedere il risultato della query */
    $INVALID = 0;
    // Counter per trovare il numero di libri
    while($temp = mysqli_fetch_array($resCopy)) {
        if($temp["Titolo"] != "")
            $COUNTER++;
    }

    $temp2 = mysqli_fetch_row($resCopy2);
    if($temp2['Titolo'] == "" && $COUNTER == 0) {
        $INVALID = 1;
    }


    $sql = "SELECT Nome, Cognome
            FROM STUDENTE
            WHERE Matricola = '$MATRICOLA'";
    $res1 = mysqli_query($link, $sql);
    $temp = mysqli_fetch_array($res1);
    $NOME = $temp["Nome"];
    $COGNOME = $temp["Cognome"];

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Consulta prestiti Studente - Biblioteca Universitaria</title>
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
        <!-- inizio form -->
        <div id="formRes">
            <h1>CONSULTAZIONE PRESTITI ATTIVI STUDENTE</h1>
            <?php if($INVALID == 1) { ?>
                <p>Sembra che lo studente con Matricola <b><?php echo $MATRICOLA; ?></b> non esista o non abbia ancora prestiti attivi.</p>
            <?php }
            else {
            ?>
                <p>Situazione prestiti per lo studente <b><?php echo $NOME . " " . $COGNOME . " (Matricola: " . $MATRICOLA . ")" ?></b></p>
                <p>Lo studente ha attualmente in prestito <b><?php echo $COUNTER; ?> libri:</b></p>
                <table id="TableStyle">
                    <thead>
                        <tr>
                            <th>ID Prestito</th>
                            <th>Nome Libro</th>
                            <th>ISBN</th>
                            <th>Numero Copia</th>
                            <th>Data del Prestito (AAAA/MM/GG)</th>
                            <th>Proroghe rimaste</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($riga = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td><?php echo $riga['ID_PRESTITO']; ?> </td>
                                <td><?php echo $riga['Titolo']; ?></td>
                                <td><?php echo $riga['ISBN']; ?></td>
                                <td><?php echo $riga['NumeroCopia']; ?></td>
                                <td><?php echo $riga['DataPrestito']; ?></td>
                                <td><?php echo $riga['ProrogheRimaste']; ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <a href="./consulta-prestiti.html">Indietro &#x2934;</a> | <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>

        </div>
        <!-- fine form -->

    </body>

</html>