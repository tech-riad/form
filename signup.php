<!DOCTYPE html>
<?php require_once("config.php");?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            if(isset($_POST['signup'])) {
                extract($_POST);
                // ====== fname error ========
                if(strlen($fname) < 3){
                    $error[] = 'please enter name using 3 charecters atlesst';
                }
                if(strlen($fname) > 20){
                    $error[] = 'First name: max 20 charecters are allowed';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z _]*$/", $fname)){
                    $error[] = 'invalid entry first name, please enter letters without any digit or special charecter (1,2,3,,`,~,@,#,$,%,^,<,&,<,*,-,_,+,=)';
                }
                // ====== lname error ========
                if(strlen($lname) < 3){
                    $error[] = 'please enter name using 3 charecters atlesst';
                }
                if(strlen($lname) > 20){
                    $error[] = 'last name: max 20 charecters are allowed';
                }
                if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z _]*$/", $lname)){
                    $error[] = 'invalid entry last name, please enter letters without any digit or special charecter (1,2,3,,`,~,@,#,$,%,^,<,&,<,*,-,_,+,=)';
                }
                // ====== username error ========
                if(strlen($username) < 5){
                    $error[] = 'please enter name using 5 charecters atlesst';
                }
                if(strlen($username) > 40){
                    $error[] = 'User name: max 30 charecters are allowed';
                }
                // if(!preg_match("/^[A-Za-z _]*[A-Za-z]+[A-Za-z _]*$/", $username)){
                //     $error[] = 'invalid entry user name, please enter lowercase letters without any digit at the start Eg - myusername or myusername123';
                // }
                // ====== email error ========
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error[] = 'enter validate email';
                }
                // ====== password error ========
                // if(strlen($password) < 5){
                //     $error[] = 'please enter password using 5 charecters atlesst';
                // }
                // if(strlen($password) > 30){
                //     $error[] = 'password: max 30 charecters are allowed';
                // }
                // if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
                //     $error[] = 'the password does not meet the requirements!';
                // } 
                // ======  confirm password error ========
                if($confirmPassword == ''){
                    $error[] = 'please comfirm the password';
                }
                if($password != $confirmPassword){
                    $error[] = 'password do not match';
                };

                // if(strlen($comfirm_password) < 5){
                //     $error[] = 'The password is minimum 4 charecter long';
                // }
                // if(strlen($confirm_password) > 30){
                //     $error[] = 'The password is max 30 charecter long';
                // }
                // if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $confirm_password)) {
                //     $error[] = 'the comfirm_password does not meet the requirements!';
                // }
                // $sql = "select * from users where (username = '$username' or email = '$email');";
                // $res = mysqli_query($con,$sql);  
                // if (mysqli_num_rows($res) > 0) {
                //     $row = mysqli_fetch_assoc($res);
                //     if ($username   == $row['username']) {
                //         $error[]    = 'Username already exists.';
                //     }
                //     if ($email     == $row['email']) {
                //         $error[]    = 'email already exists.';
                //     }
                // } 
                $sql="select * from userdata where (username='$username' or email='$email');";
                $res=mysqli_query($con,$sql);
                if (mysqli_num_rows($res) > 0) {
                    $row = mysqli_fetch_assoc($res);

                if($username==$row['username'])
                {
                    $error[] ='Username alredy Exists.';
                    } 
                if($email==$row['email'])
                {
                        $error[] ='Email alredy Exists.';
                    } 
                }

                if(!isset($error)){
                    $date       = date('Y-m-d');
                    $options = array("cost"=>4);
                    $password = $password;
                    // $password = password_hash($password,PASSWORD_BCRYPT,$options);

                    $result     = mysqli_query($con, "INSERT into userdata(fname,lname,username,email,password,date) values('$fname','$lname','$username','$email','$password','$date')");
                    if($result) {
                        $done   = 2;
                    } else {
                        $error[]= 'Faild: Something went wrong';
                    }
                }
            }
            ?>
            <div class="col-sm-4">
                <?php
                if(isset($error)) {
                    foreach($error as $error) {
                        echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
                    }
                }
                ?>
            </div>
            <div class="col-12 col-lg-4 col-md-12">
                <?php if(isset($done))
                { ?><img class="img-fluid logo"  src="logo.png" alt="">
                    <div class="success_msg"><span style="font-size: 100px;">&#9989;</span>
                    <br> You have successfully registered. <br><a href="login.php" style="color: #fff; font-weight: 600;">Login Here</a></div>
                <?php } else { ?>                
                <div class="signup_form">
                    <img class="img-fluid logo"  src="logo.png" alt="">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="form-label label_text">First Name</label>
                            <input type="text" class="form-control" name="fname" required="" value="<?php if(isset($error)){echo $fname;}?>">
                        </div> 
                        <div class="form-group">
                            <label class="form-label label_text">Last Name</label>
                            <input type="text" class="form-control" name="lname" required="" value="<?php if(isset($error)){echo $lname;}?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label label_text">Username</label>
                            <input type="text" class="form-control" name="username" required="" value="<?php if(isset($error)){echo $username;}?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label label_text">Email</label>
                            <input type="email" class="form-control" name="email" required="" value="<?php if(isset($error)){echo $email;}?>">
                        </div>      
                        <div class="form-group">
                            <label class="form-label label_text">Password</label>
                            <input type="password" class="form-control" name="password" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label label_text">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPassword" required="">
                        </div>
            
                        <button type="submit" name="signup" class="form_btn btn btn-primary">SignUP</button>
                        <p class="mt-2 mb-2">Have an account? <a href="login.php">Log in</a></p>
                        <?php } ?>
                    </form>
                </div>    
            </div>
            <div class="col-sm-4">  
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</html>