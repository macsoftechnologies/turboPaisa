
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
                    <h4>Update Scratch card</h4>
                      <!-- <a data-toggle="modal" data-target="#Modaldata"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Complaint Registration</a> -->
                      <!-- <a href="<?=base_url();?>complaint/create">New Complaint Registration</a> -->
                  </div>
                  <div class="card-body">
          		<form action="<?=base_url()?>scartchcard/update/<?php echo $scartchcard['scratch_id'];?>" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
          			<div class="form-row">
          				<div class="col-md-4">
          					<div class="form-group">
          						<label for="name">Scratch Title</label>
          						<input type="text" name="scratch_title" id="name" class="form-control" placeholder="Enter Scratch Title" value="<?php echo $scartchcard['scratch_title'];?>"><?php echo form_error('scratch_title'); ?>
          					</div>
          				</div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Scratch Button Title</label>
                      <input type="text" name="scratch_button_title" id="name" class="form-control" placeholder="Enter Scratch Button Title" value="<?php echo $scartchcard['scratch_button_title'];?>"><?php echo form_error('scratch_button_title'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Select Offer</label>
                      <select class="form-control" name="offer_id" required>
                        <option value="<?php echo $scartchcard['offer_id'];?>"><?php echo $scartchcard['offer_title'];?></option>
                        <?php if($offers->num_rows() > 0) {
                          foreach ($offers->result() as $key => $off) { ?>
                            <option value="<?php echo $off->offer_id;?>"><?php echo $off->offer_title;?></option>
                            <?php }
                          } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Scratch Price</label>
                      <input type="number" name="scratch_amount" id="name" class="form-control" placeholder="Enter Scratch Price" value="<?php echo $scartchcard['scratch_amount'];?>"><?php echo form_error('scratch_amount'); ?>
                    </div>
                  </div>

                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="brand">Scratch Image</label>
                       <input type="file" name="scratch_image" id="image" class="form-control" placeholder="Enter Image" value="<?php echo $scartchcard['scratch_image'];?>">
                       <p style="color: red; font-size: 12px;">Please Upload Less than 200KB Images</p>
                    </div>
                  </div>
                  <div id="output"></div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Scratch Color</label>
                      <select class="form-control chosen-select" name="scratch_color">
                        <option value="<?php echo $scartchcard['scratch_color'];?>"><?php echo $scartchcard['scratch_color'];?></option>
                        <option value="Green">Green</option>
                        <option value="Orange">Orange</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Blue">Blue</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Scratch Url</label>
                      <input type="text" name="scratch_url" id="name" class="form-control" placeholder="Enter Url" value="<?php echo $scartchcard['scratch_url'];?>"><?php echo form_error('scratch_url'); ?>
                    </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Start Date</label>
                      <input type="date" name="start_date" id="datepicker" class="form-control" placeholder="Enter Start Date" value="<?php echo $scartchcard['start_date'];?>"><?php echo form_error('start_date'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">End Date</label>
                      <input type="date" name="end_date" id="todate" class="form-control" placeholder="Enter End Date" value="<?php echo $scartchcard['end_date'];?>"><?php echo form_error('end_date'); ?>
                    </div>
                  </div>

                   <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Priority</label>
                      <input type="number" name="priority" id="name" class="form-control" placeholder="Enter Priority" value="<?php echo $scartchcard['priority'];?>"><?php echo form_error('priority'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Type</label>
                      <select class="form-control chosen-select" name="type">
                        <option value="<?php echo $scartchcard['type'];?>"><?php echo $scartchcard['type'];?></option>
                        <option value="Cashback">Cashback</option>
                        <option value="Vocher/Discount">Vocher/Discount</option>
                        
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Recoring</label><br>
                      <label><input type="radio" class="input-radio off" name="recoring"checked> Yes</label>
            <label><input type="radio" class="input-radio on"  name="recoring"> No</label>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Green Description</label>
                      <textarea name="scratch_desc" id="editor1" class="form-control" placeholder="Enter Orange Description"><?php echo $scartchcard['scratch_desc'];?></textarea><?php echo form_error('scratch_desc'); ?>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Orange Description</label>
                      <textarea name="orange_desc" id="editor1" class="form-control" placeholder="Enter Orange Description"><?php echo $scartchcard['orange_desc'];?></textarea><?php echo form_error('orange_desc'); ?>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Yellow Description</label>
                      <textarea name="yellow_desc" id="editor1" class="form-control" placeholder="Enter Yellow Description"><?php echo $scartchcard['yellow_desc'];?></textarea><?php echo form_error('yellow_desc'); ?>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Blue Description</label>
                      <textarea name="blue_desc" id="editor1" class="form-control" placeholder="Enter Blue Description"><?php echo $scartchcard['blue_desc'];?></textarea><?php echo form_error('blue_desc'); ?>
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

<link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

<script>
  document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script>         


