<?php
include ("./modele/modele.congressiste.php");

Class Controleur_connexion{
	// --- champs de base du controleur
	public $vue=""; //vue appelée par le controleur
	
	public $message = "";
	public $erreur = "";
	
	public $data; // le tableau des données de la vue
	
	public $modele; // nom du modele
		
	public $post; // renseigné par index
	
	// --- Constructeur
	public function __construct(){
		// déclarer la vue

		$this->modele = new Modele_congressiste();	

		if (!$this->modele->unlogged_only()) {
			header('Location: ./?controleur=accueil');
		}

		$this->vue = "connexion";
	}
	
	public function todo_initialiser(){

	}
	public function todo_erreur(){
		$this->erreur = "Vous devez être connecté";

	}

	
	public function todo_enregistrer()
	{

		if($this->modele->testConnexion($this->post["pseudo"], $this->post["password"])){
			header('Location: ./?controleur=accueil');
		} else {
			$this->erreur = "Identifiant ou mot de passe incorrect";

		}
		
	}

	public function todo_unlogged()
	{
		$this->erreur = "Vous devez être connecté pour accèder à cette page !";
	}
}
