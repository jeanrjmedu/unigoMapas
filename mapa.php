
<script type="text/javascript">////////////////////////////////////////////////////////////////////POSPROCESSAMENTO <JAVASCRIPT>
var op = 0;
var xm = 0;
	var ym = 0;
function loadImage(){
	
	if (op==2) ///////////////NUMERO DAS OPERAÇÕES SÃO OS MESMOS REALIZADAS EM PHP
	{
		var c; 
	for (c = 1; c < arestas.length-1; c++) { 
		
		var myrect = document.getElementById('map');
		var newLine =document.createElementNS('http://www.w3.org/2000/svg','circle');
		newLine.setAttribute('id','line2'+c);
		newLine.setAttribute('cx', arestas[c][0]);
		newLine.setAttribute('cy',arestas[c][1]);
		newLine.setAttribute('r', 7);
		newLine.setAttribute('style','stroke:rgba(52,229,126,6);stroke-width:25;fill:rgb(52,229,126)');
		myrect.append(newLine);
		
		
	}
	
	var i; 
	for (i = 0; i < arestas.length-1; i++) { 
		
		var myrect = document.getElementById('map');
		var newLine =document.createElementNS('http://www.w3.org/2000/svg','line');
		newLine.setAttribute('id','line2'+i);
		newLine.setAttribute('x1', arestas[i][0]);
		newLine.setAttribute('y1',arestas[i][1]);
		newLine.setAttribute('x2',arestas[i+1][0]);
		newLine.setAttribute('y2',arestas[i+1][1]);
		newLine.setAttribute('style','stroke:rgba(52,229,126,1);stroke-width:40');
		myrect.append(newLine);
	}
	
	
		
	var myrect = document.getElementById('map');
		var newLine =document.createElementNS('http://www.w3.org/2000/svg','circle');
		newLine.setAttribute('id','line2');
		newLine.setAttribute('cx', arestas[arestas.length-1][0]);
		newLine.setAttribute('cy',arestas[arestas.length-1][1]);
		newLine.setAttribute('r', 15);
		newLine.setAttribute('style','stroke:rgba(52,229,126,1);stroke-width:25;fill:rgba(52,229,126,1)');
		myrect.append(newLine);
		
		
			
	var myrect = document.getElementById('map');
		var newLine =document.createElementNS('http://www.w3.org/2000/svg','circle');
		newLine.setAttribute('id','line2');
		newLine.setAttribute('cx', arestas[0][0]);
		newLine.setAttribute('cy',arestas[0][1]);
		newLine.setAttribute('r', 15);
		newLine.setAttribute('style','stroke:rgba(44,193,106, 1);stroke-width:25;fill:rgba(44,193,106, 1)');
		myrect.append(newLine);
		
		
		
	}else if (op==1)
	{
		var myrect = document.getElementById('map');
		var newLine =document.createElementNS('http://www.w3.org/2000/svg','circle');
		newLine.setAttribute('id','line2');
		newLine.setAttribute('cx', xm);
		newLine.setAttribute('cy',ym);
		newLine.setAttribute('r', 15);
		newLine.setAttribute('style','stroke:rgba(44,193,106, 1);stroke-width:25;fill:rgba(44,193,106, 1)');
		myrect.append(newLine);
		
	}
	
	var f; 
	for (f = 0; f < locaisxy.length; f++) { 
		
		var myrect = document.getElementById('map');
		var newLine =document.createElementNS('http://www.w3.org/2000/svg','circle');
		newLine.setAttribute('id','line2'+f);
		newLine.setAttribute('cx', locaisxy[f][0]);
		newLine.setAttribute('cy',locaisxy[f][1]);
		newLine.setAttribute('r', 3);
		newLine.setAttribute('style','stroke:rgba(83,194,219,1);stroke-width:2;fill:rgb(83,194,219,1)');
		myrect.append(newLine);
		


var myrect = document.getElementById('map');
		var newLine =document.createElementNS('http://www.w3.org/2000/svg','line');
		newLine.setAttribute('id','line2'+i);
		newLine.setAttribute('x1', locaisxy[f][0]);
		newLine.setAttribute('y1',locaisxy[f][1]);
		newLine.setAttribute('x2',locaisxy[f][0]-30);
		newLine.setAttribute('y2',locaisxy[f][1]+40);
		newLine.setAttribute('style','stroke:rgba(83,194,219,1);stroke-width:1');
		myrect.append(newLine);


		var newText = document.createElementNS('http://www.w3.org/2000/svg',"text");
newText.setAttributeNS(null,"x",locaisxy[f][0]-45);     
newText.setAttributeNS(null,"y",locaisxy[f][1]+49); 
newText.setAttributeNS(null,"font-size","12");
newText.setAttributeNS(null,"style","fill:rgba(1,1,1,1)");
var textNode = document.createTextNode(locaisnomes[f]);
newText.appendChild(textNode);
myrect.append(newText);

	}
	
	}
 


function referencia(){
var orig = document.getElementById("origem");
var valor1 = orig.options[orig.selectedIndex].text;
var dest = document.getElementById("destino");
var valor2 = dest.options[dest.selectedIndex].text;


window.open("mapa.php?op=2&org="+valor1+"&dst="+valor2,"_self")
}
</script>


<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////PREPROCESSAMENTO <PHP>

class vertice {

    var $nome;
    var $x;
	var $y;
	var $corredores;
	
    function vertice($nome, $x, $y, $corredor1, $corredor2)
    {
        $this->nome = $nome;
        $this->x = $x;
		$this->y = $y;
		$this->corredores = array($corredor1, $corredor2);
    }
}

function chegou ($v, $coredorDestino) 
{

	
	for ($a=0; $a<2; $a++)
	{
		
	if ($v->corredores[$a]==$coredorDestino)
	{
		
		return true;
		
	}
	}
	return false;
}

function Heuristica ($destinox, $destinoy, $v) 
{
	$disX = $destinox-$v->x;
		$disY = $destinoy-$v->y;
		if ($disX < 0)
		{
			$disX = $disX*-1;
		}
		if ($disY < 0)
		{
			$disY = $disY*-1;
		}
		return $disY+$disX;
}

function VerticeToIndex ($v, $arr)
{ //	converte o index vertices[] para o index correspondente da estrutura de controle []
	for ($j = 0; $j< count($arr); $j++)
	{
		if ($arr[$j] == $v)
		{
			return $j;
		}
	}
	return null;
}

function ja_adicionado ($v, $arr)
{
	for ($j = 0; $j< count($arr); $j++)
	{
		//echo "<br>".$arr[$j]."=".$v;
		if ($arr[$j] == $v)
		{
			return true;
		}
	}
	return false;
}

/////////////////////////////////OPERAÇÔES
// $op define o que a pagina deve fazer: 
//0 =  default. 
//1 = marcar ponto. 
//2 = mostrar rota

$op = null; 
if(isset($_GET['op'])) {
    $op = $_GET["op"];
} else {
    $op = 0; 
}

if(isset($_GET['org'])) {
     if ($_GET["org"] == "Selecione" or $_GET["dst"] == "Selecione"){
$op = 0; 
	 } 
}

if ($op==2) ////OP2 mostrar rota
{

$vertices = array (new vertice ("B1L1-ENT", 182, 1142, "B1L1", "ENT"), 
new vertice ("B1L1-B1B4L1", 1707, 1142, "B1L1", "B1B4L1"), 
new vertice ("B1B4L1-B4L1", 1707, 697, "B4L1", "B1B4L1"), 
new vertice ("B4L1-B4L2", 1794, 697, "B4L1", "B4L2"), 
new vertice ("B4L1-B4B5L1", 1584,697, "B4L1", "B4B5L1"), 
new vertice ("B4B5L1-B4B5L1B", 1584,476, "B4B5L1B", "B4B5L1"), 
new vertice ("B4B5L1-B5L1", 1584,28, "B5L1", "B4B5L1"), 
new vertice ("B5L1-B5B3L1", 1387,28, "B5L1", "B5B3L1"), 
new vertice ("B5L1-B5BBTL1", 3920,28, "B5L1", "B5BBTL1"));

$grafo = array (
array (-1,1525,-1,-1,-1,-1,-1,-1,-1),
array (1525,-1,445,-1,-1,-1,-1,-1,-1),
array (-1,445,-1,85,123,-1,-1,-1,-1),
array (-1,-1,85,-1,-1,-1,-1,-1,-1),
array (-1,-1,123,-1,-1,221,-1,-1,-1),
array (-1,-1,-1,-1,221,-1,448,-1,-1),
array (-1,-1,-1,-1,-1,448,-1,197,2336),
array (-1,-1,-1,-1,-1,-1,197,-1,-1),
array (-1,-1,-1,-1,-1,-1,2336,-1,-1)
);
////////////////////////////////////////////////
$origem = $_GET["org"];
$destino = $_GET["dst"];

$conn= mysqli_connect("localhost","root", "", "xthmap");

///SET ORIGEM
$result = mysqli_query($conn, "SELECT vertic, cordX, cordY, bloco FROM locais WHERE nome = '$origem'");
$row = mysqli_fetch_row ($result); 
$origemVertice = intval($row[0]);
$origemx = $row [1];
$origemy = $row [2];
$origemcorredor = $row [3];

///SET DESTINO
$result = mysqli_query($conn, "SELECT bloco, cordX, cordY FROM locais WHERE nome = '$destino'");
$row = mysqli_fetch_row ($result); 
$destinox = $row [1];
$destinoy = $row [2];
$destinocorredor = $row [0];
mysqli_close ($conn);

//echo $origemx." dfd ".$destinox;

$vert = array ($origemVertice);
$aberto = array (true);
$anterior = array (null);
$anteriorIndex = array (756);
$distancia = array (0);
$distanciaG = array (999999);
			

$atual = $origemVertice;
$atualIndex =0;
$tam = count ($grafo);
$encontrou = false;


while (!$encontrou)
{ 
	for ($i=0; $i< $tam; $i++)
	{
		if ($origemcorredor==$destinocorredor) //detectando que elementos ficam no mesmo corredor. como o vertice de saida é sempre declarado em controle, na hora de criar estrutura de desenho precisa ser ignorado. se checara então se controle só tem um elemento
		{
			$encontrou = true;
			break;

		}
		
		if ($grafo[$atual][$i] != -1)
		{
			
			
		if (!ja_adicionado($i, $vert))
		{
			array_push($vert, $i);
			array_push($aberto, true);
			array_push($anterior, $atual);
			array_push($anteriorIndex, $atualIndex);
			
			array_push($distancia, $grafo[$atual][$i]+$distancia[$atualIndex]);
			
			array_push($distanciaG, $distancia[VerticeToIndex($i, $vert)]+Heuristica ($destinox, $destinoy, $vertices[$i]));
		
		} else if (ja_adicionado($i, $vert) && $aberto[VerticeToIndex($i, $vert)]) //se ja existe e esta aberto
		{
			$novoDistancia = $grafo[$atual][$i]+$distancia[$atualIndex];
			$novoDistanciaG = $novoDistancia + Heuristica ($destinox, $destinoy, $vertices[$i]);
			$indexCtrl = VerticeToIndex($i, $vert);
			
			if ($novoDistanciaG < $distanciaG[$indexCtrl])
			{
				$distancia [$indexCtrl] = $novoDistancia;
				$distanciaG [$indexCtrl] = $novoDistanciaG;
				$anterior [$indexCtrl] = $atual;
				$anteriorIndex [$indexCtrl] = $atualIndex;
			}
		}
	
	if (chegou($vertices[$i], $destinocorredor))
		{
			$encontrou = true;
			break;
			
		} 
		}
		
	}
	
	if (!$encontrou)
	{

	$aberto [$atualIndex] = false;
	$menorG = PHP_INT_MAX;
	$menorIndex = 0;
	for ($k=0; $k<count($vert); $k++)
	{
		if ($distanciaG[$k]<$menorG and $aberto[$k]==true)
		{
			$menorG= $distanciaG[$k];
			$menorIndex= $k;
		}	
	}
	$atual = $vert[$menorIndex];
	$atualIndex = $menorIndex;
	}
}



$caminhada = array ($vert[count($vert)-1]);
$atualr = $anteriorIndex[count($vert)-1];
while ($atualr !=756)
{
	array_push($caminhada, $vert[$atualr]);
	$atualr = $anteriorIndex[$atualr];
}


?>
<script type="text/javascript">
op = <?php echo 2?>;
<?php

echo " var arestas = [";
echo "[".$destinox.",".$destinoy."]"; //marca xy do destino para desenho
if (count($caminhada)>1){//se só houver 1 elemento significa que destino e alvo são no mesmo corredor, entao nao se desenha xy estrutura controle

$g=0;
while (true)
{
	//condição de parada 2. se corredor de destino e origem são conectados pelo mesmo vertice, vai ocorrer um erro no desenho, pois a estrutura de controle só vai detectar que chegou após ja ter adicionado vizinhos. ou seja vai desenhar uma conexão a mais.  
	if (count($caminhada)==2) 
	{	if ($vertices[$caminhada[$g]]->corredores[0]==$vertices[$caminhada[$g+1]]->corredores[0] or $vertices[$caminhada[$g]]->corredores[0]==$vertices[$caminhada[$g+1]]->corredores[1] or $vertices[$caminhada[$g]]->corredores[1]==$vertices[$caminhada[$g+1]]->corredores[0] or $vertices[$caminhada[$g]]->corredores[1]==$vertices[$caminhada[$g+1]]->corredores[1]) 
		{	
			echo ",[".$vertices[$caminhada[$g+1]]->x.",".$vertices[$caminhada[$g+1]]->y."]";
			break;
		} 
	} 
	
	echo ",[".$vertices[$caminhada[$g]]->x.",".$vertices[$caminhada[$g]]->y."]";
	
	//condição de parada principal. alem de garantir que não aconteça:  dependendo de onde a caminhada começou, pode ter sido passado mais de uma vez pelo corredor de origem, o que causaria um problema no desenho.	
	//só desenha a primeira occorencia do corredor de destino no caminho de volta 
	if ($vertices[$caminhada[$g]]->corredores[0]==$origemcorredor or $vertices[$caminhada[$g]]->corredores[1]==$origemcorredor) 
	{	
			break;
	} 
	$g+=1;
}
}
echo ",[".$origemx.",".$origemy."]"; //marca xy da origem para desenho
echo "]; ";
?></script><?php
}


if ($op==1){
	$f = $_GET["org"];
	$conn= mysqli_connect("localhost","root", "", "xthmap");
	$result = mysqli_query($conn, "SELECT cordX, cordY FROM locais WHERE nome = '$f'");
	$row = mysqli_fetch_row ($result); 
	$xm = $row [0];
	$ym= $row [1];
?>
 <script type="text/javascript">
	op = <?php echo 1?>;
	xm = <?php echo $xm;?>;
	ym = <?php echo $ym;?>;
	</script><?php
} //
?>

<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////DEMARCAÇÕES NO MAPA <PHP>
$conn= mysqli_connect("localhost","root", "", "xthmap");
$result = mysqli_query($conn, "SELECT nome, cordX, cordY FROM locais");
?>
<script type="text/javascript"> 
<?php
$d=0;
echo " var locaisxy = [";

	while ($row = $result->fetch_assoc())
	{
		if ($d>0) {echo",";}
	echo "[".$row ["cordX"].",".$row ["cordY"]."]";
	$d+=1;
	}
echo "]; ";
?></script>
<script type="text/javascript">  
<?php
$l=0;
echo " var locaisnomes = [";
$result = mysqli_query($conn, "SELECT nome, cordX, cordY FROM locais");
while ($row = $result->fetch_assoc()){
	if ($l>0) 
	{echo",";}
	 echo "\"". $row ["nome"]."\""; 
	$l+=1;
	}
echo "]; ";


?></script><?php

mysqli_close ($conn);

?>


<style>

body {
	
background-color: rgba(232,233,234,1);
}

hdr
{
	
font-family: "", "", sans-serif;
width: 100%;
height 100px;
font-size: 18px;
float:left;
position: fixed;
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

mapamapa
{
font-family: "", "", sans-serif;
width: 100%;
height 200px;
font-size: 22px;
float:left;
padding-left:40px;
padding-top:40px;
padding-bottom:40px;
position: static;
z-index:1;
color: rgba(52,229,126,1);
background-color: rgba(255,255,255,0);
box-shadow: 2px 2px 5px rgba(0,0,0,0.0);
transition: .5s transform;
text-align:left;
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
z-index:2;
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



<head>
</head>



<body onload="loadImage()">


<hdr> <k8><b>unigo</b> </k8>
<a href="mapa.php"><k7>rotas </k7></a> 
<a href="eventos.php"><k7>eventos </k7></a>
</hdr>
<br><br><br><br><br>

<mapamapa>
<svg id="map" version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="1001.000000pt" height="301.000000pt" viewBox="0 0 4004.000000 1204.000000"
 preserveAspectRatio="xMidYMid meet">
 <line id = "line" x1="69" y1="1142" x2="1727" y2="1142" style="stroke:rgb(203,208,214);stroke-width:40"/>
 <line id = "line" x1="1707" y1="700" x2="1707" y2="1142" style="stroke:rgb(203,208,214);stroke-width:40" />
 <line id = "line" x1="1564" y1="700" x2="3640" y2="700" style="stroke:rgb(203,208,214);stroke-width:40" />
 <line id = "line" x1="1584" y1="740" x2="1584" y2="36" style="stroke:rgb(203,208,214);stroke-width:40" />
 <line id = "line" x1="1584" y1="480" x2="1200" y2="480" style="stroke:rgb(203,208,214);stroke-width:40" />
 <line id = "line" x1="1392" y1="26" x2="3912" y2="26" style="stroke:rgb(203,208,214);stroke-width:40" />
 
</svg>
</mapamapa>


<?php
if ($op==2)
{ 
	echo "<br><br><br><dev><k2>MOSTRANDO ROTA <b>".$_GET["org"]."</b> - <b>".$_GET["dst"]."</b></k2></dev>";
} else if ($op==1)
{
	echo "<br><br><br><dev><k2>MOSTRANDO LOCAL<b>".$_GET["org"]."</b></k2></dev>";

}else {
	
echo "<br><br><br><dev><k2>SELECIONE <b>ORIGEM</b> & <b>DESTINO</b></k2></dev>";
}

?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 

<br><br>
<kr>
<br>

<div class="custom-select" style="width:200px;">
Origem:<br>
<select id = "origem">
 <?php 
$conn= mysqli_connect("localhost","root", "", "xthmap");
$result = mysqli_query($conn, "SELECT nome FROM locais");
$a=1;
?>
	 <option value="<?php echo $a?>"><?php echo "Selecione";?></option> <?php
while ($row = $result->fetch_assoc()){
	$a=$a+1;
	?>
	 <option value="<?php echo $a?>"><?php echo $row ["nome"];?></option> <?php
}
?> 
  </select>
  <br><br>Destino:<br>
<select id = "destino">
 <?php 
$conn= mysqli_connect("localhost","root", "", "xthmap");
$result = mysqli_query($conn, "SELECT nome FROM locais");
$a=1;
?>
	 <option value="<?php echo $a?>"><?php echo "Selecione";?></option> <?php
while ($row = $result->fetch_assoc()){
	$a=$a+1;
	?>
	 <option value="<?php echo $a?>"><?php echo $row ["nome"];?></option> <?php
}
?> 
  </select>
  
  </form><br><br>
</div>
<button class="button" id = "bosta" onclick="referencia()">Traçar rota</button> <br><br>
 
</kr>





<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 

</body>


