<br/>
<div class="church">
<?php echo form_open('data_entry/update_case/'.$case["c_s_id"] ) ?>
          <br/>
<table style="width:100%; margin:0 auto; padding:20px; border:thin solid #ECECEC ">
     <tr>
        <td>  <h3>Update <?php echo $case["c_s_desc"] ?> Details</h3></td>
    </tr>
    <tr>
        <td><p>Title</p></td>
        <td><p>Notes</p></td>
        <td><p>File Number</p></td>
        <td></td>
    </tr>
    <tr>
        <td> <input type="input"  value="<?php echo $case["c_s_desc"] ?>" required name="title" class="input" />
        <input type="hidden"  value="<?php echo $case["c_s_c_id"] ?>" required name="cid" class="input" />
        </td>
        <td> <textarea type="input"  value=""  required name="notes" class="input" ><?php echo $case["c_s_notes"] ?></textarea></td>
        <td> <input type="input"  value="<?php echo $case["c_s_file_number"] ?>"  required name="file" class="input" /></td>
         <td><input type="submit" name="submit" value="Update" class="send" /></td>
    </tr>    
</table>
           <?php echo form_close() ?>
    </div>