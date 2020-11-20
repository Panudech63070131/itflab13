<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'panudech.mysql.database.azure.com', 'earthr5t6@panudech', 'Minseok2', 'itflab', 3306);
$id = $_GET['ID'];
$sql = 'SELECT * FROM guestbook WHERE ID = '.$id.'';
$query = mysqli_query($conn, $sql);
if(!$query) {
	header('Location: show.php');
}
else {
	$data = mysqli_fetch_assoc($query);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Zone</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<style type="text/css">
		.card {
			border-top: solid 5px #37cf23;
		}
	</style>
</head>
<body class="bg-light py-5">
	<div class="container text-dark">
		<div class="row">
			<div class="col-12 col-lg-8 offset-lg-2">
				<div class="card shadow">
					<div class="card-body">
						<div class="row">
							<div class="col-6"><h1 class="text-monospace">Edit</h1></div>
						</div>
						<form action="update.php" method="post">
							<input type="text" name="id" value="<?php echo $data['ID']; ?>" class="form-control d-none" required>
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" value="<?php echo $data['Name']; ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Comment</label>
								<textarea name="comment" value="<?php echo $data['Comment']; ?>" class="form-control" rows="5" required></textarea>
							</div>
							<div class="form-group">
								<label>Link</label>
								<input type="text" name="link" value="<?php echo $data['Link']; ?>" class="form-control">
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-sm btn-success my-3 font-weight-bold">Save</button>
								<a class="btn btn-sm btn-dark my-3" href="show.php">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>