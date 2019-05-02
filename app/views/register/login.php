<?php $this->setPageTitle('Register'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="col-md-6 offset-md-3 card bg-light">
	<form class="form my-3" action="<?=SROOT;?>register/login" method="post">
		<?php if (!empty($this->displayErrors)): ?>
			<div class="text-danger font-weight-bold alert-danger p-2 border border-danger rounded">
				<?php 
					foreach($this->displayErrors as $error):
						echo "<p>$error</p>";
					endforeach;
				?>
			</div>
		<?php endif; ?>
		<h3 class="text-center">Login</h3>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" name="password" id="password" class="form-control">
		</div>
		<div class="form-group">
			<input type="checkbox" class="form-check-input" name="remember_me" id="remember_me" value="on">
			<label for="remember_me" class="form-check-label">Remember Me</label>
		</div>
		<div class="form-group">
			<input type="submit" value="login" name="submit" id="submit" class="btn btn-large btn-primary">
		</div>
		<div class="text-right">
			<a href="<?=SROOT;?>register/register" class="text-primary">Register</a>
		</div>
	</form>
</div>

<?php $this->end(); ?>























