<h2 class="pageTitle">Complete Tour Top <img class="top100screenlogo" src="img/top100logo.png"><a href="content/pdf/Lijst.pdf"><img class="ikbencees" style="float: right" src="img/top100pdf.png"></a></h2>

<div class="list top100 clearfix">

    <?php
    //zorg ervoor dat de lijst wordt opgehaald met alle nummers. Deze worden t/m nummer 27 geplaatst met een andere class dan 28-100
    $i = 0;
    while ($rowList = $result->fetch_assoc()) {
        if($i >= 27){
            echo '<div class="top100item">';
        }else{
            echo '<div class="top100item active">';
        }

        echo '<span class="rank">' . $rowList['number'] . '</span>

            <div><a href="?page=detail&chart=' . $rowList['number'] . '">' . $rowList['artist'] . ' - ' . $rowList['title'] . '</a></div>
        </div>';
        $i++;
    }
    ?>
</div>