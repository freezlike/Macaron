
<?php
App::import('Vendor', 'Fpdf/html2pdf');
require_once APP . 'Vendor\Fpdf\html2pdf.php';
$data = '
  <div style="margin-left: -15px;margin-right: -15px;">
    <div style="/*width: 70%;height: auto;*/border: solid #000 1px;" class="span9 offset1">
        <div class="" style="margin-left: 10px;">
            <address style="margin-bottom: 20px;font-style: normal;line-height: 1.42857143;">
                CENTRE LE 45 AVENUE DU JAPON<br>
                1073 - MONTPLAISIR-TUNIS<br>
                Tél Fixe : 71 90 38 03<br>
                MF : 1359806/B/A/M/000<br>
            </address>';
?>

<?php
$fpdf = new PDF_HTML();
$fpdf->AddPage();
$fpdf->SetFont('Arial', 'B', 16);
$fpdf->WriteHTML($data);
echo $fpdf->Output();
