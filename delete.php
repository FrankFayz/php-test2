<?php

include 'connection.php';

// If form is submitted.
if (isset($_POST['delete'])) {
    //get the number plate entered by the user.
    $numberPlate = $_POST['numberPlate'];

    if ($numberPlate != '') {
        //sql statement to delete record.
        $stmt = $connection->prepare("DELETE FROM cargo WHERE numberPlate = ?");
        //bind number plate to the prepared statement as a string.
        $stmt->bind_param("s", $numberPlate);
        if ($stmt->execute()) {
            //execution successful
            echo "Record Deleted";
        } else {
            echo "ERROR: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Invalid NumberPlate";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Record</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f7fa; }
        .delete-form {
            max-width: 400px;
            margin: 60px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(31,38,135,0.10);
        }
        .delete-form label { font-weight: 600; }
        .delete-form input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #bdbdbd;
            border-radius: 7px;
            font-size: 1rem;
        }
        .delete-form button {
            padding: 10px 24px;
            background: linear-gradient(90deg, #7b2ff2 0%, #f357a8 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
        }
        .delete-form button:hover {
            background: linear-gradient(90deg, #f357a8 0%, #7b2ff2 100%);
        }
    </style>
</head>
<body>
    <form method="post" class="delete-form">
        <label for="numberPlate">Enter Number Plate to Delete:</label>
        <input type="text" name="numberPlate" id="numberPlate" required>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>
