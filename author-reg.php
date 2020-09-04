<?php

    include_once("connection_test.php");

    // Query per selezionare l'ultimo CodiceAutore inserito
    $sql = "SELECT CodiceAutore FROM AUTORE ORDER BY CodiceAutore";
    $res = mysqli_query($link, $sql);
    
    $max = 0;
    while($riga = mysqli_fetch_array($res)) {
        $CodiceAutore = $riga['CodiceAutore'];
        if($max < $CodiceAutore) {
            $max = $CodiceAutore;
        }
    }
    $NuovoCodiceAutore = $max + 1;
    
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione nuovo autore - Biblioteca Universitaria</title>
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
    <div id="form">
        <form action="inserimento-autore.php" method="POST">
            <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <h1>INSERISCI UN NUOVO AUTORE: </h1>
            <p>(*)Campi obbligatori</p>
            <p>Se i dati da inserire presentano dei singoli apici/apostrofi ( ' ) sostituirli con uno spazio.<br/>
            Ad esempio:
            <ul>
            <li>Giovanna D'Arco &#x2192; Giovanna D Arco</li>
            <li>L'Aquila &#x2192; L Aquila</li></p>
            </ul>
            
            <!-- Fields Insert -->
            <label>Codice Autore:*</label><br/>
            <input required readonly type="text" name="CodiceAutore" value="<?php echo $NuovoCodiceAutore ?>"><br/>

            <label>Nome:*</label><br/>
            <input required type="text" name="Nome" placeholder="es. Alberto"><br/>

            <label>Cognome:*</label><br/>
            <input required type="text" name="Cognome" placeholder="es. Angela"><br/>
            
            <label>Data di Nascita:*</label>
            <input required type="date" name="DataNascita"><br/>

            <label>Luogo di Nascita:*</label>
            <input required type="text" name="LuogoNascita" placeholder="es. Parigi">            

            <br/><input type="submit" value="Conferma"><br/>
        </form>
    </div>
    <!-- fine form -->

</body>

</html>