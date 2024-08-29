<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LIST APP</title>
    <!-- link to css -->
    <link rel="stylesheet" href="style.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container" Id="main-container">
        <div class="save-task" id="save-itmes">
         <!-- <span id="save">Tasks Seved SuccessFully</span> -->
        </div>
        <h2>TO DO LIST
            <img src="./image/icon.png" alt="Image">
        </h2>
        <div class="box-input">
                <input type="text" name="task" id="text" class="text" placeholder="Make Your Task...">
                <button type="submit" name="button" id="add" onclick="AddTask()">ADD</button>
        </div>
        <div class="list">
            <ul id="list-container">
                <!-- List items will appear here -->
                 <!--
                 <li class="checked"></li>
                 <li></li>
                 <li></li> -->
            </ul>
        </div>
        <button class="submit" name="btn" class="alter-class" onclick="AddAlert()">
          <h3 class="alter-message" id="alter">
                  Save Tasks
          </h3>
        </button>
    </div>   
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tasks";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Add Tasks To My Database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn'])) {
        $task = $_POST['task'];
    
        $stmt = $conn->prepare("INSERT INTO list (name, emial, task) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
    
        $name = 'Mahmoud Elehfnawy';
        $email = 'mahmoudelhefnawy2026@gmail.com';
    
        $stmt->bind_param("sss", $name, $email, $task);
    
        if ($stmt->execute()) {
            $message="Your Task Is created Successfully";
        } else {
            echo "Error:" . $stmt->error;
        }
       
        $stmt->close();
    }
        $conn->close();
?>
    <script src="main.js"></script>
</body>
</html>
