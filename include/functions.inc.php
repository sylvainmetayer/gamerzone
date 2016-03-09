<?php
    function getEnglishDate($date)
    {
        $membres = explode('/', $date);
        var_dump($membres);
        $date = $membres[2].'-'.$membres[1].'-'.$membres[0];

        return $date;
    }
