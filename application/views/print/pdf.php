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
$obj_pdf->SetTitle($case['c_company']);
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
        	  <p><?php echo $case['c_company']." - ".$case['c_s_desc'] ?><br/>
                  Email : <?php echo $case['c_email'] ?> <br/> 
            Phone : <?php echo $case['c_phone'] ?>  <br/> 
             File Number : <?php echo $case['c_s_file_number'] ?> <br/> 
             Date opened : <?php echo $case['c_s_datetime'] ?> </p> 
        		 <br/>
       		 <hr/>
      <div class="l">
          <table style="width:100%; margin:0 auto;">
            <tr>
                <td><p style="text-transform:uppercase"><strong>Date</strong></p></td>
                <td><p style="text-transform:uppercase"><strong>Details</strong></p></td>
                <td style="text-align:right"><p style="text-transform:uppercase"><strong>Ref_no</strong></p></td>
                <td style="text-align:right"><p style="text-transform:uppercase"><strong>Debit</strong></p></td>
                <td style="text-align:right"><p style="text-transform:uppercase"><strong>Credit</strong></p></td>
               </tr>
          <?php foreach ($l as $l): ?>
              <tr>
             	<td><?php echo $l['c_l_date'] ?> </td>
             	<td><?php echo $l['c_l_details'] ?> </td>
             	<td style="text-align:right"><?php echo $l['c_l_ref_number'] ?> </td>
             	<td style="text-align:right"  ><?php
    if($l["c_l_trans_type"] == 0)
{
    echo number_format($l['c_i_transaction']);
}
else{
    
} ?> </td>
             	<td style="text-align:right"  ><?php
if($l["c_l_trans_type"] == 1)
{
     echo number_format($l['c_i_transaction']);
}
else{
    }?> </td>    </tr>
             <?php endforeach ?>  
              
             
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                  <td style="text-align:right" > </td>
              </tr>
              <tr>
                    <td ></td>
                    <td ></td>
                <td ></td>
                <td></td>
                  <td style="text-align:right" >
                      <p>Balance : 
                      <?php 
                        if ($b["suma"] >= 0)
                        {
                            ?>
                           <span style="color:green;"><?php echo number_format($b["suma"]) ?></span>
                      <?php  
                      }
elseif($b["suma"] < 0)
{
?>
                           <span style="color:red;"><?php echo number_format($b["suma"]) ?></span>
                      <?php  
}
   
                      ?></p>
                  <br/>
                  <br/>
                  <br/>
                  </td>
              </tr>
          </table>
              
            
 </div><br/>
 
    
        </div>
    
 <?php
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output( $case['c_name']."-".$case['c_company']."-".$case['c_s_id'].'.pdf', 'I');
?>