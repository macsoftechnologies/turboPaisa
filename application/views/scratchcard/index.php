
<style type="text/css">
/*@media (max-width: 200px) {
  .data-modal {
    height: 400px;
  }
}*/

@media (max-width: 200px) {
  .data-modal {
    height: 400px;
  }
  }
</style>

<div class="main-content">
      <?php if($this->session->flashdata('success_msg')){   
      echo "<div class='alert alert-success'>".$this->session->flashdata('success_msg')."</div>";  
    }?>

    <?php if($this->session->flashdata('error_msg')){   
      echo "<div class='alert alert-danger'>".$this->session->flashdata('error_msg')."</div>";  
    }?>
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Scratch Card</h4>
                      <a href="<?=base_url();?>scartchcard/create"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Scratch Card</a>
                  </div>
                  <div class="card-body">
                    <div class="" style="width: 100%;overflow-x: scroll;">
                      <table class="table table-striped" id="table-1" >
                        <thead>
                          <tr>
                            
                            <th class="text-center" width="15%">S.no</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th class="text-center" width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($scartchcard->num_rows() > 0) {
                            foreach ($scartchcard->result() as $key => $scs) { ?>
                          <tr>
                              
                            <td class="text-center">
                             <!--  <label>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="">
                                <span class="custom-switch-indicator"></span>
                              </label> -->
                              <!-- <a class="btn btn-action bg-blue mr-1" data-toggle="tooltip" title="Edit"> -->
                                    <i><?php echo $key+1;?></i>
                                <!-- </a> --> 
                            </td>
                            <td><?php echo $scs->scratch_title;?></td>
                            <td><?php echo $scs->scratch_code;?></td>
                            <td><?php echo $scs->scratch_amount;?></td>
                            <td>
                              <img src="<?php echo $scs->scratch_image;?>" height="50" width="50"></td>
                            <td><?php echo $scs->scratch_desc;?></td>
                            <td class="text-center">
                              <a class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit"  href="<?=base_url();?>scartchcard/edit/<?php echo $scs->scratch_id?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                               
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="return deleteItem();" href="<?=base_url();?>scartchcard/delete/<?php echo $scs->scratch_id?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            
                              
                          </tr>

                          
                        <?php }
                      } ?>
                          <!-- <tr>
                              <td class="text-center">
                                <a class="btn btn-action bg-purple mr-1" data-toggle="tooltip" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a> 
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')">
                                    <i class="fas fa-trash"></i>
                                </a>
                              </td>
                            <td class="text-center">
                              <label>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="">
                                <span class="custom-switch-indicator"></span>
                              </label>
                            </td>
                            <td>Redesign homepage</td>
                            <td>2018-04-10</td>
                            
                              
                          </tr> -->
                          
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>


<script type="text/javascript">
    function deleteItem() {
    if (confirm("Are you sure you want to remove ?")) {
        return true;
    }
    return false;
}
</script>

<script type="text/javascript">
    function activeItem() {
    if (confirm("Are you sure you want to Inactive ?")) {
        return true;
    }
    return false;
}
</script>

<script type="text/javascript">
    function inactiveItem() {
    if (confirm("Are you sure you want to Active ?")) {
        return true;
    }
    return false;
}
</script>
