<?php

require('../fpdf/fpdf.php');
require('../datos/connect_db.php');


class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

   function Header()
   {
    //Logo
    //Arial bold 15
    $this->SetFont('Arial','B',20);
    //Movernos a la derecha
    $this->Cell(160);
    //Título
    $this->Cell(89,35,'Lista de inmuebles',1,1,'C');
    //Salto de línea
    $this->Image("../medios/Logo1.jpg" , 20 ,8, 120 , 38 , "JPG");
    $this->Ln(0);
      
   }

function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'Inmobiliaria ITC',0,0,'L');

}

}

	
	
	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(10);

	$pdf->SetWidths(array(40,30, 40, 30,30,69));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(85,107,47);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
				$pdf->Row(array('Edificio', 'id inmueble','Codigo inmueble', 'Tipo','Numero','Descripcion'));
			}
	
	$sql=("SELECT * FROM inmuebles ");
	$historial=mysqli_query($db,$sql);		
	$texto = utf8_decode('Lorem Ipsum …...');

	$numfilas = mysqli_num_rows($historial);
	$sumatotal = 0;
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysqli_fetch_array($historial);

			$pdf->SetFont('Arial','',10);
			$edificio = utf8_decode($fila['edificio']);
			$id = utf8_decode($fila['id']);
			$Codigoinmueble = utf8_decode($fila['Codigoinmueble']);
			$tipo = utf8_decode($fila['tipo']);
			$numero = utf8_decode($fila['numero']);
			$descripcion = utf8_decode($fila['descripcion']);

			if($i%2 == 1)
			{
				$pdf->SetFillColor(153,255,153);
    			$pdf->SetTextColor(0);
    			$pdf->Row(array($edificio,$id, $Codigoinmueble,$tipo,$numero,$descripcion));
					
			}
			else
			{
				$pdf->SetFillColor(102,204,51);
    			$pdf->SetTextColor(0);
    			$pdf->Row(array($edificio,$id, $Codigoinmueble,$tipo,$numero,$descripcion));
				
			}
			
		}

$pdf->Output("ListaInmuebles.pdf","I");
?>
