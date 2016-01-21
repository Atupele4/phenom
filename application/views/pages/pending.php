<br/>
 
<div class="church">
    <table style="width:100%; border-bottom:thin solid #ECECEC; padding:10px;">
    <tr>
        <td><a href="<?php echo base_url() ?>index.php/createpdf/pending" target="_blank">Print List</a></td>
    </tr>
</table>
 
    
   <?php foreach ($client as $client): ?>
    <a href="<?php echo base_url() ?>index.php/cases/<?php echo $client['c_s_id'] ?>/<?php echo $client['c_s_c_id'] ?>">
        <div class="categories">
            <table style="width:100%">
                <tr>
                    <td style="width:30%"> 
            <?php echo $client['c_s_desc'] ?></td>
                    <td style="width:20%"><?php echo $client['c_s_file_number'] ?>   </td>
                        <td style="width:20%">
                   <span>  Balance :   <?php
  $suma = $client['suma'];
                 if ($suma >= 0)
                        {
                            ?>
                           <span style="color:green;">K<?php echo number_format($suma) ?></span>
                      <?php  
                      }
elseif($suma< 0)
{
?>
                           <span style="color:red;">K<?php echo number_format($suma) ?></span>
                      <?php  
}
    
   ?></td><td style="width:30%">
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
                    <td style="text-align:right"> <a class="edit" href="<?php echo base_url() ?>index.php/update_data/cases/<?php echo $client['c_s_id']?>/<?php echo $client['c_s_c_id']?>">Update</a> </td><td>
            <a class="delete" href="javascript:delete_id(<?php echo $client['c_s_id']?>)" >Delete</a>
         <?php
}
    ?>     
            </td>
                </tr>
             </table>
                 </div>
</a>
    <?php endforeach ?>
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
    </script>