<?php
class Modele_congressiste
{
	private $conn;

	public function __construct()
	{
		$login = "antho1720697";
		$mdp = "Emmanini6363!";
		$bd = "antho1720697";
		$serveur = "185.98.131.158";

		try {
			$this->conn = new PDO(
				"mysql:host=$serveur;dbname=$bd",
				$login,
				$mdp,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
			);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}

	/*
 * Fonction : Page accessible que si l'utilisateur est connecté
 * Démarre la variable si cette dernière n'est pas lancé
 * Si la variable SESSION['user'] n'existe pas : retourne false
 */

	public function logged_only()
	{

		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		if (!isset($_SESSION['user'])) {
			return false;
		}
		return true;
	}

	/*
 * Fonction : Page accessible que si l'utilisateur est déconnecté
 * Démarre la variable si cette dernière n'est pas lancé
 * Si la variable SESSION['user'] existe pas : retourne false
 */

	public function unlogged_only()
	{

		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		if (isset($_SESSION['user'])) {
			return false;
		}
		return true;
	}

	/*
 * Fonction : Obtient la liste tout les congressistes
 * Retourne la liste des congressistes
 */

	public function getListeCongressiste()
	{
		$req = $this->conn->prepare(
			"SELECT * FROM congressiste 
		INNER JOIN organisme_payeur ON organisme_payeur.NUM_ORGANISME = congressiste.NUM_ORGANISME
		INNER JOIN hotel ON hotel.NUM_HOTEL = congressiste.NUM_HOTEL ORDER BY NOM_CONGRESSISTE"
		);

		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	/*
 * Fonction : Obtient les informations d'un congressiste en fonction de son ID
 * @param $id
 * Retourne les information du congressiste
 */
	public function getCongressiste($id)
	{
		$req = $this->conn->prepare(
			"SELECT * FROM congressiste 
			INNER JOIN organisme_payeur ON organisme_payeur.NUM_ORGANISME = congressiste.NUM_ORGANISME
			INNER JOIN hotel ON hotel.NUM_HOTEL = congressiste.NUM_HOTEL
			WHERE NUM_CONGRESSISTE = ?"

		);

		$req->execute(array($id));

		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	/*
 * Fonction : Ajoute un congressiste
 * @param 
 * Retourne les information du congressiste
 */
public function AjouterCongressiste($NUM_ORGANISME, $NUM_HOTEL, $NOM_CONGRESSISTE, $PRENOM_CONGRESSISTE, $ADRESSE_CONGRESSISTE, $TEL_CONGRESSISTE, $CODE_ACCOMPAGNATEUR, $SEXE_CONGRESSISTE)
{
	$req = $this->conn->prepare(
		"INSERT INTO congressiste (NUM_CONGRESSISTE, NUM_ORGANISME, NUM_HOTEL, NOM_CONGRESSISTE, PRENOM_CONGRESSISTE, ADRESSE_CONGRESSISTE, TEL_CONGRESSISTE, DATE_INSCRIPTION, CODE_ACCOMPAGNATEUR, SEXE_CONGRESSISTE) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?);"

	);
	$req->execute(array($NUM_ORGANISME, $NUM_HOTEL, $NOM_CONGRESSISTE, $PRENOM_CONGRESSISTE, $ADRESSE_CONGRESSISTE, $TEL_CONGRESSISTE, date('Y-m-d'), $CODE_ACCOMPAGNATEUR, $SEXE_CONGRESSISTE));

}

		/*
 * Fonction : Obtient les informations tout les hotels 
 * @param $hotel
 * Retourne tout les hotels
 */
	public function getHotel($hotel = 0)
	{
		$req = $this->conn->prepare(
			"SELECT * FROM hotel WHERE NOM_HOTEL NOT IN (?)"
		);

		$req->execute(array($hotel));

		return $req->fetchAll(PDO::FETCH_OBJ);
	}

			/*
 * Fonction : Obtient les informations tout les Organismes payeurs 
 * @param $organisme
 * Retourne Organismes payeurs 
 */
	public function getOrganisme($organisme = 0)
	{
		$req = $this->conn->prepare(
			"SELECT * FROM organisme_payeur WHERE NOM_ORGANISME NOT IN (?)"
		);

		$req->execute(array($organisme));

		return $req->fetchAll(PDO::FETCH_OBJ);
	}




	/*
 * Fonction : supression d'un congressiste en fonction de son ID
 * @param $id
 * Retourne true si cela a fonctionné
 */
	public function deleteCongressiste($id)
	{

		$req = $this->conn->prepare(
			"DELETE FROM congressiste WHERE NUM_CONGRESSISTE=?"
		);

		$req->execute(array($id));
		return true;
	}

	/*
 * Fonction : Modification d'un congressiste en fonction de son ID
 * @param $nom_congressiste : nouveau nom du congressiste
 * @param $id
 * Retourne true si cela a fonctionné
 */
	public function modifierCongressiste($NUM_ORGANISME, $NUM_HOTEL, $NOM_CONGRESSISTE, $PRENOM_CONGRESSISTE, $ADRESSE_CONGRESSISTE, $TEL_CONGRESSISTE, $CODE_ACCOMPAGNATEUR, $SEXE_CONGRESSISTE, $NUM_CONGRESSISTE)
	{

		$req = $this->conn->prepare(
			"UPDATE congressiste SET NUM_ORGANISME = ?, NUM_HOTEL = ?, NOM_CONGRESSISTE = ?, PRENOM_CONGRESSISTE = ?, ADRESSE_CONGRESSISTE = ?, TEL_CONGRESSISTE = ?, CODE_ACCOMPAGNATEUR = ?, SEXE_CONGRESSISTE = ? WHERE NUM_CONGRESSISTE = ?"
		);

		$req->execute(array($NUM_ORGANISME, $NUM_HOTEL, $NOM_CONGRESSISTE, $PRENOM_CONGRESSISTE, $ADRESSE_CONGRESSISTE, $TEL_CONGRESSISTE, $CODE_ACCOMPAGNATEUR, $SEXE_CONGRESSISTE, $NUM_CONGRESSISTE));
		return true;
	}

	/*
 * Fonction : Teste de la connexion à l'utilisateur
 * @param $pseudo 
 * @param $password
 * Retourne true si cela a fonctionné et lance la variable SESSION
 */
	public function testConnexion($pseudo, $password)
	{

		$req = $this->conn->prepare("SELECT * FROM user WHERE pseudo = ?");

		$req->execute(array($pseudo));
		if ($req->rowCount() != 0) {

			$ligne = $req->fetch(PDO::FETCH_OBJ);

			if ($ligne->password == $password) {
				session_start();
				$_SESSION['user'] = $ligne;
				return true;
			}
		}

		return false;
	}


	/*
 * Fonction : Envois un email
 */
public function envoyerEmail($NOM_CONGRESSISTE, $PRENOM_CONGRESSISTE)
{
	ini_set( 'display_errors', 1);
	error_reporting( E_ALL );
	$from = "anabase@anthony-rodrigues.fr";
	$to ="anthonyoutub@gmail.com";
	$subject = "Congressiste ajouté";
	$message = "Le congressiste " . $NOM_CONGRESSISTE . " " . $PRENOM_CONGRESSISTE . " à bien été ajouté !";
	$headers = "De:" . $from;
	mail($to,$subject,$message, $headers);

}


}
