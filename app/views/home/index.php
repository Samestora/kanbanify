<?php $this->setPageTitle('Home'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>


<?php $this->start('body'); ?>

<div class="container">
	
		<h3>
			Welcome
		<?php 
			$user = Users::currentUser();
			if ($user):
				echo $user->username;
			endif;
		?>
	</h3>
</div>




<?php $this->end(); ?>










