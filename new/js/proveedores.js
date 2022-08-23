$(document).ready(function(){
	$.ajax({
		url: "./php/proveedores.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var prov = [];
			var tot = [];

			for(var i in data) {
				prov.push(data[i].prov);
				tot.push(data[i].tot);
			}

			var chartdata = {
				labels: prov,
				datasets : [
					{
						label: 'Total',
						backgroundColor: 'rgba(231, 76, 60,0.75)',
						borderColor: 'rgba(231, 76, 60,0.75',
						hoverBackgroundColor: 'rgba(241, 196, 15,1.0)',
						hoverBorderColor: 'rgba(241, 196, 15,1.0)',
						data: tot
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
