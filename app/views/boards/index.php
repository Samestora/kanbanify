<?php $this->setPageTitle('Boards'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="container">

  <input type="hidden" value="<?=$this->user_id;?>" class="user-id">

  <div class="row">
    <div class="col">
      <h1 class="mt-4 text-center">Boards</h1>
    </div>
  </div>

  <div class="row">
  <div class="col-3">
  <!-- Add Board -->
  <div class="board-form">
      <!-- Input field -->
      <input type="text" class="board-input form-control" placeholder="Enter board name">

      <!-- Error Message -->
      <p class="input-error-msg err-msg-text text-danger hide mt-1"></p>

      <!-- Action Buttons -->
      <div class="mt-2">
        <button class="board-add-btn btn btn-sm btn-primary" data-boardid="">Add</button>
        <button class="board-update-btn btn btn-sm btn-info hide" >Update</button>
        <button class="board-cancel-btn btn btn-sm btn-danger hide" >Cancel</button>
      </div>
    </div>
    <!-- End Add Board -->
  </div>
    <div class="col-9">
      <div class="boards-list">
        <?php foreach ($this->boards as $board): ?>
        <div class="board-container d-inline-flex" id="board-container--<?=$board['id']?>">
          <div class="board-link-container">
            <a href="<?=SROOT?>boards/board/<?=$board['id']?>" id="board-link--<?=$board['id']?>">
              <h4 class="board-name" id="board-name--<?=$board['id']?>"><?=$board['name']?></h4>
            </a>
          </div>

		  <!--Dropdown Edit or Delete-->
			<div class="dropdown">
        <button class="btn btn-link p-0 border-0 dropdown-toggle" type="button" id="dropdownMenu-<?= $board['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-edit"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu-<?= $board['id']; ?>">
            <li><a class="dropdown-item board-edit" id="board-edit--<?= $board['id']; ?>">Edit</a></li>
            <li><a class="dropdown-item board-delete" id="board-delete--<?= $board['id']; ?>">Delete</a></li>
        </ul>
			</div>

        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>

<script>
  var g = {
    SROOT: "<?=SROOT?>",
    boardsModel: "boardsModel",
  };
</script>

<?php $this->end(); ?>
