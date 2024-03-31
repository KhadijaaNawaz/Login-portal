<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Update Operations</title>
</head>
<style>
    body {
        background-color: #C7C7C7; /* Light Gray background color */
        font-family: "Times New Roman", Times, serif;
    }

    .form {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 50px;
    }

    .h2 {
        color: #343a40;
    }

    
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<body>
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    <a href="/students" class="btn btn-danger" role="button">Back to Students</a>

@endif
    <div class="container my-5 ">
        <div class="row justify-content-center my-5">
           
            <div class="col-md-6"> 
            <form action="{{ route('students.update', ['student' => $student->id]) }}" method="POST"  class="form">
    @csrf
    @method('PUT')
                <h2 class="h2 fw-bold mb-3 text-center">Updation Form</h2>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{ $student->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ $student->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label fw-bold">Phone</label>
                        <input type="tel" class="form-control" id="number" name="number" aria-describedby="emailHelp" value="{{ $student->number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>