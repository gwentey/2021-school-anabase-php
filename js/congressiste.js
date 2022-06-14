$(document).ready(function() {

    var ElementSelected;
    var nom_prenom;
    var result;
    var organisme;
    var hotel;
    var NUM_CONGRESSISTE;
    var NUM_ORGANISME;
    var NUM_HOTEL;
    var NOM_CONGRESSISTE;
    var PRENOM_CONGRESSISTE;
    var ADRESSE_CONGRESSISTE;
    var TEL_CONGRESSISTE;
    var CODE_ACCOMPAGNATEUR;
    var SEXE_CONGRESSISTE;
    var NUM_ORGANISME_NOM;
    var NUM_HOTEL_HOTEL;
    var url;

    $('#suprimée').click(function() {

        ElementSelected = this;

        result = $(ElementSelected).closest('tr').children('td:first').text();

        nom_prenom = $(ElementSelected).closest('tr').children('td').eq(3).text() + " " + $(ElementSelected).closest('tr').children('td').eq(4).text();

        $('.modal-body').html('Voulez vous vraiment supprimer <b>' + nom_prenom + '</b> ?');

        $('#oui_modal').click(function() {

            $(ElementSelected).closest("tr").fadeOut();

            var url = "./?controleur=congressiste&todo=delete&NUM_CONGRESSISTE=" + result;
            $.ajax(url)
                .done(function(data, text, jqxhr) {
                    $(ElementSelected).closest("tr").fadeOut();
                })
                .fail(function(jqxhr) {
                    alert(jqxhr.responseText);
                })
                .always(function() {
                    console.log("Suprimée");
                });


        });


    });


    $('#modifiée').click(function() {

        ElementSelected = this;

        result = $(ElementSelected).closest('tr').children('td:first').text();
        organisme = $(ElementSelected).closest('tr').children('td').eq(1).text();
        hotel = $(ElementSelected).closest('tr').children('td').eq(2).text();


        url = "./?controleur=congressiste&todo=getCongressiste&NUM_CONGRESSISTE=" + result + "&NOM_ORGANISME=" + organisme + "&NOM_HOTEL=" + hotel;

        $.ajax(url)
            .done(function(data, text, jqxhr) {
                $('#modifier_formulaire').html(data);

                $('#oui_modal_modifier').click(function() {

                    NUM_CONGRESSISTE = $('#NUM_CONGRESSISTE').val();
                    NUM_ORGANISME = $('#NUM_ORGANISME').val();
                    NUM_HOTEL = $('#NUM_HOTEL').val();
                    NOM_CONGRESSISTE = $('#last_name').val();
                    PRENOM_CONGRESSISTE = $('#first_name').val();
                    ADRESSE_CONGRESSISTE = $('#adresse').val();
                    TEL_CONGRESSISTE = $('#tel').val();
                    CODE_ACCOMPAGNATEUR = $('#CODE_ACCOMPAGNATEUR').val();
                    SEXE_CONGRESSISTE = $('#input_sex').val();

                    NUM_ORGANISME_NOM = $('#NUM_ORGANISME').find(':selected').data('id');
                    NUM_HOTEL_HOTEL = $('#NUM_HOTEL').find(':selected').data('id');


                    var urlModif = "./?controleur=congressiste&todo=modifier&NUM_CONGRESSISTE=" + NUM_CONGRESSISTE + "&NUM_ORGANISME=" + NUM_ORGANISME + "&NUM_HOTEL=" + NUM_HOTEL + "&NOM_CONGRESSISTE=" + NOM_CONGRESSISTE + "&PRENOM_CONGRESSISTE=" + PRENOM_CONGRESSISTE + "&ADRESSE_CONGRESSISTE=" + ADRESSE_CONGRESSISTE + "&TEL_CONGRESSISTE=" + TEL_CONGRESSISTE + "&CODE_ACCOMPAGNATEUR=" + CODE_ACCOMPAGNATEUR + "&SEXE_CONGRESSISTE=" + SEXE_CONGRESSISTE;


                    $.ajax(urlModif)
                        .done(function(data, text, jqxhr) {
                            $(ElementSelected).closest('tr').children('td:first').html();
                            $(ElementSelected).closest('tr').children('td').eq(1).html(NUM_ORGANISME_NOM)
                            $(ElementSelected).closest('tr').children('td').eq(2).html(NUM_HOTEL_HOTEL)
                            $(ElementSelected).closest('tr').children('td').eq(3).html(NOM_CONGRESSISTE)
                            $(ElementSelected).closest('tr').children('td').eq(4).html(PRENOM_CONGRESSISTE)
                            $(ElementSelected).closest('tr').children('td').eq(5).html(ADRESSE_CONGRESSISTE)
                            $(ElementSelected).closest('tr').children('td').eq(6).html(TEL_CONGRESSISTE)
                            $(ElementSelected).closest('tr').children('td').eq(8).html(CODE_ACCOMPAGNATEUR)

                            $(ElementSelected).closest("tr").effect("highlight", "slow");

                        })
                        .fail(function(jqxhr) {
                            alert(jqxhr.responseText);
                        })
                        .always(function() {
                            console.log("Modifier");
                        });

                });
            })
            .fail(function(jqxhr) {
                alert(jqxhr.responseText);
            })
            .always(function() {
                console.log("Modifier");

            });

    });

    $('#ajouté').click(function() {

        var url_ajouter = "./?controleur=congressiste&todo=ajouter";

        $.ajax(url_ajouter)
            .done(function(data, text, jqxhr) {
                $('#ajouter_formulaire').html(data);

                $('#oui_modal_ajouter').click(function() {

                    NUM_ORGANISME = $('#NUM_ORGANISME').val();
                    NUM_HOTEL = $('#NUM_HOTEL').val();
                    NOM_CONGRESSISTE = $('#last_name').val();
                    PRENOM_CONGRESSISTE = $('#first_name').val();
                    ADRESSE_CONGRESSISTE = $('#adresse').val();
                    TEL_CONGRESSISTE = $('#tel').val();
                    CODE_ACCOMPAGNATEUR = $('#CODE_ACCOMPAGNATEUR').val();
                    SEXE_CONGRESSISTE = $('#input_sex').val();


                    var url_ajouter_valide = "./?controleur=congressiste&todo=ajouter&NUM_ORGANISME=" + NUM_ORGANISME + "&NUM_HOTEL=" + NUM_HOTEL + "&NOM_CONGRESSISTE=" + NOM_CONGRESSISTE + "&PRENOM_CONGRESSISTE=" + PRENOM_CONGRESSISTE + "&ADRESSE_CONGRESSISTE=" + ADRESSE_CONGRESSISTE + "&TEL_CONGRESSISTE=" + TEL_CONGRESSISTE + "&CODE_ACCOMPAGNATEUR=" + CODE_ACCOMPAGNATEUR + "&SEXE_CONGRESSISTE=" + SEXE_CONGRESSISTE;


                    $.ajax(url_ajouter_valide)
                        .done(function(data, text, jqxhr) {
                            location.reload(true);

                        })
                        .fail(function(jqxhr) {
                            alert(jqxhr.responseText);
                        })
                        .always(function() {
                            console.log("Ajouté");
                        });


                });

            })
            .fail(function(jqxhr) {
                alert(jqxhr.responseText);
            })
            .always(function() {
                console.log("En cours d'ajout");
            });




    });


});