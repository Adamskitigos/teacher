<?php
$Nbr=NULL;
if(isset($_POST['operation']) && (is_numeric($_POST['n']) && $_POST['n']>=1))
{
  $Nbr = $_POST["n"];
} 
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>"  method="post" >
Entrer un nombre >=1
<input type="text" name="n" value="<?php echo $Nbr; ?>" size=8 />
<input type="submit" name="operation" value="Afficher" >
</form>
<?php
  function decrement($n) 
  {
    if($n > 0)
    {
      echo "$n<br>";
      decrement($n - 1);
    }
  }
  decrement($Nbr);
?>