<?php
tcpdf(); 
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = $c['c_name'];
$header = $c['c_address']."\n".$c['c_phone']."\n".$c['c_email'];
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
        	    <h3>Clients</h3>
        <?php $i = 1; ?>
 <table style="width:100%;">
     <tr>
           <td style="width:10%"><strong>No.</strong>  
         </td> <td><strong>Client Name</strong>
         </td>
         <td><strong>Company</strong>
         </td>
         <td><strong>Cases</strong></td>
     </tr>
       <?php foreach ($case as $case): ?>
        <tr>
            <td>    <?php echo $i ++ ?></td>
            <td><?php echo $case['c_name'] ?>
            </td>
            <td><?php echo $case['c_company'] ?>
            </td>
            <td><?php
       $id = $case['c_id'];
     $sql ="SELECT * FROM  case_summary WHERE c_s_c_id = '".$id."'";
   $event_query = $this->db->query($sql);
$asd = $event_query->num_rows();
     echo $asd;
    ?> Cases </td>
     </tr>
       <?php endforeach ?>
    </table>
            
    
              
  
    
        </div>
   
   
 <?php
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output( 'Clients.pdf', 'I');
?>