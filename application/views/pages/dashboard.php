<div id="page-wrapper">
	<div class="main-page">
		<div class="row-one">
			<div class="col-md-4 widget">
				<div class="stats-left ">
					<h5>jumlah majelis</h5>
					<h4>Muhammadiyah</h4>
				</div>
				<div class="stats-right">
					<label> 12</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="col-md-4 widget states-mdl">
				<div class="stats-left">
					<h5>jumlah majelis</h5>
					<h4>NU</h4>
				</div>
				<div class="stats-right">
					<label> 22</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="col-md-4 widget states-last">
				<div class="stats-left">
					<h5>jumlah majelis</h5>
					<h4>Al-Irsyad</h4>
				</div>
				<div class="stats-right">
					<label>6</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="clearfix"> </div>	
		</div>
		<div class="charts">
			
			<div class="col-md-12 charts-grids widget">
				<h4 class="title">Data Majelis Taklim</h4>
				<canvas id="pie" height="300" width="400"> </canvas>
			</div>
			<div class="clearfix"> </div>
			<script>

				var pieData = [
				{
					value: 12,
					color:"rgba(233, 78, 2, 1)",
					label: "Muhammadiyah"
				},
				{
					value : 22,
					color : "rgba(242, 179, 63, 1)",
					label: "NU"
				},
				{
					value : 6,
					color : "rgba(88, 88, 88,1)",
					label: "Al-Irsyad"
				}

				];


				new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);

			</script>

		</div>

		<div class="charts">
			
			<div class="col-md-12 charts-grids widget">
				<h4 class="title">Data Pengguna Berdasarkan jenis kelamin</h4>
				<canvas id="jenisKelamin" height="300" width="400"> </canvas>
			</div>
			<div class="clearfix"> </div>
			<script>

				var jenisKelamin = [
				{
					value: 130,
					color:"rgba(220, 78, 2, 1)",
					label: "Laki-Laki"
				},
				{
					value : 230,
					color : "rgba(142, 179, 63, 1)",
					label: "Perempuan"
				}

				];


				new Chart(document.getElementById("jenisKelamin").getContext("2d")).Pie(jenisKelamin);

			</script>

		</div>

		<div class="charts">
			<div class="col-md-12 charts-grids widget">
				<h4 class="title">Data Pengguna</h4>
				<canvas id="bar" height="300" width="400"> </canvas>
			</div>
			
			<div class="clearfix"> </div>
			<script>
				var barChartData = {
					labels : ["Jan","Feb","March","April","May","June","July"],
					datasets : [
					{
						fillColor : "rgba(233, 78, 2, 0.9)",
						strokeColor : "rgba(233, 78, 2, 0.9)",
						highlightFill: "#e94e02",
						highlightStroke: "#e94e02",
						data : [65,59,90,81,56,55,40]
					},
					{
						fillColor : "rgba(79, 82, 186, 0.9)",
						strokeColor : "rgba(79, 82, 186, 0.9)",
						highlightFill: "#4F52BA",
						highlightStroke: "#4F52BA",
						data : [40,70,55,20,45,70,60]
					}
					]

				};
				

				
				new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
				
			</script>

		</div>
		
	</div>
</div>