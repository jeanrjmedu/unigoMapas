<style>

body {
	
background-color: rgb(251,252,249);
}



div
{
width: 700px;
height 700px;
padding-top:10px;
float:left;
padding-left:20px;
position: static;


}
dev
{
width: 100;
height 689px;
padding-top:10px;
float:left;
padding-left:20px;
padding-down:20px;
position: static;
}

dev>k1
{
font-family: "", "", sans-serif;
width: 200px;
height 200px;
font-size: 18px;
float:left;
position: static;
z-index:1;
color: rgb(255,255,250);
background-color: rgba(52,229,126,6);
transition: .5s transform;
text-align:left;
}

dev>k2
{
font-family: "", "", sans-serif;
width: 300px;
height 300px;
font-size: 30px;
box-shadow: 5px 5px 0px rgba(52,229,126,6);
background-color: rgba(44,193,106, 1);
float:left;
position: static;
z-index:1;
color: rgb(255,255,250);
transition: .9s transform;
text-align:left;
}

dev:hover > k2
{
	 
transition: .7s transform;
z-index:3;
}

k3
{box-shadow: 5px 5px 0px rgba(52,229,126,6);
font-family: "", "", sans-serif;
width: 60%;
height 20%;
font-size: 30px;
background-color: rgba(83,194,219,1);
position: fixed;
z-index:0;
color: rgb(255,255,250);
text-align:left;
}

k4
{
font-family: "", "", sans-serif;
width: 50%;
height 20%;
font-size: 30px;
box-shadow: 5px 5px 0px rgba(52,229,126,6);
background-color: rgba(44,193,106, 1);
position: fixed;
z-index:0;

text-align:left;
}

h2
{
font-family: "", "", sans-serif;
font-size: 10px;
position: relative;
z-index:0;
color: rgb(255,255,250);
text-align:center;
}

dev>kf2{
font-family: "", "", sans-serif;
width: 50px;
height 300px;
font-size: 20px;
float:left;
position: static;
z-index:1;
color: rgba(52,229,126,6);
transition: .5s transform;
padding-bottom:10px;
text-align:center;
}

dev>kf
{
font-family: "", "", sans-serif;
width: 50px;
height 300px;
font-size: 20px;
float:left;
position: static;
z-index:1;
color: rgb(255,255,255);
transition: .5s transform;
padding-bottom:10px;
text-align:center;
}

dev:hover > kf
{
transform: scale(1.1, 1.1);
transition: .3s transform;
color: rgb(235,235,235);
z-index:3;
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
if (mysqli_query($conn, $sql)){echo "Sucesso";}else {echo "Ruim";} 
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

<k3> 
<dev><kf2>unigo </kf2></dev>
<a href="mapa.php"><dev><kf>rotas </kf></dev></a>
<a href="eventos.php"><dev><kf>eventos </kf></dev></a>
</k3>
<br><br><br>



<?php
echo "<dev><k2><b>EVENTOS</b></k2><dev>";

?>
Titulo
<form>
  <input type="text" id ="titulo" name="titulo"><br>
</form><form>


<div class="custom-select" style="width:200px;">
Local:
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
  <br><br>Horario:
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
    <br><br>Data:
<select id = "dia">
 <?php 
for ($a = 1; $a<=31; $a++){
	?>
	 <option value="<?php echo $a?>"><?php echo $a;?></option> <?php
}
?> 
  </select>
  <select id = "mes">
 <?php 
for ($a = 1; $a<=12; $a++){
	?>
	 <option value="<?php echo $a?>"><?php echo $a;?></option> <?php
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
  
</div>

</form><button class="button" id = "bosta" onclick="ff()">Aplicar</button>



</body>