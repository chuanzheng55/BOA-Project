<?php

include "config.php";

if (isset($_GET['ticket_id'])) {

    $user_id = $_GET['ticket_id'];

    $sql = "DELETE FROM TicketDataSheet WHERE ticket_id = $user_id";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record deleted successfully.";

    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}

?>