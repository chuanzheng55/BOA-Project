<?php
include 'config.php';
include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect();
// Check if the ID param in the URL exists
if (!isset($_GET['ticket_id'])) {
    exit('ID ERROR!');
}
// MySQL query that selects the ticket by the ID column, using the ID GET request variable
$stmt = $pdo->prepare('SELECT * FROM TicketDataSheet WHERE ticket_id = ?');
$stmt->execute([$_GET['ticket_id']]);
$ticket = $stmt->fetch(PDO::FETCH_ASSOC);
// Check if ticket exists
if (!$ticket) {
    exit('Invalid ticket ID!');
}
if (isset($_GET['Status']) && in_array($_GET['Status'], array('open', 'closed', 'resolved', 'hold'))) {
    $stmt = $pdo->prepare('UPDATE TicketDataSheet SET Status = ? WHERE ticket_id = ?');
    $stmt->execute([$_GET['Status'], $_GET['ticket_id']]);
    header('Location: view.php?ticket_id=' . $_GET['ticket_id']);
    exit;

}


// if(isset($_POST['email'])&& !empty($_POST['email'])){
//     $stmt = $pdo->prepare('UPDATE TicketDataSheet SET email=:email WHERE id =:id');
//     $stmt->execute( [$_GET['id'],$_POST['email']]);
//     header('Location: view.php?id=' . $_GET['id']);
//     exit;
// }
// }
// if(isset($_POST['update']))
// {
//     $email = $_POST['email'];
//     $title = $_POST['title'];
//     $pdosql= "UPDATE TicketDataSheet SET email=:email, title=:title WHERE id=:id";
//     $pdosql_run = $pdo->prepare($pdosql);
//     $pdosql_exec = $pdosql_run->execute(array(":email"=>$email, ":title"=>$title));
//     if($pdosql_exec)
//     {
//         echo "updated";
//     }
//     else
//     {
//         echo "not updated";
//     }
// }

// Check if the comment form has been submitted
if (isset($_POST['administrator_comments']) && !empty($_POST['administrator_comments'])) {
    // Insert the new comment into the "tickets_comments" table
    $stmt = $pdo->prepare('INSERT INTO tickets_comments (ticket_id, administrator_comments) VALUES (?, ?)');
    $stmt->execute([$_GET['ticket_id'], $_POST['administrator_comments']]);
    header('Location: view.php?ticket_id=' . $_GET['ticket_id']);
    exit;
}
$stmt = $pdo->prepare('SELECT * FROM tickets_comments WHERE ticket_id = ? ORDER BY created DESC');
$stmt->execute([$_GET['ticket_id']]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?= template_header('Ticket') ?>

    <div class="content view">

        <h2>
            <?= htmlspecialchars($ticket['title'], ENT_QUOTES) ?> <span class="<?= $ticket['Status'] ?>">(
                    <?= $ticket['Status'] ?>)
                </span>
        </h2>

        <div class="ticket">
            <p class="created">
                <?= date('F dS, G:ia', strtotime($ticket['date_created'])) ?>
            </p>
            <p class="user_description">
                <?= nl2br(htmlspecialchars($ticket['user_description'], ENT_QUOTES)) ?>
            </p>
        </div>
        <h2>Update Status</h2>
        <div class="btns">
            <a href="view.php?ticket_id=<?= $_GET['ticket_id'] ?>&Status=closed" class="btn red">Close</a>
            <a href="view.php?ticket_id=<?= $_GET['ticket_id'] ?>&Status=resolved" class="btn resolve">Resolve</a>
            <a href="view.php?ticket_id=<?= $_GET['ticket_id'] ?>&Status=hold" class="btn on_hold">On-Hold</a>
        </div>

        <div class="comments">
            <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <div>
                    <i class="fas fa-comment fa-2x"></i>
                </div>
                <p>
                    <span>
                        <?= date('F dS, G:ia', strtotime($comment['created'])) ?>
                    </span>
                    <?= nl2br(htmlspecialchars($comment['administrator_comments'], ENT_QUOTES)) ?>
                </p>
            </div>
            <?php endforeach; ?>
            <form action="" method="post">
                <textarea name="administrator_comments" placeholder="Enter your comment..."></textarea>
                <!-- <input type="email" name="email" placeholder="vcu@example.com" required> -->
                <input type="submit" value="Post Comment">
                <!-- <button type="submit" name="update">Update </button> -->
            </form>
        </div>

    </div>


    </div>

    <?= template_footer() ?>