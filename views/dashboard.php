<?php
session_start();

require "../classes/User.php";

$user = new User;
$all_users = $user->getAllUsers();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Dashboard</title>
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

    <main class="row justify-content-center gx-auto">
       <div class="col-6">
         <h2 class="text-center">USER LIST</h2>

         <table class="table table-hover align-middle">
            <thead>
               <tr>
                  <th><!-- photo --></th>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th><!-- for action buttons--></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  while($user = $all_users->fetch_assoc()){
               ?>
               <tr>
                  <td>

                  <?php
                    if($user['photo']){
                     ?>
                     <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="dashboard-photo d-block mx-auto">
                     <?php
                    }else{
                    ?>

                 <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                 <?php
                    }
                    ?>

               
                  </td>
                  <td><?= $user['id'] ?></td>
                  <td><?= $user['first_name'] ?></td>
                  <td><?= $user['last_name'] ?></td>
                  <td><?= $user['username'] ?></td>
                  <td>
                     <?php
                     if($_SESSION['id'] == $user['id']){
                     ?>
                     <a href="edit-user.php" class="btn btn-outline-warning" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="delete-user.php" class="btn btn-outline-danger" title="Delete"><i class="fa-regular fa-trash-can"></i></a>
                    <?php
                     }
                     ?>
                  </td>
               </tr>
                  <?php
                  }
               ?>
            </tbody>
         </table>
       </div>
    </main>
   </body>
</html>