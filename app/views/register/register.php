<?php $this->setPageTitle('Register'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="col-md-6 offset-md-3 card bg-light">
	<form class="form my-3" action="<?=SROOT;?>register/register" method="post">
		<?php if (!empty($this->displayErrors)): ?>
			<div class="text-danger font-weight-bold alert-danger p-2 border border-danger rounded">
				<?php 
					foreach($this->displayErrors as $error):
						echo "<p>$error</p>";
					endforeach;
				?>
			</div>
		<?php endif; ?>
		
		<h3 class="text-center">Register</h3><hr>
		
		
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" value="<?=$this->newUser->username;?>">
		</div>
		
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="<?=$this->newUser->password;?>">
		</div>
		
		<div class="form-group">
			<label for="confirm">Confirm Password</label>
			<input type="password" name="confirm" id="confirm" class="form-control" value="<?=$this->newUser->getConfirm();?>">
		</div>
		
		<div class="form-group">
			<input type="submit" value="register" name="submit" id="submit" class="btn btn-large btn-primary">
		</div>
		
	</form>
</div>


<?php $this->end(); ?>