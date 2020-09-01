<?php
    include_once("connection_test.php");

    $iter = 0;
    $val = 0;
    $lingua = "";


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
    $res = mysqli_query($link, $sql);

    ?>
    <table>
        <thead>
            <td>Numero libri</td>
            <td>Lingua/e</td>
        </thead>
        <tbody>
            <tr>
            <?php
            while($riga = mysqli_fetch_array($res)) {
                if($iter != 0){

                    if($val == $riga['numero_libri']){
                        echo ", " . $riga['Lingua'];
                    }
                    else {
                        $val = $riga['numero_libri'];
                        ?>  </td> </tr> <tr>
                            <td> <?php echo $riga['numero_libri'] ?> </td>
                            <td> <?php echo $riga['Lingua'] ?> 
                        <?php
                    }
                }
                else {
                    // eseguito solo alla prima iterazione
                    ?>
                    <td> <?php echo $riga['numero_libri'] ?></td>
                    <td> <?php echo $riga['Lingua'] ?>
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
    <?php

    mysqli_close($link);
?>