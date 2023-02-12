<?php 
$ticket_id = $_GET['ticket_id'];

//echo "ticket id: is " . $ticket_id;


include "config.php";
include "functions.php";
$sql = "SELECT *  FROM TicketDataSheet WHERE ticket_id = $ticket_id ";
$result = $conn->query($sql);

?>
<?=template_header('Tickets')?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Ticket Detail View</h2>



<table class="table">
    
<?php $row = $result->fetch_assoc() ?>

        <tr>
            <th>Ticket ID</th> 
            <td><?php echo $row['ticket_id'];?></td>
        </tr>

        <tr>
            <th>Customer ID</th> 
            <td><?php echo $row['cust_id'];?></td>
        </tr>
        
        <tr>
            <th>Contact Type</th> 
            <td><?php echo $row['contact_type'];?></td>
        </tr>

        <tr>
            <th>Status</th> 
            <td><?php echo $row['Status'];?></td>
        </tr>

        <tr>
            <th>Date Created</th> 
            <td><?php echo $row['date_created'];?></td>
        </tr>

        <tr>
            <th>Ticket Duration</th> 
            <td><?php echo $row['ticket_duration'];?></td>
        </tr>

        <tr>
            <th>Event Type</th> 
            <td><?php echo $row['event_type'];?></td>
        </tr>

        <tr>
            <th>Category</th> 
            <td><?php echo $row['Category'];?></td>
        </tr>

        <tr>
            <th>Subcategory</th> 
            <td><?php echo $row['Subcategory'];?></td>
        </tr>

        <tr>
            <th>Severity</th>
            <td><?php echo $row['Severity'];?></td>
        </tr>

        <tr>
            <th>Impact</th> 
            <td><?php echo $row['Impact'];?></td>
        </tr>

        <tr>
            <th>Priority</th> 
            <td><?php echo $row['Priority'];?></td>
        </tr>

        <tr>
            <th>User Description</th> 
            <td><?php echo $row['user_description'];?></td>
        </tr>

        <tr>
            <th>Closed At</th> 
            <td><?php echo $row['closed_at'];?></td>
        </tr>

        <tr>
            <th>Acknowledged</th> 
            <td><?php echo $row['Acknowledged'];?></td>
        </tr>

        <tr>
            <th>Opened By</th> 
            <td><?php echo $row['open_by'];?></td>
        </tr>

        <tr>
            <th>Assigned To</th> 
            <td><?php echo $row['assigned_to'];?></td>
        </tr>

        <tr>
            <th>Assigned Group</th> 
            <td><?php echo $row['assigned_group'];?></td>
        </tr>

        <tr>
            <th>Admin Comments</th> 
            <td><?php echo $row['administrator_comment'];?></td>
        </tr>

        <tr>
            <th>Est Completion</th> 
            <td><?php echo $row['EST completion'];?></td>
        </tr>

        <tr>
            <th>Resolved By</th> 
            <td><?php echo $row['resolved_by'];?></td>
        </tr>

        <tr>
            <th>Error ID</th> 
            <td><?php echo $row['error_id'];?></td>
        </tr>

        <tr>
            <th>Manufacturer</th> 
            <td><?php echo $row['Manufacturer'];?></td>
        </tr>
        <tr>
            <th>Resolver Description</th> 
            <td><?php echo $row['resolver_description'];?></td>
        </tr>

        <tr>
            <th>Solution Summary</th> 
            <td><?php echo $row['solution_summary'];?></td>
        </tr>

        <tr>
            <th>Request For Change</th> 
            <td><?php echo $row['Request_for_change'];?></td>
        </tr>

        <tr>
            <th>Reassignment Count</th> 
            <td><?php echo $row['reassignment_count'];?></td>
        </tr>

        <tr>
            <th>Notified</th> 
            <td><?php echo $row['notify'];?></td>
        </tr>



    

    

</table>

</div> 

</body>

</html>