
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
                    <h4>Assign Scratch card</h4>
                      <!-- <a data-toggle="modal" data-target="#Modaldata"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Complaint Registration</a> -->
                      <!-- <a href="<?=base_url();?>complaint/create">New Complaint Registration</a> -->
                  </div>
                  <div class="card-body">
              <form action="<?=base_url()?>scartchcard/usersassign" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
                <div class="form-row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Select Scratch Card</label>
                      <select class="form-control" name="scratch_id" required>
                        <option value="">Select Scratch Card</option>
                        
                        <?php if($greenscartchcard->num_rows() > 0) {
                          foreach ($greenscartchcard->result() as $key => $off) { ?>
                            <option value="<?php echo $off->scratch_id;?>"><?php echo $off->scratch_title;?></option>
                            <?php }
                          } ?>
                      </select>
                    </div>
                  </div>
                  <div id="output"></div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="name">Select User</label>
                      <select class="form-control chosen-select" name="user_id[]" multiple="multiple">
                        <option value="0">All</option>
                        <?php if($users->num_rows() > 0) {
                          foreach ($users->result() as $key => $us) { ?>
                            <option value="<?php echo $us->user_id;?>"><?php echo $us->name;?> - <?php echo $us->mobile;?></option>
                            <?php }
                          } ?>
                      </select>
                    </div>
                  </div>

                  

                  

                  
                   <!-- <td></td> -->
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Assign">
                  </div>
                <!-- </div> -->
              </form>
             </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>


 
<br>
<br>

        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Scratch Card</h4>
                    <a href="<?=base_url();?>scartchcard/greencreate"  class="btn btn-success pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Green Scratch Card</a>
                  </div>
                  <div class="card-body">
                    <div class="" style="width: 100%;overflow-x: scroll;">
                      <table class="table table-striped" >
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
                          <?php if($greenscartchcard->num_rows() > 0) {
                            foreach ($greenscartchcard->result() as $key => $scs) { ?>
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

        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Assign Scratch Card Users</h4>
                  </div>
                  <div class="card-body">
                    <div class="" style="width: 100%;overflow-x: scroll;">
                      <table class="table table-striped" id="table-1" >
                        <thead>
                          <tr>
                            
                            <th class="text-center" width="15%">S.no</th>
                            <th>Username</th>
                            <th>Mobile Number</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th class="text-center" width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($assignusers->num_rows() > 0) {
                            foreach ($assignusers->result() as $key => $scs) { ?>
                          <tr>
                              
                            <td class="text-center">
                                    <i><?php echo $key+1;?></i>
                            </td>
                            <td><?php echo $scs->name;?></td>
                            <td><?php echo $scs->mobile;?></td>
                            <td><?php echo $scs->scratch_title;?></td>
                            <td><?php echo $scs->scratch_code;?></td>
                            <td><?php echo $scs->scratch_amount;?></td>
                            <td>
                              <img src="<?php echo $scs->scratch_image;?>" height="50" width="50"></td>
                            <td><?php echo $scs->scratch_desc;?></td>
                            <td class="text-center">
                              <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="return deleteItem();" href="<?=base_url();?>scartchcard/assigndelete/<?php echo $scs->assign_id?>">
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



<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="<?=base_url()?>assets/bower_components/ckeditor/ckeditor.js"></script>



<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
            var baseurl = "<?php echo base_url();?>";
        </script>

<link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

<script>
  document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script>
