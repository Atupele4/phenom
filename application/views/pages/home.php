
       <div class="search">
            <table style="width:100%;  ">
                <tr>
                   
                    <td>
                         <input name="search" id="search" type="text" placeholder="search" autocomplete="off" autofocus="true" onkeyup="getSearch()">
                    </td>
                </tr>
            </table>        
             <div class="result">
</div>
</div> 
 
       <br/>
    
<div class="other">
    <table style="width:100%; border-bottom:thin solid #ECECEC; padding:10px;">
        <tr>
        <td> <a href="<?php echo base_url() ?>index.php/createpdf/client" target="_blank">Print list</a>
   </td>
        <td style="text-align:right">Balance as at <?php echo date("Y-m-d")?> :  <?php 
                        if ($balance["suma"] >= 0)
                        {
                            ?>
                           <span style="color:green;">K<?php echo number_format($balance["suma"]) ?></span>
                      <?php  
                      }
elseif($balance["suma"] < 0)
{
?>
                           <span style="color:red;">K<?php echo number_format($balance["suma"]) ?></span>
                      <?php  
}
    ?></td>
        </tr>
    </table>
    
    
     <?php foreach ($clients as $clients): ?>
     
<div class="categories">
    <a href="<?php echo base_url() ?>index.php/client/<?php echo $clients['c_id'] ?>">
    <table style="width:100%;">
        <tr>
            <td style="width:33%"><?php echo $clients['c_company'] ?></td>
            
                <td style="width:33%"> 
                <span><?php
       $id = $clients['c_id'];
     $sql ="SELECT * FROM  case_summary WHERE c_s_c_id = '".$id."'";
   $event_query = $this->db->query($sql);
$asd = $event_query->num_rows();
     echo $asd;
    ?> Cases  </span>
                </a></h3>
   </td>
            <td style="text-align:right"><?php
    if($u_id == 2)
{
              ?>
        <a class="edit" href="<?php echo base_url() ?>index.php/update_data/client/<?php echo $clients['c_id']?>">Update</a>
     </td>
    <td>
            <a class="delete" href="javascript:delete_client(<?php echo $clients['c_id']?>)"   >Delete</a>
         <?php
}
    ?>     
            </td>
        </tr>
    </table></a>
        </div>

    <?php endforeach ?>
    </div>

  
         
      <div class="other" style="padding-left:40px; width:45%">
        
          <div class="numbers">
              <table style="width:100%; text-align: center;">
                <tr>
                  <td style="width:25%"><h3><?php  $sql ="SELECT * FROM  client_details";
   $event_query = $this->db->query($sql);
$asd = $event_query->num_rows();
     echo $asd; ?></h3></td>
                  <td  style="width:25%"><h3><?php  $sql ="SELECT * FROM  case_summary";
   $event_query = $this->db->query($sql);
$asd = $event_query->num_rows();
     echo $asd; ?></h3></td>
                  <td  style="width:25%"><h3><?php  $sql ="SELECT * FROM  case_summary WHERE c_s_status = 1";
   $event_query = $this->db->query($sql);
$asd = $event_query->num_rows();
     echo $asd; ?></h3></td>
                  <td  style="width:25%"><h3><?php  $sql ="SELECT * FROM  case_summary WHERE c_s_status = 0";
   $event_query = $this->db->query($sql);
$asd = $event_query->num_rows();
     echo $asd; ?></h3></td>
                  
                  </tr>
                  <tr>
                      <td><p>Clients</p></td>
                      <td><p>Cases</p></td>
                      <td><p>Open Cases</p></td>
                      <td><p>Closed Cases</p></td>
                      
                  </tr>
              </table>
              </div>
           <br/>
           <div class="home_input">
     <?php
    if($u_id == 2)
{
              ?>
<?php echo form_open('data_entry/enter_client') ?>
            <h3>Add new Client</h3>        
<table style="width:100%;">
    <tr>
        <td><p>Name</p></td>
        <td> <input type="input" required name="name" class="input" /></td>
        </tr>
    <tr>
        <td><p>Address</p></td>
          <td> <input type="input"  required name="address" class="input" /></td>
           </tr>
    <tr>
        <td><p>Company</p></td>
         <td> <input type="input"  name="company" class="input" /></td>
             </tr>
    <tr>
        <td><p>Email</p></td>
           <td> <input type="email" required name="email" class="input" /></td>
                </tr>
    <tr>
        <td><p>Phone Number</p></td>
         <td> <input type="number" required name="phone"  class="input" /></td>
   
    </tr>
    <tr> 
         <td></td><td><input type="submit" name="submit" value="Add New Client" class="send" /></td>
    </tr>
      
</table>
          <?php echo form_close() ?>

   <?php
}
    ?>
    </div>

</div>

</div>
   
<script type="text/javascript">
     function delete_client(x)
    {
         if(confirm('Are you sure you want to DELETE this record?\n\nWarning : This deletes all related cases to this client'))
     {
        $.ajax({
            url:"<?php echo base_url()?>index.php/pages/delete_client",
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
        
        <script>
    function getSearch()
    {
        var x = document.getElementById('search').value;
        $.ajax({
            url:"<?php echo base_url()?>index.php/pages/give_more_data",
            async: false,
            type: "POST",
            data: "type="+ x,
            dataType: "html",
            success: function(data)
            {
                $('.result').html(data);                
            }
        })

        return false;
    }
</script>
</body>
</html>