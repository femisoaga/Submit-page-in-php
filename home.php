<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
   <?php
 // Connect to the database
//  $db = mysqli_connect('host', 'username', 'password', 'database');

    if($_POST){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $deadline = $_POST['deadline'];
        $file = $_FILES['file'];
        
        $errors = [];
        
        // validate full name
        if(empty($fullname)){
            $errors[] = 'Full name is required';
        }
        
        // validate email
        if(empty($email)){
            $errors[] = 'Email is required';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Invalid email format';
        }
        
        // validate phone number
        if(empty($phone)){
            $errors[] = 'Phone number is required';
        }
        
        // validate deadline
        if(empty($deadline)){
            $errors[] = 'Deadline is required';
        }
        
        // validate file
        if(empty($file['name'])){
            $errors[] = 'File is required';
        }elseif($file['error'] != 0){
            $errors[] = 'File upload failed with error code '.$file['error'];
        }
        
        if(empty($errors)){
            // store the file on the server
            $file_path = 'uploads/'.$file['name'];
            move_uploaded_file($file['tmp_name'], $file_path);
            
            // insert data into database
            $query = "INSERT INTO submissions (fullname, email, phone, deadline, file)
            VALUES ('$fullname', '$email', '$phone', '$deadline', '$file_path')";
            mysqli_query($db, $query);
            
            // Close the database connection
            mysqli_close($db);
            
            // Redirect to the confirmation page
            header('Location: confirmation.php');
        }else{
            echo '<ul>';
            foreach($errors as $error){
                echo '<li>'.$error.'</li>';
            }
            echo '</ul>';
        }
    }

?>
<div class="container mt-5">
  <h1 class="text-center">Assignment Submission Page</h1>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <h3><label>Full Name:</label></h3>
      <input type="text" class="form-control" name="fullname">
    </div>

    <div class="form-group">
      <h3><label>Email:</label></h3>
      <input type="email" class="form-control" name="email">
      <small class="form-text text-muted">We'll never share your email with anyone else</small>
    </div>

    <div class="form-group">
      <h3><label>Phone Number:</label></h3>
      <input type="tel" class="form-control" name="phone">
    </div>

    <div class="form-group">
      <h3><label>Deadline:</label></h3>
      <input type="datetime-local" class="form-control" name="deadline">
    </div>

    <div class="form-group">
      <h3><label>File:</label></h3>
      <input type="file" class="form-control-file" name="file">
    </div>

    <input type="submit" value="Submit" class="btn btn-primary">
  </form>
</div>




</body>
</html>