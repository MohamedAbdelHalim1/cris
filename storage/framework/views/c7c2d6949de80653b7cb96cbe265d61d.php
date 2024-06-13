<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <title>Dashboard</title>
    <link rel="icon" href="<?php echo e(asset('images/logo.png')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap CSS - Only if you are using Bootstrap styling -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>


    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
        }
        table.dataTable {
            width: 100%;
            margin: 1em 0;
            clear: both;
            border-collapse: collapse;
            table-layout: fixed;
            word-wrap: break-word;
        }
        table.dataTable th,
        table.dataTable td {
            padding: 10px;
            border: 1px solid #555;
        }
        table.dataTable th {
            background-color: #444;
            color: #fff;
            font-weight: bold;
        }
        table.dataTable td {
            background-color: #666;
            color: #fff;
        }
        table.dataTable tr:nth-child(even) {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="navbar">
        <div class="logo">
            <a href="<?php echo e(route('dashboard')); ?>">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo">
            </a>
            <div class="project-name">Cris Elmasry</div>
        </div>
        <div class="nav-right">
            <div class="home">
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-home" style="color:white;">Home</a>
            </div>
            <div class="sale">
                <a href="<?php echo e(route('users.create')); ?>" class="btn btn-sale" style="color:white;">Add Sale</a>
            </div>
            <div class="logout">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-logout" style="color:white;">Logout</button>
                </form>
            </div>
        </div>
    </div><br>

    <div class="container">
    <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

                <span class="alert-close" onclick="this.parentElement.style.display='none';" style="float:right;font-size:18px;">&times;</span>
            </div>
        <?php endif; ?>
        <h1>Track Your Sales</h1>
        
        <table id="users-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number of Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('users.show' , $user->id)); ?>" style="color:white;"><?php echo e($user->name); ?></a></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->sales->count()); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable();
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\cris\resources\views/dashboard/index.blade.php ENDPATH**/ ?>