<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('Proyecto-Web/Proyecto_Web/Imagenes/TechN9ne.jpg',160,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',13);
    // Movernos a la derecha
    
    // Título
    $this->Cell(60,25,"$_SESSION[Nombre_U]",0,0);
    $this->Cell(60,25,"$_SESSION[Direccion_U]",0,0);
    $this->Cell(60,25,"$_SESSION[Correo_U]",0,0);

    $this->Ln(1);

    $this->Cell(60,10,"Nombre:",0,0);
    $this->Cell(60,10,"Direccion:",0,0);
    $this->Cell(60,10,"Correo:",0,0);

    $this->Line(0,30,210,30);

    $this->Ln(25);

    $this->SetFont('Courier','B',25);

    $this->Cell(60,10,"",0,0);
    $this->Cell(60,10,"LE DISCOTEC",0,0);

    $this->Ln(20);



}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
session_start();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',15);

$pdf->Cell(80,5,'Album',0,0);
$pdf->Cell(80,5,'Artista',0,0);
$pdf->Cell(80,5,'Precio',0,1);

$pdf->SetFont('Times','',15);

    $fecha = getdate();
    $fecha2;

    $Hoy = $fecha['wday'];

    if($Hoy == 1 || $Hoy == 2 || $Hoy == 6 || $Hoy == 0)
    {
      $fecha2 = getdate(time() + 259200);
    }
    else
    {
      $fecha2 = getdate(time() + 432000);
    }


$dbcon = mysqli_connect("localhost", "root", "", "lediscotec") or die("No se pudo connectar");

$Usuario = $_SESSION['ID_U'];

$Contador = 0;
$Total = 0;
        $sql = "SELECT carro.ID, carro.Fk_Album, Albums.Nombre, Albums.Artista, Albums.Precio, Albums.FK_Genero, Albums.Imagen, Genero.Genero FROM carro, Albums, Genero WHERE carro.Fk_usuario = '$Usuario' AND carro.Fk_Album = Albums.ID AND Albums.FK_Genero = Genero.PK";
        


          $mydata = mysqli_query($dbcon,$sql);

        $Precio = 0;

          while($record = mysqli_fetch_array($mydata))
          {  
            $pdf->Cell(80,20,$record['Nombre'] ,0,0);
            $pdf->Cell(80,20,$record['Artista'] ,0,0);
            $pdf->Cell(80,20,$record['Precio'] ,0,1);

            $Total =  $record['Precio'] + $Total; 
          }

      $IVA = ($Total*16)/100;

      $Neto = $Total + $IVA;


$pdf->SetFont('Times','B',15);

$pdf->Cell(127,10,'',0,0);
$pdf->Cell(30,10,'Total:',0,0);
$pdf->Cell(120,10, $Total . '$',0,1);

$pdf->Cell(127,10,'',0,0);
$pdf->Cell(30,10,'IVA:',0,0);
$pdf->Cell(120,10, $IVA . '$',0,1);

$pdf->Cell(127,10,'',0,0);
$pdf->Cell(30,10,'Neto:',0,0);
$pdf->Cell(120,10, $Neto . '$',0,1);

$pdf->Ln(3);

$pdf->Cell(127,10,'',0,0);
$pdf->Cell(30,10,'Fecha de Entrega:',0,0);
$pdf->Cell(120,10,'',0,1);

$pdf->Cell(127,10,'',0,0);
$pdf->Cell(30,10,$fecha2['mday'] . "/" . $fecha2['mon'] . "/" . $fecha2['year'],0,0);
$pdf->Cell(120,10,'',0,1);

$filename="PDF/Compra.pdf";
$pdf->Output($filename,'F');

$pdf->Output();
?>