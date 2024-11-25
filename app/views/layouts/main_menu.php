<!--Navbar-->
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #FFFFFF;">

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item <?php echo ($this->getPageTitle() === 'Home' ? 'active' : ''); ?>">
        <a class="nav-link" style="color:#151A57;" href="<?=SROOT?>home/index"><b>&lt;/Kanbanify&gt;</b></a>
      </li>
      <li class="nav-item <?php echo ($this->getPageTitle() === 'Boards' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>boards/index">Boards</a>
      </li>
    </ul>

    <!-- User Links -->
    <ul class="navbar-nav">
      <?php if (Users::currentUser()) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=SROOT?>register/logout"><i class="fa fa-sign-out"></i> Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-user me-1"></i><?php echo(Users::currentUser()->username);?></a>
      </li>
      <?php else: ?>
      <li class="nav-item <?php echo ($this->getPageTitle() === 'Login' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>register/login"><i class="fa fa-sign-in me-1"></i> Login</a>
      </li>
      <li class="nav-item <?php echo ($this->getPageTitle() === 'Register' ? 'active' : ''); ?>">
        <a class="nav-link" href="<?=SROOT?>register/register"><i class="fa fa-user me-1"></i> Register</a>
      </li>
      <?php endif; ?>
    </ul>

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
