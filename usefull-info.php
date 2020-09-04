<?php

    include_once("connection_test.php");
    
    // 1 - Query per trovare i tre autori con più libri scritti
    $sql = "SELECT A.Nome, A.Cognome
            FROM AUTORE AS A, 
            (SELECT SCRIVE.CodiceA, count(*) AS numero_libri
            FROM SCRIVE
            GROUP BY SCRIVE.CodiceA) AS autori,
            (SELECT count(*) AS numero_libri
            FROM SCRIVE
            GROUP BY SCRIVE.CodiceA
            ORDER BY numero_libri DESC
            LIMIT 1) AS MAX_VALUE
            WHERE A.CodiceAutore=autori.CodiceA AND autori.numero_libri=MAX_VALUE.numero_libri";
    $res1 = mysqli_query($link, $sql);

    // 2 - Query editore
    $sql = "SELECT EDITORE.Nome
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
    $res2 = mysqli_query($link, $sql);


    // 3 - Query Categoria
    $sql = "SELECT DISTINCT LIBRO.Categoria
            FROM 
            (SELECT DISTINCT count(*) AS numero_libri
            FROM LIBRO
            GROUP BY LIBRO.Categoria
            ORDER BY numero_libri DESC
            LIMIT 1) AS MAX_VALUE, 
            (SELECT LIBRO.Categoria, count(*) AS numero_libri
            FROM LIBRO
            GROUP BY LIBRO.Categoria) AS CATEGORIE,
            LIBRO
            where MAX_VALUE.numero_libri=CATEGORIE.numero_libri";
    $res3 = mysqli_query($link, $sql);


    // 4 - Query lingue
    $sql = "SELECT DISTINCT LINGUE.Lingua, LINGUE.numero_libri
            FROM 
            (SELECT DISTINCT COUNT(*) AS numero_libri
            FROM LIBRO
            GROUP BY LIBRO.Lingua
            ORDER BY numero_libri DESC
            LIMIT 5) AS MAX_VALUE, 
            (SELECT LIBRO.Lingua, COUNT(*) AS numero_libri
            FROM LIBRO
            GROUP BY LIBRO.Lingua) AS LINGUE
            WHERE MAX_VALUE.numero_libri=LINGUE.numero_libri
            ORDER BY LINGUE.numero_libri DESC";
    $res4 = mysqli_query($link, $sql);

    // 5 - Query per anno di pubblicazione massima
    $sql = "SELECT DISTINCT ANNI_COUNT.AnnoPubblicazione
            FROM 

                (SELECT DISTINCT count(*) AS numero_libri
                FROM LIBRO
                GROUP BY LIBRO.AnnoPubblicazione
                ORDER BY numero_libri DESC
                LIMIT 1) AS MAX_VALUE, 

                (SELECT LIBRO.AnnoPubblicazione, count(*) AS numero_libri
                FROM LIBRO
                GROUP BY LIBRO.AnnoPubblicazione) AS ANNI_COUNT

            WHERE MAX_VALUE.numero_libri=ANNI_COUNT.numero_libri";
    $res5 = mysqli_query($link, $sql);

    // 6 - Query per trovate la/le biblioteca/biblioteche con numero massimo di prestiti attivi
    $sql = "SELECT DISTINCT BIBLIOTECA.CodiceBiblioteca, BIBLIOTECA.NomeDipartimento
            FROM BIBLIOTECA,

                (SELECT DISTINCT count(*) AS numero_prestiti
                FROM PRESTITO
                GROUP BY PRESTITO.CodiceB
                ORDER BY numero_prestiti DESC
                LIMIT 1) AS MAX_VALUE,

                (SELECT PRESTITO.CodiceB, count(*) AS numero_prestiti
                FROM PRESTITO
                GROUP BY PRESTITO.CodiceB) AS PRESTITI

            WHERE MAX_VALUE.numero_prestiti=PRESTITI.numero_prestiti AND PRESTITI.CodiceB=BIBLIOTECA.CodiceBiblioteca";
    $res6 = mysqli_query($link, $sql);

    // 7 - Query per categoria massima libri pubblicati
    $sql = "SELECT DISTINCT CATEGORIE_COUNT.Categoria
            FROM 

                (SELECT DISTINCT count(*) AS numero_libri
                FROM LIBRO
                GROUP BY LIBRO.Categoria
                ORDER BY numero_libri DESC
                LIMIT 1) AS MAX_VALUE, 

                (SELECT LIBRO.Categoria, count(*) AS numero_libri
                FROM LIBRO
                GROUP BY LIBRO.Categoria) AS CATEGORIE_COUNT

            WHERE MAX_VALUE.numero_libri=CATEGORIE_COUNT.numero_libri";
    $res7 = mysqli_query($link, $sql);

    // 8 - Query per categoria massima libri in prestito
    $sql = "SELECT DISTINCT LIBRO.Categoria
            FROM LIBRO,

                (SELECT DISTINCT count(*) AS numero_prestiti
                FROM PRESTITO, LIBRO
                WHERE PRESTITO.ISBN = LIBRO.ISBN
                GROUP BY LIBRO.Categoria
                ORDER BY numero_prestiti DESC
                LIMIT 1) AS MAX_VALUE, 

                (SELECT LIBRO.Categoria, count(*) AS numero_prestiti
                FROM PRESTITO, LIBRO
                WHERE PRESTITO.ISBN = LIBRO.ISBN
                GROUP BY LIBRO.Categoria) AS PRESTITI_CAT_COUNT

            WHERE MAX_VALUE.numero_prestiti = PRESTITI_CAT_COUNT.numero_prestiti AND LIBRO.Categoria = PRESTITI_CAT_COUNT.Categoria";
    $res8 = mysqli_query($link, $sql);

    // 9 - Query per trovare il giorno che si sono prestati più libri
    $sql = "SELECT CONTO_PRESTITI.DataPrestito
            FROM
                (SELECT PRESTITO.DataPrestito, count(*) AS prestiti_fatti
                FROM PRESTITO
                GROUP BY PRESTITO.DataPrestito) AS CONTO_PRESTITI,

                (SELECT count(*) AS prestiti_fatti
                FROM PRESTITO
                GROUP BY PRESTITO.DataPrestito
                ORDER BY prestiti_fatti DESC
                LIMIT 1) AS MAX_VALUE

            WHERE CONTO_PRESTITI.prestiti_fatti = MAX_VALUE.prestiti_fatti";
    $res9 = mysqli_query($link, $sql);

    // 10 - Query per trovare il CdS col numero massimo di prestiti attivi
    $sql = "SELECT PRESTITI_STUDENTI.CdS
            FROM

                (SELECT STUDENTE.CdS, count(*) AS prestiti_a_cds
                FROM PRESTITO, STUDENTE
                WHERE PRESTITO.Matricola = STUDENTE.Matricola
                GROUP BY STUDENTE.CdS) AS PRESTITI_STUDENTI,

                (SELECT count(*) AS prestiti_a_cds
                FROM PRESTITO, STUDENTE
                WHERE PRESTITO.Matricola = STUDENTE.Matricola
                GROUP BY STUDENTE.CdS
                ORDER BY prestiti_a_cds DESC
                LIMIT 1) AS MAX_VALUE

            WHERE MAX_VALUE.prestiti_a_cds = PRESTITI_STUDENTI.prestiti_a_cds";
    $res10 = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html>

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Statistichiamo... - Biblioteca Universitaria</title>
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

        <div id="formRes">

            <br/><a href="./menu.html">Indietro &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>
            <h1>ALCUNE CURIOSITÀ ED INFORMAZIONI UTILI...</h1>
            <p>Se vi sono più risultati significa che vi è un pari numero di 'oggetti' relativi a quella informazione</p>
            
            <!-- Query 1 -->
            <p>1) Gli autori di cui possediamo più libri:</p> 
            <b>
            <ol><?php while($riga1 = mysqli_fetch_array($res1)) { ?>
                <li> <?php echo $riga1['Nome'] . " " . $riga1['Cognome'] ?> </li>
                <?php } ?>
            </ol>
            </b>

            <!-- Query 2 -->
            <p>2) L'editore di cui possediamo più libri:</p>
            <ul>
            <?php while($riga2 = mysqli_fetch_array($res2)) {?>
                <li><b><?php echo $riga2["Nome"]; ?></b></li>
            <?php }?>
            </ul>


            <!-- Query 3 -->
            <p>3) Le categorie, in ordine descrescente, che presentano in assoluto più libri:</p>
            <b>
            <ol>
                <?php while($riga3 = mysqli_fetch_array($res3)) { ?>
                <li> <?php echo $riga3['Categoria'] ?> </li>
                <?php } ?>
            </ol>
            </b>

            <!-- Query 4 -->
            <p>4) Classifica delle lingue più comuni:</p>
            <table id="lang-table">
                <thead>
                    <th># </th>
                    <th>Numero libri</th>
                    <th>Lingua/e</th>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    while($riga4 = mysqli_fetch_array($res4)) {
                        if($iter != 0){

                            if($val == $riga4['numero_libri']){
                                echo $riga4['Lingua'] . "<br/>";
                            }
                            else {
                                $val = $riga4['numero_libri'];
                                ?>  </td> </tr> <tr>
                                    <td><?php $pos++; echo $pos; ?></td>
                                    <td><?php echo $riga4['numero_libri']; ?></td>
                                    <td><?php echo $riga4['Lingua'] . "<br/>"; ?> 
                                <?php
                            }
                        }
                        else {
                            // eseguito solo alla prima iterazione
                            $pos = 1; ?>
                            <td><?php echo $pos; ?></td>
                            <td><?php echo $riga4['numero_libri']; ?></td>
                            <td><?php echo $riga4['Lingua']; ?>
                            <?php
                        }
                        $iter++;
                        ?> <?php
                    } // fine while
                ?>
                </td>
                </tr>
                </tbody>
            </table>
            
            <!-- Query 5 -->
            <p>5) La maggior parte dei libri nella nostra collezione sono stati pubblicati nel </p>
            <ul>
                <?php while($riga5 = mysqli_fetch_array($res5)) { ?>
                    <li><b><?php echo $riga5["AnnoPubblicazione"]; ?></b></li>
                <?php } ?>
            </ul>
            
            <!-- Query 6 -->
            <p>6) La/Le biblioteca/biblioteche con il numero massimo di prestiti attivi è/sono: </p>
            <ul>
            <?php while($riga6 = mysqli_fetch_array($res6)) {?>
                <li><b><?php echo $riga6["CodiceBiblioteca"] . " - " . $riga6["NomeDipartimento"]; ?></b></li>
            <?php } ?>
            </ul>
            
            <!-- Query 7 -->
            <p>7) Il libri in collezione sono prevalentemente di</p>
            <ul>
                <?php while($riga7 = mysqli_fetch_array($res7)) { ?>
                    <li><b><?php echo $riga7["Categoria"]; ?></b></li>    
                <?php } ?>
            </ul>
            
            <!-- Query 8 -->
            <p>8) La maggior parte dei libri attualmente in prestito sono di</p>
            <ul>
                <?php while($riga8 = mysqli_fetch_array($res8)) { ?>
                    <li><b><?php echo $riga8["Categoria"]; ?></b></li>
                <?php } ?>
            </ul>
            
            <!-- Query 9 -->
            <p>9) Il giorno che si sono prestati più libri è il giorno (AAAA/MM/GG)</p>
            <ul>
                <?php while($riga9 = mysqli_fetch_array($res9)) { ?>
                    <li><b><?php echo $riga9["DataPrestito"]; ?></b></li>
                <?php } ?>
            </ul>
            
            <!-- Query 10 -->
            <p>10) Il (I) CdS col il maggior numero di prestiti attivi è (sono)</p>
            <ul>
                <?php while($riga10 = mysqli_fetch_array($res10)) { ?>
                    <li><b><?php echo $riga10["CdS"]; ?></b></li>
                <?php } ?>
            </ul>

            <!-- links -->
            <a href="./menu.html">Indietro &#x2934;</a> | <a href="./index.html">Ritorna all HOME</a><br/>

        </div>

    </body>

</html>

<?php
    mysqli_close($link);
?>