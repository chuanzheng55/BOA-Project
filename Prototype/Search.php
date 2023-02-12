<?php 

include "config.php";
include "functions.php";

?>
<?=template_header('Tickets')?>
<!DOCTYPE html>

<html>
    <h1 style="font-size: 40px; margin: auto; width: 60%; padding: 10px;">Search</h1>

    <body>
    <link href="style1.css" rel="stylesheet" type="text/css">
    
        <div class="center">
            <form action="TicketSummary.php" method = "get"> 
                Keyword(s): <input type ="text" name="keywordString"><br>
                <fieldset>
                    <legend>Choose your search fields</legend>
                    <div>
                        <input type="checkbox" id= "ticket_id" name="searchField[]" value="ticket_id"/><label for="ticket_id"> Ticket ID </label>
                    </div>
                    <div>
                        <input type="checkbox" id= "event_type" name="searchField[]" value="event_type"/><label for="event_type"> Event Type </label>
                    </div>
                    <div>
                        <input type="checkbox" id= "Category" name="searchField[]" value="Category"/><label for="Category"> Category </label>
                    </div>
                    <div>
                        <input type="checkbox" id= "Subcategory" name="searchField[]" value="Subcategory"/><label for="Subcategory"> Subcategory </label>
                    </div>
                    <div>
                        <input type="checkbox" id= "user_description" name="searchField[]" value="user_description"/><label for="user_description"> User Description </label>
                    </div>
                    <div>
                        <input type="checkbox" id= "administrator_comment" name="searchField[]" value="administrator_comment"/><label for="administrator_comment"> Administrator Comment </label>
                    </div>
                    <div>
                        <input type="checkbox" id= "resolver_description" name="searchField[]" value="resolver_description"/><label for="resolver_description"> Resolver Description </label>
                    </div>
                    <div>
                        <input type="checkbox" id= "solution_summary" name="searchField[]" value="solution_summary"/><label for="solution_summary"> Solution Summary </label>
                    </div>
                </fieldset>
                <input type="submit" value="Search">
            </form>
        </div>
        
    </body>
</html>