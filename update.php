<?php
include 'connection.php';
//get the updated values from the submitted form.
//the primary key to identify which record to update.
$numberPlate = $_POST["numberPlate"];
$userRole = $_POST["userRole"];//the new user role.
$name = $_POST["name"]; //the new name and even other fields may be included.
//prepare an sql to update the record withthe gven number plate.
$stmt = $connection->prepare("UPDATE cargo SET userRole = ?, name = ? WHERE numberPlate = ?");
//bind the variables to be prepared as Strings.
$stmt->bind_param("sss", $userRole, $name, $numberPlate);
//Execute the prepared statement.
if ($stmt->execute()) {
    echo "Record Updated";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();//close the prepared staememt.
?>