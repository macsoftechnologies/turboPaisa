
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
                    <h4>Update Earn Game</h4>
                      <!-- <a data-toggle="modal" data-target="#Modaldata"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Complaint Registration</a> -->
                      <!-- <a href="<?=base_url();?>complaint/create">New Complaint Registration</a> -->
                  </div>
                  <div class="card-body">
              <form action="<?=base_url()?>earngames/update/<?php echo $earngames['earn_game_id'];?>" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Earn Game Title</label>
                      <input type="text" name="earn_game_title" id="name" class="form-control" placeholder="Enter Earn Game Title" value="<?php echo $earngames['earn_game_title'];?>"><?php echo form_error('earn_game_title'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Earn Game Button Title</label>
                      <input type="text" name="earn_game_button_title" id="name" class="form-control" placeholder="Enter Earn Game Button Title" value="<?php echo $earngames['earn_game_button_title'];?>"><?php echo form_error('earn_game_button_title'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Earn Game Price</label>
                      <input type="number" name="earn_game_amount" id="name" class="form-control" placeholder="Enter Earn Game Price" value="<?php echo $earngames['earn_game_amount'];?>"><?php echo form_error('earn_game_amount'); ?>
                    </div>
                  </div>

                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="brand">Earn Game Image</label>
                       <input type="file" name="earn_game_image" id="image" class="form-control" placeholder="Enter Image" value="<?php echo $earngames['earn_game_image'];?>">
                       <p style="color: red; font-size: 12px;">Please Upload Less than 200KB Images</p>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Earn Game Url</label>
                      <input type="text" name="earn_game_url" id="name" class="form-control" placeholder="Enter Url" value="<?php echo $earngames['earn_game_url'];?>"><?php echo form_error('earn_game_url'); ?>
                    </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Start Date</label>
                      <input type="date" name="earn_game_start_date" id="datepicker" class="form-control" placeholder="Enter Start Date" value="<?php echo $earngames['earn_game_start_date'];?>"><?php echo form_error('earn_game_start_date'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">End Date</label>
                      <input type="date" name="earn_game_end_date" id="todate" class="form-control" placeholder="Enter End date" value="<?php echo $earngames['earn_game_end_date'];?>"><?php echo form_error('earn_game_end_date'); ?>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Earn Game Description</label>
                      <textarea name="earn_game_desc" id="editor1" class="form-control" placeholder="Enter Description"><?php echo $earngames['earn_game_desc'];?></textarea><?php echo form_error('earn_game_desc'); ?>
                    </div>
                  </div>
                  
                   <!-- <td></td> -->
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Update">
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


