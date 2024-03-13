<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('img1.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            height: 400px;
            background: rgba(121, 85, 72, 0.5);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label,
        a#forgotPasswordLink {
            color: white;
        }

        .form-control {
            background: transparent;
            border: none;
            border-bottom: 1px solid white;
            color: white;
            transition: border-bottom 0.3s;
        }

        .form-control:hover {
            border-bottom: 1px solid #fff;
        }

        .error-feedback {
            color: red;
            display: none;
        }

        .btn-primary {
            background-color: white;
            color: #795548;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary:hover {
            background-color: #795548;
            color: #fff;
        }

        .error {
            border-bottom: 1px solid red !important;
        }
    </style>
</head>

<body>
<?php

$errors=[];
if(isset($_GET['errors'])){
    $errors=json_decode($_GET['errors'],true);

}


?>
   <div class="container">
        <?php
        if (!empty($errors)) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';
        }
        ?>
        <form action="save.php" method="POST" onsubmit="return validateForm()" novalidate>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="user_email" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div class="error-feedback email-error">Invalid email address!</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="user_password" id="exampleInputPassword1">
                <div class="error-feedback password-error">Password must be at least 8 characters!</div>
            </div>
            <div class="mb-3">
                <a href="#" id="forgotPasswordLink">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        document.querySelector("#forgotPasswordLink").addEventListener("click", function (event) {
           // event.preventDefault();
            alert("Forgot Password link clicked!");
        });

        function validateForm() {
            var emailInput = document.getElementById("exampleInputEmail1");
            var passwordInput = document.getElementById("exampleInputPassword1");

            var email = emailInput.value;
            var password = passwordInput.value;

            var emailValid = validateEmail(email);
            var passwordValid = validatePassword(password);

            var emailError = document.querySelector('.email-error');
            var passwordError = document.querySelector('.password-error');

            if (!emailValid) {
                emailError.style.display = 'block';
                emailInput.classList.add('error');
                return false;
            } else {
                emailError.style.display = 'none';
                emailInput.classList.remove('error');
            }

            if (!passwordValid) {
                passwordError.style.display = 'block';
                passwordInput.classList.add('error');
                return false;
            } else {
                passwordError.style.display = 'none';
                passwordInput.classList.remove('error');
            }

            // If all validations pass, you can submit the form
            return true;
        }

        function validateEmail(email) {
            var re = /(.+)@(.+){2,}\.(.+){2,}/;
            return re.test(email.toLowerCase());
        }

        function validatePassword(password) {
            return password.length >= 8;
        }
    </script>
</body>

</html>