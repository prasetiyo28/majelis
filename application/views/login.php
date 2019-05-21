<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<?php include 'partials/head.php'; ?>
<body class="">
	<div class="main-content">


		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Log in</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>SIlahkan Login dengan username dan passowrd yang sesuai </h4>
					</div>
					<div class="login-body">
						<form action="<?php echo base_url() ?>login/login" method="POST">
							<input type="text" class="user" name="email" placeholder="Masukan email anda..." required="">
							<input type="password" name="password" class="lock" placeholder="Masukan password anda...">
							<input type="submit" name="Sign In" value="Sign In">

						</form>
					</div>
				</div>
				
				
			</div>
			<br>
		</div>
		<div class="footer">
			<p>&copy; 2019 - Admin Majelis Taklim </p>
		</div>
		<!--//footer-->
	</div>
	<!-- Classie -->
	<script src="<?php echo base_url() ?>assets/js/classie.js"></script>

	<!--scrolling js-->
	<script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="<?php echo base_url() ?>assets/js/bootstrap.js"> </script>
</body>
</html>