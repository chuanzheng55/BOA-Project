<?php 

include "config.php";
include "functions.php";

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

$sql1 = "INSERT INTO `TicketDataSheet` (";
$sql2 = "(";
if($cust_id != NULL){
    //echo "This isnt Working!";
    $sql1.=" `cust_id`, ";
    $sql2.= $cust_id . ", ";
}
if($contact_type != ''){
    $sql1.=" `contact_type`, ";
    $sql2.= "'" . $contact_type . "', ";
}
if(isset($Status)){
    $sql1.=" `Status`, ";
    $sql2.= "'" . $Status . "', ";
}
if($ticket_duration != NULL){
    $sql1.=" `ticket_duration`, ";
    $sql2.= $ticket_duration . ", ";
}
if(isset($event_type)){
    $sql1.=" `event_type`, ";
    $sql2.= "'" . $event_type . "', ";
}
if(isset($Category)){
    $sql1.=" `Category`, ";
    $sql2.= "'" . $Category . "', ";
}
if(isset($Subcategory)){
    $sql1.=" `Subcategory`, ";
    $sql2.= "'" . $Subcategory . "', ";
}
if(isset($Severity)){
    $sql1.=" `Severity`, ";
    $sql2.= "'" . $Severity . "', ";
}
if(isset($Impact)){
    $sql1.=" `Impact`, ";
    $sql2.= "'" . $Impact . "', ";
}
if($Priority != ''){
    $sql1.=" `Priority`, ";
    $sql2.= "'" . $Priority . "', ";
}
if(isset($user_description)){
    $sql1.=" `user_description`, ";
    $sql2.= "'" . $user_description . "', ";
}
if($closed_at != ''){
    $sql1.=" `closed_at`, ";
    $sql2.= "'" . $closed_at . "', ";
}
if($Acknowledged != NULL){
    $sql1.=" `Acknowledged`, ";
    $sql2.= $Acknowledged . ", ";
}
if($open_by != ''){
    $sql1.=" `open_by`, ";
    $sql2.= "'" . $open_by . "', ";
}
if($open_at != ''){
    $sql1.=" `open_at`, ";
    $sql2.= "'" . $open_at . "', ";
}
if($assigned_to != ''){
    $sql1.=" `assigned_to`, ";
    $sql2.= "'" . $assigned_to . "', ";
}
if($assigned_group != ''){
    $sql1.=" `assigned_group`, ";
    $sql2.= "'" . $assigned_group . "', ";
}
if($administrator_comment != ''){
    $sql1.=" `administrator_comment`, ";
    $sql2.= "'" . $administrator_comment . "', ";
}
if($EST_completion != ''){
    //echo "made it";
    $sql1.=" `EST completion`, ";
    $sql2.= "'" . $EST_completion . "', ";
}
if($resolved_by != ''){
    $sql1.=" `resolved_by`, ";
    $sql2.= "'" . $resolved_by . "', ";
}
if($error_id != NULL){
    $sql1.=" `error_id`, ";
    $sql2.= $error_id . ", ";
}
if($Manufacturer != ''){
    $sql1.=" `Manufacturer`, ";
    $sql2.= "'" . $Manufacturer . "', ";
}
//acting weird
if($resolver_description != ''){
    $sql1.=" `resolver_description`, ";
    $sql2.= "'" . $resolver_description . "', ";
}
if($solution_summary != ''){
    $sql1.=" `solution_summary`, ";
    $sql2.= "'" . $solution_summary . "', ";
}
if($Request_for_change != NULL){
    $sql1.=" `Request_for_change`, ";
    $sql2.= $Request_for_change . ", ";
}
if($reassignment_count != NULL){
    $sql1.=" `reassignment_count`, ";
    $sql2.= $reassignment_count . ", ";
}
if($notify != NULL){
    $sql1.=" `notify`, ";
    $sql2.= $notify . ", ";
}
if($date_created != ''){
    $sql1.=" `date_created`) VALUES ";
    $sql2.= "'" . $date_created . "')";
}

//echo $sql1;
//echo $sql2;
$sql1 .= $sql2;
//echo $sql1;

//This works as long as every field is initialized on the create page. Working on use of default values. 
//$sql = "INSERT INTO `TicketDataSheet` (`cust_id`, `contact_type`, `Status`, `ticket_duration`, `event_type`, `Category`, `Subcategory`, `Severity`, `Impact`, `Priority`, `user_description`, `closed_at`, `Acknowledged`, `open_by`, `open_at`, `assigned_to`, `assigned_group`, `administrator_comment`, `EST completion`, `resolved_by`, `error_id`, `Manufacturer`, `resolver_description`, `solution_summary`, `Request_for_change`, `reassignment_count`, `notify`, `date_created`) VALUES
//($cust_id, '$contact_type', '$Status', $ticket_duration, '$event_type', '$Category', '$Subcategory', '$Severity', '$Impact', '$Priority', '$user_description', '$closed_at', $Acknowledged, '$open_by', '$open_at', '$assigned_to', '$assigned_group', '$administrator_comment', '$EST_completion', '$resolved_by', $error_id, '$Manufacturer', '$resolver_description', '$solution_summary', $Request_for_change, $reassignment_count, $notify, '$date_created')";

if($conn->query($sql1) === TRUE){
    echo "New record created successfully";
}
else{
    echo "error";
}

header("Refresh:1; url=TicketSummary.php?menu_choice=All");


?>