<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Info</title>
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
        <a href="/products">View Students</a>
        <a href="/products/create">Add Student</a>
        <div class=" dropdown bg-dark">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Manage your account
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="/Accountmanagment">Account Info</a></li>
                <li><a class="dropdown-item" href="/Accountmanagment#">Change Password</a></li>
                <li><a class="dropdown-item" href="/Accountmanagment">Delete Account</a></li>
            </ul>
        </div>
    </div>
  <div class="content ps-5"> @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    <div class=" container ps-5">
       
        <div class="container">
            <h1 class="pt-5 fw-bolder">Your Account information </h1>
            <div class="row mt-4">
                <div class="col-10">
                    <div class="card bg-dark text-white p-5">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Account Information</h4>
                            <p class="card-text">Username: {{ $user->name }}</p>
                            <p class="card-text">Email: {{ $user->email }}</p>
                            <button class="btn btn-danger" data-toggle="modal"  data-target="#deleteAccountModal">Delete Account?</button>
                            <p class="fw-bold mt-4">Going to delete your account?</p>
                            <p>Once your account is deleted, it cannot be recovered. All your data will be permanently removed. Please make sure you are absolutely certain before proceeding with this action.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-10">
                    <form method="POST" action="{{ route('update_password') }}" class="form bg-dark text-white p-5">
                        @csrf
                        <h3>Update Password</h3>
                        <div class="form-group mb-3 mt-3">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control " id="current_password" name="current_password">
                            @error('current_password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password">
                            @error('new_password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="newPassword_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" id="newPassword_confirmation" name="new_password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('delete_account') }}">
                    @csrf
                    
                    <div class="modal-body">
                        <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
