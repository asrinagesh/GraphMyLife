<!DOCTYPE html>
<html>
    <head>
        <title>Graph My Life</title>
        <link href="index.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript" src="tabletop.js"></script>
		<script type="text/javascript" src="graph.js"></script>
		<!-- <script type="text/javascript">
		  window.onload = function() { init() };

		  var public_spreadsheet_url = 'https://docs.google.com/spreadsheets/d/1BezZYURXfBGn9rKb1ueZf_dkbWkqfq7Mk16V7ibdeRU/pubhtml?gid=0&single=true';

		  function init() {
		    Tabletop.init( { key: public_spreadsheet_url,
		                     callback: showInfo,
		                     simpleSheet: true,
		                     debug: true } )
		  }

		  function showInfo(data, tabletop) {
		    alert("Successfully processed!")
		    console.log(data);
		  }
		</script> -->
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
	   		<div id="chart_div"></div>
	   	</div>
	    <!--
	    <div id="moods">
	        <div class="header">Mood Metrics</div>
	        <span id="temps_div"></span>
	    </div>
			<?= $lava->render('LineChart', 'Temps', 'temps_div') ?>
		-->
    </body>
</html>