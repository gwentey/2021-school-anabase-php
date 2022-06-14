<script>
    // URLs images
    var female_img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo8PcCxh7tT6MDFhJi2UaAT9SeciHqvZuaWtGg0y0-yyP8rMDz";
    var male_img = "https://visualpharm.com/assets/217/Life%20Cycle-595b40b75ba036ed117d9ef0.svg";

    // On page loaded
    $(document).ready(function() {
        // Set the sex image
        set_sex_img();

        // Set the "who" message
        set_who_message();

        // On change sex input
        $("#input_sex").change(function() {
            // Set the sex image
            set_sex_img();
            set_who_message();
        });

        // On change fist name input
        $("#first_name").keyup(function() {
            // Set the "who" message
            set_who_message();

            if (validation_name($("#first_name").val()).code == 0) {
                $("#first_name").attr("class", "form-control is-invalid");
                $("#first_name_feedback").html(validation_name($("#first_name").val()).message);
            } else {
                $("#first_name").attr("class", "form-control");
            }
        });

        // On change last name input
        $("#last_name").keyup(function() {
            // Set the "who" message
            set_who_message();

            if (validation_name($("#last_name").val()).code == 0) {
                $("#last_name").attr("class", "form-control is-invalid");
                $("#last_name_feedback").html(validation_name($("#last_name").val()).message);
            } else {
                $("#last_name").attr("class", "form-control");
            }
        });



        // On change last name input
        $("#tel").keyup(function() {
            // Set the "who" message
            info();

            if (validation_tel($("#tel").val()).code == 0) {
                $("#tel").attr("class", "form-control is-invalid");
                $("#last_tel_feedback").html(validation_name($("#tel").val()).message);
            } else {
                $("#tel").attr("class", "form-control");
            }
        });
    });


    /**
     *   Set image path (Mr. or Ms.)
     */
    function set_sex_img() {
        var sex = $("#input_sex").val();
        if (sex == "Mr.") {
            // male
            $("#img_sex").attr("src", male_img);
        } else {
            // female
            $("#img_sex").attr("src", female_img);
        }
    }

    /**
     *   Set "who" message
     */
    function set_who_message() {
        var sex = $("#input_sex").val();

        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();



        if (validation_name(first_name).code == 0 ||
            validation_name(last_name).code == 0) {
            // Informations not completed
            $("#who_message").html("Saisissez un nom et prénom");
        } else {
            // Informations completed
            $("#who_message").html(sex + " " + first_name + " " + last_name);
        }
    }

    function info() {
        var tel = $("#tel").vasl();
        if (validation_tel(tel).code == 0) {
            // Informations not completed
        }
    }

    /**
     *   Validation function for last name and first name
     */
    function validation_name(val) {
        if (val.length < 2) {
            // is not valid : name length
            return {
                "code": 0,
                "message": "Le nom est trop court"
            };
        }
        if (!val.match("^[a-zA-Z\- ]+$")) {
            // is not valid : bad character
            return {
                "code": 0,
                "message": "Le nom doit contenir que des caractères alpha-numériques"
            };
        }

        // is valid
        return {
            "code": 1
        };
    }

    function validation_tel(val) {
        if (val.length != 10) {
            // is not valid : name length
            return {
                "code": 0,
                "message": "Le numéro de téléphone est trop court"
            };
        }
        if (!val.match("[0-9]")) {
            // is not valid : bad character
            return {
                "code": 0,
                "message": "Le numéro de téléphone ne que des chiffres..."
            };
        }

        // is valid
        return {
            "code": 1
        };
    }
</script>
<style>
    body {
        background-color: #e9ebee;
    }

    h2 {
        color: #000;

    }

    .card {
        margin-top: 1em;
    }

    /* IMG displaying */
    .person-card {
        margin-top: 5em;
        padding-top: 5em;
    }

    .person-card .card-title {
        text-align: center;
    }

    .person-card .person-img {
        width: 10em;
        position: absolute;
        top: -5em;
        left: 50%;
        margin-left: -5em;
        border-radius: 100%;
        overflow: hidden;
        background-color: white;
    }
</style>

<div class="container" style="margin-top: 1em;">
    <!-- Sign up form -->
    <form>
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">
                <!-- Sex image -->
                <img id="img_sex" class="person-img" src="https://visualpharm.com/assets/217/Life%20Cycle-595b40b75ba036ed117d9ef0.svg">
                <h2 id="who_message" class="card-title">Qui est-il ?</h2>
                <!-- First row (on medium screen) -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <select id="input_sex" class="form-control">
                            <option value="Mr.">Mr.</option>
                            <option value="Mme.">Mme.</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <input id="first_name" type="text" class="form-control" name="PRENOM_CONGRESSISTE" placeholder="Prénom">
                        <div id="first_name_feedback" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <input id="last_name" type="text" class="form-control" name="NOM_CONGRESSISTE" placeholder="Nom" >
                        <div id="last_name_feedback" class="invalid-feedback">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6" style="padding:0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Information de contact</h2>
                        <div class="form-group">
                            <label for="adresse" class="col-form-label">Adresse</label>
                            <input type="adresse" class="form-control" id="adresse" name="ADRESSE_CONGRESSISTE" placeholder="3 rue ...." required>
                            <div class="adresse-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Téléphone</label>
                            <input type="text" class="form-control" id="tel" name="TEL_CONGRESSISTE" placeholder="+33 6 99 99 99 99" required>
                            <div class="last_tel_feedback">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Plus...</h2>
                        <div class="form-group">

                            <select name="NUM_ORGANISME" id="NUM_ORGANISME" class="form-control">
                                <?php foreach ($c->data["listeOrganisme"] as $organisme) { ?>
                                    <option data-id="<?= $organisme->NOM_ORGANISME ?>" value="<?= $organisme->NUM_ORGANISME ?>"><?= $organisme->NOM_ORGANISME ?></option>
                                <?php } ?>
                            </select>

                        </div>

                        <select name="NOM_HOTEL" id="NUM_HOTEL" class="form-control">
                            <?php foreach ($c->data["listeHotel"] as $hotel) { ?>
                                    <option data-id="<?= $hotel->NOM_HOTEL ?>" value="<?= $hotel->NUM_HOTEL ?>"><?= $hotel->NOM_HOTEL ?></option>
                                    </option>
                                <?php } ?>
                        </select>

                            <label class="col-form-label">Code accompagnateur</label>
                            <input type="text" name="CODE_ACCOMPAGNATEUR" class="form-control" id="CODE_ACCOMPAGNATEUR" placeholder="Code accompagnateur" required>

                    </div>
                </div>
            </div>
        </div>
</div>
</form>
</div>

