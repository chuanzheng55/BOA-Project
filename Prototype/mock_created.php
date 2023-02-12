
<?php

include "config.php";
include "functions.php";


    $request_body = file_get_contents('http://127.0.0.1:5000/output');
    $data = json_decode($request_body, true);


$cust_id = $data['cust_id'];
$contact_type = $data['contact_type'];
$Status = $data['Status'];
$date_created = $data['date_created'];
$ticket_duration = $data['ticket_duration'];
$event_type = $data['event_type'];
$Category = $data['Category'];
$Subcategory = $data['Subcategory'];
$Severity = $data['Severity'];
$Impact = $data['Impact'];
$Priority = $data['Priority'];
$user_description = $data['user_description'];
$closed_at = $data['closed_at'];
$Acknowledged = $data['Acknowledged'];
$open_by = $data['open_by'];
$open_at = $data['open_at'];
$assigned_to = $data['assigned_to'];
$assigned_group = $data['assigned_group'];
$administrator_comment = $data['administrator_comment'];
$EST_completion = $data['EST_completion'];
$resolved_by = $data['resolved_by'];
$error_id = $data['error_id'];
$Manufacturer = $data['Manufacturer'];
$resolver_description = $data['resolver_description'];
$solution_summary = $data['solution_summary'];
$Request_for_change = $data['Request_for_change'];
$reassignment_count = $data['reassignment_count'];
$notify = $data['notify'];
    
// echo $event_type, $user_description, $date_created, $Category, $Subcategory, $Severity, $Impact,
// $cust_id, $contact_type, $ticket_duration, $Priority, $closed_at, $Acknowledged, $open_by,
// $open_at, $assigned_to, $assigned_group, $administrator_comment, $EST_completion,
// $Manufacturer,$resolver_description, $solution_summary, $Request_for_change,
// $reassignment_count,
// $notify
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