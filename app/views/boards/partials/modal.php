
<!-- Modal -->
	<div class="modal-header">
		<input class="mod-card-id" type="hidden" value="<?php echo $this->card['id']; ?>">
		<div class="mod-title" id="mod-title--">
			<input type="text" class="mod-card-title form-control" value="<?php echo $this->card['title']; ?>">
		</div>
		<button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>

	<div class="modal-body mod-description">
		<div class="mod-description-header my-1">
			<h5 class="mod-h5 d-inline">Description</h5>
		</div>
		<div class="mod-description-content">
			<textarea class="mod-description-textarea mod-textarea form-control" rows="4"><?php echo $this->card['description']; ?></textarea>
		</div>
		<div class="mod-description-controls hide">
			<button class="btn-mod-description-save btn btn-sm btn-default">Save</button>
			<button class="btn-mod-description-clear btn btn-sm btn-danger">Clear</button>
			<button class="close-mod-description-controls btn btn-sm btn-primary">Close</button>
		</div>
	</div>

	<div class="modal-body mod-checklist">
		<div class="mod-checklist-header">
			<h5 class="mod-h5 mod-checklist-h5">Checklist</h5>
		</div>
		<div class="mod-checklist-items">
			<?php foreach($this->checklistItems as $checklistItem): ?>
				<div class="mod-checklist-item d-flex" id="mod-checklist-item--<?php echo $checklistItem['id']; ?>">
					<div class="form-check mod-checklist-item-check" id="mod-checklist-item-check--<?php echo $checklistItem['id']; ?>">
						<input type="checkbox" class="form-check-input mod-checklist-item-is-completed" id="mod-checklist-item-is-completed--<?php echo $checklistItem['id']; ?>" value="<?php echo $checklistItem['is_completed']; ?>" <?php if ($checklistItem['is_completed'] == 1) echo "checked"; ?>>
						<label class="form-check-label" for="mod-checklist-item-is-completed--<?php echo $checklistItem['id']; ?>"></label>
					</div>
					<div class="mod-checklist-item-details" id="mod-checklist-item-details--<?php echo $checklistItem['id']; ?>">
						<span class="mod-checklist-item-text" id="mod-checklist-item-text--<?php echo $checklistItem['id']; ?>"><?php echo $checklistItem['text']; ?></span>
					</div>
					<div class="mod-checklist-item-controls ml-auto d-flex" id="mod-checklist-item-controls--<?php echo $checklistItem['id']; ?>">
						<div class="m-1"><span>
							<i class="fa fa-edit mod-checklist-item-control mod-checklist-item-edit" id="mod-checklist-item-edit--<?php echo $checklistItem['id']; ?>"></i>
						</span></div>
						<div class="m-1"><span>
							<i class="fa fa-times red-text mod-checklist-item-control mod-checklist-item-delete" id="mod-checklist-item-delete--<?php echo $checklistItem['id']; ?>"></i>
						</span></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="mod-checklist-item-add-an mt-3">
			<button class="btn-mod-checklist-item-add-an btn btn-sm btn-primary">Add an Item</button>
		</div>
	</div>

	<div class="modal-body mod-add-comment">
		<div class="mod-add-comment-header">
			<h5 class="mod-h5 mod-add-comment-h5">Comments</h5>
		</div>
		<div class="mod-add-comment-content">
			<textarea class="mod-add-comment-textarea form-control" placeholder="Write a comment..." rows="4"></textarea>
			<div class="err err-mod-add-comment"><span class="err-msg-text err-msg-mod-add-comment"></span></div>
		</div>
		<div class="my-2 mod-add-comment-controls">
			<button class="btn-mod-add-comment-add btn btn-sm btn-default" data-commentid="">Add Comment</button>
			<button class="btn-mod-add-comment-update btn btn-sm btn-default hide" data-commentid="">Update Comment</button>
			<button class="btn-mod-add-comment-cancel btn btn-sm btn-primary hide">Cancel</button>
		</div>
	</div>


	<div class="modal-body mod-comments mb-3">
		<?php foreach($this->comments as $comment): ?>
			<div class="mod-comment" id="mod-comment--<?php echo $comment['id']; ?>">
				<div class="mod-comment-content my-3">
					<p class="mod-comment-text" id="mod-comment-text--<?php echo $comment['id']; ?>"><?php echo $comment['text']; ?></p>
				</div>
				<div class="mod-comment-controls my-3">
					<a class="mod-comment-control mod-comment-edit" id="mod-comment-edit--<?php echo $comment['id']; ?>">Edit</a>
					<a class="mod-comment-control mod-comment-delete" id="mod-comment-delete--<?php echo $comment['id']; ?>">Delete</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<!-- Modal -->