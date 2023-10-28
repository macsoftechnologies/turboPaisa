<section>
	<div class="container">
		<h2><a href="javascript:window.history.back();" class="btn btn-primary btn-xs pull-left" data-toggle="tooltip" data-placement="top" title="Back" style="margin-right: 5px;"><i class="fa fa-arrow-left"></i></a>Upload Profile</h2>
		<div class="box box-primary">
            <form action="<?=base_url()?>dashboard/uploadprofile/<?php echo $admin['admin_id'];?>" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
              	<div class="box-body">
	              	<div class="col-md-6">
	              		<div class="form-group">
	                  		<label for="photo">Profile</label>
	                  		<input type="file" class="form-control"  placeholder="Enter Photo" name="photo">
	                	</div>
	               	</div>
				<div class="col-md-12">
                <button type="submit" class="btn btn-primary">Upload Profile</button>
              </div>
              </div>
            </form>
          </div>
      </div>
</section>