<?php $this->setPageTitle('Home'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>


<?php $this->start('body'); ?>

<div class="container mt-5">
	
		
	<?php 
		$user = Users::currentUser();
		if ($user):
			echo "<h3 class='text-center'>Welcome ".$user->username."</h3>";
		endif;
	?>

	<div>
		<a href="<?=SROOT;?>boards" class="btn btn-primary text-primary">View boards</a>
	</div>

</div>




<?php $this->end(); ?>










