$(document).ready(function(){
	$.ajax({
		url: "./php/deudas.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var cli = [];
			var mont = [];

			for(var i in data) {
				cli.push(data[i].cli);
				mont.push(data[i].mont);
			}

			var chartdata = {
				labels: cli,
				datasets : [
					{
						label: 'Deuda',
						backgroundColor: 'rgba(231, 76, 60,0.75)',
						borderColor: 'rgba(231, 76, 60,0.75',
						hoverBackgroundColor: 'rgba(241, 196, 15,1.0)',
						hoverBorderColor: 'rgba(241, 196, 15,1.0)',
						data: mont
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
