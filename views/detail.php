<h2 class="pageTitle">In de Radio 1 Tour Top 100</h2>
<div class="list songPage">

    <li>
        <div class="clearfix">


            <?php

            include 'models/DetailFormSubmit.php';

            ?>

        </div>

        <?php


        while ($rowList = $result->fetch_array()) {
            echo '

        <div class="song_media">
                    <iframe width="100%" height="100%" src="//www.youtube.com/embed/' . $rowList['embed'] . '" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="song_descr">' . $rowList['content'] . '</div>
            </li>';
        }

        ?>

        <div class="commentsForm clearfix">
            <h2>Reageer op dit bericht</h2>

            <form method="post" class="clearfix">
                <label>Naam</label>
                <input type="text" name="name" required>
                <label>E-mail <span>(wordt niet vermeld)</span></label>
                <input type="email" name="email" required>
                <label>Website</label>
                <input type="text" name="website">
                <label>Reactie</label>
                <textarea name="message" required></textarea>

                <div class="checkbox">
                    <input type="checkbox" name="remember" value="1">Gegevens onthouden<br>
                    <input type="checkbox" name="mailMe" value="1">Mail me bij nieuwe reactie
                </div>
                <div class="submitCom">
                    <input type="submit" name="submitForm" id="submitBtn" value="PLAATSEN">
                </div>
            </form>
        </div>
        <div class="reactions clearfix">
            <h2>Reacties op dit bericht [<?php echo $resultComment->num_rows; ?>]</h2>
            <?php
            while ($rowCommentLoop = $resultComment->fetch_assoc()) {
                echo '<div class="comment">
                <p id="title">' . $rowCommentLoop['name'] . '</p>
                <p id="date">' . $rowCommentLoop['date'] . '</p>
                <p id="content">' . $rowCommentLoop['comment'] . '</p>
                <p id="warning"><a href="#" id="warning" onClick="warningComment();"><img src="../img/exclamation31.svg" width="13"> Waarschuw de redactie over dit bericht</a></p>
            </div>';
            }
            ?>
        </div>
</div>