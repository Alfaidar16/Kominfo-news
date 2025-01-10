
    <!-- Session Status -->
   
   


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
       <link rel="icon" href="<?php echo e(asset('/adminlte/assets/img/logo_kominfo.png')); ?>" />
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            padding: 0;
            margin: 0;
        }
        .left-side, .right-side {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            min-height: 100vh;
        }
        .left-side {
            background-color: #06b6d4;
            color: #fff;
        }
        .left-side img {
            max-width: 100px;
            height: auto;
            margin-bottom: 1rem;
        }
        .right-side {
            background-color: #ffffff;
        }
        .login-form {
            background: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            /* box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1); */
            width: 100%;
            max-width: 500px;
        }
        .footer-links {
            margin-top: 1rem;
            text-align: center;
        }
        .footer-links a {
            margin: 0 0.5rem;
            color: #6c757d;
            text-decoration: none;
        }
        .form-control {
            border-radius: 1rem;
            /* box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1); */
            padding: 0.5rem;
            margin-bottom: 1rem;
            background: #f4f4f5
        }
    </style>
</head>
<body>
    <div class="container-fluid login-container">
        <div class="row w-100 m-0">
            <div class="col-md-6 left-side">
                <img src="<?php echo e(asset('/adminlte/assets/img/logo_kominfo.png')); ?>" alt="Logo">
                <h2>Dinas Komunikasi Informatika,</h2>
                <h2>Statistika dan Persandian</h2>
                <h3>PROVINSI SULAWESI SELATAN</h3>
            </div>
            <div class="col-md-6 right-side">
                <div class="login-form">
                    <h2 class="mb-4 text-center">Selamat Datang</h2>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>                 
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" >
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill p-2">Login</button>
                            <a href="/" class="btn btn-danger rounded-pill p-2 mt-3">Halaman Utama</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH /Users/lte/Herd/kominfo-new/resources/views/auth/login.blade.php ENDPATH**/ ?>