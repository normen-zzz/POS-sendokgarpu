<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Sendok Garpu | <?php echo $title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

	<link rel="stylesheet" href="<?= base_url('assets/front/')?>css/style.css" />
</head>

<body>
	<section id="login" class="bg-danger" style="height: 100vh">
		<div class="d-flex h-100">
			<div class="container bg-white align-self-center" style="padding: 100px">
				<div class="row text-center">
					<h1 class="">LOGIN</h1>
				</div>
				<div class="row justify-content-center">
					<?php foreach($user as $users) { ?>
					<div class="col-md-4 py-2">
						<div class="card card-login text-center pb-3 pt-5">
							<img src="<?= base_url('assets/img/avatar/' . $users['foto'])?>"
								class="card-img-top mx-auto rounded-circle bg-warning" alt="..." />
							<div class="card-body">
								<h5 class="card-title" name="username"><?= $users['username'] ?></h5>
								<a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">
						Input PIN
					</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="asu.php">
					<div class="modal-body">
						<div class="form-floating mb-3">
							<input type="number" class="form-control" id="floatingInput" placeholder="PIN" />
							<label for="floatingInput">PIN</label>
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
				</form>
			</div>
		</div>
	</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
	</script>
</body>

</html>