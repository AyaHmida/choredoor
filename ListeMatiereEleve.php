
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>liste matiere</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .liste{
  text-align: right; 
	   font-size: 20;}
h1{
  text-align: right; 
	}
  .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color:mediumpurple;
}
    body{
  background: url('icons/childrens-books-1246675_1280.jpg');
  background-repeat: no-repeat;
  background-position: center;
  background-color: mediumpurple;}
.img1{
  position :right;
}
  </style>
  <?php 

Session_start();
$niv=$_SESSION['niveau'];

include "accestest.php";
$req="select * from matiere m,annee a,chapitres ch where niveau='$niv' and m.id_annee=a.id_annee ";
$res=$bdd->query($req);
$matieres=$res->fetchAll();

  
?>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php include "h&f/header.php";?>

 
<div class="container">
<img width='100px' height='100px' src="icons\livreS.png"/>
  <div class="row my-4">
    <div class="col-md-12 mx-auto">
      <div class="card">
        <div>
      <img width='100px' height='100px' src="icons\ampoule.png"/><img width='100px' height='100px' src="icons\carnet.png"/>
      <img width='100px' height='100px' src="icons\regles.png"/>
      <img width='100px' height='100px' src="icons\abaque.png"/>
      <img width='100px' height='100px' src="icons\cahier.png"/>
      <img width='100px' height='100px' src="icons\produits-chimiques.png"/>
      <img width='100px' height='100px' src="icons\plume.png"/>
      <img width='100px' height='100px' src="icons\livre2.png"/>
      <img width='100px' height='100px' src="icons\livre3.png"/>
      <img width='100px' height='100px' src="icons\10.png"/>

</div>
<div class="card-body bg-light">
        <h1 class="card-header" >قائمة المواد <img width='90px' height='90px' src="icons\fille.png"/></h1>
        <table class="table table-hover">
         <?php foreach ( $matieres as $m){?>
          <tr>
           
            <td scope="row" class='liste'> <a href="listeChapitreEleve.php" ><?php echo $m['nom_matiere'];?></a></td>
          <?php }?>
        
          </tr>
        </table>
        <img width='100px' height='100px' src="icons\design.png"/>

        </div>
      </div></div></div></div>
      <?php include "h&f/footer.php";?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
