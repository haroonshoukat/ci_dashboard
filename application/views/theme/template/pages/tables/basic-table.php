<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 4 Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Include Bootstrap JS bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <!-- Include DataTables Bootstrap 5 Integration -->
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <!-- Include DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <!-- Include DataTables Buttons Bootstrap 5 Integration -->
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.js"></script>
    <!-- Include JSZip -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <!-- Include pdfmake -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <!-- Include HTML5 export buttons -->
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <!-- Include Print button -->
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: black;
    }

    .table-container {

        overflow-y: auto;
        margin: auto;
        margin-top: 100;
        margin-top: 20px;
    }

    label {
        display: inline;
        color: white;
    }

    table {
        overflow-y: auto;
        margin: auto;
        margin-top: 100;
    }

    .bmg {
        margin-top: 80px;
        padding-left: 1px;
        padding-right: 1px;
    }

    .dataTables_info {
        color: white;
    }

    .text-img {
        font-size: 10px;
        background-image: url('https://mofa.gov.pk/storage/photos/1/PM/65928d56e3a55.jpeg');
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="https://4xportal.com/wp-content/uploads/2023/06/portal-logo.png" alt="logo" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Home/formelement'); ?>" class="nav-link btn btn-primary" onclick="addRecord()">Add Record</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="profile-image" style="border-radius: 32px;" width="30px"> Username
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
    <div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="text-img"></div>
    <div class="table-container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Date</th>
                    <th>Salary</th>
                    <th>Extn.</th>
                    <th>E-mail</th>
                    <th>Download</th>
                    <th>Edit</th> <!-- New column for action buttons -->
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr id="row_<?php echo $user['id']; ?>">
                        <td><?php echo $user['firstname']; ?></td>
                        <td><?php echo $user['Gender']; ?></td>
                        <td><?php echo $user['Position']; ?></td>
                        <td><?php echo $user['Office']; ?></td>
                        <td><?php echo $user['Age']; ?></td>
                        <td><?php echo $user['Startdate']; ?></td>
                        <td><?php echo $user['Salary']; ?></td>
                        <td><?php echo $user['Extn']; ?></td>
                        <td><?php echo $user['Email']; ?></td>
                        <td>
                            <button id="downloadPdfBtn" class="btn btn-info btn-sm download-btn" data-user-id="<?php echo $user['id']; ?>" data-toggle="tooltip" data-placement="top" title="Download PDF">
                                <i class="fas fa-download"></i>
                            </button>
                        </td>

                        <td>
                            <a href="<?php echo base_url('Home/edit/' . $user['id']); ?>" class="btn btn-warning btn-sm editUserBtn" data-toggle="tooltip" data-placement="top" title="Edit User">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>


                        <td>
                            <a href="#" class="btn btn-danger btn-sm delete-btn" onclick="deleteRow(<?php echo $user['id'] ?>)" data-toggle="tooltip" data-placement="top" title="Delete User">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- JavaScript files -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script> -->
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables Bootstrap 4 CSS -->
    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- JavaScript function to handle user deletion -->
    <script>
        new DataTable('#example');
    </script>

    <script>
        function deleteRow(id) {
            console.log('Delete record with ID: ' + id);

            // Send an Ajax request to delete the record
            $.ajax({
                url: '<?php echo base_url("Home/delete_record/"); ?>' + id,
                type: 'POST',
                success: function(response) {
                    // Remove the row from the table if deletion was successful
                    if (response == "deleted") {
                        $('#row_' + id).remove();
                        Swal.fire({
                            title: "Success!",
                            text: "Your data record has been deleted successfully!",
                            icon: "success"
                        });
                    } else {
                        console.log('Error deleting record.');
                    }
                },
                error: function() {
                    console.log('Ajax request failed.');
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            // Add click event handler for download buttons
            $('.download-btn').on('click', function() {
                var userId = $(this).data('user-id');

                // Send a form submission to trigger the PDF download
                var form = $('<form action="<?php echo base_url("Home/downloadPDF"); ?>" method="post">' +
                    '<input type="hidden" name="userId" value="' + userId + '">' +
                    '</form>');
                $('body').append(form);
                form.submit();
                form.remove(); // Remove the form after submission
            });
        });
    </script>
    <script>
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'colvis',
                'excel',
                'print'
            ]
        });
    </script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // When the download button is clicked
            $('#downloadPdfBtn').click(function() {
                // Get the user id from the button's data attribute
                var userId = $(this).data('user-id');

                // Make an AJAX request to trigger the PDF download
                $.ajax({
                    url: '<?php echo base_url("pdf_controller/download_pdf"); ?>',
                    type: 'POST',
                    data: {
                        user_id: userId
                    },
                    success: function(response) {
                        // The PDF download should start automatically, no need to handle success
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors if necessary
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        $("#navbarDropdownMenuLink").hide();
    </script>
</body>

</html>