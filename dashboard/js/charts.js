$(document).ready(function(){

	makechart();

	function makechart()
	{
		$.ajax({
			url:"data.php",
			method:"POST",
			data:{action:'fetch'},
			dataType:"JSON",
			success:function(data)
			{
				var language = [];
				var total = [];
				var color = [];

				for(var count = 0; count < data.length; count++)
				{
					language.push(data[count].language);
					total.push(data[count].total);
					color.push(data[count].color);
				}

				var chart_data = {
					labels:language,
					datasets:[
						{
							label:'Vote',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

				var group_chart1 = $('#pie_chart');

				var graph1 = new Chart(group_chart1, {
					type:"pie",
					data:chart_data
				});

				var group_chart2 = $('#doughnut_chart');

				var graph2 = new Chart(group_chart2, {
					type:"doughnut",
					data:chart_data
				});

				var group_chart3 = $('#bar_chart');

				var graph3 = new Chart(group_chart3, {
					type:'bar',
					data:chart_data,
					options:options
				});

				var group_chart4 = $('#chart4');

				var graph4 = new Chart(group_chart4, {
					type:'polarArea',
					data:chart_data,
					options:options
				});

				var group_chart5 = $('#chart5');

				var graph4 = new Chart(group_chart5, {
					type:'radar',
					data:chart_data,
					options:options
				});

				var group_chart6 = $('#chart6');

				var graph4 = new Chart(group_chart6, {
					type:'line',
					data:chart_data,
					options:options
				});
			}
		})
	}

});

