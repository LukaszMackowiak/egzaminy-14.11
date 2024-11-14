<?php

$do_bazy = mysqli_connect('localhost','root','','biblioteka');

if(!$do_bazy)
{
    echo "Błąd połączenia z serwerem MySQL";

    exit;
}
else
{
    $zapytanie=mysqli_query($do_bazy,'select imie, nazwisko from autorzy order by nazwisko;');

    if(!$zapytanie)
    {
        mysqli_close($do_bazy);
        echo "Blad w zapytaniu <br>";

        exit;
    }
    else
    {
        echo "<h3> Polecamy dzieła autorów </h3>";
        echo "<ol>";

        // mysqli_fetch_array pobiera dane to tablicy asocjacyjnej, indeksami są kolumny

        while($wiersze=mysqli_fetch_array($zapytanie))
        {
            echo "<li>"."$wiersze[imie]"." "."$wiersze[nazwisko]"."</li>";
        }
        echo "</ol>";
        mysqli_close($do_bazy);
    }
}


?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>egzamin</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="biblioteka.php" method="post">
            <label for="imie">Imię:<input type="text" name="imie" id="imie"></label><br>
            <label for="nazwisko">Nazwisko:<input type="text" name="nazwisko" id="nazwisko"></label><br>
            <label for="symbol">Symbol:<input type="number" name="symbol" id="symbol"></label><br>
            <input type="submit" value="Wyślij" name="Wyślij">
        </form>


<?php
$do_bazy = mysqli_connect('localhost','root','','biblioteka');

if(!$do_bazy)
{
    echo "Błąd połączenia z serwerem MySQL";

    exit;
}
else
{

    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $symbol=$_POST['symbol'];
    $dodaj="INSERT INTO czytelnicy (imie,nazwisko,kod) VALUES ('$imie','$nazwisko','$symbol')";

    $zapytanie=mysqli_query($do_bazy,$dodaj);
    if(!$zapytanie===true)
    {
        echo "Nowy klient nie został dodany do bazy";
    }
    else
    {
        echo "czytelnik ".$nazwisko." ".$imie." został dodany do bazy.";
    }
    mysqli_close($do_bazy);
    
}

?>

</body>
</html>