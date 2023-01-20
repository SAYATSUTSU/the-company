<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div style="height: 100vh;">
    <div class="row h-100 m-0">
        <div class="card w-25 my-auto mx-auto">
            <div class="card-header bg-white border-0 py-3">
                <h1 class="text-center text-uppercase">login</h1>
            </div>
            <div class="card-body">
                <form action="../actions/login.php" method="post">
                <input type="text" class="form-control mb-2" name="username" placeholder="USERNAME" required autofocus>
                <input type="password" class="form-control mb-2" name="password" placeholder="PASSWORD" required>
                <button type="submit" class="btn btn-primary w-100">Log in</button>
                </form>
                <p class="text-center mt-3 small"><a href="register.php">Create Account</a></p>
            </div>
        </div>
    </div>
    </div>



</body>
</html>