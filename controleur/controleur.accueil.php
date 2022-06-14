<?php
include("./modele/modele.congressiste.php");

class Controleur_accueil
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

		$this->vue = "accueil";
	}
	public function todo_initialiser()
	{
	}

	public function todo_enregistrer()
	{
	}
}
