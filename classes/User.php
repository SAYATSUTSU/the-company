<?php
require_once "Database.php";

// create user class and inherit database class
class User extends Database
{
    // store method / inserting user to db
    public function store($request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = password_hash($request['password'],PASSWORD_DEFAULT);
        // encrypting password

        // sql command
        $sql = "INSERT INTO `users`(`first_name`,`last_name`,`username`,`password`)VALUES('$first_name','$last_name','$username','$password')";

        // excute the sql command to mysql
        if($this->conn->query($sql))
        { // if success
            header('location: ../views'); // go to index.php
            exit;
        }else{
            //if failed or error
            die('Error Creating the user: '.$this->conn->error);
        }
    }

    public function login($request)
    {
         $username = $request['username'];
         $password = $request['password'];

         // sql command
         $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
         // execute the sql command
         if($result = $this->conn->query($sql))
         { // success
           // check if username exist in db
           if($result->num_rows == 1)
           {  // if username has a match

             //  transform db data to associative array
             $user = $result->fetch_assoc();

             // check if password is match form db and inputted password
             if(password_verify($password,$user['password']))
             { // if match
              
            // create session variable for future use
            session_start();
            // starting session . to enable us to use session variables
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['first_name']." ".$user['last_name'];

            // go to dashboard.php
            header('location: ../views/dashboard.php');
            exit;

            }else{
                // if not match
                die('Password is incorrect');
             }

           }else{
                // if no username in db
                die('Username Not Found');
           }
         }else{
            die('Error Logging in: '.$this->conn->error);
         }

    }

    public function logout()
    {
        session_start();
        // unset -- remove the values to forget the data of the previous session
        session_unset();
        // destroy -- delete the session
        session_destroy();

        header('location: ../views');
        exit;
    }

    public function getAllUsers()
    {
    $sql = "SELECT id, first_name, last_name, username, photo FROM users";

     if($result = $this->conn->query($sql)){
       // $result contains 4 rows and 5 columns
       return $result;
     }else{
       die('Error retriving all users:' . $this->conn->error);
     }
    }


    public function getUser()
    {
        $id = $_SESSION['id'];
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
      }else{
        die('Error retriving all users:' . $this->conn->error);
      }
    }

    public function update($request,$files)
    {  // start session to get session variables
        session_start();
        $id = $_SESSION['id'];

        // get input values from the form
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $photo = $files['photo']['name']; // name of the file
        $photo_tmp = $files['photo']['tmp_name']; // name of the temporary file

        // sql command for updating
        $sql = "UPDATE users SET `first_name` = '$first_name',`last_name` = '$last_name',`username` = '$username' WHERE `id` = '$id'";

        //excute the sql command
        if($this->conn->query($sql))
        { // success
            // update session variable to reflect the update in session
            $_SESSION['username']= $username;
            $_SESSION['full_name']= $fisrt_name ." " .$last_name;

            // check if the user will update the photo
            if($photo)
            {
              // create 3nd sql command for updating phto
              $sql2 ="UPDATE users SET `photo` = '$photo' WHERE `id` = '$id'";

              // excute sql command
              if($this->conn->query($sql2))
              { // if success
                // save the photo to the assets/images folder
                $destination = "../assets/images/$photo";

                // move the tmp file in the destination
                if(move_uploaded_file($photo_tmp,$destination))
                {  // if move success

                    header("location: ../views/dashboard.php");
                    exit;

                }else{
                    // if move fail
                    die('Error moving the photo.');
                }

              }else{
                // if fail
                die('Error Uploading Photo' .$this->conn->error);
              }
            }

            header('location: ../views/dashboard.php');
            exit;

        }else{
            // if fail
            die('Error Updating the user:'.$this->conn->error);
        }

    }

    public function delete()
    {
        session_start();
        $id = $_SESSION['id'];

        $sql = "DELETE FROM `users` WHERE `id` = $id";

        if($this->conn->query($sql)){
            $this->logout();
        }else{
            die('Error deleting your acount:'.$this->conn->error);
        }
    }
}
