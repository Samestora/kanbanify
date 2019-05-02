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
			<!-- add board -->
			<div class="board-form">
				<input type="text" class="board-input form-control">
				<p class="input-error-msg err-msg-text hide"></p>
				<button class="board-add-btn btn btn-sm btn-primary" data-boardid="">Add</button>
				<button class="board-update-btn btn btn-sm btn-info hide">Update</button>
				<button class="board-cancel-btn btn btn-sm btn-danger hide">Cancel</button>
			</div>
			<!-- end add board -->
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
							<div class="dropdown p-1">
								<span id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-edit"></i>
								</span>
								<div class="dropdown-menu">
									<a class="dropdown-item board-edit" id="board-edit--<?=$board['id']?>">Edit</a>
									<a class="dropdown-item board-delete" id="board-delete--<?=$board['id']?>">Delete</a>
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










