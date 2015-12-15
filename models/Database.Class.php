<?php

class Database
{

    public function get($database, $mysqli)
    {
        //haal alle items uit de database
        $sql = "SELECT * FROM $database";
        $result = $mysqli->query($sql);
        return $result;
    }

    public function getLimit($database, $clickedDay, $currentDay, $mysqli)
    {
        //haal alle items met een limit uit de database
        if ($clickedDay > $currentDay) {
            $result = "error";
        } else {
            $limitNumber = $clickedDay * 5 - 10;
            $sql = "SELECT * FROM $database LIMIT $limitNumber,5";
            $result = $mysqli->query($sql);
        }
        return $result;
    }

    public function getList($database, $mysqli)
    {
        //haal alle nummers uit de database voor de Tour Top 100 lijst
        $sql = "SELECT number,artist,title FROM $database ORDER BY number";
        $result = $mysqli->query($sql);
        return $result;
    }

    public function getChart($database, $postid, $mysqli)
    {
        //haal indivitueel nummer op
        $sql = "SELECT * FROM $database WHERE number = '$postid'";
        $result = $mysqli->query($sql);
        return $result;
    }

    public function getComments($postid, $mysqli)
    {
        // haal alle reacties op op het article
        $sql = "SELECT * FROM comment WHERE postid = $postid ORDER BY id DESC";
        $result = $mysqli->query($sql);
        return $result;
    }

    public function insertComments($data, $mysqli)
    {
        // voeg een reactie toe aan de database
        $this->postid = $data[0];
        $this->name = $data[1];
        $this->email = $data[2];
        $this->website = $data[3];
        $this->comment = $data[4];
        $this->mailMe = $data[5];

        $sql = "INSERT INTO comment VALUES ('', '$this->postid', '$this->name', '$this->email', '$this->website', '$this->comment', '$this->mailMe', CURRENT_TIMESTAMP)";
        $result = $mysqli->query($sql);
        return $result;
    }

    public function insertQuestion($data, $mysqli)
    {
        // voeg een antwoord toe aan de database
        $this->postid = $data[0];
        $this->name = $data[1];
        $this->email = $data[2];
        $this->answer = $data[3];
        $this->mailMe = $data[4];

        $sql = "INSERT INTO questions VALUES ('', '$this->postid', '$this->name', '$this->email', '$this->answer', '$this->mailMe', CURRENT_TIMESTAMP)";
        $result = $mysqli->query($sql);
        return $result;
    }

    public function getDetailSongs($database, $postid, $mysqli)
    {
        // haal de 3 nummers op. Bij de detail pagina.
        $postIDMin1 = $postid - 1;
        $postIDPlus1 = $postid + 1;
        $sql = "SELECT * FROM $database WHERE number IN ($postIDMin1,$postid,$postIDPlus1) ORDER BY number ASC";
        $result = $mysqli->query($sql);
        return $result;
    }
    public function insertImagesRandom($mysqli)
    {
        // Zorg ervoor dat er overal een random image wordt toegevoegd. We gebruiken nu de Youtube Thumbnail API.
        $myList = ["sample1.jpg", "sample2.jpg", "sample3.jpg"];
        $min = 0;
        $max = 2;
        $i = 0;

        while ($i <= 100) {
            $randNum = rand($min, $max);
            $mysqli->query("UPDATE hitlist SET image = '$myList[$randNum]' WHERE number = $i");
            $i++;
        }
    }

    public function insertTextRandom($mysqli)
    {
        //zorg ervoor dat overal random informatie komt over een liedje. Dit wordt verdeeld over 5 tekstjes
        $myList = ["Zonder enige vorm van plankenkoorts betreedt Jan Smit – als lid van het koor De Zangertjes van Volendam – op tienjarige leeftijd in Volendamse klederdracht het podium om met BZN-zangeres Carola Smit het duet ‘Mama’ te zingen. Een half jaar later staat zijn naam in het Guinness Book of Records. Na The Beatles en Procol Harum is Jantje Smit de eerste Nederlander en jongste artiest ooit die op nummer één binnenkomt in de Top 40, met ‘Ik zing dit lied voor jou alleen’.", "Er wordt nog een kort uitstapje gemaakt naar Zuid-Afrika en als kersvers ambassadeur van SOS Kinderdorpen bezoekt Jantje onder meer Thailand. Na miljoenen kilometers per auto, vliegtuig en helikopter tussen Nederland, Duitsland, Oostenrijk, Zwitserland en Noord-Italië wordt op zeventienjarige leeftijd ietwat van koers veranderd. Met nieuwe liedjesschrijvers (zijn dorpsgenoten Cees Tol & Thomas Tol) wordt in eigen land aan een nieuwe start gewerkt. Daarnaast slaat de zanger zelf aan het schrijven, samen met zijn maatje Simon Keizer, die later zal doorbreken met Nick & Simon.", "Het programma ‘De Zomer Voorbij’ doet z’n intrede, waarin Jan, Nick & Simon en de 3JS ook andere gasten uit Nederland op hun vakantiebestemming ergens in Europa ontvangen. In 2007 wordt Jan vanwege stemproblemen het zwijgen opgelegd. Een operatie blijkt noodzakelijk. Naast het feit dat het om een aangeboren aandoening blijkt te gaan, geeft hij later zelf aan dat er roofbouw is gepleegd.", "In 2012 presenteert hij niet alleen ‘Het Nationale Songfestival’ (nadat hij een jaar eerder reeds voor het eerst als co-commentator van Daniel Dekker het ‘Eurovisie Songfestival’ heeft verslagen), maar 2012 is tevens een jubileumjaar. Jan Smit, nog maar 26 jaar oud, zit vijftien jaar in het vak en begint zijn eigen platenlabel, Vosound Records. Er komt een verzamelalbum, vijf jubileumconcerten in Ahoy en zijn biografie ‘Het Geheim van de Smit’ verschijnt: een bestseller. Niet alleen zijn levensverhaal is opgetekend, maar ook tal van mensen uit zijn directe omgeving vertellen. Van zijn zussen tot de roadies, van Gerard Joling tot Edwin Evers, van Nick & Simon tot Albert Verlinde.", "Op 23 augustus 2013 worden Jan en vrouw Liza ouders van een zoon: Senn. In het najaar komt het album ‘De Rockfield Sessies, Unplugged’ uit. Naast enkele Duitse songs worden ook eigen Nederlandstalige songs van de laatste tien jaar, waarvan sommige nooit op single verschenen, ontleed en akoestisch ingespeeld in de legendarische Rockfield Studios in Wales, waarin bands met wereldfaam als Queen en Oasis ook hun hits opnamen. Eind dat jaar verruilt Jan tevens de grote zalen in voor een nieuw concept: de intimiteit van de nationale theaters. Jan Smit dichtbij, dat ligt hem het best. Vader, man, mens, aaibaar en aanraakbaar, puur en entertainer, voor groot en klein publiek, voor alle lagen van de bevolking. Jan Smit is vooral van zichzelf en zijn gezin, maar een beetje van iedereen."];
        $min = 0;
        $max = sizeof($myList) - 1;
        $i = 0;

        while ($i <= 100) {
            $randNum = rand($min, $max);
            $mysqli->query("UPDATE hitlist SET content = '$myList[$randNum]' WHERE number = $i");
            $i++;
        }
    }
    public function readmore($string)
    {
        // voeg een readmore toe. Zodat niet alle tekst meteen zichtbaar is, maar wordt afgekapt met ...
        if (strlen($string) > 270) {
            $trimstring = substr($string, 0, 270) . ' ...';
        } else {
            $trimstring = $string;
        }
        return $trimstring;
    }
    public function createYoutubeThumbnail()
    {
        //Dit is een erg uitgebreide API. Ik wil hem best uitleggen, maar we hebben niet alles kunnen uploaden omdat de libary erg groot is
        include 'YTapi.php';
    }

    public function writeCurrentDayText($currentDay, $clickedDay)
    {
        // De tekst boven een pagina. Open je de dag eerder, dan zie je gisteren. Dag ervoor: eergisteren en anders de datum
        $text = "";

        switch ($currentDay) {
            case ($clickedDay < $currentDay - 2):
                $text = $clickedDay . " juli in de Radio 1 Tour Top 100";
                break;
            case ($clickedDay + 2):
                $text = "Eergister in de Radio 1 Tour Top 100";
                break;
            case ($clickedDay + 1):
                $text = "Gisteren in de Radio 1 Tour Top 100";
                break;
            case $currentDay:
                $text = "Vandaag in de Radio 1 Tour Top 100";
                break;
        }
        return $text;
    }
}