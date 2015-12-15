
<h2 class="pageTitle">Prijsvraag</h2>

<div class="list home clearfix">
    <?php
    include 'models/QuestionFormSubmit.php';
    ?>
    <div class="song_img">
        <img src="content/images/questions/question1.jpg" width="250" height="170">
    </div>

    <span class="rank">71</span>

    <h3 class="song_tit"><a>Carla Bruni : Quelqu’un m’a dit</a></h3>

    <p class="song_descr">
        <span class="bold">Meedoen kan tot 12 juni 2011</span><br>
        De voormalige presidentsvrouw Carla Bruni krijgt de taak om de Fransen uit hun Renaults, Citroëns en Peugeots te
        halen en te leiden naar auto's van de Amerikaanse producent Ford. Bruni verschijnt in een video waarin ze haar
        gitaar aan de wilgen hangt en coach wordt van een mannelijk voetbalteam. Ford hoopt dat de Fransen door de
        radicale ommezwaai van de zangeres en voormalig topmodel geïnspireerd raken en hun vaste keus voor Franse merken
        laten varen.</p>

    <br>

    <p class="song_descr">De fabrikant neemt daarmee wel een gok met de invloed die Bruni op het koopgedrag van de
        Fransen heeft. Het huwelijk tussen haar en president Nicolas Sarkozy bevestigde in de ogen van veel Fransen dat
        hij te veel met uiterlijk vertoon bezig was.</p>

</div>

<div class="list songPage">
    <h3 id="question"><span>VRAAG</span> wat was er eerst de kip of het ei?</h3><br>

    <h2>Doe mee aan de prijsvraag</h2>


    <div class="commentsForm clearfix">
        <form method="post" class="clearfix">
            <label>Naam</label>
            <input type="text" name="name">
            <label>E-mail <span>(wordt niet vermeld)</span></label>
            <input type="email" name="email">
            <label>Antwoord</label>
            <input type="text" name="answer"><br>

            <div class="checkbox">
                <input type="checkbox" name="mailMe" value="1">Inschrijven
            </div>
            <div class="submitCom">
                <input type="submit" name="submitForm" id="submitBtn" value="PLAATSEN" >
            </div>
        </form>
    </div>
</div>