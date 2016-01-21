<?php
tcpdf(); 
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = $cd['c_name'];
$header = $cd['c_address']."\n".$cd['c_phone'];
if(empty($c['c_logo']))
{
    $logo =  base_url()."uploads/placeholder.png";
}
else
{
$logo =  base_url()."uploads/".$c['c_logo'];
}
$obj_pdf->SetTitle($title);
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
    
   <h3>Client Name : <?php echo $c{"c_company"} ?></h3> 
    <h3>List of Cases</h3>
    <table style="width:100%">
        <tr>
            <td>
            <?php foreach ($client as $client): ?>
              <table style="width:100%; margin:0 auto; ">
            <tr>
                <td>
                    <?php
    $id = $client['c_s_id'] ;
      $sql ="SELECT SUM(c_i_transaction) AS suma FROM `client_ledgar` WHERE c_l_c_s_id = $id";
 $q = $this->db->query($sql);
$row = $q->row();
?> 
                       <?php echo $client['c_s_desc']?></td>
                <td><?php echo $client['c_s_file_number'] ?>    
                    </td>
                <td>
                Balance :  K<?php echo number_format($row->suma) ?>
                </td>
                <td>
                    <?php
if($client['c_s_status'] == 1)
{
echo "Open";
}
elseif($client['c_s_status'] ==0){
    echo "Closed";
}
                    ?>  
                </td>
                  </tr>
                </table>     <?php endforeach ?>
            </td>
        </tr>
    </table>
       </div>
    
 <?php
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output( $cd['c_name'].' Cases.pdf', 'I');
?>