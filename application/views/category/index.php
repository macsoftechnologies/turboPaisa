
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
                    <h4>Categories</h4>
                      <a href="#"  class="btn btn-primary pull-right" data-toggle="modal" data-target="#Modaldata" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Categories</a>
                  </div>
                  <div class="card-body">
                    <div class="" style="width: 100%;overflow-x: scroll;">
                      <table class="table table-striped" id="table-1" >
                        <thead>
                          <tr>
                            
                            <th class="text-center" width="15%">S.no</th>
                            <th class="text-center">Category</th>
                            <th class="text-center" width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($categories->num_rows() > 0) {
                            foreach ($categories->result() as $key => $cat) { ?>
                          <tr>
                              
                            <td class="text-center">
                                    <?php echo $key+1;?>
                            </td>
                            <td class="text-center"><?php echo $cat->category;?></td>
                           
                            <td class="text-center">
                              <a class="btn btn-primary btn-action" data-toggle="modal" data-target="#Modaldata<?php echo $cat->category_id?>" title="Edit"  href="#">
                                    <i class="fa fa-pencil"></i>
                                </a>
                               
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="return deleteItem();" href="<?=base_url();?>categories/delete/<?php echo $cat->category_id?>">
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


 <div class="modal fade" id="Modaldata">
              <div class="modal-dialog">
                <div class="modal-content photo-modal data-modal">
                
                  <div class="modal-header">
                    <h4 class="modal-title">Create Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                  </div>
                  
                  <div class="modal-body">
                    <div class="add-photo">
                       <form action="<?=base_url()?>categories/insert" role="form" id="userForm2" name="userForm" method="post" enctype="multipart/form-data" class="image-modal-form">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-12 col-xs-12" >
                              <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="category" class="form-control declaration" placeholder="Enter Category" id="category">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px;">
                              <input type="submit" class="btn btn-primary" value="Submit">
                              <!--  <a href="#" name="submit" class="edit-button declarationUpdate btn btn-primary"  >Submit</a> -->
                            </div>
                          </div>
                        </div>
                   </form>
                      <!-- <button type="submit" class="edit-button">submit</button> -->
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

          <?php if($categories->num_rows() > 0) {
                            foreach ($categories->result() as $key => $cat) { ?>
            <div class="modal fade" id="Modaldata<?php echo $cat->category_id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content photo-modal data-modal" >
                            
                              <div class="modal-header">
                                <h4 class="modal-title">Update Category</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                
                              </div>
                              
                              <div class="modal-body">
                                <div class="add-photo">
                                   <form action="<?=base_url()?>categories/update/<?php echo $cat->category_id;?>" role="form" id="userForm2" name="userForm" method="post" enctype="multipart/form-data" class="image-modal-form">
                                    <div class="col-md-12">
                                      <div class="row">
                                        <br>
                                        <div class="col-md-12 col-xs-12" >
                                          <div class="form-group">
                                            <label>Category</label>
                                              <input type="text" name="category" class="form-control declaration" placeholder="Enter Category" id="declaration" value="<?php echo $cat->category?>">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12" style="margin-top: 10px;">
                                          <input type="submit" class="btn btn-primary" value="Submit">
                                          <!--  <a href="#" name="submit" class="edit-button declarationUpdate btn btn-primary"  >Submit</a> -->
                                        </div>
                                      </div>
                                    </div>
                               </form>
                                  <!-- <button type="submit" class="edit-button">submit</button> -->
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div> 
                        <?php }
                        } ?> 

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
