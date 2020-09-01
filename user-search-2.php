<?php

    include_once("connection_test.php");

    $MATRICOLA = $_POST["MATRICOLA"];
    $INVALID = 0; // Variabile di controllo

    $sql = "SELECT Matricola, Nome, Cognome, Sesso, CdS, Via, NumeroCivico, Citta, CAP, Email, Telefono, DataNascita
            FROM STUDENTE
            WHERE Matricola='$MATRICOLA'";

    $res = mysqli_query($link, $sql);    
    $resCopy = mysqli_query($link, $sql);

    $temp = mysqli_fetch_array($resCopy);
    if($temp['Matricola'] == "") {
        $INVALID = 1;
    }

    $row = mysqli_fetch_array($res);

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
            <h1>INFORMAZIONI STUDENTE RICERCATO</h1>
            <p>Qui sotto sono riportare le informazioni per lo studente ricercato.</p>
            
            <?php if($INVALID == 1)
                echo "Ops :( <br/> Sembra che non esista nessuno studente con la matricola inserita. <br/> Riprova con un altro codice matricola. <br/><br/>";
            else {
            ?>
                <table id="TableStyle">
                    <tbody>
                        <tr>
                            <th>Matricola</th>
                            <td><?php echo $row['Matricola']; ?></td>
                        </tr>
                        <tr>
                            <th>Nome</th>
                            <td><?php echo $row['Nome']; ?></td>
                        </tr>
                        <tr>
                            <th>Cognome</th>
                            <td><?php echo $row['Cognome']; ?></td>
                        </tr>
                        <tr>
                            <th>Genere</th>
                            <td><?php echo $row['Sesso']; ?></td>
                        </tr>
                        <tr>
                            <th>Data di nascita</th>
                            <td><?php echo $row['DataNascita']; ?></td>
                        </tr>
                        <tr>
                            <th>Corso di studi</th>
                            <td><?php echo $row['CdS']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['Email']; ?></td>
                        </tr>
                        <tr>
                            <th>Telefono</th>
                            <td><?php echo $row['Telefono']; ?></td>
                        </tr>
                        <tr>
                            <th>Indirizzo</th>
                            <td><?php echo $row['Via'] . ", " . $row['NumeroCivico'] . "<br/>" . $row['CAP'] . ", " . $row['Citta']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <br/>
            <?php } ?>
            <a href="./user-search.php">Indietro &#x2934;</a> | <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>

        </div>
        <!-- fine form -->

    </body>

</html>