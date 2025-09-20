<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background: linear-gradient(135deg, #7b2ff2 0%, #f357a8 100%);
        font-family: 'Segoe UI', Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .form {
        background: rgba(34, 34, 255, 0.95);
        width: 100%;
        max-width: 650px;
        margin: 40px auto;
        padding: 30px 40px;
        border: none;
        color: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }
    .head {
        text-align: center;
        background: linear-gradient(90deg, #e0ff70 0%, #aaffc3 100%);
        border: none;
        border-radius: 12px;
        padding: 18px 0 10px 0;
        color: #d7263d;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 18px;
    }
    .head h1 {
        margin: 0 0 8px 0;
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 1px;
    }
    .head p {
        margin: 0;
        font-size: 1.1rem;
        color: #333;
    }
    .fill {
        background: #f3f7fa;
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        padding: 20px 18px;
        color: #222;
    }
    .fill label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #333;
        letter-spacing: 0.5px;
    }
    .fill .input,
    .fill select,
    .fill input[type="text"],
    .fill input[type="number"] {
        width: 90%;
        padding: 10px 12px;
        margin-bottom: 16px;
        border: 1px solid #bdbdbd;
        border-radius: 7px;
        font-size: 1rem;
        background: #fff;
        color: #222;
        box-sizing: border-box;
        transition: border 0.2s;
    }
    .fill .input:focus,
    .fill select:focus,
    .fill input[type="text"]:focus,
    .fill input[type="number"]:focus {
        border: 2px solid #7b2ff2;
        outline: none;
    }
    .fill input[type="radio"] {
        margin-right: 8px;
        accent-color: #7b2ff2;
        transform: scale(1.2);
    }
    .submit {
        display: block;
        width: 100%;
        padding: 12px 0;
        background: linear-gradient(90deg, #7b2ff2 0%, #f357a8 100%);
        color: #fff;
        font-size: 1.2rem;
        font-weight: 700;
        border: none;
        border-radius: 8px;
        box-shadow: 0 3px 12px rgba(123,47,242,0.15);
        cursor: pointer;
        transition: background 0.2s, transform 0.2s;
        margin-top: 10px;
    }
    .submit:hover {
        background: linear-gradient(90deg, #f357a8 0%, #7b2ff2 100%);
        transform: translateY(-2px) scale(1.03);
    }
    .links {
    max-width: 650px;
    margin: 30px auto 0 auto;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(31,38,135,0.10);
    padding: 18px 30px;
    text-align: center;
}

.links ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.links li {
    margin: 12px 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #7b2ff2;
    transition: color 0.2s;
}

.links a {
    text-decoration: none;
    color: #f357a8;
    font-weight: 700;
    padding: 6px 18px;
    border-radius: 6px;
    background: linear-gradient(90deg, #e0ff70 0%, #aaffc3 100%);
    box-shadow: 0 1px 4px rgba(123,47,242,0.08);
    transition: background 0.2s, color 0.2s;
}

.links a:hover {
    background: linear-gradient(90deg, #f357a8 0%, #7b2ff2 100%);
    color: #fff;
}
</style>
<body>
    <form action="update.php" method="post" class="form">
        <div class="head">
           <h1>WELCOME TO KASIITA AND SONS TRANSPORTING COMPANT</h1> 
           <h1>We Are The Cargo Giants.</h1>
            <p>PLEASE FILL THE TABLE BELOW DEAR CLIENT.</p>
       

        </div>
         <div class = "fill">
            <label for="">DRIVER NAME:</label>
            <input type="text" name = "name" class="input" required>
            <br><br>
            <label for="">NATIONALITY:</label>
            <input type="text" name = "nation" class="input" required>
            <br><br>
             <label for="route">ROUTE:</label>
            <select name="route" id="" class = "input" required>
                <option value="Null" class="input" ></option>
                <option value="Masaka_road" class="input" >MASAKA ROAD</option>
                <option value="Jinja_road" class="input" >KAMPALA-JINJA  ROAD</option>
                <option value="Mityana_road" class="input" >MITYANA ROAD</option>
                <option value="Gulu_Road" class="input" >GULU ROAD</option>
            </select>
            <br><br><br>
            <label for="">ROLE:</label>
            <input type="radio" name = "role" required value="Driver">Driver
            <input type="radio" name = "role"  value="turn boy" required>turn boy
            <br><br>
            <label for="">NUMBER PLATE:</label>
            <input type="text" name = "plate" class="input" required>
            <br><br>
            <label for="">AGE:</label>
            <input type="number" name = "age" class="input" required>
            <br><br>
           
            <button class = "submit" name="submit">SUBMIT</button>
</div >
<?php

include 'connection.php';

// Get values from form.
$numberPlate = isset($_POST["plate"]) ? $_POST["plate"] : '';
$userRole = isset($_POST["role"]) ? $_POST["role"] : '';
$name = isset($_POST["name"]) ? $_POST["name"] : '';

// Only run update if form is submitted and all fields are present.
if ($numberPlate && $userRole && $name) {
    // Check if the record exists.
    $check = $connection->prepare("SELECT numberPlate FROM cargo WHERE numberPlate = ?");
    $check->bind_param("s", $numberPlate);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        // Record exists, update it.
        $stmt = $connection->prepare("UPDATE cargo SET userRole = ?, driverName = ? WHERE numberPlate = ?");
        $stmt->bind_param("sss", $userRole, $name, $numberPlate);
        if ($stmt->execute()) {
            echo "Record Updated";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "No record found with that number plate.";
    }
    $check->close();
}
?>




</body>
</html>