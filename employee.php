<?php 
	include 'fpdf/fpdf.php';

	$pdf = new FPDF();
	$pdf->AddPage();
	
	//heading
	$pdf->SetFont("Arial",'B',16);
	$pdf->Cell("200",20,"Employee Managment System","0","1","C");

	//table
	$pdf->setLeftMargin(30);
	$pdf->SetTextColor(0,0,0);

	//table rows
	$pdf->Cell(40,10,"ID", "1", "0", "C");
	$pdf->Cell(60,10,"Name", "1", "1", "C");
	$pdf->SetFont("Arial",'',14);

	$con = new PDO("mysql:host=localhost;dbname=onefield", "root", "");
	if (isset($_GET['em_id'])) {
		$id = $_GET['em_id'];

		$query = "SELECT * FROM onedata Where id='$id'";
		$result = $con->prepare($query);
		$result->execute();
		if($result->rowCount()!=0)
		{
			while($employee = $result->fetch())
			{
				$pdf->Cell(40,10,$employee['id'], "1", "0", "C");
				$pdf->Cell(60,10,$employee['name'], "1", "1", "C");
			}
		}
		else
		{
			echo "No Record Found.";
		}
	}
	$pdf->Output();
 ?>