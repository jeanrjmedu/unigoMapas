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
height 400px;
font-size: 14px;
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

kmod
{
	 display: inline-block;
font-family: "", "", sans-serif;
padding-left:40px;
width: 350;
height 700px;
font-size: 14px;
float:left;
padding-left:40px;
padding-bottom:40px;
padding-top:40px;
position: static;
z-index:1;
color: rgba(52,229,126,1);
background-color: rgba(255,255,255,1);
transition: .5s transform;
text-align:left;
}


hs
{
font-family: "", "", sans-serif;
font-size: 14px;
float:left;
position: static;
z-index:1;
color: rgba(52,229,126,1);
background-color: rgba(255,255,255,0);
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


</style>

<script type="text/javascript">
function botaum(){

window.open("cadsevento.php","_self");
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
echo "<dev><k2><b>EVENTOS</b></k2></dev>";


$conn= mysqli_connect("localhost","root", "", "xthmap");

$result = mysqli_query($conn, "SELECT nome, sala, data, hora FROM eventos WHERE passou='false'");
echo "<kr><br>";
while ($row = $result->fetch_assoc())
{
 echo "<kmod> Titulo: <br><b>".$row ["nome"]."</b><br> Data: <br><b> ".$row ["data"]."</b> <br> Hora: <br><b>".$row ["hora"]."</b><br> Local:<br> <a href=\"mapa.php?op=1&org=".$row ["sala"]."\"><hs><b>".$row ["sala"]."</b> [ver local]</hs></a></b> <br><br></kmod> ";
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<button class="button" id = "bosta" onclick="botaum()">Cadastrar novo</button>
<br><br>
 </kr>;




</body>
