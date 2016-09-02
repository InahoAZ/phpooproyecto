<?php
include "Library/pChart2.1.4/class/pData.class.php";
include "Library/pChart2.1.4/class/pDraw.class.php";
include "Library/pChart2.1.4/class/pImage.class.php";

$myData = new pData();



/* Crear y llenar el objeto pData()  */
$myData = new pData();
while ($row = mysqli_fetch_array($datos)) {
	echo $row['numero1'];
	$myData->addPoints($row['numero1'],"Numero1"); 
	$myData->addPoints($row['numero2'],"Numero2");
	$myData->addPoints($row['numero3'],"Numero3");
	$myData->addPoints($row['numero4'],"Numero4");
}	

$myData->setSerieTicks("Numero1", 4);
$myData->setAxisName(0,"Weas");
$myData->addPoints(array("1", "2", "3", "4", "5"), "Labels");
$myData->setSerieDescription("Labels","Months");
$myData->setAbscissa("Labels");

/* En segundo lugar, preparamos el diseño del grafico a realizar: 
fondo, area de dibujo, etc. 
Y luego dibujamos el grafico.*/


/*Crear el objeto pChart para dibujar el grafico con los datos cargados en el 
objeto pData (ver arriba)*/

/*Esto crea una imagen de 700x230 y carga en el objeto creado
 pImage(), los datos del objeto pData()*/
    
$myPicture = new pImage(700, 230, $myData);

/*Dibujar el fondo del grafico*/
$settings = array("R"=>170, "G"=>183, "B"=>87 );
$myPicture->drawFilledRectangle(0,0,700,230,$settings);

/* Darle un color gradiente*/
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,$Settings); 

/*Añadir un borde al grafico creado*/
$myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0)); 

/*Escribir el titulo del grafico*/
$myPicture->setFontProperties(array("FontName"=>"Library/pChart2.1.4/fonts/Silkscreen.ttf","FontSize"=>10));
$myPicture->drawText(20,20,"TEXTO DE PRUEBA",array("R"=>255,"G"=>255,"B"=>255));

$myPicture->setFontProperties(array("FontName"=>"Library/pChart2.1.4/fonts/Forgotte.ttf","FontSize"=>11));
$myPicture->drawText(250,55,"TITULO",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE)); 

/* Dibujar la escala del grafico*/
$myPicture->setGraphArea(60,60,450,190);
$myPicture->drawFilledRectangle(60,60,450,190,array("R"=>255,"G"=>255,"B"=>255,"Surrounding"=>-200,"Alpha"=>10));
$myPicture->drawScale(array("DrawSubTicks"=>TRUE));

$myPicture->setFontProperties(array("FontName"=>"Library/pChart2.1.4/fonts/pf_arma_five.ttf","FontSize"=>6));
$myPicture->drawAreaChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO));
	
	
	$myPicture->Render("prueba.png"); 
	
?>

<h1>:V</h1>
<div align="center"><img src="prueba.png" alt=""></div>
