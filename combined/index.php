<?php
include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect();
// MySQL query that retrieves  all the tickets from the databse
$stmt = $pdo->prepare('SELECT * FROM TicketDataSheet ORDER BY date_created DESC');
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?= template_header('Tickets') ?>

	<div class="content home">

		<h2>Incident Tickets</h2>

		<p>You can view the list of existing tickets below</p>

		<!-- <div class="btns">
			<a href="create.php" class="btn">Search
				<i class=" fas fa-regular fa-magnifying-glass"></i>

			</a>
		</div> -->

		<div class="tickets_list">
			<?php foreach ($tickets as $ticket): ?>
			<a href="view.php?ticket_id=<?= $ticket['ticket_id'] ?>" class="ticket">
				<span class="con">
					<?php if ($ticket['Status'] == 'open'): ?>
					<i class="far fa-clock fa-2x open"></i>
					<?php elseif ($ticket['Status'] == 'resolved'): ?>
					<i class="fas fa-check fa-2x resolved"></i>
					<?php elseif ($ticket['Status'] == 'hold'): ?>
					<i class="fas fa-exclamation-triangle fa-2x hold "></i>
					<?php elseif ($ticket['Status'] == 'closed'): ?>
					<i class="fas fa-times fa-2x closed "></i>

					<?php endif; ?>
				</span>
				<span class="con">
					<span class="title">
						<?= htmlspecialchars($ticket['title'], ENT_QUOTES) ?>
					</span>
					<span class="user_description">
						<?= htmlspecialchars($ticket['user_description'], ENT_QUOTES) ?>
					</span>
				</span>
				<span class="con created">
					<?= date('F dS, G:ia', strtotime($ticket['date_created'])) ?>
				</span>
			</a>
			<?php endforeach; ?>
		</div>

	</div>

	<?= template_footer() ?>