<?php include_once "inc/header.inc.php"; ?>
<body>
	
	<div class="container">
		<!-- response from server -->
		<div class="row">
			<div class="col-md-6 offset-3">
				<div id="form_message"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron text-center">
					<h1 class="text-info">CRUD OPERATION</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 offset-3">
				<form name="crudForm" method="POST">
					<label for="">username</label>
					<input type="text" name="username" placeholder="enter username" class="form-control username">
					
					<label for="">email</label>
					<input type="email" name="email" placeholder="enter email" class="form-control email">

					<label for="">password</label>
					<input type="password" name="password" placeholder="enter passsword" class="form-control password">
					<br>
					<select name="city[]" id="city" class="form-control city">
						<option value="">choose your city name</option>
						<option>mumbai</option>
						<option>pune</option>
						<option>nashik</option>
						<option>satara</option>
					</select>
					<br>
					<input type="submit" name="crudFormBtn" class="btn btn-success" id="submit-btn">
				</form>
			</div>
		</div>
	</div>



<?php include_once "inc/footer.inc.php"; ?>

</body>
</html>