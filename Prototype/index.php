<?php 
include "config.php";
include "functions.php";
?>
<?=template_header('Tickets')?>

<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css">
    </head>
    <body>
        <br>
        <h1 style="padding-left:10px">Welcome to the Bank of America Incident Management System</h1>
        <p style="padding-left:10px">This web application is a tool used to manage, view, and search for incidents that impact Bank of America's digital services.</p>
        <br>
        <hr>
        <br>
        <a style="padding-left:10px" href= "index.php"> <i class="fa-solid fa-house"></i>Home</a>
        <p style="padding-left:10px">Returns you to this page.</p>
        <br>
        <a style="padding-left:10px" href= "create.php"><i class="fa-solid fa-pen-to-square"></i>Create</a>
        <p style="padding-left:10px">Allows manual creation of an incident ticket.</p>
        <br>
        <a style="padding-left:10px" href="TicketMenu.php"><i class="fas fa-duotone fa-list"></i>Tickets</a>
        <p style="padding-left:10px">Retrieves a summarized list of incident tickets where you view a ticket's full information, make updates to the ticket, or delete the ticket from the system.</p>
        <br>
        <a style="padding-left:10px" href="search.php"><i class="fa-solid fa-magnifying-glass"></i>Search</a> 
        <p style="padding-left:10px">Allows you to search for a keyword in the fields of your selection. Returns summarized list of incident tickets that match your search.</p>
    </body>
</html>