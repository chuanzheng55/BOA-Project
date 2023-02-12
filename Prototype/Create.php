<?php 

include "config.php";
include "functions.php";

?>
<?php
$a = "http://localhost/PRototype/mock_created.php";

?>
<?=template_header('Tickets')?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>Create A New Incident Ticket</h1>
            <!-- <form action="Created.php" method="post"> -->
            <form action="http://127.0.0.1:5000/entry" method="POST" enctype="multipart/form-data">
                <br>
                
                <label for="Status">Status*:</label><br>
                <select id="Status" name="Status" required>
                    <option value="Open">Open</option>
                    <option value="Resolved">Resolved</option>
                    <option value="Closed">Closed</option>
                    <option value="On-Hold">On-Hold</option>
                </select><br><br>

                <label for="date_created">Date Created*:</label><br>
                <input type="date" id="date_created" name="date_created" required><br><br>

                <label for="event_type">Event Type*:</label><br>
                <input type="text" id="event_type" name="event_type" required><br><br>

                <label for="Category">Category*:</label><br>
                <input type="text" id="Category" name="Category" required ><br><br>

                <label for="Subcategory">Subcategory*:</label><br>
                <input type="text" id="Subcategory" name="Subcategory" required ><br><br>

                <label for="Severity">Severity*:</label><br>
                <input type="text" id="Severity" name="Severity" required><br><br>

                <label for="Impact">Impact*:</label><br>
                <input type="text" id="Impact" name="Impact" required><br><br>

                <label for="user_description">User Description*:</label><br>
                <textarea id="user_description" name="user_description" rows="4" cols="50" required></textarea><br><br>

                <label for="cust_id">Customer ID:</label><br>
                <input type="text" id="cust_id" name="cust_id" pattern= "[0-9]{0-11}" ><br><br>

                <label for="contact_type">Contact Type:</label><br>
                <select id="contact_type" name="contact_type">
                    <option value=""></option>
                    <option value="Email">Email</option>
                    <option value="Web">Web</option>
                    <option value="Phone">Phone</option>
                </select><br><br>
                
                <label for="ticket_duration">Ticket Duration:</label><br>
                <input type="text" id="ticket_duration" name="ticket_duration" pattern= "[0-9]{0-11}" ><br><br>

                <label for="Priority">Priority:</label><br>
                <input type="text" id="Priority" name="Priority" ><br><br>

                <label for="closed_at">Closed At:</label><br>
                <input type="date" id="closed_at" name="closed_at"><br><br>

                <label for="Acknowledged">Acknowledged:</label><br>
                <input type="text" id="Acknowledged" name="Acknowledged" pattern= "[0-1]" ><br><br>

                <label for="open_by">Opened By:</label><br>
                <input type="text" id="open_by" name="open_by" ><br><br>

                <label for="open_at">Opened On:</label><br>
                <input type="date" id="open_at" name="open_at"  ><br><br>

                <label for="assigned_to">Assigned To:</label><br>
                <input type="text" id="assigned_to" name="assigned_to" ><br><br>

                <label for="assigned_group">Assigned Group:</label><br>
                <input type="text" id="assigned_group" name="assigned_group" ><br><br>

                <label for="administrator_comment">Administrator Comment:</label><br>
                <textarea id="administrator_comment" name="administrator_comment" rows="4" cols="50" ></textarea><br><br>

                <label for="EST_completion">EST Completion:</label><br>
                <input type="date" id="EST_completion" name="EST_completion"><br><br>

                <label for="resolved_by">Resolved By:</label><br>
                <input type="text" id="resolved_by" name="resolved_by" ><br><br>

                <label for="error_id">Error Id:</label><br>
                <input type="text" id="error_id" name="error_id" pattern= "[0-9]{0-11}" ><br><br>

                <label for="Manufacturer">Manufacturer:</label><br>
                <input type="text" id="Manufacturer" name="Manufacturer" ><br><br>

                <label for="resolver_description">Resolver Description:</label><br>
                <textarea id="resolver_description" name="resolver_description" rows="4" cols="50" ></textarea><br><br>

                <label for="solution_summary">Solution Summary:</label><br>
                <textarea id="solution_summary" name="solution_summary" rows="4" cols="50" ></textarea><br><br>

                <label for="Request_for_change">Request For Change:</label><br>
                <input type="text" id="Request_for_change" name="Request_for_change" pattern= "[0-1]" ><br><br>

                <label for="reassignment_count">Reassignment Count:</label><br>
                <input type="text" id="reassignment_count" name="reassignment_count" pattern= "[0-9]{0-11}" ><br><br>

                <label for="notify">Notified:</label><br>
                <input type="text" id="notify" name="notify" pattern= "[0-1]" ><br><br>

                <!-- <input type="Submit" value="Submit"><br><br> -->
                <button class="btn btn-success "type="submit" onClick="window.open('http://localhost/PRototype/mock_created.php')"> Submit </button>



            </form>
        </div>
    </body>
</html>