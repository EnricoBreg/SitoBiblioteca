<?php

    include_once("connection_test.php");

    // Query per EDITORI
    $sql = "SELECT CodiceEditore, Nome FROM EDITORE";
    $res1 = mysqli_query($link, $sql);

    // Query per categoria libro
    $sql = "SELECT DISTINCT Categoria FROM LIBRO ORDER BY Categoria";
    $res2 = mysqli_query($link, $sql);


    // Query per categoria lingua
    $sql = "SELECT DISTINCT Lingua FROM LIBRO ORDER BY Lingua";
    $res3 = mysqli_query($link, $sql);

    mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrazione nuovo libro Passo 1 - Biblioteca Universitaria</title>
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
        <form action="book-signup-2.php" method="POST">
            <a href="./menu.html">Menù &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <h4>PROCEDURA DI REGISTRAZIONE NUOVO LIBRO</h4>
            <h1>PASSO 1: INSERISCI I DATI DEL LIBRO</h1>
            <p>(*)Campi obbligatori</p>
            <p>Se i dati da inserire presentano dei singoli apici/apostrofi ( ' ) sostituirli con uno spazio.<br/>
            Ad esempio:
            <ul>
            <li>Giovanna D'Arco &#x2192; Giovanna D Arco</li>
            <li>L'Aquila &#x2192; L Aquila</li></p>
            </ul>
            
            <!-- Fields Insert -->
            <label>ISBN:*</label><br/>
            <input required type="text" name="ISBN" maxlength="11" placeholder="es. XXXXXXXXX-X"><br/>

            <label>Titolo:*</label><br/>
            <input required type="text" name="Titolo" placeholder="es. Una giornata nell Antica Roma"><br/>

            <label>Anno Pubblicazione:*</label><br/>
            <input required type="text" name="AnnoPubblicazione" placeholder="es. 2007"><br/>
            
            <label>Editore:*</label>
            <select required name="Editore" class="selectStyle">
                <option value=""> --- SELEZIONA EDITORE --- </option>

                <?php while($riga1 = mysqli_fetch_array($res1)) { ?>
                    <option value="<?php echo $riga1['CodiceEditore'] ?>"> <?php echo $riga1['CodiceEditore'] . " - " . $riga1['Nome']?> </option>
                <?php } ?>
            
            </select><p class="text-advs">&#x2192; Editore non presente nella lista? <a href="pub-reg.php">Clicca qui</a>, per registrarlo!</p>


            <label>Categoria:*</label>
            <input required list="Categoria" name="Categoria" class="selectStyle" placeholder="--- SELEZIONARE CATEGORIA ---">
            <datalist id="Categoria">

                <?php while($riga2 = mysqli_fetch_array($res2)) { ?>
                    <option value="<?php echo $riga2['Categoria'] ?>">
                <?php } ?>

            </datalist><br/>

            <label>Lingua:*</label>
            <select required name="Lingua" class="selectStyle">
                
                <?php while($riga3 = mysqli_fetch_array($res3)) { ?>
                    <option value="<?php echo $riga3['Lingua'] ?>"> <?php echo $riga3['Lingua'] ?> </option>
                <?php } ?>

            </select><br/>            

            <br/><input type="submit" value="Continua al passo 2"><br/>
        </form>
    </div>
    <!-- fine form -->

</body>

</html>