<?php

    include_once("connection_test.php");

    $NOMCOGN = $_GET['NomCogn'];
    $INVALID = 0; // Variabile di controllo
    $TROVATI = 0;
    $COUNTER = 0;

    $sql = "SELECT Matricola, Nome, Cognome, Sesso, CdS, Via, NumeroCivico, Citta, CAP, Email, Telefono, DataNascita
            FROM STUDENTE
            WHERE Nome LIKE'$NOMCOGN%' or Cognome LIKE '$NOMCOGN%'";

    $res = mysqli_query($link, $sql);    
    
    $resCopy = mysqli_query($link, $sql);
    while($temp = mysqli_fetch_array($resCopy)){
        if($temp['Matricola'] == ""){
            $INVALID = 1;
        }
        else {
            // Incremento del numero di risultati trovati
            $TROVATI++;
        }
    }

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

        <!-- inizio form -->
        <div id="formRes">
            <h1>INFORMAZIONI STUDENTE RICERCATO</h1>
            <p>'<?php echo $TROVATI ?>' risultati trovati in base ai criteri di ricerca inseririti.</p>
            
            <?php if($INVALID == 1)
                echo "Ops :( <br/> Sembra che non esista nessuno studente con i criteri di ricerca inseriti. <br/> Riprova con un altro codice matricola. <br/><br/>";
            else {
                ?>
                <table id="TableStyle">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Nominativo</th>
                        <th>Data di nascita</th>
                        <th>Genere</th>
                        <th>Matricola</th>
                        <th>CdS</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Indirizzo</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while($row = mysqli_fetch_array($res)) {
                            $COUNTER++;
                            ?>
                            <tr>
                                <td><?php echo $COUNTER; ?></td>
                                <td><?php echo $row['Nome'] . "  " . $row['Cognome']; ?></td>
                                <td><?php echo $row['DataNascita']; ?></td>
                                <td><?php echo $row['Sesso']; ?></td>
                                <td><?php echo $row['Matricola']; ?></td>
                                <td><?php echo $row['CdS']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Telefono']; ?></td>
                                <td><?php echo $row['Via'] . ", " . $row['NumeroCivico'] . "<br/>" . $row['CAP'] . ", " . $row['Citta']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <br/>
            <a href="./user-search.php">Indietro &#x2934;</a> | <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>

        </div>
        <!-- fine form -->

    </body>

</html>

<?php
    mysqli_close($link);
?>