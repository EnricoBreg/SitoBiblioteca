<?php

    include_once("connection_test.php");

    // Query per EDITORI
    $ISBN               = $_POST['ISBN'];
    $TITOLO             = $_POST['Titolo'];
    $ANNOPUBBLICAZIONE  = $_POST['AnnoPubblicazione'];
    $EDITORE            = $_POST['Editore'];
    $CATEGORIA          = $_POST['Categoria'];
    $LINGUA             = $_POST['Lingua'];

    $AUTORI = $_POST['Autori'];
    $CODICEAUTORE = explode(" ", $AUTORI);


    // INSERIMENTO DEI DATI NELLA TABELLA LIBRO
    $sql = "INSERT INTO LIBRO (ISBN, Titolo, AnnoPubblicazione, CodiceE, Categoria, Lingua)
            VALUES ('$ISBN', '$TITOLO', '$ANNOPUBBLICAZIONE', '$EDITORE', '$CATEGORIA', '$LINGUA')";
    $res = mysqli_query($link, $sql);

    // controllo risultato query
    if(!$res) {
        echo "QUALCOSA E' ANDATO STORTO DURANTE L'INSERIMENTO DEI DATI DEL LIBRO <br/>QUERY: INSERT INTO LIBRO (ISBN, Titolo, AnnoPubblicazione, CodiceE, Categoria, Lingua)
        VALUES ('$ISBN', '$TITOLO', '$ANNOPUBBLICAZIONE', '$EDITORE', '$CATEGORIA', '$LINGUA') <br/>";
        echo "Assicurati che il libro che vuoi inserire non sia già presente nel DB. In caso contrario, contatta l'amministratore. Ci scusiamo per il disagio :(";
        mysqli_close($link);
        exit(-1);
    }

    // INSERIMENTO DEI DATI NELLA RELAZIONE SCRIVE
    $i = 0;
    while($CODICEAUTORE[$i] != "") {
        $COD = $CODICEAUTORE[$i];
        $sql = "INSERT INTO SCRIVE (ISBN, CodiceA) VALUES ('$ISBN', '$COD')";
        $res = mysqli_query($link, $sql);

        // controllo risultato query
        if(!$res){
            echo "QUALCOSA E' ANDATO STORTO DURANTE L'INSERIMENTO DEGLI AUTORI <br/> QUERY: INSERT INTO SCRIVE (ISBN, CodiceA) VALUES ('$ISBN', '$COD') <br/>";
            mysqli_close($link);
            exit(-2);
        }
        $i++;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione nuovo libro Passo 3 - Biblioteca Universitaria</title>
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

        <h4>PROCEDURA DI REGISTRAZIONE NUOVO LIBRO</h4>
        <h1>PASSO 3: ESITO REGISTRAZIONE</h1>

        <!-- Fields Resume list -->
        <h5>Registrazione del libro conclusa con successo! Qui sotto trovi il riepilogo dei dati inseriti</h5>
        <table class="TableStyle">
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>TITOLO</th>
                    <th>ANNO PUBBLICAZIONE</th>
                    <th>EDITORE</th>
                    <th>CATEGORIA</th>
                    <th>LINGUA</th>
                    <th>AUTOR*</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td> <?php echo $ISBN ?> </td>
                        <td> <?php echo $TITOLO ?> </td>
                        <td> <?php echo $ANNOPUBBLICAZIONE ?> </td>
                        <td> <?php echo $EDITORE ?> </td>
                        <td> <?php echo $CATEGORIA ?> </td>
                        <td> <?php echo $LINGUA ?> </td>
                        <td> 
                            <?php
                                // Tabella composta da una sola riga, gli autori vengono scritti in una sola cella
                                // uno sotto l'altro
                                $i = 0;
                                while($CODICEAUTORE[$i] != ""){
                                    $COD = $CODICEAUTORE[$i];
                                    $sql = "SELECT Nome, Cognome FROM AUTORE WHERE CodiceAutore='$COD'";
                                    $res = mysqli_query($link, $sql);
                                    while($riga = mysqli_fetch_array($res)) {
                                        echo $riga['Nome'] . " " . $riga['Cognome'] . "<br/>";
                                    }
                                    $i++;
                                }
                            ?>
                        </td>
                    </tr>
            </tbody>
        </table>

    </div>
    <!-- fine form -->

</body>

</html>

<?php 
    // Chiusura della connessione
    mysqli_close($link);
?>