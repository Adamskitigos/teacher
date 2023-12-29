<?php
$Nbr=NULL;
if(isset($_POST['operation']) && (is_numeric($_POST['n']) && $_POST['n']>=1 && $_POST['n']<=100))
{
  $Nbr = $_POST["n"];
} 
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>"  method="post" >
Entrer un nombre entre [1 et 100]
<input type="text" name="n" value="<?php echo $Nbr; ?>" size=8 />
<input type="submit" name="operation" value="Jouer" >
</form>
<?php
$tirage = mt_rand(1,100) ;
if ($tirage ==$Nbr) {
echo '<h1>Bravo vous avez gagné :-)</h1>';
} elseif($Nbr!=NULL) {
echo "Vous avez perdu 😦> le nombre est: $tirage";
}
?>