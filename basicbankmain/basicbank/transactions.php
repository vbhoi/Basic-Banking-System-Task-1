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

  <title>Transactions</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;">


  <?php include "./includes/nav.php"  ?>
  <section class="customer-data">
    <div class="container">
      <h1 class="mt-3 text-center">Transactions History</h1>

      <table class="table mt-4 mb-3 table-responsive table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Sr.no</th>
            <th scope="col">Sender</th>
            <th scope="col">Receiver</th>
            <th scope="col">Amount</th>
            <th scope="col">Date & Time</th>
          </tr>
        </thead>
        <tbody>
          <?php

          include "./includes/config.php";
          $sql = "SELECT * FROM `transactions`";
          $query = mysqli_query($conn, $sql);

          while ($results = mysqli_fetch_assoc($query)) {

          ?>
            <tr>

              <td><?php echo $results['id']   ?></td>
              <td><?php echo $results['sender']   ?></td>
              <td><?php echo $results['receiver']   ?></td>
              <td><?php echo $results['balance'] ?></td>
              <td><?php echo $results['datetime'] ?></td>
            </tr>

          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <?php include "./includes/footer.php"    ?>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>