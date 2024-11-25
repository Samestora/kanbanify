<!doctype html>

<html>
	<head>
		<title><?php echo $this->getPageTitle(); ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?=SROOT?>mdb/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?=SROOT?>mdb/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?=SROOT?>mdb/css/style.css" rel="stylesheet">
		
		<?php echo $this->content('head'); ?>
		
	</head>

	<body class="container my-5 rounded-3" style="background-color: #343B89; color: white;">
		
  
		<?php include('main_menu.php'); ?>
		
    <div class="px-5 py-1 bg-body-tertiary rounded-3" style="color:black;">
      <?php echo $this->content('body'); ?>
    </div>
		
		<!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?=SROOT?>mdb/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?=SROOT?>mdb/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?=SROOT?>mdb/js/bootstrap.bundle.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?=SROOT?>mdb/js/mdb.min.js"></script>
		<!-- Custom JavaScript -->
    <script type="text/javascript" src="<?=SROOT?>js/ajax.js"></script>
	</body>
</html>



