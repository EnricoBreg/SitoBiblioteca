<?php 

    include_once("connection_test.php");

    $sql = "SELECT Matricola, Nome, Cognome, DataNascita, CdS, Email, Telefono
            FROM STUDENTE";
    
    $res = mysqli_query($link, $sql);

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

        <!-- inizio form -->
        <div id="form">
            <!-- Form per ricerca studente tramite codice matricola -->
            <form action="user-search-2.php" method="POST">

                <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
                <h1>RICERCA UNO STUDENTE PER CODICE MATRICOLA</h1>
                <p>(*)Campi obbligatori</p>
                <p>Inserisci la Matricola studente che vuoi cercare:</p>
                <!-- Inserimento -->
                <label>Matricola:*</label>
                <input required type="text" name="MATRICOLA" placeholder="123456"><br/>

                <br/><input type="submit" value="Ricerca"><br/>

            </form>

            <!-- Form per ricerca studente tramite Nome o Cognome -->
            <form action="user-search-3.php" method="GET">
                
                <h1>OPPURE... RICERCA UNO STUDENTE PER NOME O COGNOME</h1>
                <p>(*)Campi obbligatori</p>
                <p>Inserisci (anche parzialmente) il nome o il cognome dello studente che vuoi ricercare.</p>

                <!-- Inserimento -->
                <label>Nome o Cognome:</label>
                <input required type="text" name="NomCogn" placeholder="es. Alberto, Alb, Angela, Ang"><br/>

                <br/><input type="submit" value="Ricerca"><br/>                

            </form>
        
        </div>
        <!-- fine form -->

    </body>

</html>