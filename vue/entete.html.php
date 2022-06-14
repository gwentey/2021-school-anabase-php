      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">

      <!-- site metas -->
      <title>Anabase</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>


      <body class="main-layout">
         <!-- loader  -->
         <!-- end loader -->
         <!-- header -->
         <header>
            <!-- header inner -->
            <div class="header">
               <div class="white_bg">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                           <div class="full">
                              <div class="center-desk">
                                 <div class="logo">
                                    <a href="./?controleur=accueil"><img src="images/logo.png" alt="#" /></a>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <!-- On affiche le message que si nous sommes connecté -->
                        <?php if (isset($_SESSION['user'])) { ?>

                           <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                              <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                 </button>
                                 <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">

                                       <?php if ($c->vue == "accueil") { ?>

                                          <li class="nav-item active">
                                          <?php } else { ?>
                                          <li class="nav-item">
                                          <?php } ?>
                                          <a class="nav-link" href="./?controleur=accueil">Accueil</a>
                                          </li>


                                          <?php if ($c->vue == "congressiste") { ?>
                                             <li class="nav-item active">
                                             <?php } else { ?>
                                             <li class="nav-item">
                                             <?php } ?>
                                             <a class="nav-link" href="./?controleur=congressiste">Gestion des Congressistes</a>
                                             </li>
                                             <li class="nav-item d_none le_co">
                                                <a class="nav-link" href="./?controleur=deconnexion"><i class="fa fa-user" aria-hidden="true"></i> Deconnexion</a>
                                             </li>

                                    </ul>
                                 </div>
                              </nav>
                           </div>
                        <?php } ?>
                     </div>
                  </div>
                  <!-- end header inner -->
                  <!-- end header -->
                  <!-- banner -->

