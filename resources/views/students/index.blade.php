<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
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
  <div class="content ">  @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
         <div class="container ">

       <div class="container rounded bg-dark text-white p-5 mt-4" > <h2 class="h2 fw-bold mb-3 text-center">Students Information</h2>
        <table class="table table-bordered p-5">
            <thead class="bg-secondary text-light">
                <tr>
                    <th scope="col">Serial #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password (Encrypted)</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody  class="bg-light text-text-dark" >
                @foreach($students as $student)
                <tr>
                    <td>{{ $loop->index+1}}</td>
                    <td>{{ $student->name}}</td>
                    <td>{{ $student->email}}</td>
                    <td>{{ $student->number}}</td>
                    <td>{{ substr(bcrypt($student->password), 0, 10) }}...</td>
                    <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('students.edit', ['student' => $student->id]) }}" role="button">Update</a>

                    <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="POST" style="display: inline;">
                     @csrf
                     @method('DELETE')
                    <button type="submit" class="btn bg-danger text-light btn-sm" onclick="return confirmDelete()">Delete</button>
                    </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/students/create" class="btn btn-primary" role="button">Add New Student</a>
    </div></div>
</div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
