<?php $this->setPageTitle('Kanbanify - Register'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="col-md-6 d-flex justify-content-center mt-5">
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
		
		<p class="text-center display-5">Register</p>
		
		<div class="mb-3">
		<label for="username" class="form-label">Username</label>
			<div class="input-group">
				<span class="input-group-text" id="basic-addon3">@</span>
				<input type="text" name="username" id="username" class="form-control" value="<?=$this->newUser->username;?>">
			</div>
		</div>
		
		<div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="<?=$this->newUser->password;?>">
		</div>
		
		<div class="mb-3">
			<label for="confirm" class="form-label">Confirm Password</label>
			<input type="password" name="confirm" id="confirm" class="form-control" value="<?=$this->newUser->getConfirm();?>">
		</div>
		
		<div class="d-flex justify-content-center">
			<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>


<?php $this->end(); ?>