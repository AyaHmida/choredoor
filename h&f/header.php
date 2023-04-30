<?php
//connexion vers la base
include "accestest.php";
include "h&f/functions.php";



?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Droussi</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
       <?php 
          if (isset($_SESSION['nom'])){
            print "

      <a class='nav-link nav-profile d-flex align-items-center pe-0' href='#' data-bs-toggle='dropdown'>
       
        <span class='d-none d-md-block dropdown-toggle ps-2'><i class='bi bi-person'></i>".$_SESSION['nom']."</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow profile'>

        <li>
          <hr class='dropdown-divider'>
        </li>

        <li>
          <a class='dropdown-item d-flex align-items-center' href='deconnexionEleve.php'>
            <i class='bi bi-box-arrow-right'></i>
            <span>Sign Out</span>
          </a>
        </li>
        

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->
            ";
          }
          else{
            print "<div class='header-social-links'>
        
            <a href='#' class='facebook'><i class='bi bi-facebook'></i></a>
            <a href='#' class='linkedin'><i class='bi bi-linkedin'></i></i></a>
          </div>";

          }
       ?>


    </div>

  </header><!-- End Header -->