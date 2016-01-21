<br/><br/>
<div class="other" style="width:55%">
    <br/>
<table style="width:100%; border-bottom:thin solid #ECECEC; padding:10px;">
    <tr>
        <td><a href="<?php echo base_url() ?>index.php/createpdf/cases/<?php echo $c["c_id"] ?>" target="_blank">Print list</a></td>
    </tr>
</table>

<p><?php echo $c["c_name"] ?> - <?php echo $c["c_company"] ?></p>  
    <?php foreach ($client as $client): ?>
   
        <div class="categories">
             <a href="<?php echo base_url() ?>index.php/cases/<?php echo $client['c_s_id'] ?>/<?php echo $c['c_id'] ?>">
            <table style="width:100%">
                <tr>
                    <td style="width:33%"> 
            <?php echo $client['c_s_desc']?></td>
                    <td style="width:20%"><?php echo $client['c_s_file_number'] ?>    
                        </td>
                        <td style="width:20%">
                   <span><?php
    $id = $client['c_s_id'] ;
      $sql ="SELECT SUM(c_i_transaction) AS suma FROM `client_ledgar` WHERE c_l_c_s_id = $id";
 $q = $this->db->query($sql);
$row = $q->row();
?>
                       <?php 
                        if ($row->suma >= 0)
                        {
                            ?>
                           <span style="color:green;">K<?php echo number_format($row->suma) ?></span>
                      <?php  
                      }
elseif($row->suma< 0)
{
?>
                           <span style="color:red;">K<?php echo number_format($row->suma) ?></span>
                      <?php  
}
    ?>
                       <?php
 
   ?></td><td style="width:10%">
                <?php
if($client['c_s_status'] == 1)
{
echo "Open";
}
elseif($client['c_s_status'] ==0){
    echo "Closed";
}
                    ?>   </span>       
                       </h3>
                    </td>
                  <?php
    if($u_id == 2)
{
              ?>
                    <td style="text-align:right; width:20"> <a class="edit" href="<?php echo base_url() ?>index.php/update_data/cases/<?php echo $client['c_s_id']?>/<?php echo $c['c_id']?>">Update</a></td>
         <td>  
     
             <a class="delete"  href="javascript:delete_id(<?php echo $client['c_s_id']?>)"  >Delete</a>
         <?php
}
    ?>     
            </td>
                </tr>
             </table> </a>
                 </div>
    <?php endforeach ?>
     </div>
 <div class="other" style="width:35%">
   
<!--start of form code-->
  <?php
    if($u_id == 2)
{
              ?>
<?php echo form_open('data_entry/enter_case') ?>
     <br/>
            <h3>Add new Case</h3>  
<table style="width:100%;">
    <tr>
        <td><p>Title</p></td>
         <td> <input type="input" required name="title" class="input" /></td>
     </tr>
    <tr>
        <td><p>Notes</p></td>
         <td> <textarea type="input"  required name="notes" rols="9" class="input"></textarea></td>
       </tr>
    <tr>
        <td><p>File Number</p></td>
           <td> <input type="input" required name="file" class="input" /></td>
        <td> <input type="hidden" readonly name="c_id" value="<?php echo $c["c_id"] ?>" class="input" /></td>
      </tr>
    
    <tr>
        <td></td>
            <td><input type="submit" name="submit" value="Add new Case" class="send" /></td>
    </tr>
     
</table>
           <?php echo form_close() ?>

   <?php
}
    ?>
<!--end of form code-->         
</div>

<script type="text/javascript">
     function delete_id(x)
    {
         if(confirm('Are you sure you want to DELETE this record?\n\nWarning : This deletes all related ledger entries to this case.'))
     {
        $.ajax({
            url:"<?php echo base_url()?>index.php/pages/delete_id",
            async: false,
            type: "POST",
            data: "type="+ x,
            dataType: "html",
            success: function(data)
            {
              location.reload();
            }
        })

        return false;
     }
     
       
    }
    
/*function delete_id(id)
{
     if(confirm('Are you sure you want to DELETE this record?'+id))
     {
       window.location.href='data_entry/delete_case/'+id;
     }
}*/
</script>