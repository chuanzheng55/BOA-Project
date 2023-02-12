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


<form action ="UpdateSuccessful.php"method="post">
<table class="table">
    
<?php $row = $result->fetch_assoc() ?>

        <tr>
            <th>Ticket ID</th> 
            <td><input type="text" id="ticket_id" name="ticket_id" readonly value="<?php echo $row['ticket_id'];?>"></td>
        </tr>

        <tr>
            <th>Customer ID</th> 
            <td>
                <input type="text" id="cust_id" name="cust_id" pattern= "[0-9]{0-11}" value="<?php echo $row['cust_id'];?>">
            </td>
        </tr>
        
        <tr>
            <th>Contact Type</th> 
            <td>
            <select id="contact_type" name="contact_type" value="">
                    <option value=""></option>
                    <option value="Email" <?php if($row['contact_type'] == 'Email'): ?> selected="selected"<?php endif; ?>>Email</option>
                    <option value="Web" <?php if($row['contact_type'] == 'Web'): ?> selected="selected"<?php endif; ?>>Web</option>
                    <option value="Phone" <?php if($row['contact_type'] == 'Phone'): ?> selected="selected"<?php endif; ?>>Phone</option>
                </select>
            </td>
        </tr>

        <tr>
            <th>Status</th> 
            <td>
                <select id="Status" name="Status" required>
                    <option value="Open" <?php if($row['Status'] == 'Open'): ?> selected="selected"<?php endif; ?>>Open</option>
                    <option value="Resolved" <?php if($row['Status'] == 'Resolved'): ?> selected="selected"<?php endif; ?>>Resolved</option>
                    <option value="Closed" <?php if($row['Status'] == 'Closed'): ?> selected="selected"<?php endif; ?>>Closed</option>
                    <option value="On-Hold" <?php if($row['Status'] == 'On-Hold'): ?> selected="selected"<?php endif; ?>>On-Hold</option>
                </select>
            </td>
        </tr>

        <tr>
            <th>Date Created</th> 
            <td>
            <input type="date" id="date_created" name="date_created" required value="<?php echo $row['date_created'];?>">
            
            </td>
        </tr>

        <tr>
            <th>Ticket Duration</th> 
            <td>
                <input type="text" id="ticket_duration" name="ticket_duration" pattern= "[0-9]{0-11}" value="<?php echo $row['ticket_duration'];?>">
                
            </td>
        </tr>

        <tr>
            <th>Event Type</th> 
            <td>
                <input type="text" id="event_type" name="event_type" required value="<?php echo $row['event_type'];?>">
            </td>
        </tr>

        <tr>
            <th>Category</th> 
            <td>
                <input type="text" id="Category" name="Category" required value="<?php echo $row['Category'];?>">
            </td>
        </tr>

        <tr>
            <th>Subcategory</th> 
            <td>
                <input type="text" id="Subcategory" name="Subcategory" required value="<?php echo $row['Subcategory'];?>">
            </td>
        </tr>

        <tr>
            <th>Severity</th>
            <td><input type="text" id="Severity" name="Severity" required value="<?php echo $row['Severity'];?>"></td>
        </tr>

        <tr>
            <th>Impact</th> 
            <td><input type="text" id="Impact" name="Impact" required value="<?php echo $row['Impact'];?>"></td>
        </tr>

        <tr>
            <th>Priority</th> 
            <td><input type="text" id="Priority" name="Priority" value="<?php echo $row['Priority'];?>"></td>
        </tr>

        <tr>
            <th>User Description</th> 
            <td><textarea id="user_description" name="user_description" rows="4" cols="50" required ><?php echo $row['user_description'];?></textarea></td>
        </tr>

        <tr>
            <th>Closed At</th> 
            <td><input type="date" id="closed_at" name="closed_at" value="<?php echo $row['closed_at'];?>"></td>
        </tr>

        <tr>
            <th>Acknowledged</th> 
            <td><input type="text" id="Acknowledged" name="Acknowledged" pattern= "[0-1]" value="<?php echo $row['Acknowledged'];?>"></td>
        </tr>

        <tr>
            <th>Opened By</th> 
            <td><input type="text" id="open_by" name="open_by" value="<?php echo $row['open_by'];?>"></td>
        </tr>

        <tr>
            <th>Assigned To</th> 
            <td><input type="text" id="assigned_to" name="assigned_to" value="<?php echo $row['assigned_to'];?>"></td>
        </tr>

        <tr>
            <th>Assigned Group</th> 
            <td><input type="text" id="assigned_group" name="assigned_group" value="<?php echo $row['assigned_group'];?>"></td>
        </tr>

        <tr>
            <th>Admin Comments</th> 
            <td><textarea id="administrator_comment" name="administrator_comment" rows="4" cols="50" ><?php echo $row['administrator_comment'];?></textarea></td>
        </tr>

        <tr>
            <th>Est Completion</th> 
            <td><input type="date" id="EST_completion" name="EST_completion" value="<?php echo $row['EST completion'];?>"></td>
        </tr>

        <tr>
            <th>Resolved By</th> 
            <td><input type="text" id="resolved_by" name="resolved_by" value="<?php echo $row['resolved_by'];?>"></td>
        </tr>

        <tr>
            <th>Error ID</th> 
            <td><input type="text" id="error_id" name="error_id" pattern= "[0-9]{0-11}" value="<?php echo $row['error_id'];?>"></td>
        </tr>

        <tr>
            <th>Manufacturer</th> 
            <td><input type="text" id="Manufacturer" name="Manufacturer" value="<?php echo $row['Manufacturer'];?>"></td>
        </tr>
        <tr>
            <th>Resolver Description</th> 
            <td><textarea id="resolver_description" name="resolver_description" rows="4" cols="50" ><?php echo $row['resolver_description'];?></textarea></td>
        </tr>

        <tr>
            <th>Solution Summary</th> 
            <td><textarea id="solution_summary" name="solution_summary" rows="4" cols="50" ><?php echo $row['solution_summary'];?></textarea></td>
        </tr>

        <tr>
            <th>Request For Change</th> 
            <td><input type="text" id="Request_for_change" name="Request_for_change" pattern= "[0-1]" value="<?php echo $row['Request_for_change'];?>"></td>
        </tr>

        <tr>
            <th>Reassignment Count</th> 
            <td><input type="text" id="reassignment_count" name="reassignment_count" pattern= "[0-9]{0-11}" value="<?php echo $row['reassignment_count'];?>"></td>
        </tr>

        <tr>
            <th>Notified</th> 
            <td><input type="text" id="notify" name="notify" pattern= "[0-1]" value="<?php echo $row['notify'];?>"></td>
        </tr>
            

</table>
    <input type="Submit" value="Submit"><br><br>
</form>

</div> 

</body>

</html>