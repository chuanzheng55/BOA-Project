<?php
// $ticket_id = $_GET['ticket_id'];


include 'functions.php';

include "config.php";

?>
<?= template_header('Tickets') ?>

    <!DOCTYPE html>

    <html>
    <h1 style="font-size: 40px; margin: auto; width: 60%; padding: 10px;">Select Which Tickets to View</h1>

    <body>
        <link href="style.css" rel="stylesheet" type="text/css">

        <div class="center">
            <form>
                <a class="btn" href="TicketSummary.php?menu_choice=All">View All Tickets </a>
            </form>
        </div>
        <br>
        <div class="center">
            <form>
                <a class="btn" href="TicketSummary.php?menu_choice=Open">View Open Tickets </a>
            </form>
        </div>
        <br>
        <div class="center">
            <form>
                <a class="btn" href="TicketSummary.php?menu_choice=Resolved">View Resolved Tickets </a>
            </form>
        </div>
        <br>
        <div class="center">
            <form>
                <a class="btn" href="TicketSummary.php?menu_choice=Closed">View Closed Tickets </a>
            </form>
        </div>
        <br>
        <div class="center">
            <form>
                <a class="btn" href="TicketSummary.php?menu_choice=OnHold">View On-Hold Tickets </a>
            </form>
        </div>
    </body>

    </html>