<!DOCTYPE html>
<html>
    <head>
        <title>Graph My Life</title>
        <link href="index.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <?php
          include("SheetsData.php"); 
        ?>
        <div id="name">Akash Srinagesh</div>
        <div id="thoughts">
        	<span class="header">Thoughts</span> <br>
        	<span><?= returnTodayThoughts(); ?></span>
        </div>
        
        <div id="moods">
	        <div class="header">Mood Metrics</div>
	        <span id="temps_div"></span>
	    </div>
			<?= $lava->render('LineChart', 'Temps', 'temps_div') ?>
    </body>
</html>