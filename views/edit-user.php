<?php
session_start();
   require "../classes/User.php";
   $user_obj = new User;
   $user = $user_obj->getUser();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
  <div class="container">
     <a href="dashboard.php" class="navbar-brand">
        <h1 class="h3">The Company</h1>
     </a>
     <div class="navbar-nav">
     <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
     <form action="../actions/logout.php" method="post" class="d-flex ms-2">
        <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
     </form>
     </div>
   </div>
</nav>

<main class="row justify-content-center gx-0">
    <div class="col-4">
        <h2 class="text-center mb-4">EDIT USER</h2>
      
        <form action="../actions/edit-user.php" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center mb-3">
                <div class="col">
                    <?php
                    if($user['photo']){
                     ?>
                     <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="edit-photo d-block mx-auto">
                     <?php
                    }else{
                    ?>

                 <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                 <?php
                    }
                    ?>
                 <input type="file" name="photo" class="form-control mt-2" accept="image/*">
              </div>
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $user['first_name'] ?>" required autofocus>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user['last_name'] ?>" required>
            </div>

            <div class="mb-4">
                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" value="<?= $user['username'] ?>" required>
            </div>
            

            <div class="text-end">
                <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
            </div>


        </form>
    </div>
</main>

</body>
</html>