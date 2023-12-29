<!DOCTYPE html>
<html>
<head>
<title>Exercice1</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php $x=$y=$r=NULL; if (isset($_POST['operation']))
{ 
    $x = $_POST["x"]; 
    $y = $_POST["y"]; 
    switch ($_POST["operation"]) 
        { 
            case "+": $r=$x+$y; 
                break; 
            case "-": $r=$x-$y; 
                break; 
            case "*": $r=$x*$y; 
                break; 
            case "/": $y?$r=$x/$y:$r="inf"; 
                break; 
            case "Reset": $x=$y=$r=NULL; 
                break; 
                } 
} ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
<table bgcolor='silver' border="1" align=center>
    <tr>
        <td>  X : </td>
        <td>
            <input type = number name = x size = 2 value= <?php echo $x ?> >
        </td>
    </tr>
    <tr>
        <td> Y : </td>
        <td>
            <input type = number name = y size = 2 value=<?php echo $y ?>  >
        </td>
    </tr>
    <tr>
        <td> R : </td>
        <td>
            <input type = text size = 2 disabled = true value=<?php echo $r ?>  >
        </td>
    </tr>
    <tr>
        <td align = center>
            <input type = 'submit' name='operation' value='+'>
        </td>
        <td align = center>
            <input type = 'submit' name='operation' value= '-'>
        </td>
    </tr>
    <tr>
        <td align = center>
            <input type ='submit' name='operation' value='*'>
        </td>
        <td align = center>
            <input type = 'submit' name='operation' value= '/'>
        </td>
    </tr>
    <tr>
        <td align = center colspan="2">
            <input type ='submit' name='operation' value='Reset'>
        </td>
    </tr>
</table>
</form>
</body>
</html>