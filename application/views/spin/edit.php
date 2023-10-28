
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
                    <h4>Update Spin</h4>
                      <!-- <a data-toggle="modal" data-target="#Modaldata"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Complaint Registration</a> -->
                      <!-- <a href="<?=base_url();?>complaint/create">New Complaint Registration</a> -->
                  </div>
                  <div class="card-body">
          		<form action="<?=base_url()?>spin/update/<?php echo $spin['spin_id'];?>" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
          			<div class="form-row">
          				<div class="col-md-4">
          					<div class="form-group">
          						<label for="name">Spin Title</label>
          						<input type="text" name="spin_title" id="name" class="form-control" placeholder="Enter Spin Title" value="<?php echo $spin['spin_title'];?>"><?php echo form_error('spin_title'); ?>
          					</div>
          				</div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Select Offer</label>
                      <select class="form-control" name="offer_id" required>
                        <option value="<?php echo $spin['offer_id'];?>"><?php echo $spin['offer_title'];?></option>
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
                      <label for="name">Spin Price</label>
                      <input type="number" name="spin_amount" id="name" class="form-control" placeholder="Enter Spin Price" value="<?php echo $spin['spin_amount'];?>"><?php echo form_error('spin_amount'); ?>
                    </div>
                  </div>

                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="brand">spin Image</label>
                       <input type="file" name="spin_image" id="image" class="form-control" placeholder="Enter Image" value="<?php echo $spin['spin_image'];?>">
                       <p style="color: red; font-size: 12px;">Please Upload Less than 200KB Images</p>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="brand">Spin Add Image</label>
                       <input type="file" name="spin_add_image" id="image" class="form-control" placeholder="Enter Image" value="<?php echo $spin['spin_add_image'];?>">
                       <p style="color: red; font-size: 12px;">Please Upload Less than 200KB Images</p>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Spin Url</label>
                      <input type="text" name="spin_url" id="name" class="form-control" placeholder="Enter Url" value="<?php echo $spin['spin_url'];?>" required><?php echo form_error('spin_url'); ?>
                    </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Start Date</label>
                      <input type="date" name="start_date" id="datepicker" class="form-control" placeholder="Enter Start Date" value="<?php echo $spin['start_date'];?>"><?php echo form_error('start_date'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">End Date</label>
                      <input type="date" name="end_date" id="todate" class="form-control" placeholder="Enter End date" value="<?php echo $spin['end_date'];?>"><?php echo form_error('end_date'); ?>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Spin Description</label>
                      <textarea name="spin_desc" id="editor1" class="form-control" placeholder="Enter Description"><?php echo $spin['spin_desc'];?></textarea><?php echo form_error('spin_desc'); ?>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="page-content page-container" id="page-content">
                       <div class="padding">
                           <div class="row container d-flex justify-content-center">
                               <div class="col-lg-12 grid-margin stretch-card">
                                   <div class="card">
                                       <div class="card-body">
                                           <h4 class="card-title text-center">Number Of Amounts</h4>
                                           <hr>
                                           <div class="table-responsive">
                                               <table id="faqs" class="table table-hover">
                                                   <thead>
                                                       <tr>
                                                           <th>Amount</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                    <?php if($amount->num_rows() > 0) {
                                                      foreach ($amount->result() as $key => $am) { ?>
                                                       <tr id="rowdelete<?php echo $am->spin_amount_id;?>">
                                                           <td> 
                                                            <!-- <input type="hidden" class="form-control" name="spin_amount_id[]" placeholder="Enter Amount..." value="<?php echo $am->spin_amount_id;?>"> -->
                                                            <input type="number" class="form-control" name="amount[]" placeholder="Enter Amount..." value="<?php echo $am->amount;?>"></td>
                                                           <td class="mt-10"><a class="badge badge-danger" style="color:#fff;" onclick="$('#rowdelete<?php echo $am->spin_amount_id;?>').remove();"><i class="fa fa-trash"></i> Delete</a></td>
                                                       </tr>
                                                     <?php } } ?>
                                                   </tbody>
                                               </table>
                                           </div>
                                           <div class="text-center"><a onclick="addfaqs();" class="badge badge-success" style="color:#fff;"><i class="fa fa-plus"></i> ADD NEW</a></div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
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

<script type="text/javascript">
  var faqs_row = 0;
function addfaqs() {
html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><input type="number" class="form-control" name="amount[]" placeholder="Enter Amount..." value="0"></td>';
    html += '<td class="mt-10"><a class="badge badge-danger" style="color: #fff;" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</a></td>';

    html += '</tr>';

$('#faqs tbody').append(html);

faqs_row++;
}
</script>

