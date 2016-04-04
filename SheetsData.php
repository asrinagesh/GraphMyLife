<?php
  include('Carbon/src/Carbon/Carbon.php');
  include('lavacharts/src/Lavacharts.php');

  use Khill\Lavacharts\Lavacharts;
  $data = returnData();
  $lava = new Lavacharts; 

  $moods = $lava->DataTable();

  $moods->addDateColumn('Date')
               ->addNumberColumn('Happiness')
               ->addNumberColumn('Sadness')
               ->addNumberColumn('Anxiety')
               ->addNumberColumn('Irritability');
    for($i = 1; $i < count($data); $i++) {
      $moods->addRow([$data[$i]['Date'], $data[$i]['Happiness'], $data[$i]['Sadness'], 
                    $data[$i]['Anxiety'], $data[$i]['Irritability']]);
    }


  $lava->LineChart('Temps', $moods, [
      'title' => 'Mood Metrics'
  ]);

  function csvToArray($file, $delimiter) { 
    if (($handle = fopen($file, 'r')) !== FALSE) { 
      $i = 0; 
      while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) { 
        for ($j = 0; $j < count($lineArray); $j++) { 
          $arr[$i][$j] = $lineArray[$j]; 
        } 
        $i++; 
      } 
      fclose($handle); 
    } 
    return $arr; 
  } 

  function returnData() { 
    // Set your CSV feed
    $feed = 'https://docs.google.com/spreadsheets/d/1BezZYURXfBGn9rKb1ueZf_dkbWkqfq7Mk16V7ibdeRU/pub?gid=0&single=true&output=csv';
    $data = csvToArray($feed, ',');
     
    $keys = array();
    $newArray = array(); 

    $count = count($data) - 1;
    $labels = array_shift($data);  
     
    foreach ($labels as $label) {
      $keys[] = $label;
    }
    
    $keys[] = 'id';
     
    for ($i = 0; $i < $count; $i++) {
      $data[$i][] = $i;
    }
     
    for ($j = 0; $j < $count; $j++) {
      $d = array_combine($keys, $data[$j]);
      $newArray[$j] = $d;
    }
    return $newArray;
  }

  function returnTodayThoughts(){
    $data = returnData();
    echo $data[count($data)-1]['Thoughts'];
  }
?>