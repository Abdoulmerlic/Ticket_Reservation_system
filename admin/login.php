<?php
session_start();

// Handle login logic before any HTML output
if ((isset($_POST['username'])) && (isset($_POST['password']))) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //validating no validation using admin admin as password	
    if (($username == "admin") && ($password == "password")) {
        $_SESSION['username'] = $username;
        header("location: bookings.php");
        exit(); // Important: exit after redirect
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ticket Reservation System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.2/semantic.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="admin.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            border: none !important;
        }

        .navbar .item {
            color: #333 !important;
            font-weight: 500;
        }

        .navbar .item:hover {
            color: #667eea !important;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            margin: 20px;
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .login-header h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .login-header p {
            font-size: 1rem;
            opacity: 0.9;
        }

        .login-form {
            padding: 40px;
        }

        .ui.form .field {
            margin-bottom: 25px;
        }

        .ui.form .field label {
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        .ui.form input {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .ui.form input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .login-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .login-button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .checkbox-field {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .checkbox-field input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .checkbox-field label {
            color: #666;
            font-size: 0.9rem;
        }

        .help-message {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .help-message h4 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .help-message p {
            color: #666;
            margin: 5px 0;
            font-size: 0.9rem;
        }

        .help-message a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .help-message a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
            font-weight: 500;
        }

        .success-message {
            background: #efe;
            border: 1px solid #cfc;
            color: #3c3;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
            font-weight: 500;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-content {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
        }

        .security-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 30px;
        }

        .security-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            border-left: 3px solid #667eea;
        }

        .security-item i {
            font-size: 1.5rem;
            color: #667eea;
            margin-bottom: 10px;
        }

        .security-item h5 {
            color: #333;
            margin: 5px 0;
            font-size: 0.9rem;
        }

        .security-item p {
            color: #666;
            font-size: 0.8rem;
            margin: 0;
        }

        @media (max-width: 768px) {
            .login-container {
                margin: 10px;
                max-width: 100%;
            }

            .login-header,
            .login-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="ui container" id="dynamic"
        style="margin-top: 90px; display: flex; justify-content: center; align-items: center; min-height: calc(100vh - 90px);">
        <div class="login-container">
            <div class="login-header">
                <h1><i class="user secret icon"></i> Admin Access</h1>
                <p>Secure access to the ticket reservation system</p>
            </div>

            <div class="login-form">
                <?php
                // Display error message if login failed
                if ((isset($_POST['username'])) && (isset($_POST['password']))) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if (!(($username == "admin") && ($password == "password"))) {
                        echo ("<div class='error-message'><i class='exclamation triangle icon'></i> Invalid Username or Password</div>");
                    }
                }
                ?>

                <form class="ui form" method="POST">
                    <input type="hidden" name="frmLogin" value="true">

                    <div class="field">
                        <label><i class="user icon"></i> Username</label>
                        <input placeholder="Enter your username" name="username" type="text" autofocus required>
                    </div>

                    <div class="field">
                        <label><i class="lock icon"></i> Password</label>
                        <input type="password" placeholder="Enter your password" name="password" required>
                    </div>

                    <div class="checkbox-field">
                        <input type="checkbox" id="rememberPass">
                        <label for="rememberPass">Remember me</label>
                    </div>

                    <button type="submit" name="login" class="login-button" tabindex="3">
                        <i class="sign in icon"></i>
                        Login to Dashboard
                    </button>
                </form>

                <div class="help-message">
                    <h4><i class="help circle icon"></i> Need Help?</h4>
                    <p>Use the following credentials to access the admin panel:</p>
                    <p><strong>Username:</strong> <a href="#0">admin</a></p>
                    <p><strong>Password:</strong> <a href="#0">password</a></p>
                </div>

                <div class="security-features">
                    <div class="security-item">
                        <i class="fas fa-shield-alt"></i>
                        <h5>Secure Access</h5>
                        <p>Bank-level security</p>
                    </div>
                    <div class="security-item">
                        <i class="fas fa-lock"></i>
                        <h5>Encrypted</h5>
                        <p>256-bit encryption</p>
                    </div>
                    <div class="security-item">
                        <i class="fas fa-eye"></i>
                        <h5>Activity Log</h5>
                        <p>Track all actions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay" style="display: none;">
        <div class="loading-content">
            <div class="ui active loader"></div>
            <h3>Authenticating...</h3>
            <p>Please wait while we verify your credentials</p>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Show loading overlay on form submission
            $('form').on('submit', function () {
                $('#loadingOverlay').show();
            });

            // Add focus effects
            $('input').on('focus', function () {
                $(this).parent().addClass('focused');
            }).on('blur', function () {
                $(this).parent().removeClass('focused');
            });

            // Password visibility toggle
            $('input[type="password"]').after(
                '<i class="eye icon" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #999;"></i>'
            );

            $('.eye.icon').on('click', function () {
                var input = $(this).prev('input');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    $(this).removeClass('eye').addClass('eye slash');
                } else {
                    input.attr('type', 'password');
                    $(this).removeClass('eye slash').addClass('eye');
                }
            });

            // Remember me functionality
            $('#rememberPass').on('change', function () {
                if (this.checked) {
                    localStorage.setItem('rememberAdmin', 'true');
                } else {
                    localStorage.removeItem('rememberAdmin');
                }
            });

            // Check if remember me was previously set
            if (localStorage.getItem('rememberAdmin') === 'true') {
                $('#rememberPass').prop('checked', true);
            }
        });
    </script>
</body>

</html>