<?php


class Reader
{

    public function printLineFile()
    {
        $righe = file("txt/routing.txt", FILE_IGNORE_NEW_LINES);
        if (!($righe)) {
            die("Impossibile aprire miofile.txt");
        }

        foreach ($righe as $riga) {
            echo "<p>", $riga, "</p>";
        }
    }
}
