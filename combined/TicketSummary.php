<?php
include 'functions.php';
include "config.php";

if (isset($_GET['menu_choice'])):
    $group = $_GET['menu_choice'];

endif;
if (isset($_GET['keywordString'])):
    $keywordString = $_GET['keywordString'];

endif;
if (isset($_GET['searchField'])):
    $searchField = $_GET['searchField'];

endif;

if (isset($group)) {
    if ($group == "Open") {
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet WHERE UPPER(Status) = 'OPEN' ";
    } else if ($group == "Resolved") {
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status FROM TicketDataSheet WHERE UPPER(Status) = 'RESOLVED' ";
    } else if ($group == "OnHold") {
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet WHERE UPPER(Status) = 'hold' OR UPPER(Status) = 'ON-HOLD'  OR UPPER(Status) = 'ONHOLD' OR UPPER(Status) = 'ON_HOLD'";
    } else if ($group == "Closed") {
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet WHERE UPPER(Status) = 'CLOSED' ";
    } else {
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet";
    }
} else if (isset($keywordString)) {
    $filler = "";
    for ($i = 0; $i < count($searchField); $i++) {
        $filler .= $searchField[$i] . " LIKE " . "'%" . $keywordString . "%'";
        if ($i < count($searchField) - 1) {
            $filler .= " OR ";
        }
    }
    echo $filler;
    $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet WHERE $filler";
} else {
    $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status FROM TicketDataSheet update ";


}


$result = $conn->query($sql);

?>


<?= template_header('Tickets') ?>


    <!DOCTYPE html>

    <html>

    <head>

        <title>View Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    </head>

    <body>

        <div class="container">

            <h2>Ticket Summary</h2>

            <table class="table">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Title</th>

                        <th>Description</th>

                        <th>Date Opened</th>

                        <th>Status</th>


                    </tr>

                </thead>

                <tbody>

                    <?php

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                    ?>

                    <tr>

                        <td>
                            <?php echo $row['ticket_id']; ?>
                        </td>

                        <td>
                            <?php echo $row['Title']; ?>
                        </td>

                        <td>
                            <?php echo $row['user_description']; ?>
                        </td>

                        <td>
                            <?php echo $row['date_created']; ?>
                        </td>

                        <td>
                            <?php echo $row['Status']; ?>
                        </td>



                        <td><a class="btn btn-info"
                                href="TicketView.php?ticket_id=<?php echo $row['ticket_id']; ?>">View</a>&nbsp;<a
                                class="btn btn-info"
                                href="view.php?ticket_id=<?php echo $row['ticket_id']; ?>">Update</a>&nbsp;<a
                                class="btn btn-danger"
                                href="delete.php?ticket_id=<?php echo $row['ticket_id']; ?>">Delete</a></td>

                    </tr>

                    <?php }

                    }

                    ?>

                </tbody>

            </table>

        </div>

    </body>

    </html>