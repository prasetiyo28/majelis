<div id="page-wrapper">
	<div class="main-page">
		<div class="row-one">
			<div class="col-md-6 widget">
				<div class="stats-left ">
					<h5>jumlah majelis</h5>
					<h4>Muhammadiyah</h4>
				</div>
				<div class="stats-right">
					<label> <?php echo count($mu); ?></label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="col-md-6 widget states-mdl">
				<div class="stats-left">
					<h5>jumlah majelis</h5>
					<h4>NU</h4>
				</div>
				<div class="stats-right">
					<label> <?php echo count($nu); ?></label>
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
					value: <?php echo count($mu); ?>,
					color:"rgba(233, 78, 2, 1)",
					label: "Muhammadiyah"
				},
				{
					value : <?php echo count($nu); ?>,
					color : "rgba(242, 179, 63, 1)",
					label: "NU"
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
					value: <?php echo count($laki); ?>,
					color:"rgba(220, 78, 2, 1)",
					label: "Laki-Laki"
				},
				{
					value : <?php echo count($perempuan); ?>,
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
					labels : ["Tegal Selatan","Tegal Barat","Tegal Selatan","Margadana"],
					datasets : [
					
					{
						fillColor : "rgba(79, 82, 186, 0.9)",
						strokeColor : "rgba(79, 82, 186, 0.9)",
						highlightFill: "#4F52BA",
						highlightStroke: "#4F52BA",
						data : [2,1,8,1]
					}
					]

				};
				

				
				new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
				
			</script>

		</div>
		
	</div>
</div>