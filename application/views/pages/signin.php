 
<DOCTYPE! html>
<head>
  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />

   <title>Client Fund Controller</title>
</head>
<body>
  <div class="contain">
      <table style="width:90%; margin:0 auto; height:100%">
            <tr>
                <td style="text-align:center">
                    <img style="width:300px" src="<?php echo base_url()?>uploads/CFC3.png"/>
                   
                    <h3>Select your Role</h3>
                    <?php echo form_open('verifylogin'); ?>
  
                    <select class="option" name="role">
                      <option value="1" selected >View</option>
                      <option value="2">Admin</option>
                    </select>               
                    <h3>Password</h3>
                    <input type="password" name="password" class="text" id="pin"/>
<br/><br/>
                    <input type="submit" class="button" value="Login"/>
                    <?php echo form_close()?>
                </td>
                <td>
                    
                </td>
          </tr>
      </table>ss
     
       
    </div>
</body>

   
            
 