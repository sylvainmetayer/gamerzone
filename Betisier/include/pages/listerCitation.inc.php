<?php
$db = new Mypdo();
$citation = new CitationManager($db);
$nbCitations = $citation->countCitations();
$listeCitations = $citation->listerCitations();
?>
<h1>Liste des villes</h1>

<p>
<?php
	echo "Actuellement ".$nbCitations." villes sont enregistrées."
?>
</p>

<table>
	<tr>
		<th>Nom de l'enseignant</th>
		<th>Libellé</th>
		<th>Date</th>
		<th>Moyenne des notes</th>
	</tr>

<?php
	foreach($listeCitations as $citations){
		?>
		<tr>
			<!--<td> <?php echo $citations->get(); ?> </td>-->
			<td> <?php echo $citations->getCit_libelle(); ?> </td>
			<td> <?php echo $citations->getCit_date(); ?> </td>
			<!--<td> <?php echo $citations->getCit_libelle(); ?> </td>-->
		</tr>

	<?php }
?>

</table>
