 
       <br/><br/>
        <div class="update">
   
            
              <?php echo form_open('data_entry/update_member') ?>
                   <h3>Update Member</h3>
                <select name="m_cat">
                    <option selected value="<?php echo $mem["c_id"]?>"><?php echo $mem["category"]?></option>
                <?php foreach ($category as $category): ?>
                    <option value="<?php echo $category["c_id"]?>"><?php echo $category["category"]?></option>
                <?php endforeach ?>
            </select><br/><br/>
                      <label for="title">Church/Organisation/Ministry Name</label><br />
            <input type="input" name="m_name" value="<?php echo $mem['m_name'] ?>" class="input" />
            <input type="hidden" name="m_id" value="<?php echo $mem['m_id'] ?>" class="input" />
                   <br/>
                   <br/>
               <label for="title">Address</label><br />
            <input type="input" name="m_address" value="<?php echo $mem['m_address'] ?>" class="input" />
                    <br/>
                   <br/>
               <label for="title">Town</label><br />
            <input type="input" name="m_town"  value="<?php echo $mem['m_town'] ?>"class="input" />
                    <br/>
                   <br/>
               <label for="title">Postal Address</label><br />
            <input type="input" name="m_p_address" value="<?php echo $mem['m_p_address'] ?>" class="input" />
                    <br/>
                   <br/>
               <label for="title">Number of Members</label><br />
            <input type="input" name="m_members" value="<?php echo $mem['m_members'] ?>" class="input" />
                    <br/>
                   <br/>
               <label for="title">Email Address</label><br />
            <input type="input" name="m_email" value="<?php echo $mem['m_email'] ?>" class="input" />
                    <br/>
                   <br/>
               <label for="title">Phone Number</label><br />
            <input type="input" name="m_phone" value="<?php echo $mem['m_phone'] ?>" class="input" />
                    <br/>
                   <br/>
               <label for="title">Website</label><br />
            
            <input type="input" name="m_www" value="<?php echo $mem['m_www'] ?>" class="input" />
            <input type="hidden" name="parent" value="<?php echo $mem['parent_id'] ?>" class="input" />
              
                <br/><br/>
                   <input type="submit" name="submit" value="Update" class="send" />
                   <?php echo form_close() ?>
               <a href="<?php echo base_url() ?>index.php/data_entry/delete_church/<?php echo $mem['m_id'] ?>">Delete Member & Pastors</a>
       	 
       
        
                <br/>
                <br/>
      </div>  
      <div class="update">
   
          <h3>Leaders</h3>
       	 
      
            <?php foreach ($past as $past): ?>
            
                <?php echo form_open('data_entry/update_pastor') ?>
             <input type="hidden" name="p_id" value="<?php echo $past['p_id'] ?>"  class="input" />
        <input type="hidden" name="m_id" value="<?php echo $mem['m_id'] ?>" class="input" />
          
           <select name="p_title">
                    <option selected value="<?php echo $past['p_title'] ?>"><?php echo $past['p_title'] ?></option>
                    <option  value="Bishop">Bishop</option>
                    <option  value="Pastor">Pastor</option>
                    <option  value="Apostle">Apostle</option>
                    <option  value="Rev">Rev</option>
                    <option  value="Mr">Mr</option>
                    <option  value="Mrs">Mrs</option>
                    <option  value="Dr">Dr</option>
          </select><br/><br/>
           <label for="title">Pastor Name</label><br />
            <input type="input" name="p_name" value="<?php echo $past['p_name'] ?> "  class="input" />
                    <br/>
                   <br/> 
          <label for="title">Ordination</label><br />
            <input type="input" name="p_ordination"  value="<?php echo $past['p_email'] ?>" class="input" />
                    <br/>
                   <br/>
          <label for="title">Email Address</label><br />
            <input type="input" name="p_email"  value="<?php echo $past['p_email'] ?>" class="input" />
                    <br/>
                   <br/>
          <label for="title">Cell Phone</label><br />
            <input type="input" name="p_cell" value="<?php echo $past['p_cell'] ?>"  class="input" />
                    <br/>
                   <br/>
          <label for="title">Postal Address</label><br />
            <input type="input" name="p_postal" value="<?php echo $past['p_postal'] ?>"  class="input" />
                    <br/>
                   <br/>
          <label for="title">Physical Address</label><br />
            <input type="input" name="p_physical"  value="<?php echo $past['p_physical'] ?>" class="input" />
                    <br/>
                   <br/>
              
                  <input type="submit" name="submit" value="Update Pastor" class="send" /> 
          <a href="<?php echo base_url() ?>index.php/data_entry/delete_pastor/<?php echo $past['p_id'] ?>">Delete Pastor</a>
         
    <?php echo form_close() ?>
  
             <?php endforeach ?>  
        
      </div>
       <div class="update">
   <h3>Add new Pastor</h3>
              <?php echo form_open('data_entry/add_pastor') ?>
           <input type="hidden" name="p_m_id" value="<?php echo $mem['m_id'] ?>" class="input" />
            
           <select name="p_title">
                    <option selected value="Pastor">Pastor</option>
                    <option  value="Bishop">Bishop</option>
                    <option  value="Apostle">Apostle</option>
                    <option  value="Rev">Rev</option>
                    <option  value="Mr">Mr</option>
                    <option  value="Mrs">Mrs</option>
                    <option  value="Dr">Dr</option>
          </select><br/><br/>
               <label for="title">Pastor Name</label><br />
            <input type="input" name="p_name"   class="input" />
                    <br/>
                   <br/> 
          <label for="title">Ordination</label><br />
            <input type="input" name="p_ordination"   class="input" />
                    <br/>
                   <br/>
          <label for="title">Email Address</label><br />
            <input type="input" name="p_email"   class="input" />
                    <br/>
                   <br/>
          <label for="title">Cell Phone</label><br />
            <input type="input" name="p_cell"   class="input" />
                    <br/>
                   <br/>
          <label for="title">Postal Address</label><br />
            <input type="input" name="p_postal"   class="input" />
                    <br/>
                   <br/>
          <label for="title">Physical Address</label><br />
            <input type="input" name="p_physical"   class="input" />
                    <br/>
                   <br/>
           <input type="submit" name="submit" value="Add Pastor" class="send" />
    <?php echo form_close() ?>
        </div>
 