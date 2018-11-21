<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>CRUD Application</title>
  </head>
  <body>
    <div class="container">
      <div class="container">
        <?php require_once "process.php"; ?>
        <?php
          if (isset($_SESSION['message'])):
         ?>
         <div class=" alert alert-<?php $_SESSION['msg_type']?>">
           <?php
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            ?>
         </div>
       <?php endif ?>


        <?php
          $conn=new mysqli("localhost","root","","CRUD") or die(mysqli_error($conn));
          $result=$conn->query("SELECT * FROM data") or die(mysqli_error());
         ?>

         <div class="row justify-content-center container">
           <table class="table">
             <thead>
               <tr>
                 <th>Name</th>
                 <th>Location</th>
                 <th>Mobile</th>
                 <th colspan="2">Action</th>
               </tr>
             </thead>
             <tbody>
               <?php while ($row=$result->fetch_assoc()): ?>
               <tr>
                 <td><?php echo $row['name']; ?></td>
                 <td><?php echo $row['location']; ?></td>
                 <td><?php echo $row['mobile']; ?></td>
                 <td><a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info"> Edit </a></td>
                 <td><a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"> Delete </a></td>
               </tr>
             </tbody>
           <?php endwhile; ?>
           </table>
         </div>
      </div>


        <div class="container">
          <div class="row justify-content-center container">
            <form action="process.php" method="post">
              <input type="hidden" name="id" value="<?php echo $id; ?>">

              <div class="form-group">
                <fieldset class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $name ; ?>"placeholder="Enter Your Name">
                </fieldset>
              </div>

                <div class="form-group">
                  <fieldset class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" value="<?php echo $location ; ?>" placeholder="Enter Your Location ">
                  </fieldset>
                </div>

               <div class="form-group">
                 <fieldset class="form-group">
                   <label for="mobile">Mobile</label>
                   <input type="mobile" class="form-control" name="mobile" value="<?php echo $mobile ; ?>" placeholder="Enter Your Mobile">
                 </fieldset>
               </div>

          </div>
           <div class="form-group">
             <?php
              if ($update==true):
              ?>
              <button type="submit" name="update" class="btn btn-info"> Update </button>
            <?php else: ?>
             <button type="submit" class="btn btn-primary" name="save">Save</button>
           <?php endif; ?>
           </div>

        </form>
        </div>


    </div>

  </body>
</html>
