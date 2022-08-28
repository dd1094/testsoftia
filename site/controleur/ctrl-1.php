<?php 

session_start() ;
  /* Configuration des options de connexion */
    
    /* Désactive l'éumlateur de requêtes préparées (hautement recommandé)  */
    $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
    
    /* Active le mode exception */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    
    /* Indique le charset */
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";

	try {

		$bd = new PDO(
						'mysql:host=localhost;dbname=testsoftia' ,
						'desanges' ,
						'azerty',
            $pdo_options,
			) ;

    }
      catch (PDOException $e)
      {
        exit('problème de connexion à la base');
      }


$sql = "SELECT * from etudiant";
$st = $bd -> prepare( $sql ) ;
$st -> execute() ;
$nomEtudiant= $st -> fetchall() ;

require('../vue/vue-formulaire.php');

?>