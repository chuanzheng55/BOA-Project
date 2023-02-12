<?php
include 'config.php';
include 'functions.php';
$pdo = pdo_connect();
// Output message variable
$msg = '';
// Check if POST data exists (user submitted the form)
if (isset($_POST['title'], $_POST['email'], $_POST['user_description'], $_POST['event_type'], $_POST['Category'])) {
    // Validation checks... make sure the POST data is not empty
    if (empty($_POST['title']) || empty($_POST['email']) || empty($_POST['user_description']) || empty($_POST['event_type']) || empty($_POST['Category'])) {
        $msg = 'Please complete the form!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $msg = 'Please provide a valid email address!';
    } else {
        // Insert new record into the tickets table
        $stmt = $pdo->prepare('INSERT INTO TicketDataSheet (title, email, user_description, event_type,Category) VALUES (?, ?, ?, ?,?)');
        $stmt->execute([$_POST['title'], $_POST['email'], $_POST['user_description'], $_POST['event_type'], $_POST['Category']]);
        // Redirect to the view ticket page, the user will see their created ticket on this page
        header('Location: view.php?ticket_id=' . $pdo->lastInsertId());
    }
}
?>
<?= template_header('Create Ticket') ?>

    <!-- For create page
//event type
//catory
//subcatory
//user_desrciption
//contact type
//status -->

    <div class="content create">
        <h2>Create Ticket</h2>
        <form action="create.php" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Title" id="title" required>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="vcu@example.com" required>


            <label for="event_type">Event Type:</label>
            <select name="event_type">
                <option value="System events"> System events</option>
                <option value="Web Server">Web Server</option>
                <option value="Application"> Application</option>
                <option value="Network Server">Network Server</option>
                <option value="Storage">Storage</option>
            </select>
            <br>

            <label for="Category">Category:</label>
            <select name="Category">
                <option value="Help/Assistance">Help/Assistance</option>
                <option value="Software">Software</option>
                <option value="Hardware">Hardware</option>
                <option value="Database">Database</option>
                <option value="Fault">Fault</option>
            </select>
            <br>

            <label for="user_description">Message</label>
            <textarea name="user_description" placeholder="Enter your message here..." id="user_description"
                required></textarea>
            <input type="submit" value="Create">
            <button type="reset" value="Reset">Clear</button>
        </form>
        <!-- <button id="cancel" type="cancel" onclick="window.location='index.php'">Cancel</button> -->

        <?php if ($msg): ?>
        <p>
            <?= $msg ?>
        </p>
        <?php endif; ?>
    </div>

    <?= template_footer() ?>