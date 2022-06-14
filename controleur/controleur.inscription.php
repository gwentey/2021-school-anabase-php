<?php
include("./modele/modele.congressiste.php");

class Controleur_inscription
{
	// --- champs de base du controleur
	public $vue = ""; //vue appelée par le controleur

	public $message = "";

	public $erreur = "";

	public $data; // le tableau des données de la vue

	public $modele; // nom du modele

	public $post; // renseigné par index

	// --- Constructeur
	public function __construct()
	{
		// déclarer la vue

		$this->modele = new Modele_congressiste();

		if (!$this->modele->logged_only()) {
			header('Location: ./?controleur=connexion&todo=erreur');
		}

		$this->vue = "inscription";
	}
	public function todo_initialiser()
	{
		$this->data["listeCongressiste"] = $this->modele->getListeCongressiste();
		$this->data["listeHotel"] = $this->modele->getHotel();
		$this->data["listeOrganisme"] = $this->modele->getOrganisme();

	}

	public function todo_enregistrer()
	{
		$this->modele->AjouterCongressiste($_POST['NUM_ORGANISME'], $_POST['NUM_HOTEL'], $_POST['NOM_CONGRESSISTE'], $_POST['PRENOM_CONGRESSISTE'],$_POST['ADRESSE_CONGRESSISTE'],$_POST['TEL_CONGRESSISTE'],$_POST['CODE_ACCOMPAGNATEUR'],$_POST['SEXE_CONGRESSISTE']);
		$this->modele->envoyerEmail($_POST['NOM_CONGRESSISTE'],$_POST['PRENOM_CONGRESSISTE']);
        header('Location: ./?controleur=congressiste');

        
	}


}
