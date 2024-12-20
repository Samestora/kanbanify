<?php $this->setPageTitle('Kanbanify - Login'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="col-md-6 d-flex justify-content-center mt-5">
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
		<p class="text-center display-5">Login</p>

		<div class="mb-3">
			<label for="basic-url" class="form-label">Username</label>
			<div class="input-group">
				<span class="input-group-text" id="basic-addon3">@</span>
				<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" name="username" id="username">
			</div>
		</div>

		<div class="mb-3">
			<label for="basic-url" class="form-label">Password</label>
			<div class="input-group">
				<input type="password" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" name="password" id="password">
			</div>
		</div>
		
		<div class="input-group mb-3">
			<div class="d-flex flex-row">
				<input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input" name="remember_me" id="remember_me" value="on">
				<label for="remember_me" class="form-label">&nbsp;&nbsp;&nbsp;Remember Me</label>
			</div>
		</div>
		<div class="mb-3 d-flex justify-content-around align-items-baseline">
			<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
			<p class="text-secondary">New to Kanbanify? <a href="<?=SROOT;?>register/register" class="text-primary">Register</a></p>
		</div>
	</form>
</div>

<?php $this->end(); ?>























