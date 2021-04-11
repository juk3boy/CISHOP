<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico"> -->

  <title> <?= isset($title) ? $title : 'CIShop'  ?></title>




  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/">

  <!-- Bootstrap core CSS -->
  <!-- <link rel="stylesheet" href="/assets/libs/bootstrap/css/bootstrap.css"> -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/bootstrap/css/bootstrap.min.css.map">

  <!-- Fontawaseome CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/fontawesome/css/brands.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/libs/fontawesome/css/fontawesome.min.css">
  <!-- <link rel="stylesheet" href="/assets/libs/fontawesome/css/regular.css">
    <link rel="stylesheet" href="/assets/libs/fontawesome/css/regular.min.css"> -->

  <!-- Custom styles for this template -->
  <!-- <link href="navbar-top-fixed.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/app.css">



</head>

<body>

  <!-- NavBar -->
  <?php $this->load->view('layouts/_navbar');  ?>
  <!-- End NavBar -->


  <!-- Content -->
  <?php $this->load->view($page);  ?>
  <!-- End Content -->




  <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script> -->

  <script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="/assets/libs/bootstrap/js/bootstrap.min.js"></script> -->
  <!-- <script src="/assets/libs/bootstrap/js/popper.min.js"></script> -->


  <!-- Fontawasome JS -->

  <script src="<?= base_url(); ?>assets/libs/fontawesome/js/all.js"></script>
  <script src="<?= base_url(); ?>assets/libs/fontawesome/js/all.min.js"></script>
  <script src="<?= base_url(); ?>assets/libs/fontawesome/js/brands.js"></script>
  <script src="<?= base_url(); ?>assets/libs/fontawesome/js/brands.min.js"></script>
  <script src="<?= base_url(); ?>assets/libs/fontawesome/js/fontawesome.js"></script>
  <script src="<?= base_url(); ?>assets/libs/fontawesome/js/fontawesome.min.js"></script>
  <!-- <script src="/assets/libs/fontawesome/js/regular.js"></script>
    <script src="/assets/libs/fontawesome/js/regular.min.js"></script> -->


  <!-- jquery -->



  <script src="<?= base_url(); ?>assets/js/app.js"></script>


</body>

</html>