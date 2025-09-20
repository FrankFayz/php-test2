<?php

include 'connection.php';

// Directly set the number plate to delete
$numberPlate = "bba 435k"; // Change this valu yoy as needed.

if ($numberPlate != '') {
    $stmt = $connection->prepare("DELETE FROM cargo WHERE numberPlate = ?");
    $stmt->bind_param("s", $numberPlate);
    if ($stmt->execute()) {
        echo "Record Deleted";
    } else {
        echo "ERROR: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid NumberPlate";
}
?>
