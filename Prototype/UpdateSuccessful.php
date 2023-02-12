<?php 

include "config.php";
include "functions.php";

$ticket_id = $_POST['ticket_id'];
$cust_id = $_POST['cust_id'];
$contact_type = $_POST['contact_type'];
$Status = $_POST['Status'];
$date_created = $_POST['date_created'];
$ticket_duration = $_POST['ticket_duration'];
$event_type = $_POST['event_type'];
$Category = $_POST['Category'];
$Subcategory = $_POST['Subcategory'];
$Severity = $_POST['Severity'];
$Impact = $_POST['Impact'];
$Priority = $_POST['Priority'];
$user_description = $_POST['user_description'];
$closed_at = $_POST['closed_at'];
$Acknowledged = $_POST['Acknowledged'];
$open_by = $_POST['open_by'];
$open_at = $_POST['open_at'];
$assigned_to = $_POST['assigned_to'];
$assigned_group = $_POST['assigned_group'];
$administrator_comment = $_POST['administrator_comment'];
$EST_completion = $_POST['EST_completion'];
$resolved_by = $_POST['resolved_by'];
$error_id = $_POST['error_id'];
$Manufacturer = $_POST['Manufacturer'];
$resolver_description = $_POST['resolver_description'];
$solution_summary = $_POST['solution_summary'];
$Request_for_change = $_POST['Request_for_change'];
$reassignment_count = $_POST['reassignment_count'];
$notify = $_POST['notify'];

?>
<?=template_header('Tickets')?>

<?php

$sql = "UPDATE `TicketDataSheet` SET ";
if($cust_id != NULL){
    $sql.=" `cust_id` = $cust_id, ";
}
if($contact_type != ''){
    $sql.=" `contact_type`= " . "'" . $contact_type . "', ";
}
if(isset($Status)){
    $sql.=" `Status`= '" . $Status . "', ";
}
if($ticket_duration != NULL){
    $sql.=" `ticket_duration` = $ticket_duration, ";
}
if(isset($event_type)){
    $sql.=" `event_type`= "."'" . $event_type . "', ";
}
if(isset($Category)){
    $sql.=" `Category`= "."'" . $Category . "', ";
}
if(isset($Subcategory)){
    $sql.=" `Subcategory`= "."'" . $Subcategory . "', ";
}
if(isset($Severity)){
    $sql.=" `Severity`= "."'" . $Severity . "', ";
}
if(isset($Impact)){
    $sql.=" `Impact`= "."'" . $Impact . "', ";
}
if($Priority != ''){
    $sql.=" `Priority`= "."'" . $Priority . "', ";
}
if(isset($user_description)){
    $sql.=" `user_description`= "."'" . $user_description . "', ";
}
if($closed_at != ''){
    $sql.=" `closed_at`= "."'" . $closed_at . "', ";
}
if($Acknowledged != NULL){
    $sql.=" `Acknowledged`= $Acknowledged, ";
}
if($open_by != ''){
    $sql.=" `open_by`= "."'" . $open_by . "', ";
}
if($open_at != ''){
    $sql.=" `open_at`= "."'" . $open_at . "', ";
}
if($assigned_to != ''){
    $sql.=" `assigned_to`= "."'" . $assigned_to . "', ";
}
if($assigned_group != ''){
    $sql.=" `assigned_group`= "."'" . $assigned_group . "', ";
}
if($administrator_comment != ''){
    $sql.=" `administrator_comment`= "."'" . $administrator_comment . "', ";
}
if($EST_completion != ''){
    $sql.=" `EST completion`= "."'" . $EST_completion . "', ";
}
if($resolved_by != ''){
    $sql.=" `resolved_by`= "."'" . $resolved_by . "', ";
}
if($error_id != NULL){
    $sql.=" `error_id` = $error_id, ";
}
if($Manufacturer != ''){
    $sql.=" `Manufacturer`= "."'" . $Manufacturer . "', ";
}
if($resolver_description != ''){
    $sql.=" `resolver_description`= "."'" . $resolver_description . "', ";
}
if($solution_summary != ''){
    $sql.=" `solution_summary`= "."'" . $solution_summary . "', ";
}
if($Request_for_change != NULL){
    $sql.=" `Request_for_change`= $Request_for_change, ";
}
if($reassignment_count != NULL){
    $sql.=" `reassignment_count`= $reassignment_count, ";
}
if($notify != NULL){
    $sql.=" `notify`= $notify, ";
}
if($date_created != ''){
    $sql.=" `date_created`= "."'" . $date_created . "' ";
}

$sql.= "WHERE ticket_id = $ticket_id;";

//echo $sql;


if($conn->query($sql) === TRUE){
  echo "Ticket ID $ticket_id updated successfully";
}
else{
    echo "error";
}


?>