<?php
include("./modele/modele.congressiste.php");

class Controleur_congressiste
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

		// si pas connecter rediriger vers connexion
		if (!$this->modele->logged_only()) {
			header('Location: ./?controleur=connexion&todo=erreur');
		   }

		$this->vue = "congressiste";
	}

	public function todo_initialiser()
	{
		$this->data["listeCongressiste"] = $this->modele->getListeCongressiste();
	}

	public function todo_delete()
	{
		$this->data["listeCongressiste"] = $this->modele->getListeCongressiste();
		$this->modele->deleteCongressiste($_GET['NUM_CONGRESSISTE']);
	}

	public function todo_modifier()
	{
		$this->data["listeCongressiste"] = $this->modele->getListeCongressiste();

		$this->modele->ModifierCongressiste($_GET['NUM_ORGANISME'], $_GET['NUM_HOTEL'],$_GET['NOM_CONGRESSISTE'],$_GET['PRENOM_CONGRESSISTE'],$_GET['ADRESSE_CONGRESSISTE'],$_GET['TEL_CONGRESSISTE'],$_GET['CODE_ACCOMPAGNATEUR'],$_GET['SEXE_CONGRESSISTE'], $_GET['NUM_CONGRESSISTE']);

	}


	public function todo_getCongressiste()
	{
		$this->data["listeCongressiste"] = $this->modele->getListeCongressiste();
		$this->data["listeHotel"] = $this->modele->getHotel($_GET['NOM_HOTEL']);
		$this->data["listeOrganisme"] = $this->modele->getOrganisme($_GET['NOM_ORGANISME']);
	
		$this->data["leCongressisteSelectionne"] = $this->modele->getCongressiste($_GET['NUM_CONGRESSISTE']);
		
		$this->vue = "ajax_modifier";

	}



}


