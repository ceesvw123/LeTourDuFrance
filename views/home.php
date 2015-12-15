<h2 class="pageTitle"><?php echo $newDatabase->writeCurrentDayText($currentDay, $day); ?></h2>
<div class="list home clearfix">
    <?php
    if ($result == "error") {
        echo '<meta http-equiv="Refresh" content="0;URL=?page=home&day=' . $currentDay . '">';
        die;
    }
    while ($rowList = $result->fetch_assoc()) {
        //haal de comments op per item
        $resultComment = $newDatabase->getComments($rowList['number'], $mysqli);

        //laad alle items uit de database
        echo '<li>
            <div class="song_img"><a title="image" href="?page=detail&chart=' . $rowList['number'] . '"><img title="' . $rowList['artist'] . ' : ' . $rowList['title'] . '" src="http://img.youtube.com/vi/' . $rowList['embed'] . '/hqdefault.jpg" width="250" height="170"></a></div>
            <span class="rank">' . $rowList['number'] . '</span>

            <h3 class="song_tit"><a href="?page=detail&chart=' . $rowList['number'] . '">' . $rowList['artist'] . ' : ' . $rowList['title'] . '</a></h3>
            <p class="song_descr">' . $newDatabase->readmore($rowList['content']) . '</p>

            <div class="song_bot">
                <div class="c_icon"><i></i>
                    <p>[' . $resultComment->num_rows . ']</p></div>
                <a href="?page=detail&chart=' . $rowList['number'] . '" class="more">Lees meer <i></i></a>

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