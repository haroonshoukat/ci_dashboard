<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Bootstrap 4 Header</title>
</head>
<!-- Bootstrap 5 styles -->

<style>
    /* Custom background color for the card */
    .custom-card {
        background-color: #2A3038; /* Light gray background color */
       
    }
    body{
        background-color: #191c24;
    }
    .card-body h4{
        color: white;
        font-weight: 700;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
    <img src="https://4xportal.com/wp-content/uploads/2023/06/portal-logo.png" alt="logo" style="height: 50px;" >
</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('Home/dashboard'); ?>">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
    <a href="<?php echo base_url('Home/login'); ?>" class="nav-link btn btn-primary" onclick="addRecord()">Login</a>
</li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
           
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img src="http://localhost/hassan1/assets/images/faces/face15.jpg" alt="Profile Image" class="profile-image" style="border-radius: 32px;" width="30px"> Username
</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('Home/logout'); ?>">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card custom-card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Change Password</h4>
                    <?php echo form_open('Home/changePassword', array('id' => 'passwordForm'))?>
                        <div class="mb-3">
                            <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Old Password" required>
                            <?php echo form_error('oldpass', '<div class="error">', '</div>')?>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" required>
                            <?php echo form_error('newpass', '<div class="error">', '</div>')?>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="passconf" id="passconf" class="form-control" placeholder="Confirm Password" required>
                            <?php echo form_error('passconf', '<div class="error">', '</div>')?>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>


