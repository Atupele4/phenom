<br/>      

 
<div class="church">
    <table style="width:100%; margin:0 auto; border-bottom:thin solid #ECECEC; padding:10px;">
    <tr>
        <td><a href="<?php echo base_url()?>index.php/createpdf/pdf/<?php echo $case['c_s_id'] ?>" target="_blank">Print Ledger</a></td>
    </tr>
</table>
        	<?php echo $case['c_s_desc'] ?> 
    <p><?php echo $case['c_name'] ?></p>
            <p>Email - <?php echo $case['c_email'] ?> </p> 
            <p>Phone - <?php echo $case['c_phone'] ?> </p> 
            <p>File Number - <?php echo $case['c_s_file_number'] ?> </p> 
            <p>Date opened - <?php echo $case['c_s_datetime'] ?> </p> 
        		 <br/>
       		 
      <div class="l">
          <table style="width:100%; margin:0 auto;">
            <tr>
                <td><p class="heading">Date</p></td>
                <td><p class="heading">Details</p></td>
                <td style="text-align:right"><p class="heading">Ref_no</p></td>
                <td style="text-align:right"><p class="heading">Debit</p></td>
                <td style="text-align:right"><p class="heading">Credit</p></td>
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
              <?php
    if($u_id == 2)
{
    
if($case['c_s_status'] == 1)
{
    ?>
          <tr>
        <td colspan="5"><br/>
             <?php echo form_open('data_entry/enter/'.$case['c_id']) ?>
            <table style="width:100%; border-top:1px solid #ECECEC">
                <tr>
                 <td><p>Date</p>
                      <input type="date" id="datepicker" required name="date" class="input" /></td>
                      <input type="hidden" required name="id" value="<?php echo $case['c_s_id'] ?>" class="input" /></td>
                <td><p>Details
                      <input type="input" required name="details" class="input" /></p></td>
                <td style="text-align:right"><p>Ref_no</p>
                      <input type="input" required name="ref" class="input" /></td>
                <td style="text-align:right; width:100px"><p>Transaction</p>
                    <select name="trans" class="input"> 
                    <option value="1">Credit</option>
                    <option value="0">Debit</option>                
            </select></td>
                  <td style="text-align:right; " ><p>Amount</p>
                      <input type="number" required name="amount" class="input" />
                      <br/><input type="submit" name="submit" value="Enter" class="send" /></td>
                </tr>
            </table>
            <?php echo form_close() ?>
        </td>
               
              </tr>   
              <?php
 
}
elseif($case['c_s_status'] ==0)
{
    ?><tr>
<td><h3> Account is Closed  </h3></td>
</tr>
       
   <?php
}
                   
              ?>
   
              <?php
}
    ?>      <tr>
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
                  <td style="text-align:right" ><p>Balance : 
                      <?php 
                        if ($b["suma"] >= 0)
                        {
                            ?>
                           <span style="color:green;">K<?php echo number_format($b["suma"]) ?></span>
                      <?php  
                      }
elseif($b["suma"] < 0)
{
?>
                           <span style="color:red;">K<?php echo number_format($b["suma"]) ?></span>
                      <?php  
}
   
                      ?></p></td>
              </tr>
          </table>
              
            
 </div><br/>
<div style="border-top:1px solid #333">
    <br/>
    <p>Status : <?php
if($case['c_s_status'] == 1)
{
echo "Open";
}
elseif($case['c_s_status'] ==0){
    echo "Closed";
}
                    ?></p> 
    <br/>
    <?php
    if($u_id == 2)
{
        ?>
     <?php echo form_open('data_entry/status/'.$case['c_s_id']) ?>
     <input type="hidden" required name="id" value="<?php echo $case['c_id'] ?>" class="input" />
                <select name="status" class="input" style="width:150px;"> 
                    <option value="">Select Status</option>
                    <option value="1">Open</option>                
                    <option value="0">Close</option>                
            </select>
                   <input type="submit" name="submit" value="Update" class="send" />
            <?php echo form_close() ?>   
    <?php
    }
            ?>
    </div>

    
        </div>
 