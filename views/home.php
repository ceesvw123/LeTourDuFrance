Vandaag in de Radio 1 Tour Top 100<hr><br>

<?php
while ($rijNieuws = $result->fetch_array()) {
    echo '<img src="content/images/articles/' . $rijNieuws['image'] . '" style="position: absolute;width: 200px;margin-left: 50px;margin-top: 10px;">';
    echo '<h2 style="position: absolute;margin-left: 270px;">' . $rijNieuws['title'] . '</h2>';
    echo '<h3 style="position: absolute;right: 250px;">' . $rijNieuws['date'] . '</h3>';
    echo '<h4 style="position: absolute;margin-left: 270px;width: 750px;margin-top: 60px;">' . $rijNieuws['content'] . '</h4>';
    echo '<hr style="margin-bottom: 150px;color: red">';
}