<?php

include("db.php");

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="parking_report.csv"');

$output = fopen("php://output", "w");

// Column Names
fputcsv($output, array(
    'ID',
    'User Name',
    'Slot Name',
    'Booking Date'
));

$result = mysqli_query($conn,
"SELECT * FROM bookings ORDER BY booking_date DESC");

while($row = mysqli_fetch_assoc($result)){

    fputcsv($output, array(
        $row['id'],
        $row['user_name'],
        $row['slot_name'],
        date("d-m-Y h:i A",
        strtotime($row['booking_date']))
    ));

}

fclose($output);

exit();

?>