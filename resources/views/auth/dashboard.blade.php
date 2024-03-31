<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Times New Roman', Times, serif;     }

        
        .navbar {
            background-color: #343a40 !important;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000; /* Ensure the navbar is above other elements */
        }
        .sidebar {
            position: fixed;
            top: 30px; /* Height of the navbar */
            bottom: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 60px;
            z-index: 900; /* Ensure the sidebar is below the navbar */
        }
        .sidebar a {
            padding: 10px 30px;
            display: block;
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .dropdown-item {
            background-color: #343a40;
            color: white;
        }
        .content {
            margin-left: 250px; /* Width of the sidebar */
            padding-top: 60px; /* Height of the navbar */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <a class="navbar-brand ms-4" href="/dashboard">
            Dashboard
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-end" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="sidebar bg-dark">
       
        <a href="/students">View Students</a>
        <a href="/students/create">Add Student</a>
        <div class=" dropdown bg-dark">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Manage your account
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="/Accountmanagment">Account Info</a></li>
                <li><a class="dropdown-item" href="/Accountmanagment#">Chnage Password</a></li>
                <li><a class="dropdown-item" href="/Accountmanagment">Delete Account</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header fw-bold">Welcome to your dashboard, {{ Auth::user()->name }}!</div>

                <div class="card-body">
                    <p>To manage student data within our institute, you are provided with the functionality to securely store and manipulate their information. This system allows for the inclusion of student details, including their encrypted passwords, ensuring utmost security and privacy.</p>
                    <p>Within this platform, you have the capability to update existing student records, ensuring that the information remains accurate and up-to-date. Additionally, you can delete records as necessary, maintaining the integrity and relevance of the stored data.</p>
                </div>
             <a href="{{ route('students.index') }}">   <button class="btn btn-secondary m-3">View Your added students data</button> </a>
            </div>
        </div>
    </div>
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
