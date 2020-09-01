<?php

    include_once("connection_test.php");

    $sql = "SELECT * FROM EDITORE ORDER BY CodiceEditore";

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
        <title>Tutti gli editori - Biblioteca Universitaria</title>
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

        <div id="formRes">

            <br/><a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME &#x2934;</a><br/>
            <p>Tutti gli Editori dei libri della nostra Biblioteca:</p>
            
            <table id="TableStyle">
                <thead>
                    <tr>
                        <th>Codice ID</th>
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
            <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME &#x2934;</a><br/>
        </div>

    </body>

</html>