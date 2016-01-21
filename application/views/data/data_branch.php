 
       <div style="width:600px; margin:0 auto;"> 
                   <?php echo form_open('data_entry/add_branch') ?>
            <input type="hidden" name="m_cat" value="1" class="input" />
            
                   <h3>Add Branch</h3>
                 
                      <label for="title">Church/Organisation/Ministry Name</label><br />
            <input type="input" name="m_name"   class="input" />
            <input type="hidden" name="m_id" value="<?php echo $mem['m_id']?>" class="input" />
                   <br/>
                   <br/>
               <label for="title">Address</label><br />
            <input type="input" name="m_address" class="input" />
                    <br/>
                   <br/>
               <label for="title">Town</label><br />
            <input type="input" name="m_town" class="input" />
                    <br/>
                   <br/>
               <label for="title">Postal Address</label><br />
            <input type="input" name="m_p_address" class="input" />
                    <br/>
                   <br/>
               <label for="title">Number of Members</label><br />
            <input type="input" name="m_members" class="input" />
                    <br/>
                   <br/>
               <label for="title">Email Address</label><br />
            <input type="input" name="m_email" class="input" />
                    <br/>
                   <br/>
               <label for="title">Phone Number</label><br />
            <input type="input" name="m_phone" class="input" />
                    <br/>
                   <br/>
               <label for="title">Website</label><br />
            <input type="input" name="m_www" class="input" />
              
                   <br>
                   <input type="submit" name="submit" value="Add Branch" class="send" />
                   <?php echo form_close() ?>
                
         </div>
        