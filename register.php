<?php
require_once "./utils/config.php";

$username = $password = $email = "";
$usernameERR = $passwordERR = $emailERR = "";
$success = false;

if (isset($_POST['_submit'])) {
    try {
        if (empty($_POST['username'])) {
            $usernameERR = "Username is required";
        } else {
            $username = sanitize($_POST['username']);
        }

        if (empty($_POST['password'])) {
            $passwordERR = "Password is required";
        } else {
            $password = sanitize($_POST['password']);
            $password_hashed = sha1($password);
        }

        if (empty($_POST['email'])) {
            $emailERR = "Email is required";
        } else {
            $email = sanitize($_POST['email']);
        }

        $sqlstr = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sqlstr);

        if ($result->num_rows > 0) {
            echo '<div class="alert alert-danger">Username error duplicate!</div>';
        } else {
            $sqlstr = "INSERT INTO users(username, password, email) VALUES ('$username', '$password_hashed', '$email')";
            $result = $conn->query($sqlstr);
            if ($result) {
                $success = true;
            } else {
                echo '<div class="alert alert-danger">Error !' . $conn->error . '</div>';
            }
        }
    } catch (mysqli_sql_exception $e) {
        echo '<div class="alert alert-danger">Có lỗi xảy ra, vui lòng kiểm tra lại cấu hình!</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .errors {
            color: red;
            padding-left: 20px;
            font-size: 16px;
        }

        .card-title {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
            color: #0d6efd;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            width: 100%;
            border-radius: 8px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .custom-btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register Account Moonlight Festival</h5>
                        <form action="" method="POST">
                            <div class="mb-2">
                                <label class="form-label" for="username">Username: </label>
                                <input class="form-control" type="text" name="username" placeholder="User Name" id="username">
                                <span class="errors"><?php echo $usernameERR ?></span>
                            </div>

                            <div class="mb-2">
                                <label class="form-label" for="password">Password: </label>
                                <input class="form-control" type="text" name="password" placeholder="Password" id="password">
                                <span class="errors"><?php echo $passwordERR; ?></span>
                            </div>

                            <div class="mb-2">
                                <label class="form-label" for="email">Email: </label>
                                <input class="form-control" type="email" name="email" placeholder="Email" id="email">
                                <span class="errors"><?php echo $emailERR; ?></span>
                            </div>

                            <div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-primary custom-btn" type="submit" name="_submit">Register Account</button>
                                <div class="mx-2"></div>
                                <button id="backButton" type="button" class="btn btn-secondary custom-btn">Back</button>
                            </div>

                            <script>
                                document.getElementById("backButton").addEventListener("click", function() {
                                    window.location.href = "./index.php";
                                });
                            </script>

                            <?php if ($success) echo '<div class="alert alert-success mt-3">Successfully</div>'  ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>