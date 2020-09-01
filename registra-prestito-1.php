<?php
    include_once("./connection_test.php");

    $MAX_ID = 0;
    $ID = 0;


    $sql = "SELECT CodiceBiblioteca, NomeDipartimento 
            FROM BIBLIOTECA
            ORDER BY NomeDipartimento";

    $res1 = mysqli_query($link, $sql);
    
    $sql = "SELECT ID 
            FROM PRESTITO";

    $res2 = mysqli_query($link, $sql);
    
    while($riga = mysqli_fetch_array($res2)) {
        if($riga['ID'] != "") {
            $ID = $riga['ID'];
            if($MAX_ID < $ID){
                $MAX_ID = $ID;
            }
        }
    }
    $MAX_ID++; // Incremento per evitare conflitto di chiavi primarie

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrazione nuovo prestito - Biblioteca Universitaria</title>
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
            <form action="registra-prestito-2.php" method="POST">
                <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
                <h1>REGISTRA NUOVO PRESTITO</h1>
                <p>(*)Campi obbligatori</p>

                <label>ID Prestito:*</label><br/>
                <input readonly name="ID" type="text" value="<?php echo $MAX_ID; ?>"><br/>

                <label>Data:*</label><br/>
                <input required type="date" name="Data"><br/>

                <label>ISBN:*</label>
                <input required type="text" name="ISBN"><br/>

                <label>Numero Interno Copia:*</label><br/>
                <input required type="text" name="NumeroCopia"><br/>

                <label>Matricola Studente richiedente prestito:*</label><br/>
                <input required type="text" name="Matricola"><br/>

                <label>Codice Biblioteca:* </label>
                <select required name="CodiceBiblioteca" class="selectStyle">

                    <?php while($riga = mysqli_fetch_array($res1)) { ?>
                        <option value="<?php echo $riga['CodiceBiblioteca']; ?>"> <?php echo $riga['CodiceBiblioteca'] . " - " . $riga['NomeDipartimento'] ?> </option>
                    <?php } ?>

                </select>

                <br/><input type="submit" value="Conferma nuovo prestito"><br/>
            </form>
        </div>
        <!-- fine form -->

    </body>

</html>