
<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">Navbar</a>

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
			<?php if (Users::currentUser()) : ?>
  		<li class="nav-item">
        <a class="nav-link" href="<?=SROOT?>register/logout">Logout</a>
      </li>
			<?php else: ?>
			<li class="nav-item <?php echo ($this->getPageTitle() === 'Login' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>register/login">login</a>
      </li>
      <li class="nav-item <?php echo ($this->getPageTitle() === 'Register' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>register/register">register</a>
      </li>
			<?php endif; ?>
    </ul>
    <!-- Links -->

    <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      </div>
    </form>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->