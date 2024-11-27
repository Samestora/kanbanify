<?php $this->setPageTitle('Kanbanify - Boards'); ?>
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
        <button class="board-add-btn btn btn-sm btn-outline-primary" data-boardid="">Add</button>
        <button class="board-update-btn btn btn-sm btn-outline-info hide" >Update</button>
        <button class="board-cancel-btn btn btn-sm btn-outline-danger hide" >Cancel</button>
      </div>
    </div>
    <!-- End Add Board -->
  </div>
    <div class="col-9">
      <div class="boards-list">
        <?php foreach ($this->boards as $board): ?>
        <div class="board-container d-inline-flex justify-content-center px-3 rounded-3 container" id="board-container--<?=$board['id']?>">
          <div class="board-link-container text-center flex-fill d-flex flex-column my-2">
            <a href="<?=SROOT?>boards/board/<?=$board['id']?>" class="link-primary link-offset-2 link-underline-opacity-0 id="board-link--<?=$board['id']?>">
              <h4 class="board-name" id="board-name--<?=$board['id']?>"><?=$board['name']?></h4>
            </a>
            <div class="d-flex flex-fill justify-content-around">
              <a class="board-edit link-success link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover" id="board-edit--<?= $board['id']; ?>" style="font-family: Poppins-Medium;"> <i class="fa fa-edit"></i> Edit</a></li>
              <a class="board-delete link-danger link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover" id="board-delete--<?= $board['id']; ?>" style="font-family: Poppins-Medium;"> <i class="fa fa-trash"></i> Delete</a></li>
            </div>
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
