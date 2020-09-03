<?php

    include_once("connection_test.php");

    // Query per selezionare l'ultimo CodiceEditore inserito
    $sql = "SELECT CodiceEditore FROM EDITORE ORDER BY CodiceEditore";
    $res = mysqli_query($link, $sql);
    
    $max = 0;
    while($riga = mysqli_fetch_array($res)) {
        $CodiceEditore = $riga['CodiceEditore'];
        if($max < $CodiceEditore) {
            $max = $CodiceEditore;
        }
    }
    $NuovoCodiceEditore = $max + 1;
    
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inserimento nuovo editore - Biblioteca Universitaria</title>
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
        <form action="inserimento-editore.php" method="POST">
            <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <h1>INSERISCI UN NUOVO EDITORE: </h1>
            <p>(*)Campi obbligatori</p>
            <p>Se i dati da inserire presentano dei singoli apici/apostrofi ( ' ) sostituirli con uno spazio.<br/>
            Ad esempio:
            <ul>
            <li>Giovanna D'Arco &#x2192; Giovanna D Arco</li>
            <li>L'Aquila &#x2192; L Aquila</li></p>
            </ul>
            
            <!-- Fields Insert -->
            <label>Codice Editore:*</label><br/>
            <input required readonly type="text" name="CodiceEditore" value="<?php echo $NuovoCodiceEditore ?>"><br/>

            <label>Nome:*</label><br/>
            <input required type="text" name="Nome" placeholder="es. Pst Edizioni"><br/>

            <label>Via:*</label><br/>
            <input required type="text" name="Via" placeholder="es. Via degli Editori Riuniti"><br/>
            
            <label>Numero civico:*</label>
            <input required type="text" name="NumeroCivico" placeholder="es. 8"><br/>

            <label>Città:*</label>
            <input required type="text" name="Citta" placeholder="es. Milano"><br/>            

            <label>CAP:*</label>
            <input required type="text" name="CAP" placeholder="es. 20157"><br/>

            <label>Email (N/D se non disponibile o non dichiarato):*</label>
            <input required type="text" name="Email" placeholder="es. info@pst-edizioni.it">

            <label>Telefono (N/D se non disponibile o non dichiarato):*</label>
            <input required type="text" name="Telefono" placeholder="es. 02-546722">

            <br/><input type="submit" value="Conferma"><br/>
        </form>
    </div>
    <!-- fine form -->

</body>

</html>