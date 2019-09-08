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



	<div class="project-description">

		<div class="my-4">
			<h4 class="my-3">Manage your projects and tasks with this basic kanban web app tool</h4>

			<ul>  
			<li>Create a board - eg. "Programming"</li>
			<li>Create lists within the board - eg. "Things To Do"</li>
			<li>Create cards within lists - eg. "Learn CSS" or "Complete Blog Project"</li>
			<li>Each card contains a description, checklist, and comments section</li>
			<li>Create an account or login with details below</li>
			<li>Manage your boards, lists and cards</li>
			</ul>
		</div>
		
		<div class="my-4">
			<h4 class="my-3">Existing Users</h4>


			<table class="table">
			<tr>
			<th>Username</th>
			<th>Password</th>
			</tr>
			<tr>
			<td>user1</td>
			<td>password</td>
			</tr>
			<tr>
			<td>admin</td>
			<td>admin</td>
			</tr>
			</table>

		</div>

		
		<div class="my-4">
			<h4 class="my-3">Features</h4>

			<ul>
			<li>Uses MVC architecture</li>  
			<li>URL rewriting - htaccess and web.config files</li>  
			<li>PHP routing</li>
			<li>Ajax makes requests to php controller actions to perform CRUD operations</li>  
			<li>Create an account and login (note: there is no user admin at this moment in time - you cannot delete or edit user accounts except through the database)</li>
			<li>Uses cookies and sessions</li>
			<li>Autoloading</li>
			<li>JavaScript - event delegation and DOM manipulation</li>
			<li>Uses PDO to interact with database</li>
			</ul>
		</div>

		


	</div>

</div>




<?php $this->end(); ?>




