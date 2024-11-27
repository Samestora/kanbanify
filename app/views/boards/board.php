<?php $this->setPageTitle("Kanbanify - ".$this->board['name']); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>


<?php $this->start('body'); ?>

<div class="board container-fluid px-3 d-flex flex-column align-items-center" id="board--<?php echo $this->board['id']; ?>">

	<div class="board-name text-center my-3" id="board-name--<?php echo $this->board['id']; ?>">
		<p class="display-3" style="font-family: Poppins-Medium;"><?php echo $this->board['name']; ?></p>
	</div>

	<div class="list-wrapper overflow-x-auto d-flex flex-column gap-4 px-3 py-4 overflow-auto" id="list-wrapper--<?php echo $this->board['id']; ?>">
		<!-- lists -->
		<div class="lists d-flex" id="lists">
			<?php foreach ($this->lists as $list): ?>
			
				<!-- list -->
				<div class="list p-3 mx-1 rounded-3" style="min-width: 5rem;" id="list--<?php echo $list['id']; ?>">
					<div class="list-header d-flex align-items-center mb-3" id="list-header--<?php echo ($list['id']); ?>">
						<h5 class="list-title form-control me-2" style="font-family: Poppins-Medium;" id="list-title--<?php echo ($list['id']); ?>" ><?= htmlspecialchars($list['title']); ?></h1>
						<div class="p-1" id="Menu-<?php echo ($list['id']); ?>">
							<a class="fa fa-trash list-delete" id="list-delete--<?php echo ($list['id']); ?>"></a>
						</div>
					</div>

					<div class="list-cards" id="list-cards--<?php echo $list['id']; ?>">
						
						<?php foreach ($list['cards'] as $card): ?>
							
							<div class="card p-2 mb-2 _card" id="_card--<?php echo $card['id']; ?>">
								<div class="_card-details d-flex align-items-center" id="_card-details--<?php echo $card['id']; ?>">
									<span class="_card-text card-text flex-grow-1" id="_card-text--<?php echo $card['id']; ?>"><?php echo $card['title']; ?></span>
								</div>
								<div class="dropdown ms-2">
									<button type="button" class="btn btn-link p-0 border-0" id="dropdownMenuCard-<?php echo $card['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="fa fa-edit"></i>
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuCard-<?php echo $card['id']; ?>">
										<li>
											<a class="dropdown-item edit-card" data-bs-toggle="modal" data-bs-target="#modal" id="edit-card--<?php echo $card['id']; ?>">Edit</a>
										</li>
										<li>
											<a class="dropdown-item delete-card" id="delete-card--<?php echo $card['id']; ?>">Delete</a>
										</li>
									</ul>
								</div>
							</div>

						<?php endforeach; ?>
					</div>

					<div class="card-add-another mt-3" id="card-add-another--<?php echo $list['id']; ?>">
						<button class="btn-card-add-another btn btn-outline-primary btn-sm" id="btn-card-add-another--<?php echo $list['id']; ?>">Add Another Card</button>
					</div>

				</div>
				<!-- end list -->

			<?php endforeach; ?>
			
		</div>
		<!-- end lists -->
	</div>

			<!-- add another list -->
	<div class="list-add-another d-flex justify-content-center m-2">
		<button class="list-add-another-btn btn btn-outline-success mt-0">Add Another List</button>
		<div class="list-add hide m-1">
			<input type="text" class="list-add-input form-control" placeholder="Enter list title...">
			<button class="list-add-btn btn btn-outline-primary">Add List</button>
			<button class="list-add-close btn btn-outline-danger">Cancel</button>
		</div>
	</div>
		<!-- end add another list -->
	
	
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
