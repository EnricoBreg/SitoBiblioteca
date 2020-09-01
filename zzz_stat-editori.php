<?php

    include_once("connection_test.php");

    $sql = "SELECT EDITORE.CodiceEditore, EDITORE.Nome, EDITORE.Via, EDITORE.NumeroCivico, EDITORE.Citta, EDITORE.CAP, EDITORE.Email, EDITORE.Telefono 
    FROM EDITORE,
    (SELECT count(*) AS numero_libri
    FROM LIBRO
    GROUP BY LIBRO.CodiceE
    ORDER BY numero_libri DESC
    LIMIT 1) AS MAX_VALUE,
    (SELECT LIBRO.CodiceE, count(*) AS numero_libri
    FROM LIBRO
    GROUP BY LIBRO.CodiceE) AS Editori
    WHERE MAX_VALUE.numero_libri=Editori.numero_libri AND Editori.CodiceE=EDITORE.CodiceEditore";

    $res = mysqli_query($link, $sql);

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrazione nuovo utente - Biblioteca Universitaria</title>
        <link rel="stylesheet" style="text/css" href="./myStyles.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    </head>

    <body>

        <div id="Titolo">
            <p id="titolo">BENVENUTO NEL SITO DELLA BIBLIOTECA UNIVERSITARIA DI FERRARA</p>
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

        <div id="formRes">

            <p>L'editore, di cui sono presenti più libri nel DB, è:</p>
            
            <table id="PubTableStyle">
                <thead>
                    <tr>
                        <th>Codice</th>
                        <th>Nome</th>
                        <th>Via</th>
                        <th>Numero Civico</th>
                        <th>Città</th>
                        <th>CAP</th>
                        <th>E-mail</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php while($riga = mysqli_fetch_array($res)) { ?>
                        <tr>
                            <td> <?php echo $riga['CodiceEditore']; ?> </td>
                            <td> <?php echo $riga['Nome']; ?> </td>
                            <td> <?php echo $riga['Via']; ?> </td>
                            <td> <?php echo $riga['NumeroCivico']; ?> </td>
                            <td> <?php echo $riga['Citta']; ?> </td>
                            <td> <?php echo $riga['CAP']; ?> </td>
                            <td> <?php echo $riga['Email']; ?> </td>
                            <td> <?php echo $riga['Telefono']; ?> </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <br/>
            <br/><a href="./menu.html">Indietro &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
        </div>

    </body>

</html>