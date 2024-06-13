<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
            <a href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo">
            </a>
        </div>
        <div class="nav-right">
            <div class="home">
                <a href="<?php echo e(route('home')); ?>" class="btn btn-home" style="color:white;">Home</a>
            </div>
            <div class="sale">
                <a href="<?php echo e(route('mysales')); ?>" class="btn btn-sale" style="color:white;">My Sales</a>
            </div>
            <div class="logout">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-logout" style="color:white;">Logout</button>
                </form>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
    <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

                <span class="alert-close" onclick="this.parentElement.style.display='none';" style="float:right;font-size:18px;">&times;</span>
            </div>
        <?php endif; ?>
        <h1>Track My Sales</h1>
        <table id="users-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>phone</th>
                    <th>Age</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($sale->name); ?></td>
                    <td><?php echo e($sale->phone); ?></td>
                    <td><?php echo e($sale->age); ?></td>
                    <td>
                        <a href="<?php echo e(route('buyer.edit', $sale->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('buyer.destroy', $sale->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return alert('Are You Sure!');">Delete</button>
                        </form>
                    </td>
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
<?php /**PATH C:\laragon\www\cris\resources\views\sales.blade.php ENDPATH**/ ?>