<?php
tcpdf(); 
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = $c['c_name'];
$header = $c['c_address']."\n".$c['c_phone'];
if(empty($c['c_logo']))
{
    $logo =  base_url()."uploads/placeholder.png";
}
else
{
$logo =  base_url()."uploads/".$c['c_logo'];
}
$obj_pdf->SetTitle('Open Ledgers');
$obj_pdf->SetHeaderData($logo, 12, $title, $header);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
?>

<div class="church">
 <h3>Open Ledgers</h3>
    <?php $i = 1; ?>
    <table style="width:100%">
        <tr>
            <td style="width:10%"><strong>No.</strong></td>
            <td><strong>Description</strong></td>
            <td><strong>File Number</strong></td>
            <td><strong>Balance</strong></td>
        </tr>
         <?php foreach ($client as $client): ?>
        <tr>
            <td><?php

echo $i++ ?></td>
            <td> <?php echo $client['c_s_desc']?></td>
            <td><?php echo $client['c_s_file_number'] ?>    </td>
            <td>K<?php
    $id = $client['c_s_id'] ;
      $sql ="SELECT SUM(c_i_transaction) AS suma FROM `client_ledgar` WHERE c_l_c_s_id = $id";
 $q = $this->db->query($sql);
$row = $q->row();
echo number_format($row->suma);
   ?> </td>
            
        </tr>
            <?php endforeach ?>
    </table>    </div>
    
 <?php
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('Open Ledgers.pdf', 'I');
?>