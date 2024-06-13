<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="dark-theme">

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
        <h1>Add New Customer</h1><br>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

                <span class="alert-close" onclick="this.parentElement.style.display='none';" style="float:right;font-size:18px;">&times;</span>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" required>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age">
            </div>
            <div class="form-group">
                <button type="submit" class="btn" style="background-color : blue; color: white">Submit</button>
            </div>
        </form>
    </div>



<!-- <div class="animated-background">
    <div class="particles"></div>
</div> -->

</body>
</html>
<?php /**PATH C:\laragon\www\cris\resources\views\index.blade.php ENDPATH**/ ?>