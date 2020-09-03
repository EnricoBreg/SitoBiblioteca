<?php

    include_once("connection_test.php");

    // Query per Dati biblioteca
    $sql = "SELECT CodiceBiblioteca, NomeDipartimento
            FROM BIBLIOTECA";
    $res = mysqli_query($link, $sql);

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione nuovo copia (libro esistente) - Biblioteca Universitaria</title>
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
        <form action="registra-copia-2.php" method="POST">
            <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <h4>PROCEDURA DI REGISTRAZIONE NUOVO COPIA (LIBRO ESISTENTE)</h4>
            <h1>INSERISCI I DATI DELLA COPIA</h1>
            <p>(*)Campi obbligatori</p>
            
            <!-- Inserimento dati -->
            <label>ISBN:*</label><br/>
            <input required type="text" name="ISBN" maxlength="11" placeholder="es. XXXXXXXXX-X"><br/>
            
            <p class="text-advs">&#x2192; Non hai ancora registrato i dati del libro? <a href="book-sigin-1.php">Clicca qui</a>, per farlo!</p>  

            <label>Scaffale:*</label>
            <input required type="text" name="Scaffale" placeholder="es. A421">

            <label>Codice Biblioteca:*</label>
            <select name="CodiceBiblioteca" class="selectStyle">
                <?php while($riga = mysqli_fetch_array($res)) { ?>
                    <option value="<?php echo $riga['CodiceBiblioteca']; ?>"><?php echo $riga['CodiceBiblioteca'] . " - " . $riga['NomeDipartimento'];?></option>
                <?php } ?>
            </select>
            

            <br/><input type="submit" value="Conferma"><br/>
        </form>
    </div>
    <!-- fine form -->

</body>

</html>