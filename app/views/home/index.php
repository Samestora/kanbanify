<?php $this->setPageTitle('Home'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="container mt-5">
	<div class="project-description">
		<div class="my-4">
			<h4 class="my-3" style="display:flex; justify-content: center;">What’s Kanban Board?</h4>
			<p>A kanban board is an agile project management tool designed to help  visualize work, limit work-in-progress, and maximize efficiency (or  flow). It can help both Agile and DevOps teams establish order in their daily work. Kanban boards use cards,  columns, and continuous improvement to help technology and service teams commit to the right amount of work, and get it done!</p>
		</div>
		
		<div class="my-4">
			<h4 class="my-3">Elements of a kanban board</h4>
			<p>David Anderson established that kanban boards can be broken down into five  components: Visual signals, columns, work-in-progress limits, a  commitment point, and a delivery point.
			Visual Signals — One of the first things you’ll notice about a kanban board are the  visual cards (stickies, tickets, or otherwise). Kanban teams write all  of their projects and work items onto cards, usually one per card. For  agile teams, each card could encapsulate one user story. Once on the board, these visual signals help teammates and stakeholders quickly understand what the team is working on.
			Columns — Another hallmark of the kanban board are the columns. Each column  represents a specific activity that together compose a “workflow”. Cards flow through the workflow until completion. Workflows can be as simple as “To Do,” “In Progress,” “Complete,” or much more complex.
			Work In Progress (WIP) Limits — WIP limits are the maximum number of cards that can be in one column  at any given time. A column with a WIP limit of three cannot have more  than three cards in it. When the column is “maxed-out” the team needs to swarm on those cards and move them forward before new cards can move  into that stage of the workflow. These WIP limits are critical for  exposing bottlenecks in the workflow and maximizing flow. WIP limits  give you an early warning sign that you committed to too much work.
			Commitment point — Kanban teams often have a backlog for their board. This is where  customers and teammates put ideas for projects that the team can pick up when they are ready. The commitment point is the moment when an idea is picked up by the team and work starts on the project.
			Delivery point — The delivery point is the end of a kanban team’s workflow. For most  teams, the delivery point is when the product or service is in the hands of the customer. The team’s goal is to take cards from the commitment  point to the delivery point as fast as possible. The elapsed time  between the two is the called Lead Time. Kanban teams are continuously  improving to decrease their lead time as much as possible.  </p>
		</div>
	</div>
</div>

<?php $this->end(); ?>