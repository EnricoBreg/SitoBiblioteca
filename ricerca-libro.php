<?php

    include_once("connection_test.php");

    $TITOLO = $_POST['TITOLO'];
    $MATRICOLA = $_POST["MATRICOLA"];
    $INVALID = 0; // Variabile di controllo
    $trovati = 0;

    $sql_selezione = "SELECT LIBRO.ISBN, LIBRO.Titolo, LIBRO.AnnoPubblicazione, LIBRO.Categoria, LIBRO.Lingua, AUTORE.Nome AS NomeA, AUTORE.Cognome AS CognomeA, EDITORE.Nome AS Editore
                    FROM LIBRO, SCRIVE, AUTORE, EDITORE
                    WHERE LIBRO.Titolo LIKE '%$TITOLO%' AND LIBRO.ISBN = SCRIVE.ISBN AND SCRIVE.CodiceA = AUTORE.CodiceAutore AND LIBRO.CodiceE = EDITORE.CodiceEditore";

    $res = mysqli_query($link, $sql_selezione);    
    $resCopy = mysqli_query($link, $sql_selezione);

    // Controllo del risultato della query
    while($temp = mysqli_fetch_array($resCopy)) {
        if($temp['ISBN'] == "") {
            $INVALID = 1;
        }
    }

    // Se valido il risultato allora posso contare
    if($INVALID == 0){
        $sql = "SELECT DISTINCT LIBRO.ISBN
                FROM LIBRO
                WHERE LIBRO.Titolo LIKE '%$TITOLO%'";

        $resForCount = mysqli_query($link, $sql);

        while($rigaForCount = mysqli_fetch_array($resForCount)) {
            $trovati++;
        }
    }

    mysqli_close($link);

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ricerca info studente - Biblioteca Universitaria</title>
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

            <a href="./ricerca-libro.html">Indietro &#x2934;</a> | <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <h1>ESITO RICERCA LIBRI</h1>
            <?php if($INVALID == 1) { ?>
                <p><b>'<?php echo $trovati; ?>'</b> risultati trovati in base alla ricerca '<?php echo $TITOLO; ?>'</p>
                <p>OPS :(</p>
                <p>Sembra che non ci siano libri che corrispondano alla tua ricerca. <a href="ricerca-libro.html">Riprova cliccando qui</a></p>
                <p>Se il problema persiste contatta l'amministratore</p>
            <?php }
            else {
            ?>
                <p><b>'<?php echo $trovati; ?>'</b> risultati trovati in base alla ricerca '<?php echo $TITOLO; ?>'</p>
                <table id="TableStyle">
                <thead>
                    <th>ISBN</th>
                    <th>Titolo</th>
                    <th>Anno pubblicazione</th>
                    <th>Categoria</th>
                    <th>Lingua</th>
                    <th>Editore</th>
                    <th>Autore/i</th>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    $ISBN_PREV = "";
                    while($riga = mysqli_fetch_array($res)) {

                        if($ISBN_PREV == $riga['ISBN']){
                            echo $riga['NomeA'] . " " . $riga['CognomeA'] . "<br/>";
                        }
                        else {
                            // Se diverso salva il nuovo ISBN e chiude la cella e riga corrente e apre una riga nuova
                            $ISBN_PREV = $riga['ISBN']; ?>
                            </td>
                            </tr>   
                            <tr>
                            <td><?php echo $riga['ISBN']; ?></td>
                                <td><?php echo $riga['Titolo']; ?></td>
                                <td><?php echo $riga['AnnoPubblicazione']; ?></td>
                                <td><?php echo $riga['Categoria']; ?></td>
                                <td><?php echo $riga['Lingua']; ?></td>
                                <td><?php echo $riga['Editore']; ?></td>
                                <td><?php echo $riga['NomeA'] . " " . $riga['CognomeA'] ?>
                            <?php
                            }
                        } // fine while
                ?>
                </td>
                </tr>
                </tbody>
            </table>
            <?php } ?>
            <a href="./ricerca-libro.html">Indietro &#x2934;</a> | <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>

        </div>
        <!-- fine form res-->

    </body>

</html>