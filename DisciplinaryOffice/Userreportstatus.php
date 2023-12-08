<?php
session_start();

// Check if the session variables are set
if (isset($_SESSION['user_name'], $_SESSION['course_name'], $_SESSION['user_id'])) {
    // Retrieve the session variables
    $user_name = $_SESSION['user_name'];
    $course_name = $_SESSION['course_name'];
    $user_id = $_SESSION['user_id'];
} else {
    // Session variables not set, handle the situation accordingly
    // For example, redirect back to the login page
    header("Location: /DisciplinaryOffice/Login.php");
    exit();
}
if (isset($_GET['logout'])) {
    // Destroy the session
    session_destroy();

    // Redirect back to the login page
    header("Location: /DisciplinaryOffice/Login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <title>Reports | Status</title>
</head>
<style>
    body {
        font-family: 'Noto Sans', sans-serif;
        font-weight: 400;
    }
    
    .sidenav {
        height: 100%;
        width: 320px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background: #01579B;
        overflow-x: hidden;
        padding-top: 20px;
    }
    
    .sidenav a {
        padding: 6px 8px 8px 28px;
        text-decoration: none;
        font-size: 25px;
        color: white;
        display: block;
    }
    
    .logout {
        margin-top: 50px;
    }
    
    .logout:hover {
        opacity: 0.9;
    }
    
    .sidenav a:hover {
        opacity: 0.9;
    }
    
    .sidenav a:hover {
        color: #f1f1f1;
    }
    
    .main {
        margin-left: 160px;
        /* Same as the width of the sidenav */
        font-size: 28px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
    }
    
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }
        .sidenav a {
            font-size: 18px;
        }
    }
    
    .profile {
        background-color: whitesmoke;
        border-radius: 50%;
        width: 50px;
        margin-left: 18px;
    }
    
    .outside-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .status-container:hover {
        background-color: black;
    }
    
    .make-report-container:hover {
        background-color: black;
    }
    
    .apply-file-container:hover {
        background-color: black;
    }
    
    .report-status-conatiner:hover {
        background-color: black;
    }
    
    .change-password-container {
        margin-top: 20px;
    }

    .change-password-container:hover {
        background-color: black;
    }

    .logout:hover {
        background-color: black;
    }
    
    .text-profile {
        font-family: 'Noto Sans', sans-serif;
        font-size: 12px;
        margin-left: 18px;
        color: white;
    }
    
    .logo-size {
        width: 40px;
        margin-top: 30px;
    }
    
    .logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .STI-text {
        text-align: center;
    }


    .h5-box1 {
        display: inline-block;
        background-color:  gainsboro;
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 30px;
        color: black;
        border-radius: 20px;
        text-align: center;

    }

    .h5-box2 {
        margin-left: 20px;
        display: inline-block;
        background-color:  gainsboro;
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 30px;
        color: black;
        border-radius: 20px;
        text-align: center;

    }

    .h5-box3 {
        margin-left: 20px;
        display: inline-block;
        background-color:  gainsboro;
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 30px;
        color: black;
        border-radius: 20px;
        text-align: center;
        

    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-top: 50px;
        grid-template-columns: none;
        grid-row: 40px;
        
    }

    .h2-container {
        text-align: center;
        margin-top: 70px;
    }

    .all-link {
        color: black;
    }

    .privacy-link {
        display: inline-block;
        margin-left: -25px;
    }

    .report-link {
        display: inline-block;
        margin-left: -20px;
    }

    .terms-link {
        display: inline-block;
        margin-bottom: 28px;
        margin-left: -20px;
    }

    .address-school {
        color: white; 
        font-size: 12px;
    }

    .phone-number {
        color: white; 
        font-size: 12px;
    }

    .container-messages {
        display: flex;
        justify-content: right;
        align-items: right;
        margin-right: 20px;
        cursor: pointer;

    }

    .container-messages:hover {
        opacity: 0.5;
    }

    .container-messages:active {
        transform: translateY(2px);
    } 

    .profile-container {
    position: relative;
    display: inline-block;
    margin-top: -45px;
    margin-right: 50px;
    }

    .profile-icon {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        background-color: whitesmoke;
        border-radius: 50%;
        cursor: pointer;
    }

    .profile-icon i {
        color: #888;
    }

    .profile-upload {
        display: none;
    }

    .notif-bell {
  position: relative;
  display: inline-block;
  margin-left: 10px;
  cursor: pointer;
}

.badge {
  position: absolute;
  top: -8px;
  right: -8px;
  background-color: red;
  color: white;
  border-radius: 50%;
  padding: 4px 8px;
  font-size: 8px;
  cursor: pointer;
}

.dropdown {
    display: none;
    position: absolute;
    background: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    z-index: 1000;
    cursor: pointer;
}

.dropdown.show {
    display: block;
    cursor: pointer;
}

    
</style>

<body>

    <div class="sidenav">
    <div class="notif-bell">
    <i style="font-size: 18px; color: yellow;" class="fa">&#xf0f3;</i>
    <span class="badge">0</span>
    <div class="dropdown">
        <ul class="messages-list"></ul>
    </div>
</div>
    <hr>
    <div class="outside-container">
    <div class="profile-container">
    <label for="profile-upload" class="profile-icon">
        <i class="fa fa-camera"></i>
    </label>
    <input type="file" id="profile-upload" class="profile-upload" accept="image/*" />
    </div>
            <div class="text-profile">
                <p>
                    <span>Name: &nbsp; <?php echo $user_name; ?></span><br>
                    <span>Course: &nbsp; <?php echo $course_name; ?></span><br>
                    <span>Student ID: &nbsp; <?php echo $user_id; ?></span>
                </p>
            </div>
        </div>
        <hr>
        <div id="" class="status-container"><a href="/DisciplinaryOffice/Userdashboard.php"><i style="font-size:24px; color:white;" class="fa">&#xf0e4;</i>&nbsp;Dashboard</a></div>
        <div id="" class="status-container"><a href="/DisciplinaryOffice/Userstatus.php"><i style="font-size:24px" class="fa">&#xf2bb;</i>&nbsp;Status</a></div>
        <div id="" class="make-report-container"><a href="/DisciplinaryOffice/Userformreport.php"><i style="font-size:24px" class="fa">&#xf044;</i>&nbsp;Make Report</a></div>
        <div id="" class="report-status-conatiner"><a href="/DisciplinaryOffice/Userreportstatus.php"><i style="font-size:24px" class="fa">&#xf24a;</i>&nbsp;Reports Status</a></div>
        <div class="logout"><a href="?logout=true"><i style="font-size:24px" class="fa">&#xf011;</i>&nbsp;Log out</a></div>

        <div class="logo-container">
            <div><img class="logo-size" src="/DisciplinaryOffice/logo/STI_LOGO.ico"></div>
        </div>
        <div class="STI-text">
            <div>
                <p style="color: white; opacity: 0.5;">STI Global City Taguig<br> Disciplinary Office</p>
                <div style="background-color: black; height: 200px;">
                        <div class="privacy-link"><a style="font-size: 11px; display: inline-block;" href="/DisciplinaryOffice/Privacy-Policy.php">Privacy Policy | </a></div>
                        <div class="report-link"><a style="font-size: 11px; display: inline-block;" href="/DisciplinaryOffice/Report-Abuse.php">Report Abuse |</a></div>
                        <div class="terms-link"><a style="font-size: 11px; display: inline-block;" href="/DisciplinaryOffice/Terms-of-Service.php">Terms of Service</a></div>
                        <div>
                        <address class="address-school">
                            STI Academic Center,<br> University Parkway Drive,<br>
                            Taguig, Metro Manila
                        </address>
                        <p class="phone-number">
                        &#x2706; Phone: (02) 8551 4984
                        </p>
                        <p>
                            
                        <a style="color: white; font-size: 11px;" 
                        href="https://www.facebook.com/globalcity.sti.edu/">Official Facebook Page</a>
                        </p>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h2-container">
    <h2>Track Reports</h2>
</div>

<div class="container">
    <div class="h5-box1">
        <h5 style="margin: 0;">Processing Reports
            <a href="#"><p style="text-decoration: none; color: black;">0</p></a>
        </h5>
    </div>
    <div class="h5-box2">
        <h5 style="margin: 0;">Pending Reports
            <a href="#"><p style="text-decoration: none; color: black;">0</p></a>
        </h5>
    </div>
    <div class="h5-box3">
        <h5 style="margin: 0;">Approved Reports
            <a href="#"><p style="text-decoration: none; color: black;">0</p></a>
        </h5>
    </div>
</div>
</body>

</html>