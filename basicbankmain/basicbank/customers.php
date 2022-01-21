<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./style.css" />

  <!-- Poppins Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <title>Customers</title>
</head>

<body>
  <?php include "./includes/nav.php"  ?>


  <section class="customer-data">
    <div class="container">
      <h1 class="mt-3 text-center">Our Customers</h1>
      <table class="table mt-4 table-responsive table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">S.no</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Balance</th>
          </tr>
        </thead>
        <tbody>
          <?php

          include "./includes/config.php";
          $sql = "SELECT * FROM `users`";
          $query = mysqli_query($conn, $sql);
          while ($results = mysqli_fetch_assoc($query)) {

          ?>
            <tr>

              <td><?php echo $results['id']   ?></td>
              <td><?php echo $results['name']   ?></td>
              <td><?php echo $results['email']   ?></td>
              <td><?php echo $results['balance']   ?></td>
              <td>
                <a href="transfer.php?id= <?php echo $results['id']; ?>"> <button class="btn btn-primary">View and Transact</button></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <?php include "./includes/footer.php" ?>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>