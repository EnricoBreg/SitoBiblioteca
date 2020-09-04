<?php

    include_once("connection_test.php");

    $GiorniAllaScandenza = $_POST['GiorniAllaScandenza'];

    // Estrazione dal DB di tutti i prestiti
    // mi piacerebbe far vedere la data di fine, ma come fare da PHP o MYSQL???????
    $sql = "SELECT PRESTITO.ID, PRESTITO.Matricola, STUDENTE.Nome, STUDENTE.Cognome, PRESTITO.ISBN, PRESTITO.NumeroCopia, LIBRO.Titolo, PRESTITO.DataPrestito, DATE_ADD(PRESTITO.DataPrestito, INTERVAL 30 DAY) as DataFinePrestito, DATEDIFF(DATE_ADD(PRESTITO.DataPrestito, INTERVAL 30 DAY), CURDATE()) as GiorniAllaScadenza
            FROM PRESTITO, STUDENTE, LIBRO
            WHERE DATEDIFF(DATE_ADD(DataPrestito, INTERVAL 30 DAY), CURDATE()) <= '$GiorniAllaScandenza' AND STUDENTE.Matricola = PRESTITO.Matricola AND LIBRO.ISBN = PRESTITO.ISBN";
    $res = mysqli_query($link, $sql);

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tutti i prestiti - Biblioteca Universitaria</title>
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

            <br/><a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <h1>VISUALIZZA TUTTI I PRESTITI IN SCADENZA</h1>
            <p>Elenco dei tutti i prestiti attualmente attivi in scandenza (giorni al rientro <= '<?php echo $GiorniAllaScandenza;?>'):</p>
            <p>&#x2192;Usa la Matricola dello studente per ricerca i sui recapiti <a href="./user-search.html">cliccando qui</a>.</p>
            <table id="TableStyle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matricola</th>
                        <th>Nominativo Studente</th>
                        <th>ISBN / Numero Copia</th>
                        <th>Titolo del libro</th>
                        <th>Data Inizio</th>
                        <th>Data Fine</th>
                        <th>Giorni alla scadenza</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php while($riga = mysqli_fetch_array($res)) { ?>
                        <tr>
                            <td> <?php echo $riga['ID']; ?> </td>
                            <td> <?php echo $riga['Matricola']; ?> </td>
                            <td> <?php echo $riga['Nome'] . " " . $riga['Cognome']; ?> </td>
                            <td> <?php echo $riga['ISBN'] . "/" . $riga['NumeroCopia']; ?> </td>
                            <td> <?php echo $riga['Titolo']; ?></td>
                            <td> <?php echo $riga['DataPrestito']; ?> </td>
                            <td> <?php echo $riga['DataFinePrestito']; ?></td>
                            <td> <?php echo $riga['GiorniAllaScadenza']; ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <br/>
            <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
        </div>

    </body>

</html>