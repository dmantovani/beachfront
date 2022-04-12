$(document).ready(function(){
	google.charts.load('current', {packages: ['corechart', 'line']});
	google.charts.setOnLoadCallback(drawLineColors);

	function drawLineColors() {
		  var data = new google.visualization.DataTable();
		  data.addColumn('date', 'Fecha');
		  data.addColumn('number', 'Sesiones');

		  data.addRows(chartData);

		  var options = {
			hAxis: {
			  title: 'Fecha'
			},
			vAxis: {
			  title: 'Sesiones'
			},
			colors: ['#a52714', '#097138']
		  };

		  var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
		  chart.draw(data, options);
		}
});


