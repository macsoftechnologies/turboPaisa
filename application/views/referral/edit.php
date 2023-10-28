
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
                    <h4>Update Referral Settings</h4>
                      <!-- <a data-toggle="modal" data-target="#Modaldata"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Complaint Registration</a> -->
                      <!-- <a href="<?=base_url();?>complaint/create">New Complaint Registration</a> -->
                  </div>
                  <div class="card-body">
          		<form action="<?=base_url()?>settings/update/<?php echo $settings['referral_setting_id'];?>" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
          			<div class="form-row">
          				<div class="col-md-4">
          					<div class="form-group">
          						<label for="name">Referral Title</label>
          						<input type="text" name="referral_title" id="name" class="form-control" placeholder="Enter Referral Title" value="<?php echo $settings['referral_title'];?>"><?php echo form_error('referral_title'); ?>
          					</div>
          				</div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Referral Tagline</label>
                      <input type="text" name="referral_tagline" id="name" class="form-control" placeholder="Enter referral_tagline" value="<?php echo $settings['referral_tagline'];?>"><?php echo form_error('priority'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Referral Amount</label>
                      <input type="number" name="referral_amount" id="name" class="form-control" placeholder="Enter Referral Amount" value="<?php echo $settings['referral_amount'];?>"><?php echo form_error('referral_amount'); ?>
                    </div>
                  </div>

                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="brand"> Banner Image</label>
                       <input type="file" name="referral_banner" id="referral_banner" class="form-control" placeholder="Enter Image" value="<?php echo $settings['referral_banner'];?>">
                       <p style="color: red; font-size: 12px;">Please Upload Less than 200KB Images</p>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Withdrawlimit Amount</label>
                      <input type="number" name="withdrawlimit" id="name" class="form-control" placeholder="Enter Withdraw Limit Amount" value="<?php echo $settings['withdrawlimit'];?>"><?php echo form_error('withdrawlimit'); ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">hreflink </label>
                      <input type="text" name="referral_url" id="name" class="form-control" placeholder="Enter hreflink " value="<?php echo $settings['referral_url'];?>"><?php echo form_error('referral_url'); ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Referral Description</label>
                      
                      <textarea name="referral_desc" class="form-control" placeholder="Enter Description"><?php echo $settings['referral_desc'];?></textarea><?php echo form_error('referral_desc'); ?>
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


