<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create New User</title>
    <link rel="icon" href="<?php echo e(asset('images/logo.png')); ?>" type="image/x-icon">
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
    <h1>Create New User</h1>

    <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

                <span class="alert-close" onclick="this.parentElement.style.display='none';" style="float:right;font-size:18px;">&times;</span>
            </div>
        <?php endif; ?>

    <form method="POST" action="<?php echo e(route('users.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>

</body>
</html>
<?php /**PATH C:\laragon\www\cris\resources\views/dashboard/create.blade.php ENDPATH**/ ?>