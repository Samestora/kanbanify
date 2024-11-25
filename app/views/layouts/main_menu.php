
<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color">


  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo ($this->getPageTitle() === 'Home' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>home/index">Home</a>
      </li>
      <li class="nav-item <?php echo ($this->getPageTitle() === 'Boards' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>boards/index">Boards</a>
      </li>
    </ul>
    <!-- Links -->
    <ul class="navbar-nav">
			<?php if (Users::currentUser()) : ?>
  		<li class="nav-item">
        <a class="nav-link" href="<?=SROOT?>register/logout"><i class="fa fa-sign-out"></i>Logout</a>
        <a class="nav-link" href="#"><i class="fa fa-user mr-1"></i><?php echo(Users::currentUser()->username);?></a>
      </li>
			<?php else: ?>
			<li class="nav-item <?php echo ($this->getPageTitle() === 'Login' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>register/login"><i class="fa fa-sign-in mr-1"></i>Login</a>
      </li>
      <li class="nav-item <?php echo ($this->getPageTitle() === 'Register' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>register/register"><i class="fa fa-user mr-1"></i>Register</a>
      </li>
			<?php endif; ?>
    </ul>

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->