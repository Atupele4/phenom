<br/>
<div class="church">
<?php echo form_open('data_entry/update_client/'.$c["c_id"]) ?>
  
                <br/>    
<table style="width:100%; margin:0 auto; padding:20px; border:thin solid #ECECEC ">
    <tr>
        <td>  <h3>Update <?php echo $c["c_company"]?> Account</h3></td>
    </tr>
    <tr>
        <td><p>Name</p></td>
        <td><p>Address</p></td>
        <td><p>Company</p></td>
        <td><p>Email</p></td>
        <td><p>Phone Number</p></td>
    <td></td>
    </tr>
    <tr>
        <td> <input type="input" value="<?php echo $c["c_name"]?>" required name="name" class="input" /></td>
        <td> <input type="input" value="<?php echo $c["c_address"]?>" required name="address" class="input" /></td>
        <td> <input type="input" value="<?php echo $c["c_company"]?>" name="company" class="input" /></td>
        <td> <input type="email" value="<?php echo $c["c_email"]?>" required name="email" class="input" /></td>
        <td> <input type="input" value="<?php echo $c["c_phone"]?>" required name="phone"  class="input" /></td>
         <td><input type="submit" name="submit" value="Save" class="send" /></td>
    </tr>
      
</table>
          <?php echo form_close() ?>
</div> 