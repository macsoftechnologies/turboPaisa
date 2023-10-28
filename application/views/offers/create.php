
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

  .ui.fluid.dropdown {
    display: block;
    width: 100%;
    height: 100%;
    min-width: 0;
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
                    <h4>Create Offer</h4>
                      <!-- <a data-toggle="modal" data-target="#Modaldata"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Complaint Registration</a> -->
                      <!-- <a href="<?=base_url();?>complaint/create">New Complaint Registration</a> -->
                  </div>
                  <div class="card-body">
          		<form action="<?=base_url()?>offers/insert" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
          			<div class="form-row">
          				<div class="col-md-4">
          					<div class="form-group">
          						<label for="name">Offer Title</label>
          						<input type="text" name="offer_title" id="name" class="form-control" placeholder="Enter Offer Title" value="<?php echo $this->input->post('offer_title')?>"><?php echo form_error('offer_title'); ?>
          					</div>
          				</div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Offer Side Title</label>
                      <input type="text" name="offer_side_title" id="name" class="form-control" placeholder="Enter Offer Side Title" value="<?php echo $this->input->post('offer_side_title')?>"><?php echo form_error('offer_side_title'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Offer Button Title</label>
                      <input type="text" name="offer_button_title" id="name" class="form-control" placeholder="Enter Offer Button Title" value="<?php echo $this->input->post('offer_button_title')?>"><?php echo form_error('offer_button_title'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Offer Price</label>
                      <input type="number" name="offer_amount" id="name" class="form-control" placeholder="Enter Offer Title" value="<?php echo $this->input->post('offer_amount')?>"><?php echo form_error('offer_amount'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Category</label>
                      <select class="form-control" name="category_id" required>
                        <option value="">Select</option>
                        <?php if($categories->num_rows() > 0 ) {
                          foreach ($categories->result() as $key => $cat) { ?>
                            <option value="<?php echo $cat->category_id;?>"><?php echo $cat->category;?></option>
                          <?php }
                        } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Goal</label>
                      <select class="form-control" name="goal_id" required>
                        <option value="">Select</option>
                        <?php if($goals->num_rows() > 0 ) {
                          foreach ($goals->result() as $key => $gg) { ?>
                            <option value="<?php echo $gg->goal_id;?>"><?php echo $gg->goal;?> - <?php echo $gg->value;?></option>
                          <?php }
                        } ?>
                      </select>
                    </div>
                  </div>

                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="brand">Offer Banner Image</label>
                       <input type="file" name="offer_banner_image" id="image" class="form-control" placeholder="Enter Image">
                       <p style="color: red; font-size: 12px;">Please Upload Less than 200KB Images</p>
                    </div>
                  </div>

                  


                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Start Date</label>
                      <input type="date" name="start_date" class="form-control" placeholder="Enter Url" value="<?php echo $this->input->post('start_date')?>"><?php echo form_error('start_date'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">End Date</label>
                      <input type="date" name="end_date" class="form-control" placeholder="Enter Url" value="<?php echo $this->input->post('end_date')?>"><?php echo form_error('end_date'); ?>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Priority</label>
                      <input type="number" name="priority1" class="form-control" placeholder="Enter Priority" value="<?php echo $this->input->post('priority1')?>"><?php echo form_error('priority1'); ?>
                    </div>
                  </div>
                  <div id="output"></div>
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="name">State</label>
                      <select class="form-control chosen-select category" name="state[]" multiple="multiple" required>
                        <option value="">Select States</option>
                        <?php if($locations->num_rows() > 0 ) {
                          foreach ($locations->result() as $key => $loc) { ?>
                            <option value="<?php echo $loc->state;?>"><?php echo $loc->state;?></option>
                          <?php }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <br>
                      <a href="#" class="btn btn-xs btn-primary" id="getstate">Get</a>
                    </div>
                  </div>
                <div id="cities" class="col-md-12" style="display:none;">
                  <div class="row">
                  <div class="col-md-10" >
                    <div class="form-group">
                      <label for="name">City</label>
                      <select name="city[]"  multiple="" class="form-control subcategory label ui selection fluid dropdown" id="at_biz_dir-subcategory" style="height: 100%; width: 100%;">
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="form-group">
                      <br>
                      <a href="#" class="btn btn-xs btn-primary" id="getcities">Get</a>
                    </div>
                  </div>
                </div>
                </div>
                
                  <div class="col-md-12" id="pincodesdata" style="display:none;">
                    <div class="form-group">
                      <label for="name">Pincode</label>
                      <select class="form-control label ui selection fluid dropdown" multiple="" name="pincode[]" id="at_biz_dir-pincode">
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Display on tasks</label><br>
                      <label><input type="radio" class="input-radio off" name="display_on_tasks"checked> Yes</label>
            <label><input type="radio" class="input-radio on"  name="display_on_tasks"> No</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Recurring</label><br>
                      <label><input type="radio" class="input-radio off" name="recurring"checked> Yes</label>
                      <label><input type="radio" class="input-radio on"  name="recurring"> No</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Minimum offers avail to display</label>
                      <input type="number" name="min_offers_avail_to_display" id="name" class="form-control" placeholder="Minimum offers avail to display" value="<?php echo $this->input->post('min_offers_avail_to_display')?>"><?php echo form_error('min_offers_avail_to_display'); ?>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name">Referral Url</label>
                      <input type="text" name="offer_payble_event" id="name" class="form-control" placeholder="Enter Url" value="<?php echo $this->input->post('offer_payble_event')?>" required><?php echo form_error('offer_payble_event'); ?>
                    </div>
                  </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label style="font-size:20px;"><b>Most Used URL Tokens</b></label><br>
                    <p style="font-size:16px;">{user_id} {offer_id} {gaid} {source}</p>
                  </div>
                </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Offer Description</label>
                      <textarea name="offer_desc" id="editor1" class="form-control" placeholder="Enter Description"></textarea><?php echo form_error('offer_desc'); ?>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Terms and Conditions</label>
                      <textarea name="terms_and_conditions" id="editor1" class="form-control" placeholder="Enter Terms and Cconditons"></textarea><?php echo form_error('terms_and_conditions'); ?>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="page-content page-container" id="page-content">
                       <div class="padding">
                           <div class="row container d-flex justify-content-center">
                               <div class="col-lg-12 grid-margin stretch-card">
                                   <div class="card">
                                       <div class="card-body">
                                           <h4 class="card-title text-center">Number Of Levels</h4>
                                           <hr>
                                           <div class="table-responsive">
                                               <table id="faqs" class="table table-hover">
                                                   <thead>
                                                       <tr>
                                                           <th>Task Title</th>
                                                           <th>Task Price</th>
                                                           <th>Description</th>
                                                           <th>Priority</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr>
                                                           <td> <input type="text" class="form-control" name="task_name[]" placeholder="Enter Task Name..."></td>
                                                           <td><input type="text" class="form-control" name="task_price[]" placeholder="Enter Task Price..." value="0"></td>
                                                           <td><textarea class="form-control" name="description[]" placeholder="Enter Description"></textarea></td>
                                                           <td><input type="text" class="form-control" name="priority[]" placeholder="Enter Priority..." value="0"></td>
                                                           <td class="mt-10"><a class="badge badge-danger" style="color:#fff;"><i class="fa fa-trash"></i> Delete</a></td>
                                                       </tr>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript">
            var baseurl = "<?php echo base_url();?>";
        </script>
<script type="text/javascript">
  var faqs_row = 0;
function addfaqs() {
html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><input type="text" class="form-control" name="task_name[]" placeholder="Enter Task Name..."></td>';
    html += '<td><input type="text" class="form-control" name="task_price[]" placeholder="Enter Task Price..." value="0"></td>';
    html += '<td><textarea class="form-control" name="description[]" placeholder="Enter Description"></textarea></td>';
    html += '<td><input type="text" class="form-control" name="priority[]" placeholder="Enter Priority..." value="0"></td>';
    html += '<td class="mt-10"><a class="badge badge-danger" style="color: #fff;" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</a></td>';

    html += '</tr>';

$('#faqs tbody').append(html);

faqs_row++;
}
</script> 

<link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

<script>
  document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script> 


<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var baseurl = "<?php echo base_url();?>";
    // $('.category').change(function() {
      $("#getstate").click(function(){
        $('#at_biz_dir-subcategory').empty()
        var msg = '';
        var url = baseurl + 'offers/getStates';
        var cat_id = $(this).val();
        var stateid = $('.category').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                state: stateid
            },
            dataType: 'json',
            success: function(res) {
              $('#cities').show();
                msg += '<option value="">Select City</option>';
                $.each(res['cities'], function(k, v) {
                    msg += '<option value="' + v.city + '">' + v.city +
                        '</option>';
                });
                $('#at_biz_dir-subcategory').append(msg);
            }
        });
    });
    $('#getcities').click(function() {
        $('#at_biz_dir-pincode').empty()
        var msg = '';
        var url = baseurl + 'offers/getpincodes';
        var location_id = $(this).val();
        var stateid = $('#at_biz_dir-subcategory').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                city: stateid
            },
            dataType: 'json',
            success: function(res) {
              $('#pincodesdata').show();
                msg += '<option value="">Select Pincode</option>';
                $.each(res['mandals'], function(k, v) {
                    msg += '<option value="' + v.pincode + '">' + v
                        .pincode + '</option>';
                });
                $('#at_biz_dir-pincode').append(msg);
            }
        });
    });
});
</script> 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<script type="text/javascript">
  $('.label.ui.dropdown')
  .dropdown();

$('.no.label.ui.dropdown')
  .dropdown({
  useLabels: false
});

$('.ui.button').on('click', function () {
  $('.ui.dropdown')
    .dropdown('restore defaults')
})
</script>     


