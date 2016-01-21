<br/>  
<div class="church">
<?php if(empty($company))
              {
        ?>
<?php echo form_open('data_entry/company')?>
          <br/>
  
<table style="width:100%; margin:0 auto; padding:20px; border:thin solid #ECECEC ">
    <tr>
        <td><p>Company Name</p></td>
         <td> <input type="input"    required name="name" class="input" /> </td>
     </tr>
    <tr>   
        <td><p>Address</p></td>
         <td> <input type="input"  required name="address" class="input" /></td>
    </tr>
    <tr>    
        <td><p>Email</p></td>
         <td> <input type="email"  required name="email" class="input" /></td>
    </tr>
    <tr>      <td><p>Phone Number</p></td>
         <td> <input type="input"  required name="phone" class="input" /></td>
        
    </tr>
    <tr>
       <td></td> 
        <td><input type="submit" name="submit" value="Add" class="send" /></td>
    </tr> </table>
           <?php echo form_close() ?>         

<?php          
}
        else{
            ?>
<?php
    if($u_id == 2)
{
        ?>
<?php echo form_open('data_entry/update_company')?>
  
          <br/>
<table style="width:100%; float:left; padding:20px; border:thin solid #ECECEC ">
     <tr>
        <td colspan="2">   <h3>Company Details</h3>
         <?php

$hash = $this->encrypt->encode($company["c_name"]);
 $hash.'    ' . $this->encrypt->decode($hash);
?>
         </td>
    </tr>
    <tr>
        <td><p>Company Name</p></td>
         <td> <input type="input"  value="<?php echo $company["c_name"] ?>"  required name="name" class="input" /> 
        <input type="hidden"  value="<?php echo $company["cd_id"] ?>"  required name="cd_id" class="input" /> </td>
        </tr>
    <tr>
        <td><p>Address</p></td>
            <td> <input type="input"  value="<?php echo $company["c_address"] ?>" required name="address" class="input" /></td>
       </tr>
    <tr>
        <td><p>Email</p></td>
          <td> <input type="input"  value="<?php echo $company["c_email"] ?>" required name="email" class="input" /></td>
      </tr>
    <tr>  
        <td><p>Phone Number</p></td>
           <td> <input type="input"  value="<?php echo $company["c_phone"] ?>" required name="phone" class="input" /></td>
      
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Update" class="send" /></td>
    </tr> </table>
    <div class="clear"></div>
           <?php echo form_close() ?>  
</div>
<div class="clear"></div>
<br/>
 
<div class="church">
<?php echo form_open_multipart('data_entry/enter_logo') ?>
         
<table style="width:100%; padding:20px; border:thin solid #ECECEC">
    <tr>
        <td colspan="2">   <h3>Company Logo</h3></td>
    </tr>
    <tr>
        <td><p>Logo</p></td>
            <td></td>
    </tr>
    <tr>
       <td>
             <input type="hidden"  value="<?php echo $company["cd_id"] ?>"  required name="cd_id" class="input" /> 
           <input type="file" name="userfile" size="20"  />   </td>   
     </tr>
     <tr>
        <td>
         <img style="height:100px;" src="<?php echo base_url() ?>uploads/<?php if(empty($company["c_logo"]))
{
    echo  "placeholder.png";
}else{  echo $company["c_logo"];} ?>"/>
         </td>
    </tr>
    <tr>
         <td><br/><input type="submit" name="submit" value="UPDATE" class="send" /></td>
    </tr>
</table>
           <?php echo form_close() ?>
    
    <?php echo form_open('data_entry/update_password')?>
       <br/>
<table style="width:100%;  padding:20px; border:thin solid #ECECEC ">
     <tr>
        <td colspan="2">   <h3>User Accounts</h3></td>
    </tr>
   
    <tr>
        <td><p>User Role</p></td>
         <td>
             <select name="role" class="input"> 
                    <option value="1">User</option>
                    <option value="2">Admin</option>                
            </select>
        </td>
        </tr>
    <tr>
        <td><p>Old Password</p></td>
            <td> <input type="password"  required name="old" class="input" /></td>
       </tr>
    <tr>
        <td><p>New Password</p></td>
          <td> <input type="password"   required name="new" class="input" /></td>
      </tr>
     <tr>
        <td><p>Confirm New Password</p></td>
          <td> <input type="password"   required name="confirm" class="input" />
      
         </td>
      </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Update" class="send" /></td>
    </tr> </table>
           <?php echo form_close() ?>  
    
    <div class="clear"></div>
    <br/>
     
    <table style="width:100%;  padding:20px; border:thin solid #ECECEC ">
     <tr>
        <td colspan="2">   <h3>Backup Database</h3></td>
    </tr>
        <tr>
            <td><a href="<?php echo base_url() ?>index.php/profile/backup">Backup Database</a></td>
        </tr>
      
    </table>
    
    
    <div class="clear"></div>
<?php
    }
            else{
                ?>
<br/>
<table style="width:100%">
    <tr>
        <td>
         <img style="height:100px;" src="<?php echo base_url() ?>uploads/<?php echo $company["c_logo"] ?>"/>
       </td>
        <td>
            <h3><?php echo $company["c_name"] ?><br/>
 <?php echo $company["c_address"] ?><br/>
 <?php echo $company["c_email"] ?><br/>
 <?php echo $company["c_phone"] ?><br/>
        </td>
    </tr>
</table>

     
<?php
            }
            ?>
<?php
        }
        ?>


      </div>