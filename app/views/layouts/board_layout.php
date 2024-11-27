<!doctype html>

<html>
	<head>
		<title><?php echo $this->getPageTitle(); ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?=SROOT?>ext/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?=SROOT?>ext/css/style.css" rel="stylesheet">
		
		<?php echo $this->content('head'); ?>
		
	</head>

	<body>
		
		<?php include('main_menu.php'); ?>
		
		
		<?php echo $this->content('body'); ?>
		
		
		
		<!-- SCRIPTS -->
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?=SROOT?>ext/js/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="<?=SROOT?>ext/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?=SROOT?>ext/js/bootstrap.bundle.min.js"></script>
		<!-- Custom JavaScript -->
    <script type="text/javascript" src="<?=SROOT?>js/ajax.js"></script>
		<!-- Custom JavaScript -->
    <script type="text/javascript" src="<?=SROOT?>js/board.js"></script>
	</body>
</html>



