<?php

$do_bazy = mysqli_connect('localhost','root','','egzamin');

if(!$do_bazy)
{
    echo "Błąd połączenia z serwerem MySQL";

    exit;
}
else
{
    $zapytanie=mysqli_query($do_bazy,'SELECT nazwaPliku, podpis FROM zdjecia ORDER BY 2;');

    if(!$zapytanie)
    {
        mysqli_close($do_bazy);
        echo "Blad w zapytaniu <br>";

        exit;
    }
    else
    {
        echo "<h3>W tym roku wyjedziemy do: </h3>";

        while($wiersze=mysqli_fetch_array($zapytanie))
        {
            echo "<img src='$wiersze[nazwaPliku]' title='$wiersze[podpis]' height='120px'>";
        }

        mysqli_close($do_bazy);
    }

    $zapytanie2=mysqli_query($do_bazy,'SELECT dataWyjazdu, cel FROM wycieczki ORDER BY 2;');

    if(!$zapytanie)
    {
        mysqli_close($do_bazy);
        echo "Blad w zapytaniu <br>";

        exit;
    }
    else
    {
        echo "<h3>W poprzednich latach byliśmy... </h3>";

        while($wiersze2=mysqli_fetch_array($zapytanie))
        {
            echo "Dnia ".$wiersze2[dataWyjazdu]." pojechaliśmy do ".$wiersze2[cel]."<br>";
        }

        mysqli_close($do_bazy);
    }
    
}

?>