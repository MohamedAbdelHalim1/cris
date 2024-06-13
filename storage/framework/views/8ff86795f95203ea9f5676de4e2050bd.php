<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New User</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
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
            <a href="<?php echo e(route('dashboard')); ?>">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo">
            </a>
        </div>
        <div class="logout">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-logout" style="color:white;">Logout</button>
            </form>
        </div>
    </div><br>

<div class="container">
    <h1>Edit</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.buyer.update' , $id)); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo e($sale->name); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">phone</label>
            <input type="phone" id="email" name="phone" class="form-control" value="<?php echo e($sale->phone); ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Age</label>
            <input type="number" id="password" name="age" class="form-control" value="<?php echo e($sale->age); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Buyer</button>
    </form>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\cris\resources\views\dashboard\edit.blade.php ENDPATH**/ ?>