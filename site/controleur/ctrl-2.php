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

      
        $numEtudiant = $_POST['etudiant'];
      

      $texte = $_POST['texte'];

      $sql = "SELECT c.id_conv, nom_conv from convention as c inner join etudiant as e on c.id_conv = e.id_conv where id_etud = '$numEtudiant';";
      $st = $bd -> prepare( $sql ) ;
      $st -> execute() ;
      $convention= $st -> fetchall() ;
      

      $sql = "SELECT id_etud, nom_etud, prenon_etud from etudiant where id_etud = '$numEtudiant';";
      $st = $bd -> prepare( $sql ) ;
      $st -> execute() ;
      $etudiant= $st -> fetchall() ;

      $sql = "SELECT nbHeur_conv FROM convention as c inner join etudiant as e on c.id_conv = e.id_conv WHERE id_etud = '$numEtudiant';";
      $st = $bd -> prepare( $sql ) ;
      $st -> execute() ;
      $nbHeur= $st -> fetchall() ;

      
      ?>
      
      
      

        