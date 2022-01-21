<?php
include './includes/config.php';

if (isset($_POST['submit'])) {
  $from = $_GET['id'];
  $to = $_POST['to'];
  $amount = $_POST['amount'];

  $sql = "SELECT * from users where id=$from";
  $query = mysqli_query($conn, $sql);
  $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

  $sql = "SELECT * from users where id=$to";
  $query = mysqli_query($conn, $sql);
  $sql2 = mysqli_fetch_array($query);



  if (($amount) < 0) {
    echo '<script type="text/javascript">';
    echo ' alert("Oops! Negative values cannot be transferred")';
    echo '</script>';
  }



  // constraint to check insufficient balance.
  else if ($amount > $sql1['balance']) {

    echo '<script type="text/javascript">';
    echo ' alert("Bad Luck! Insufficient Balance")';
    echo '</script>';
  } else if ($amount == 0) {

    echo "<script type='text/javascript'>";
    echo "alert('Oops! Zero value cannot be transferred')";
    echo "</script>";
  } else {

    $newbalance = $sql1['balance'] - $amount;
    $sql = "UPDATE users set balance=$newbalance where id=$from";
    mysqli_query($conn, $sql);


    $newbalance = $sql2['balance'] + $amount;
    $sql = "UPDATE users set balance=$newbalance where id=$to";
    mysqli_query($conn, $sql);

    $sender = $sql1['name'];
    $receiver = $sql2['name'];
    $sql = "INSERT INTO transactions(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
      echo "<script> alert('Hurray! Transaction is Successful');
                                     window.location='transactions.php';
                           </script>";
    }

    $newbalance = 0;
    $amount = 0;
  }
}
?>
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

  <title>Easy Transfer Money</title>
</head>

<body style="display: flex; flex-direction:column; height:100vh;">

  <?php include "./includes/nav.php"  ?>


  <div class="container">
    <h1 class="mt-3 text-center">Transfer Money</h1>
    <?php
    include './includes/config.php';
    $sid = $_GET['id'];
    $sql = "SELECT * FROM  users where id = $sid";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "Error : " . $sql . "<br>" . mysqli_error($conn);
    }
    $rows = mysqli_fetch_assoc($result);
    ?>
    <form method="POST" class="mt-5">
      <table class="table mt-4 mb-3 table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Balance</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><?php echo $rows['id']   ?></th>
            <td><?php echo $rows['name']   ?></td>
            <td><?php echo $rows['email']   ?></td>
            <td><?php echo $rows['balance']   ?></td>
          </tr>
        </tbody>
      </table>


      <div class="mb-3">
        <label for="exampleInput" class="form-label">Transfer To:</label>
        <select name="to" class="form-control" required>
          <option value="" disabled selected>Choose account</option>
          <?php
          include 'config.php';
          $sid = $_GET['id'];
          $sql = "SELECT * FROM users where id!=$sid";
          $result = mysqli_query($conn, $sql);
          if (!$result) {
            echo "Error " . $sql . "<br>" . mysqli_error($conn);
          }
          while ($rows = mysqli_fetch_assoc($result)) {
          ?>
            <option class="table" value="<?php echo $rows['id']; ?>">

              <?php echo $rows['name']; ?> (Balance:
              <?php echo $rows['balance']; ?> )

            </option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Balance</label>
        <input type="number" class="form-control" name="amount">
      </div>
      <button type="submit" name="submit" class="btn btn-primary mt-3">Transfer Money</button>
    </form>

  </div>

  <?php include "./includes/footer.php"  ?>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>