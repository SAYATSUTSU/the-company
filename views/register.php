<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="bg-light">
<div style="height: 100vh;">
<div class="row h-100 m-o">
    <div class="card w-25 my-auto mx-auto">
        <div class="card-header bg-white border-0 py-3">
            <h1 class="text-center text-uppercase">register</h1>
        </div>
       <div class="card-body">
       <form action="../actions/register.php" method="post">
      <div class="mb-3">
       <label for="first_name" class="form-label">First Name</label>
       <input type="text" name="first_name" id="first_name" class="form-control" required autofocus>
      </div>
      <div class="mb-3">
       <label for="last_name" class="form-label">Last Name</label>
       <input type="text" name="last_name" id="last_name" class="form-control" required>
      </div>
      <!-- adding bold -->
      <div class="mb-3">
       <label for="username" class="form-label fw-bold">Username</label>
       <input type="text" name="username" id="username" class="form-control fw-bold" required maxlength="15">
      </div>
      <div class="mb-3">
       <label for="password" class="form-label fw-bold">Password</label>
       <input type="password" name="password" id="password" class="form-control fw-bold" required aria-describedby="password-info">
       <div id="password-info" class="form-text">
        Password must be at least 8 characters long.
      </div>
      </div>
    <button type="submit" class="btn btn-success w-100">Register</button>
       </form>
       <p class="text-center mt-3 small">Register Already?<a href="index.php">Log in.</a></p>
       
       </div>
    </div>
</div>


</div>
    



</body>
</html>