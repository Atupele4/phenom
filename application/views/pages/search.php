<br/>
<?php 
    $sql ="SELECT MIN(c_l_date) AS suma FROM client_ledgar";
 $q = $this->db->query($sql);
$row = $q->row();
?>

<div class="church">
     <br/>
<table style="width:100%; border-bottom:thin solid #ECECEC; padding:10px;">
    <tr>
        <td><a href="<?php echo base_url() ?>index.php/createpdf/balance_search/<?php echo $row->suma ?>/<?php
if(empty($search))
{
     
}
else{
    echo $search;
}
?>" target="_blank">Print list</a></td>
    </tr>
</table>
<?php echo form_open('search/balance') ?>
<table style="width:100%; margin:0 auto;">
    <tr>
        <td><h3>Start Date</h3></td>
        <td><h3>End Date</h3></td>
        <td><h3> </h3></td>
    </tr>
<tr>
    <td><input type="input"   value="<?php echo $row->suma;?>" readonly  name="d1" class="input" /></td>
    <td><input type="input"   id="datepicker2"   required name="d2" class="input" /></td>
       <td><input type="submit" name="submit" value="Search" class="send" /></td> 
</tr>  
<tr>
    <td colspan="3">   
        <?php 
        if(empty($b))
{
  //  echo count($b);
}
else
{
    ?>
        <p>Balance Between <?php echo  $row->suma ?> - <?php echo $search ?></p>
      <?php foreach ($b as $b): ?>
         <a href="<?php echo base_url() ?>index.php/cases/<?php echo $b['c_s_id'] ?>/<?php echo $b['c_s_c_id'] ?>">
    
        <div class="categories">
        <table style="width:100%;"> 
            <tr>
                <td style="width:33%">  
                    <h3><?php echo $b["c_s_file_number"] ?></h3></td>
                
                    <td style="width:33%"><h3>    <?php echo $b["c_s_desc"] ?>  </h3> </td>
                <td style="width:33%"> <p>Balance = <?php 
                        if ($b["suma"]  >= 0)
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
    ?> </p>      </td>
              
            </tr>
        
        </table>
    
             </div></a>
            <?php endforeach ?>        
        <?php
}
    ?>
     
    </td>
</tr>
</table>
         <?php echo form_close() ?>
    </div>