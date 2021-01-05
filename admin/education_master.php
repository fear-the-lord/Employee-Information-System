<?php
  require_once "../config.php";
  $education_id = $education_desc = "";
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $education_id = trim($_POST['Education_Id']);
    $education_desc = trim($_POST['Education_Desc']);
    
    $sql = "INSERT INTO education_master(Education_Id, Education_Desc) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt) {
      mysqli_stmt_bind_param($stmt, "ss", $education_id, $education_desc);
      mysqli_stmt_execute($stmt);
      header("location: admin_choices.html");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../employee.png" type="image/icon type">
    <title>Employee Information System</title>
</head>
<body>
    <form action="" method = "post">
        <h1>EDUCATION MASTER</h1>
        
        <div class="float-label">
          <input type="number" name="Education_Id" id="email" placeholder = "Education Id"/>
        </div>
        
        <div class="float-label">
          <input type="text" name="Education_Desc" id="f-name" placeholder = "Education Description"/>
        </div>
    
        <button class="btn" type="submit">Submit</button><br>
        <a href="admin_choices.html" style = "text-decoration: none;  font-size: 18px; color: #2ecc71; text-align: center; font-weight: bold;" class = "btn">Back</a><br>
        <button class="btn" id="clear" type="reset" value="Reset">Clear</button>
    </form>  
</body>
</html>