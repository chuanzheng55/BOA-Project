<?php
function pdo_connect() {
    //details below with your MySQL details
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'incident_db';
    try {
    	return new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <p> <img src="boa.png" alt="bank of america logo" style = "float:right; height:80px;"> </p>
                <h1>Ticketing Management</h1>
                <a href= "index.php"> <i class="fa-solid fa-house"></i>Home</a>
                <a href= "create.php"><i class="fa-solid fa-pen-to-square"></i>Create</a>
                <a href="TicketMenu.php"><i class="fas fa-duotone fa-list"></i>Tickets</a>
                <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i>Search</a> 
            </div>
        </nav>
    EOT;
    }
    //  <div class="input-group">
    // //     <div class= "form-outline">
    // //         <input type= "search" id= "form1 class= "form-control" style = "float:right; width:100px; height:50px;" />
    // //         <lable class="form-label" for="form1>Search</lable>
    // //     </div>
    // //     <button type ="button" class="btn btn-primary">
    // //         <i class = "fas fa-search"></i>
    // //     </button>
    // // </div>    

    // Template footer
function template_footer() {
    echo <<<EOT
        </body>
       
    </html>
    EOT;
    }
    ?>