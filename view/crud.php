<?php include_once "inc/header.inc.php"; ?>

<body>

<div class="jumbotron text-center text-primary">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>CRUD - DELETE & UPDATE</h1>
			</div>
		</div>
	</div>
</div>	
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="crud-alert"></div>
			</div>
		</div>
	</div>
	<?php 
		$db = new DB;
		$db->connection();

		$result = $db->sql("SELECT * FROM users ORDER BY 1 DESC");
	 ?>
	<table class="table table-striped table-bordered table-primary table-hover text-center" id="user-table">
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>email</th>
				<th>password</th>
				<th>city</th>
				<th>delete user</th>
				<th>update user</th>
			</tr>
		</thead>
		<tbody>
			<?php 

				if(is_array($result)):
					foreach($result as $value):
					?>
					<tr>
						<td><?php print $value['id'] ?></td>
						<td><?php print $value['name'] ?></td>
						<td><?php print $value['email'] ?></td>
						<td><input type="text" id="user-<?php print $value['id'] ?>" value="<?php print $value['password'] ?>" class="input_password form-control"></td>
						<td><input type="text" id="city-<?php print $value['id'] ?>" value="<?php print $value['city'] ?>" class="input_password form-control"></td>
						<td><button class="btn btn-sm btn-danger btn-user" 	data-btn='delete' action='delete' data-user='<?php print $value['id'] ?>'>delete user</button></td>
						<td><button class="btn btn-sm btn-success btn-user" data-btn='update' action='update' data-user='<?php print $value['id'] ?>'>update user</button></td>
					</tr>
					<?php
					endforeach;
				endif;
				mysqli_close($db->connection());
			 ?>
		</tbody>
	</table>

<?php include_once "inc/footer.inc.php"; ?>


<script id="EUXIE">
$(function(){
	$("#user-table").delegate('.btn-user','click', function(ev){
		ev.preventDefault();

		$this = $(this);
		var $action = $this.attr('data-btn');
		var $userid = $this.attr('data-user');
		var $pass 	= $("#user-"+$userid).val();
		var $city 	= $("#city-"+$userid).val();
		


		$.ajax({
			url: "action",
			method: 'POST',
			data: {action:$action, userid:$userid, pass:$pass, city:$city},
			success:function(data)
			{
				$("#crud-alert").html(data);
			}

		})
	});
});
document.getElementById("EUXIE").innerHTML = "";
</script>

</body>
</html>