<DOCTYPE! html>
<head>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
  <script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
      <link rel="stylesheet" href="<?php echo base_url();?>css/themes_smoothness_jquery-ui.css">
 
  <script src="<?php echo base_url();?>js/jquery.com_ui_1.11.4_jquery-ui.js"></script>
      <script>
  $(function() {
    $("#datepicker").datepicker(); 
 $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
      
      
      $( "#datepicker2" ).datepicker();
      $( "#datepicker2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  });
  </script>
  
   <title>Client Fund Controller</title>
</head>
<body>
  <div class="contain">
        <div class="header">  
            <table style="width:100%; padding:10px 20px 0 10px;">
                <tr>
                    <td>
                    <h3><a href="<?php echo base_url()?>index.php">Client Fund Controller</a></h3>
                   </td>
                      <td style="text-align:right">
                    <h3>      <a href="<?php echo base_url() ?>index.php/profile"><?php  echo $role; ?></a> -  <a href="<?php echo base_url() ?>index.php/pages/logout">Logout</a></h3>
                    </td>
                </tr>
            </table>
        </div>
      <div class="crumb">
          <table style="width:100%;">
            <tr>
                <td><h3><?php echo $this->breadcrumbs->show(); ?></h3></td>
              <td style="text-align:right">
                 <h3> Filter : <a href="<?php echo base_url() ?>index.php/pages/filter/1">Open Ledgers</a> -
                          <a href="<?php echo base_url() ?>index.php/pages/filter/0">Closed Ledgers</a>  -
                          <a href="<?php echo base_url() ?>index.php/pages/pending/">Owing Ledgers</a>  -
                       <a href="<?php echo base_url() ?>index.php/search">Date Search</a> 
                 
                        </h3>
                </td>
              </tr>
          </table>
           
      </div>
