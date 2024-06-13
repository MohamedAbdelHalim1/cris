<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <title>Create New User</title>
    <link rel="icon" href="{{ asset('images/logo.png')  }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
<div class="navbar">
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            <div class="project-name">Cris Elmasry</div>
        </div>
        <div class="nav-right">
            <div class="home">
                <a href="{{ route('dashboard') }}" class="btn btn-home" style="color:white;">Home</a>
            </div>
            <div class="sale">
                <a href="{{ route('users.create') }}" class="btn btn-sale" style="color:white;">Add Sale</a>
            </div>
            <div class="logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-logout" style="color:white;">Logout</button>
                </form>
            </div>
        </div>
    </div><br>

<div class="container">
    <h1>Edit</h1>

    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <span class="alert-close" onclick="this.parentElement.style.display='none';" style="float:right;font-size:18px;">&times;</span>
            </div>
        @endif

    <form method="POST" action="{{ route('admin.buyer.update' , $id) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $sale->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">phone</label>
            <input type="phone" id="email" name="phone" class="form-control" value="{{ $sale->phone }}" required>
        </div>
        <div class="form-group">
            <label for="password">Age</label>
            <input type="number" id="password" name="age" class="form-control" value="{{ $sale->age }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Buyer</button>
    </form>
</div>

</body>
</html>
