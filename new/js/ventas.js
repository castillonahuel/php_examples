$(document).ready(function(){
	$.ajax({
		url: "./php/ventas.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var cli = [];
			var st = [];

			for(var i in data) {
				cli.push(data[i].cli);
				st.push(data[i].st);
			}

			var chartdata = {
				labels: cli,
				datasets : [
					{
						label: 'Total',
						backgroundColor: 'rgba(231, 76, 60,0.75)',
						borderColor: 'rgba(231, 76, 60,0.75',
						hoverBackgroundColor: 'rgba(241, 196, 15,1.0)',
						hoverBorderColor: 'rgba(241, 196, 15,1.0)',
						data: st
					}
				]
			};

			var ctx = $("#myAreaChart");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
