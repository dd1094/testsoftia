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

      if(isset($_POST['inserer']))
      {
        $texte = $_POST['texte'];
        $etudiant = $_POST['etudiant'];
        $convention = $_POST['convention'];


        $sql = "INSERT INTO `attestation` (`mess_attes`, `id_etud`, `id_conv`) VALUES ('$texte',$etudiant,$convention);";
        $st = $bd -> prepare( $sql ) ;
        $st -> execute() ;
        $etudiant= $st -> fetchall() ;
      }?> <h1><?php echo "Attestation envoyé !";?></h1>
      <a href="ctrl-1.php">
      <button>Retour</button>
      </a>