 
          <div class="categories">
              <h3><a href="<?php echo base_url() ?>index.php/data_entry/new_member">Add New Member</a>
          </div>
    <?php foreach ($cat as $cat): ?>
        <div class="categories">
             <h3><a href="<?php echo base_url() ?>index.php/data_entry/dmember/<?php echo $cat['m_id'] ?>/<?php echo $cat['m_cat'] ?>"/>
                 <?php echo $cat['m_name'] ?>  </a>
                <?php if($cat['m_cat'] == 1)
{
    ?>
   -  <a href="<?php echo base_url() ?>index.php/data_entry/new_branch/<?php echo $cat['m_id'] ?>">Add branch</a></h3>
 <?php
}    
    ?>
        
            <div class="sub">
            <?php
         $id = $cat['m_id'];
    $sql ="SELECT * FROM  efz_members WHERE parent_id = '".$id."' AND m_id != '".$id."' ORDER BY m_name";
   $event_query = $this->db->query($sql);
$asd = $event_query->num_rows();
       foreach ($event_query->result() as $event):?>   
           <div style="width:20%; float:left;">
                  <h5> <a href="<?php echo base_url() ?>index.php/data_entry/dmember/<?php echo $event->m_id ?>/<?php echo $cat['m_cat'] ?>">
               
 <?php echo $event->m_name?>
 
             </a></h5> </div>
                
   <?php endforeach ?> 
                <div style="clear:both"></div>
</div>
        </div>
    <?php endforeach ?>
     
</div>
   
</body>
</html>