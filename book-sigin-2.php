<?php

    include_once("connection_test.php");

    // Query per EDITORI
    $ISBN               = $_POST['ISBN'];
    $TITOLO             = $_POST['Titolo'];
    $ANNOPUBBLICAZIONE  = $_POST['AnnoPubblicazione'];
    $EDITORE            = $_POST['Editore'];
    $CATEGORIA          = $_POST['Categoria'];
    $LINGUA             = $_POST['Lingua'];

    $sql = "SELECT * FROM AUTORE";
    $res = mysqli_query($link, $sql);

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione nuovo libro Passo 2 - Biblioteca Universitaria</title>
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
        <form action="book-sigin-3-fin.php" method="POST">
            <h4>PROCEDURA DI REGISTRAZIONE NUOVO LIBRO</h4>
            <h1>PASSO 2: INSERISCI I CODICI AUTORI</h1>
            
            <!-- Fields Resume list -->
            <label>ISBN:</label><br/>
            <input readonly type="text" name="ISBN" value="<?php echo $ISBN ?>"><br/>

            <label>Titolo:</label><br/>
            <input readonly type="text" name="Titolo" value="<?php echo $TITOLO ?>"><br/>

            <label>Anno Pubblicazione:</label><br/>
            <input readonly type="text" name="AnnoPubblicazione" value="<?php echo $ANNOPUBBLICAZIONE ?>"><br/>
            
            <label>Editore:</label>
            <input readonly type="text" name="Editore" value="<?php echo $EDITORE ?>">

            <label>Categoria:</label>
            <input readonly type="text" name="Categoria" value="<?php echo $CATEGORIA ?>"><br/>

            <label>Lingua:</label>
            <input readonly type="text" name="Lingua" value="<?php echo $LINGUA ?>">

            <!-- Inserimento autori -->
            <label>Codice autore (se il libro presenta più di un autore, inserire i codici separati da spazi):</label>
            <input required type="text" name="Autori" placeholder="es. 1 oppure 10 30 133...">
            
            <br/><input type="submit" value="Conferma e termina"><br/>

            <p>Autore non presente? Vai a questo <a href="./author-reg.php">link</a> per registrarlo.</p>
            <p>Tutti gli autori presenti nel DataBase con relativo codice autore: </p>
            <table id="TableStyle">
                <thead>
                    <tr>
                        <th>ID Autore</th>
                        <th>Nominativo</th>
                        <th>Data di nascita</th>
                        <th>Luogo di nascita</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php while($riga = mysqli_fetch_array($res)) { ?>
                        <tr>
                            <td> <?php echo $riga['CodiceAutore']; ?> </td>
                            <td> <?php echo $riga['Nome'] . " " . $riga['Cognome']; ?> </td>
                            <td> <?php echo $riga['DataNascita']; ?> </td>
                            <td> <?php echo $riga['LuogoNascita']; ?> </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </form>
    </div>
    <!-- fine form -->

</body>

</html>