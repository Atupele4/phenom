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
$obj_pdf->SetTitle('Balance Ledger');
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
    <p>Date Search between <?php echo $d1 ?> - <?php echo $d2 ?></p> 
     <hr/>
     
        <table style="width:100%;"> 
            <?php foreach ($b as $b): ?>
            <tr>
                <td style="width:33%">  
                    <?php echo $b["c_s_file_number"] ?></td>
                
                    <td style="width:33%"> <?php echo $b["c_s_desc"] ?> </td>
                <td style="width:33%"> Balance = <?php 
                        if ($b["suma"]  >= 0)
                        {
                            ?>
                           <span style="color:green;">K<?php echo $b["suma"] ?></span>
                      <?php  
                      }
elseif($b["suma"] < 0)
{
?>
                           <span style="color:red;">K<?php echo $b["suma"] ?></span>
                      <?php  
}
    ?>     </td>
              
            </tr>
         <?php endforeach ?>   
        </table>
            

        </div>
    
 <?php
    $content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('Closed Ledgers.pdf', 'I');
?>