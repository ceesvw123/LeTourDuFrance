<h2 class="pageTitle">Tour Top lijsten van BN'ers</h2>
<div class="list home clearfix">
    <?php
    //zorg ervoor dat de bners items worden opgehaald uit de database. Hier word een foto en een tekst toegevoegd. De tekst wordt nog gekoppelt aan de functie readmore

    while ($rowList = $result->fetch_assoc()) {
        echo '<li>
            <div class="song_img"><img title="' . $rowList['title'] . '" src="content/images/bners/' . $rowList['image'] . '" width="250" height="170"></div>

            <h3 class="bnrs_tit"><a>' . $rowList['title'] . '</a></h3>
            <p class="song_descr">' . $newDatabase->readmore($rowList['content']) . '</p>

            <div class="song_bot">
                <div class="c_icon"><i></i>
                    <p>' . rand(0, 4) . '</p></div>
                <p class="more">Lees meer<i></i></p>

                <div class="social">
                    <a class="facebook" href="https://www.facebook.com/letour/"></a>
                    <a class="twitter" href="https://twitter.com/letour"></a>
                    <a class="mail" href="mailto:info@radio1.nl"></a>
                </div>
            </div>
        </li>';
    }
    ?>
</div>