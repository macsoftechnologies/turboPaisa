
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
                    <h4>Create Banner</h4>
                      <!-- <a data-toggle="modal" data-target="#Modaldata"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Complaint Registration</a> -->
                      <!-- <a href="<?=base_url();?>complaint/create">New Complaint Registration</a> -->
                  </div>
                  <div class="card-body">
              <form action="<?=base_url()?>banner/insert" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
                <div class="form-row">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Select Type</label>
                      <select class="form-control" name="type" required>
                        <option value="">Select Type</option>
                        <option value="home">Home</option>
                        <option value="scratchcard">Scratch Card</option>
                        <option value="spinwheel">Spin Wheel</option>
                        <option value="earngames">Earn Games</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Banner Title</label>
                      <input type="text" name="banner_titile" id="name" class="form-control" placeholder="Enter Banner Title" value="<?php echo $this->input->post('banner_titile')?>"><?php echo form_error('banner_titile'); ?>
                    </div>
                  </div>

                  <!-- <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Priority</label>
                      <input type="number" name="banner_desc" id="name" class="form-control" placeholder="Enter Priority" value="<?php echo $this->input->post('banner_desc')?>"><?php echo form_error('banner_desc'); ?>
                    </div>
                  </div> -->

                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="brand"> Banner Image</label>
                       <input type="file" name="banner_image" id="banner_image" class="form-control" placeholder="Enter Image">
                       <p style="color: red; font-size: 12px;">Please Upload Less than 200KB Images</p>
                    </div>
                  </div>
                    <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">hreflink</label>
                      <input type="text" name="url" id="name" class="form-control" placeholder="Enter hreflink " value="<?php echo $this->input->post('url')?>"><?php echo form_error('url'); ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="banner_desc" id="editor1" class="form-control" placeholder="Enter Description"></textarea><?php echo form_error('priority'); ?>
                    </div>
                  </div>

                  

                  

                  
                   <!-- <td></td> -->
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Create">
                  </div>
                <!-- </div> -->
              </form>
             </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>



<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="<?=base_url()?>assets/bower_components/ckeditor/ckeditor.js"></script>



<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
            var baseurl = "<?php echo base_url();?>";
        </script>


