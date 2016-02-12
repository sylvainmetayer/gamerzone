<?php
$db = new Mypdo();
$ville = new VilleManager($db);
$nbVilles = $ville->countVilles();
$listeVille = $ville->listerVilles();
?>
<h1>Liste des villes</h1>

<p>
<?php
	echo "Actuellement ".$nbVilles." villes sont enregistrées."
?>
</p>

<table>
	<tr>
		<th>Numéro de la ville</th>
		<th>Nom de la ville</th>
	</tr>

<?php
	foreach($listeVille as $villes){
		?>
		<tr>
			<td> <?php echo $villes->getVilNum(); ?> </td>
			<td> <?php echo $villes->getVilNom(); ?> </td>
		</tr>

	<?php }
?>

</table>
