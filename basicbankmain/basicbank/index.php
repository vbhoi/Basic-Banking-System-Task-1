<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./style.css">

  <!-- Poppins Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <title>Bank System</title>
</head>

<body>
  <?php include "./includes/nav.php"  ?>

  <section class="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-4">
          <h1>Welcome to our Bank</h1>
          <h3 class="mb-3 mt-3">Transfer Your money with ease</h3>
          <a class="btn btn-primary" href="./customers.php" role="button">Get Started</a>
        </div>
        <div class="col-lg-6 col-md-4">
          <img class="img-fluid" src="./images/transfer.jpg" alt="">
        </div>
      </div>
    </div>
  </section>

  <?php include "./includes/footer.php" ?>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>