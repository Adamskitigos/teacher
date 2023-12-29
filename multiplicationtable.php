<!DOCTYPE html>
<html>
<head>
<title>Exercice 2</title>
</head>
<body>
<?php
$NbrLigne=$NbrCol=NULL;
if (isset($_POST['operation']) && is_numeric($_POST["n"]) && is_numeric($_POST["m"])){
$NbrLigne   = $_POST["n"];
$NbrCol     = $_POST["m"];
}
?>
<table border="1" width="700" align="center">
<thead>
<tr>
<td colspan="<?php echo $NbrCol; ?>"><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
Nombre de lignes :
<input type="number" name="n" value="<?php echo $NbrLigne; ?>" size=8 />
Nombre de colonnes :
<input type="number" name="m" value="<?php echo $NbrCol; ?>" size=8/>
<input type="submit" name="operation" value="Générer la table de multiplication" >
</form>
</td>
</tr>
<tr>
<?php
for ($j=1; $j<=$NbrCol; $j++) // index de colonne
echo "<th>$j</th>"; ?>
</tr>
</thead>
 
<tbody>
<?php
// lignes suivantes
for ($i=2; $i<=$NbrLigne; $i++) // index de ligne
{
?>
<tr>
<?php
echo "<th>$i</th>";// 1ere colonne (colonne 1)
for ($j=2; $j<=$NbrCol; $j++) // indexe des autres colonnes
{
// -------------------------
// DONNEES A AFFICHER dans la cellule
echo "<td align=center>".$i*$j."</td>";
// ici : table de multiplication
// -------------------------
}
?>
</tr>
<?php
}
?>
</tbody>
</table>
</body>
</html>