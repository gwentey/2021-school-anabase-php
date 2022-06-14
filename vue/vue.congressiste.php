<?php include "./vue/entete.html.php"; ?>


<section class="banner_main">
    <div id="banner1" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#banner1" data-slide-to="0" class="active"></li>
            <li data-target="#banner1" data-slide-to="1"></li>
            <li data-target="#banner1" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="text-bg">
                                <span>Anabase</span>
                                    <a href="./?controleur=inscription"><img  width="40" height="40" src="./images/ajouter.png" /></a>
                                <br /><br />
                            </div>
                        </div>

                        <table class="table table-hover" id="table">

                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Organisation</th>
                                    <th scope="col">Hotel</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">Teléphone</th>
                                    <th scope="col">Date Inscription</th>
                                    <th scope="col">Code accompagnateur</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($c->data["listeCongressiste"] as $key) { ?>
                                        
                                    <tr>
                                        <td><?= $key->NUM_CONGRESSISTE ?></td>
                                        <td><?= $key->NOM_ORGANISME ?></td>
                                        <td><?= $key->NOM_HOTEL ?></td>
                                        <td><?= $key->NOM_CONGRESSISTE ?></td>
                                        <td><?= $key->PRENOM_CONGRESSISTE ?></td>
                                        <td><?= $key->ADRESSE_CONGRESSISTE ?></td>
                                        <td><?= $key->TEL_CONGRESSISTE ?></td>
                                        <td><?= $key->DATE_INSCRIPTION ?></td>
                                        <td><?= $key->CODE_ACCOMPAGNATEUR ?></td>
                                        <td><input id="modifiée" width="40" height="40" type="image" alt="Modifier" src="./images/modif.png" data-toggle="modal" data-target="#modifier_modal"></td>
                                        <td><input id="suprimée" width="40" height="40" type="image" alt="Suprimer" src="./images/croix.png" data-toggle="modal" data-target="#supprimer_modal"></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- Modal suprimée -->
<div class="modal fade" id="supprimer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="color:#FF0000" class="modal-title" id="exampleModalLongTitle">Supprimer un congressiste ?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                <button id="oui_modal" type="button" data-dismiss="modal" class="btn btn-success">Oui</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal modifier-->
<div class="modal fade bd-example-modal-lg" id="modifier_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="modifier_formulaire" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                <button id="oui_modal_modifier" type="button" data-dismiss="modal" class="btn btn-success">Je confirme !</button>
            </div>
            </form>
        </div>
    </div>
</div>



</div>
<?php include "./vue/pied.html.php"; ?>