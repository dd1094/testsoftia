

<form  method="POST">
<select name = "etudiant">
<?php foreach( $nomEtudiant as $unnomEtudiant ){ ?>
          <option name="etudiant" value= <?php echo $unnomEtudiant['id_etud']?>><?php echo $unnomEtudiant['nom_etud'] ," ", $unnomEtudiant['prenon_etud'] ;?></option>
          <?php }?>
          
</select>
<button  type="submit" name="valider" class="btn btn-outline-dark">Valider</button>
</form>


<?php if(isset($_POST['valider'])) {?>
    <?php include('../controleur/ctrl-2.php'); ?> 
    <form action="ctrl-3.php" method="POST">
    
<select name = "etudiant">
<?php foreach( $convention as $uneconvention ){ ?>
          <option name="conv" value= <?php echo $uneconvention['id_conv']?>><?php echo $uneconvention['nom_conv'] ;?></option><br>
          <?php }?>
          
</select><br><br><br>
<?php foreach( $etudiant as $unEtudiant ){ ?>
    <input type="hidden" name="etudiant"  value=<?php echo $unEtudiant['id_etud'];}?>>

    <?php foreach( $convention as $uneconvention ){ ?>
    <input id="convention" name="convention" type="hidden" value=<?php echo $uneconvention['id_conv'];}?>>

<?php 



foreach ($etudiant as $unEtudiant){?>
<textarea rows="15" cols="100" class="form-control" name="texte"><?php echo "Bonjour ".$unEtudiant['nom_etud']." ".$unEtudiant['prenon_etud'].",\n\n\n\n";}
echo "Vous avez suivi ";
foreach ($nbHeur as $uneHeure){echo $uneHeure['nbHeur_conv']; }
echo "h de formation chez FormationPlus. \n\nPouvez-vous nous retourner ce mail avec la pièce jointe signée.\n\n\n\n
Cordialement,
\nFormationPlus";?></textarea> <button  type="submit" name="inserer" class="btn btn-outline-dark">Valider</button>
<?php } ?>
</form>

