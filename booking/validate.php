<?php
session_start();
require_once("../dbengine/dbconnect.php");

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_GET['ticket'])) {
    $order_ref = sanitize_input($_GET['ticket']);
    
    if(empty($order_ref)) {
        if(isset($_SESSION['ORDERREF'])) {
            $order_ref = sanitize_input($_SESSION['ORDERREF']);
        } else {
            die("Invalid ticket reference");
        }
    }
    
    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM booking_details WHERE order_ref = ?");
    mysqli_stmt_bind_param($stmt, "s", $order_ref);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <html>
        <head>
            <title>Ticket Details</title>
            <style>
                .ticketbox {
                    border: 2px dashed #666;
                    font-family: 'Arial', sans-serif;
                    font-size: 14px;
                    display: inline-block;
                    width: 330px;
                    height: auto;
                    border-radius: 7px;
                    padding: 21px;
                    color: #333;
                    margin: 10px;
                    background: #fff;
                }
                .ref {
                    font-family: inherit;
                    font-weight: bold;
                    color: #28a745;
                }
                .ticket-details {
                    list-style: none;
                    padding: 0;
                }
                .ticket-details li {
                    margin: 8px 0;
                    padding: 5px 0;
                    border-bottom: 1px solid #eee;
                }
            </style>
        </head>
        <body>
            <?php
            // Sanitize all output data
            $fullname = htmlspecialchars($row['fullname']);
            $destination = htmlspecialchars($row['destination']);
            $traveldate = htmlspecialchars($row['date_reserved']);
            $travelclass = htmlspecialchars($row['class_reserved']);
            $seats = intval($row['seats_reserved']);
            $all = $seats;
            $amount = htmlspecialchars($row['amount']);
            $paymethod = htmlspecialchars($row['account']);
            $code = htmlspecialchars($row['transaction_id']);
            
            while($seats > 0) {
                echo "<div class='ticketbox'>";
                echo "<p>ORDER REF: <span class='ref'>" . htmlspecialchars($order_ref) . "</span></p>";
                echo "<ul class='ticket-details'>
                    <li>TICKET OWNER: {$fullname}</li>
                    <li>DESTINATION: {$destination}</li>
                    <li>DATE OF TRAVEL: {$traveldate}</li>
                    <li>TRAVEL CLASS: {$travelclass}</li>
                    <li>SEAT ID: {$seats} of {$all}</li>
                    <li>AMOUNT PAID: {$amount}</li>
                    <li>PAYMENT METHOD: {$paymethod}</li>
                    <li>TRANSACTION ID: {$code}</li>
                </ul>";
                echo "</div>";
                $seats--;
            }
            ?>
        </body>
        </html>
        <?php
    } else {
        echo "No ticket found with the provided reference.";
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>