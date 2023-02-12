<?php 

include "config.php";
include "functions.php";
?>

<?=template_header('Tickets')?>

<?php 
//Need to rewrite delete function so that it does not come to this page so you can delete repeatedly. 
if (isset($_GET['ticket_id'])) {

    $user_id = $_GET['ticket_id'];

    $sql = "DELETE FROM TicketDataSheet WHERE ticket_id = $user_id";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("Refresh:1; url=TicketSummary.php?menu_choice=All");

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>