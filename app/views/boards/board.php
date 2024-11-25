<?php $this->setPageTitle($this->board['name']); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>


<?php $this->start('body'); ?>

<div class="board" id="board--<?php echo $this->board['id']; ?>">

	<div class="board-name m-3" id="board-name--<?php echo $this->board['id']; ?>">
		<h2><?php echo $this->board['name']; ?></h2>
	</div>

	<div class="list-wrapper d-inline-flex" id="list-wrapper--<?php echo $this->board['id']; ?>">

		<!-- lists -->
		<div class="lists d-inline-flex m-2" id="lists">
			<?php foreach ($this->lists as $list): ?>
			
				<!-- list -->
				<div class="list mx-1 align-self-start" id="list--<?php echo $list['id']; ?>">
					
					<div class="list-header d-flex m-2" id="list-header--<?php echo $list['id']; ?>">
						<input type="text" class="list-title form-control" id="list-title--<?php echo $list['id']; ?>" value="<?php echo $list['title']; ?>">
						<div class="dropdown p-1">
							<button class="btn btn-link p-0 border-0" id="dropdownMenu1-<?php echo $list['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-bars"></i>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1-<?php echo $list['id']; ?>">
								<li><a class="dropdown-item list-edit" id="list-edit--<?php echo $list['id']; ?>">Edit</a></li>
								<li><a class="dropdown-item list-delete" id="list-delete--<?php echo $list['id']; ?>">Delete</a></li>
							</ul>
						</div>
					</div>

					<div class="list-cards" id="list-cards--<?php echo $list['id']; ?>">
						
						<?php foreach ($list['cards'] as $card): ?>
							
							<div class="d-flex m-2 _card" id="_card--<?php echo $card['id']; ?>">
								<div class="_card-details flex-grow-1 p-1" id="_card-details--<?php echo $card['id']; ?>">
									<span class="_card-text" id="_card-text--<?php echo $card['id']; ?>"><?php echo $card['title']; ?></span>
								</div>
								<div class="dropdown p-1">
									<button class="btn btn-link p-0 border-0" id="dropdownMenuCard-<?php echo $card['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="fa fa-edit"></i>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuCard-<?php echo $card['id']; ?>">
										<li><a class="dropdown-item edit-card" data-bs-toggle="modal" data-bs-target="#modal" id="edit-card--<?php echo $card['id']; ?>">Edit</a></li>
										<li><a class="dropdown-item delete-card" id="delete-card--<?php echo $card['id']; ?>">Delete</a></li>
									</ul>
								</div>
							</div>

						<?php endforeach; ?>

					</div>

					<div class="card-add-another" id="card-add-another--<?php echo $list['id']; ?>">
						<button class="btn-card-add-another btn btn-primary btn-sm" id="btn-card-add-another--<?php echo $list['id']; ?>">Add Another Card</button>
					</div>

				</div>
				<!-- end list -->

			<?php endforeach; ?>
			
		</div>
		<!-- end lists -->

		<!-- add another list -->
		<div class="list-add-another align-self-start m-2">
			<button class="list-add-another-btn btn btn-danger mt-0">Add Another List</button>
			<div class="list-add hide m-1">
				<input type="text" class="list-add-input form-control" placeholder="Enter list title...">
				<button class="list-add-btn btn btn-danger">Add List</button>
				<span class="list-add-close"><i class="fa fa-times-circle"></i></span>
			</div>
		</div>
		<!-- end add another list -->

	</div>
	
	
	<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content"></div>
		</div>
	</div>

</div>

<script>
	var g = {
		SROOT: "<?=SROOT?>",
		boardID: "<?=$this->board['id'];?>",
		boardsModel: "boardsModel",
		listsModel: "listsModel",
		cardsModel: "cardsModel",
		cardChecklistItemsModel: "cardChecklistItemsModel",
		cardCommentsModel: "cardCommentsModel",
	};
</script>
