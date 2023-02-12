<?php 

include "config.php";
include "functions.php";
?>
<?=template_header('Tickets')?>
<?php


$group = $_GET['menu_choice'];
$keywordString = $_GET['keywordString'];
$keywordString = trim($keywordString);
$searchField = $_GET['searchField'];



if(isset($group)){
    if($group == "Open"){
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet WHERE UPPER(Status) = 'OPEN' ";
    }
    else if($group == "Resolved"){
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status FROM TicketDataSheet WHERE UPPER(Status) = 'RESOLVED' ";
    }
    else if($group == "OnHold"){
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet WHERE UPPER(Status) = 'ON HOLD' OR UPPER(Status) = 'ON-HOLD'  OR UPPER(Status) = 'ONHOLD' OR UPPER(Status) = 'ON_HOLD'";
    }
    else if($group == "Closed"){
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet WHERE UPPER(Status) = 'CLOSED' ";
    }
    else{
        $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet";
    }
}

else if(isset($keywordString)){
    $filler = "";
    $keywordArray = explode(" ", $keywordString);
    for($j=0; $j<count($keywordArray); $j++){
        for($i=0; $i<count($searchField); $i++){
            $filler .= $searchField[$i] . " LIKE " . "'%" . $keywordArray[$j] . "%'";
            if($i < count($searchField) - 1){
                $filler .= " OR ";
            }
        }
        if($j < count($keywordArray) - 1){
            $filler .= " OR ";
        }
    }
    //echo $filler;
    $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status  FROM TicketDataSheet WHERE $filler";
}

else{
    $sql = "SELECT ticket_id, CONCAT(event_type, ' ', Category, ' ', Subcategory) AS Title, user_description, date_created, Status FROM TicketDataSheet";
}


$result = $conn->query($sql);

?>

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

                    <td><?php echo $row['ticket_id']; ?></td>

                    <td><?php echo $row['Title']; ?></td>

                    <td width ="20%"><?php echo $row['user_description']; ?></td>

                    <td><?php echo $row['date_created']; ?></td>

                    <td><?php echo $row['Status']; ?></td>


                    
                    <td><a class="btn btn-info" href="TicketView.php?ticket_id=<?php echo $row['ticket_id']; ?>">View</a>&nbsp;<a class="btn btn-info" href="TicketUpdate.php?ticket_id=<?php echo $row['ticket_id']; ?>">Update</a>&nbsp;<a class="btn btn-danger" href="delete.php?ticket_id=<?php echo $row['ticket_id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }
        else{
            ?>
            <td>No Results Found</td>
            <?php
            
        }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>