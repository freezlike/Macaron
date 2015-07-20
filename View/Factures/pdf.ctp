<?php
App::import('Vendor', 'Fpdf/fpdf');
require_once APP . 'Vendor\Fpdf\fpdf.php';
header("Content-type:application/pdf");

$fpdf = new FPDF();
$fpdf->AddPage();
$fpdf->SetFont('Arial', 'B', 16);
$fpdf->Cell(40, 10, 'Salut');
$fpdf->Output();
?>
<script>
    //document.location.href = '<?php echo $this->Html->url('/img/' . $filename, true) ?>';
</script>