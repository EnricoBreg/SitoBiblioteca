<?php

    include_once("connection_test.php");

    $Matricola = $_POST['Matricola'];
    $sql = "SELECT * FROM STUDENTE WHERE Matricola='$Matricola'";

    $res = mysqli_query($link, $sql);

    $riga = mysqli_fetch_array($res);

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
        <div id="form">
            <form action="aggiornamento_utente3.php" method="POST">
                <h1>AGGIORNA/MODIFICA UTENTE</h1>
                <p>Aggiornamento dello studente con Matricola <?php echo $Matricola; ?> </p>
                <p>ATTEZIONE! Per modificare il campo matricola è necessario contattare l'amministratore del sistema</p>
                <label>Matricola:</label><br/>
                <input readonly required="required" type="text" name="Matricola" value="<?php echo $riga['Matricola'] ?>"><br/>

                <label>Nome:</label>
                <input type="text" name="Nome" value="<?php echo $riga['Nome'] ?>"><br/>

                <label>Cognome:</label>
                <input type="text" name="Cognome" value="<?php echo $riga['Cognome'] ?>"><br/>

                <label>Genere ('ND' se non dichiarato):</label>
                <input maxlength="1" type="text" name="Sesso" value="<?php echo $riga['Sesso'] ?> "><br/>

                <label>Data di nascita:</label>
                <input type="date" name="DataNascita" value="<?php echo $riga['DataNascita'] ?>"><br/>

                <label>Corso di studi:</label>
                <input type="text" name="CdS" value="<?php echo $riga['CdS'] ?>"><br/>

                <label>Indirizzo:</label>
                <input type="text" name="Via" value="<?php echo $riga['Via'] ?>"><br/>

                <label>Numero civico:</label>
                <input type="text" name="NumeroCivico" value="<?php echo $riga['NumeroCivico'] ?>"><br/>

                <label>Città:</label>
                <input type="text" name="Citta" value="<?php echo $riga['Citta'] ?>"><br/>

                <label>CAP:</label>
                <input type="text" name="CAP" value="<?php echo $riga['CAP'] ?>"><br/>

                <label>Email:</label>
                <input type="text" name="Email" value="<?php echo $riga['Email'] ?>"><br/>

                <label>Telefono:</label>
                <input type="text" name="Telefono" value="<?php echo $riga['Telefono'] ?>"><br/>

                <br/><input type="submit" value="Procedi"><br/>
                <p><a href="index.html">Annulla e torna alla home</a></p>
            </form>
        </div>
        <!-- fine form -->

    </body>

</html>