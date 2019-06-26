<style>

body {
	
background-color: rgba(232,233,234,1);
}

hdr
{
	
font-family: "", "", sans-serif;
width: 100%;
height 200px;
font-size: 18px;
float:left;
position: static;
z-index:1;
color: rgb(255,255,250);
background-color: rgba(83,194,219,0);
box-shadow: 2px 2px 5px rgba(0,0,0,0);
transition: .5s transform;
text-align:left;
padding-top:10px;
padding-bottom:10px;
}

k7
{
font-family: "", "", sans-serif;
height 200px;
font-size: 38px;
float:left;
padding-left:20px;
padding-right:20px;
position: static;
z-index:1;
color: rgb(255,255,250);
background-color: rgba(52,229,126,0);
transition: .5s transform;
text-align:left;
text-shadow: 2px 2px 5px rgba(0,0,0,0.1);
}

k8
{
font-family: "", "", sans-serif;
height 200px;
font-size: 38px;
float:left;
padding-left:20px;
padding-right:20px;
position: static;
z-index:1;
color: rgba(52,229,126,1);
background-color: rgba(52,229,126,0);
transition: .5s transform;
text-align:left;
text-shadow: 2px 0px 1px rgba(20,122,32,0.0);
}


k7:hover 
{
transform: scale(1.1, 1.1);
transition: .3s transform;
color: rgba(52,229,126,1);

z-index:1;
}


kr
{
font-family: "", "", sans-serif;
width: 1000;
height 200px;
font-size: 22px;
float:left;
padding-left:40px;
position: static;
z-index:1;
color: rgba(52,229,126,1);
background-color: rgba(255,255,255,1);
box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
transition: .5s transform;
text-align:left;
}
kr8
{
font-family: "", "", sans-serif;
width: 70%;
height 200px;
font-size: 12px;
float:left;
position: static;
z-index:1;
color: rgba(52,229,126,1);
background-color: rgba(255,255,255,1);
transition: .5s transform;
text-align:left;
}

dev
{
font-family: "", "", sans-serif;
width: 600px;
height 200px;
font-size: 18px;
float:left;
padding-left:20px;
position: static;
z-index:1;
color: rgb(255,255,250);
background-color: rgba(0,0,0,0);
transition: .5s transform;
text-align:left;
}

dev>k1
{
font-family: "", "", sans-serif;
width: 600px;
height 200px;
font-size: 18px;
float:left;
padding-left:20px;
position: static;
z-index:1;
color: rgba(52,229,126,1);
background-color: rgba(52,229,126,1);
box-shadow: 5px 5px 0px rgba(0,0,126,0);
text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
transition: .5s transform;
text-align:left;
}

dev>k2
{
font-family: "", "", sans-serif;
padding-top:10px;
padding-bottom:10px;
width: 600px;
height 200px;
font-size: 30px;
float:left;
padding-left:20px;
position: static;
z-index:1;
color: rgb(255,255,250);
background-color: rgba(52,229,126,1);
box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
transition: .5s transform;
text-align:left;
}

.button {
  background-color: rgba(52,229,126,1);
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.button:hover 
{
transform: scale(1.1, 1.1);
transition: .3s transform;
z-index:1;
}

</style>


<?php
$op = null; 
if(isset($_GET['op'])) {
    $op = $_GET["op"];
} else {
    $op = 0; 
}

if ($op==1)
{
	$nome = $_GET["nome"];
	$local = $_GET["local"];
	$data = $_GET["data"];
	$hora = $_GET["hora"];
	
	$conn= mysqli_connect("localhost","root", "", "xthmap");
	
$sql = "INSERT INTO sugestao (nome, sala, data, hora) VALUES ('".$nome."','".$local."','".$data."','".$hora."')";
if (mysqli_query($conn, $sql)){} 
mysqli_close ($conn);
}

?>

<script type="text/javascript">
function ff(){
var elemento = document.getElementById("local");
var local = elemento.options[elemento.selectedIndex].text;

var elemento = document.getElementById("hora");
var elemento2 = document.getElementById("minuto");
var horario = elemento.options[elemento.selectedIndex].text+":"+elemento2.options[elemento2.selectedIndex].text;

var elemento = document.getElementById("dia");
var elemento2 = document.getElementById("mes");
var elemento3 = document.getElementById("ano");
var data = elemento.options[elemento.selectedIndex].text+"/"+elemento2.options[elemento2.selectedIndex].text+"/"+elemento3.options[elemento3.selectedIndex].text;

var nome = document.getElementById("titulo").value;

window.open("cadsevento.php?op=1&nome="+nome+"&local="+local+"&data="+data+"&hora="+horario,"_self");
}

</script>




<head>
</head>
<body>

<hdr> <k8><b>unigo</b> </k8>
<a href="mapa.php"><k7>rotas </k7></a> 
<a href="eventos.php"><k7>eventos </k7></a>
</hdr>
<br><br><br><br><br>


<?php
echo "<dev><k2> CADASTRAR <b> EVENTO</b></k2></dev>";

?>
<br><br>
<kr>
<br>Titulo
<form>
  <input type="text" id ="titulo" name="titulo" style="width:200px">
  <br>
</form><form>

<div class="custom-select" style="width:200px;">
Local:<br>
<select id = "local">
 <?php 
$conn= mysqli_connect("localhost","root", "", "xthmap");
$result = mysqli_query($conn, "SELECT nome FROM locais");
$a=0;
while ($row = $result->fetch_assoc()){
	$a=$a+1;
	?>
	 <option value="<?php echo $a?>"><?php echo $row ["nome"];?></option> <?php
}
?> 
  </select>
  <br><br>Horario:<br>
<select id = "hora">
 <?php 
for ($a = 0; $a<23; $a++){
	?>
	 <option value="<?php echo $a?>"><?php if ($a<10) {echo "0";} echo $a;?></option> <?php
}
?> 
  </select>
  
  <select id = "minuto">
 <?php 
for ($e = 0; $e<60; $e+=1){
	?>
	 <option value="<?php echo $e?>"><?php if ($e<10) {echo "0";} echo $e;?></option> <?php
}
?> 
  </select>
    <br><br>Data:<br> 
<select id = "dia">
 <?php 
for ($a = 1; $a<=31; $a++){
	?>
	 <option value="<?php echo $a?>"><?php if ($a<10) {echo "0";} echo $a;?></option> <?php
}
?> 
  </select>
  <select id = "mes">
 <?php 
for ($a = 1; $a<=12; $a++){
	?>
	 <option value="<?php echo $a?>"><?php if ($a<10) {echo "0";} echo $a;?></option> <?php
}
?> 
  </select>
  <select id = "ano">
 <?php 
for ($e = 2019; $e<=2029; $e+=1){
	?>
	 <option value="<?php echo $e?>"><?php echo $e;?></option> <?php
}
?> 
  </select>
  
  </form><br>
</div>
<button class="button" id = "bosta" onclick="ff()">Cadastrar</button><?php if ($op==1) {echo "<br><br><kr8> Evento <b>\"".$_GET["nome"]." \" </b> enviado para moderação </kr8>";}?> <br><br>
 
</kr>


</body>