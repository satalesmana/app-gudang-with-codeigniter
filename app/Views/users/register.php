<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login System</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('plugins/style/style.css'); ?>" rel="stylesheet">
	
</head>
<body>
    <div class="container mt-5">
<div class="card ">
  <div class="card-header">
    Register form
  </div>
  <div class="card-body">
    <?php if($pesan !='') { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $pesan; ?>
        </div>
    <?php } ?>

    <form action="<?php echo site_url('register'); ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" name="nama_penguna">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="mb-3">
            <label class="form-label">&nbsp;</label>
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
  </div>
</div>
    </div>

    <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>