window.onload = function() {
  init();
}

var public_spreadsheet_url = 'https://docs.google.com/spreadsheets/d/1BezZYURXfBGn9rKb1ueZf_dkbWkqfq7Mk16V7ibdeRU/pubhtml?gid=0&single=true';
var spreadsheet_data;

function init() {
  Tabletop.init( { key: public_spreadsheet_url,
                   callback: showInfo,
                   simpleSheet: true
                 } )
}

function showInfo(data, tabletop) {
  spreadsheet_data = data;
  console.log(data.length);
  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(drawBackgroundColor);
}

function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Date');
      data.addColumn('number', 'Happiness');
      data.addColumn('number', 'Sadness');
      data.addColumn('number', 'Anxiety');
      data.addColumn('number', 'Irritability');
      //data.addColumn('number', 'Sadness');
      console.log(spreadsheet_data + "tets");
      for(var i=0; i<spreadsheet_data.length; i++) {
        data.addRows([
          [i+1,  parseInt(spreadsheet_data[i]['Happiness']),
           parseInt(spreadsheet_data[i]['Sadness']), parseInt(spreadsheet_data[i]['Anxiety']), 
           parseInt(spreadsheet_data[i]['Irritability'])]
        ]);
        console.log(spreadsheet_data[i]['Date'] + spreadsheet_data[i]['Happiness'] + 
                    spreadsheet_data[i]['Sadness'] + spreadsheet_data[i]['Anxiety'] + 
                    spreadsheet_data[i]['Irritability']);
      }

      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
        },
        width: 1500,
        height: 700,  
        backgroundColor: '#41454E'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }