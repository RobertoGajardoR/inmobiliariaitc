<?php
//incluimos FPDF

require('fpdf/fpdf.php');


//creamos una clase extendida de FPDF

class PDF extends FPDF
{

// Cargar los datos de la tabla mysql
function LoadData($param1)
{

//incluimos la conexion 

require("connect_db.php");

//redactamos la consulta
$query1 = "SELECT * FROM ingresos where numrecibo = '$codigo'";
$stmt=mysql_query($query1);
while ($fac =mysql_fetch_row($stmt))
{

//vaciamos la data en un arreglo

 $data[]=$fac;
}
return $data;
 

}

 

 

 

 

 

  

// Generando la tabla
function Tabla($cabecera, $data)
{

 //definimos el ancho de cada columna

   $w = array(30, 35, 45, 30,30);

//de acuerdo al total de la suma de estos anchos, definimos el ancho del titulo

  
   $w_titulo = 170;

 

 // Cabecera
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);

        $this->Cell($w[4],6,$row[4],'LR',0,'R',$fill); 

        $this->Ln();
        $fill = !$fill;
    }
}
 

 

 


 

}

//podemos traer las variables de un formulario o de una URL

$codigo=$_GET['codigo'];
//iniciamos la clase

$pdf = new PDF();
// Títulos de las columnas
$header = array('columna1', 'Columna2', 'Columna3', 'Columna4', 'Columna5');
// Carga de datos del arreglo obtenido
$data = $pdf->LoadData($codigo);
$pdf->Tabla($header, $data);
$pdf->Output();



?> 