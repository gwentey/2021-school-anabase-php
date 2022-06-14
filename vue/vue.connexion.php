<?php include "./vue/entete.html.php"; ?>

<!-- end header inner -->
<!-- end header -->
<!-- banner -->
<section class="banner_main">
    <div id="banner1" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#banner1" data-slide-to="0" class="active"></li>
            <li data-target="#banner1" data-slide-to="1"></li>
            <li data-target="#banner1" data-slide-to="2"></li>
        </ol>

        <?php
        // controle des erreurs et message
        if ($c->message != "") { ?>
            <div class="alert alert-success w-50" role="alert">
                <?= $c->message ?>.
            </div>
        <?php } ?>

        <?php
        if ($c->erreur != "") { ?>
            <div class="alert alert-danger w-50" role="alert">
                <?= $c->erreur ?>
            </div>
        <?php } ?>


        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-fluid">
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-md-12 col-lg-7">
                                <div class="text-bg">
                                    <span>Anabase - Connexion</span>
                                    <br /><br />
                                    <form method="POST" action="./?controleur=connexion">
                                        <div class="form-group">
                                            <input type="text" name="pseudo" class="form-control" placeholder="Votre pseudo">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                                        </div>

                                        <button type="submit" name ="todo" value="Enregistrer" class="btn btn-warning">Se connecter</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-5">
                                <div class="text_img">
                                    <figure><img src="images/ban_img.png" alt="#" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>
</div>
</header>
<!-- <p style="color:black; text-align:center";>Red paragraph text</p> -->
<!-- end banner -->
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
</body>

</html>