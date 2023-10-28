
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
                    <h4>Banner</h4>
                      <a href="<?=base_url();?>banner/create"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Banner</a>
                  </div>
                  <div class="card-body">
                    <form id="sort-it" action="<?=base_url()?>banner/testscoursesortorder" role="form" id="userForm" name="userForm" method="post" enctype="multipart/form-data">
                    <div class="" style="width: 100%;overflow-x: scroll;">
                      <table class="table table-striped"  id="table-1" >
                        <thead>
                          <tr>
                            
                            <th class="text-center" width="15%">S.no</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Priority</th>
                            <th>Image</th>
                            <th>hreflink </th>
                            <th>Description</th>
                            <th class="text-center" width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($banners->num_rows() > 0) {
                            foreach ($banners->result() as $key => $of) { ?>
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
                            <td><?php echo $of->type;?></td>
                            <td><?php echo $of->banner_titile;?></td>
                            <td><?php echo $of->priority;?>
                            <input class="banner_id" type="hidden" name="banner_id[]" value="<?php echo $of->banner_id;?>" />
                              <input class="sortID" type="hidden" name="sortID[]" value="<?php echo $of->priority;?>" />
                            </td>
                            <td><img src="<?php echo $of->banner_image;?>" height="50" width="50"></td>
                            <td><?php echo $of->url;?></td>
                            <td><?php echo $of->banner_desc;?></td>
                             <td class="text-center">
                              <a class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit"  href="<?=base_url();?>banner/edit/<?php echo $of->banner_id?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                               
                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" onclick="return deleteItem();" href="<?=base_url();?>banner/delete/<?php echo $of->banner_id?>">
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
                            
                              
                          </tr>
                           -->
                         
                        </tbody>

                      </table>
                                    <!--  <div class="col-md-12">
       <input type="submit"  name="submit" class="btn btn-lg btn-warning pull-left" value="UPDATE" style="margin-right: 50px; margin-bottom: 20px; padding: 5px;">
    </div> -->
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
                    <h4 class="modal-title">Create Banner</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                  </div>
                  
                  <div class="modal-body">
                    <div class="add-photo">
                       <form action="<?=base_url()?>banner/insert" role="form" id="userForm2" name="userForm" method="post" enctype="multipart/form-data" class="image-modal-form">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-12 col-xs-12" >
                              <div class="form-group">
                                <label>Banner name</label>
                                <input type="text" name="banner_titile" class="form-control declaration" placeholder="Enter Offer Name" id="declaration">
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12" >
                              <div class="form-group">
                                <!-- <input type="text" name="declaration" class="form-control" placeholder="Enter Declaration" > -->
                                <label>banner desc</label>
                                 <input type="text" name="banner_desc" class="form-control declaration" placeholder="Enter Offer Price" id="declaration">
                               <!--  <textarea class="form-control" name="about_me" size="100" placeholder="About Me"></textarea> -->
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

          <?php if($banners->num_rows() > 0) {
                            foreach ($banners->result() as $key => $of) { ?>
            <div class="modal fade" id="Modaldata<?php echo $of->banner_id;?>">
                          <div class="modal-dialog">
                            <div class="modal-content photo-modal data-modal" >
                            
                              <div class="modal-header">
                                <h4 class="modal-title">Update banner</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                
                              </div>
                              
                              <div class="modal-body">
                                <div class="add-photo">
                                   <form action="<?=base_url()?>banners/update/<?php echo $of->banner_id;?>" role="form" id="userForm2" name="userForm" method="post" enctype="multipart/form-data" class="image-modal-form">
                                    <div class="col-md-12">
                                      <div class="row">
                                        <br>
                                        <div class="col-md-12 col-xs-12" >
                                          <div class="form-group">
                                            <label>banner Name</label>
                                              <input type="text" name="banner_titile" class="form-control declaration" placeholder="Enter banner Name" id="declaration" value="<?php echo $of->banner_titile?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">
                                          <div class="form-group">
                                            <!-- <input type="text" name="declaration" class="form-control" placeholder="Enter Declaration" > -->
                                            <label>banner desc</label>
                                            <input type="text" name="banner_desc" class="form-control declaration" placeholder="Enter banner desc" id="declaration" value="<?php echo $of->banner_desc;?>">
                                           <!--  <textarea class="form-control" name="about_me" size="100" placeholder="About Me"></textarea> -->
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


<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

  <script type="text/javascript">
      var sortArray = []; //Create variable to store sorting array

//Sortable rows, helps maintain column widths a little better
var fixHelperModified = function(e, tr) {
  var $originals = tr.children();
  var $helper = tr.clone();
  $helper.children().each(function(index)
                          {
                            $(this).width($originals.eq(index).width());
                          });
  return $helper;
};

function updateSort(table) {
  $(table + ' tbody tr').each(function(){
    var row_index = $(this).index() + 1; //Start with 1, not zero
    var projectID = $(this).find('.projectID').val();
    $(this).find('span').text( row_index );
    $(this).find('.sortID').val( row_index );

    sortArray[projectID] = $(this).find('.sortID').val();
  });
  return sortArray;
}

$(function(){
  
  //Initiate jQuery UI `sortable` widget on parent of sortable elements
  $("#sortableTable tbody").sortable({
    helper: fixHelperModified, //Add helper that maintains nicer column widths
    update: function( event, ui ) { //Triggers once sorting has finished and DOM position has changed
      updateSort('#sortableTable');
      
      //ajax POST here (https://api.jquery.com/jQuery.post/)
      $.post(
        "script.php", //PHP script to POST array to
        { project: sortArray }
      )
      .always(function(){        
        //Display successful save message
        $(".successfully-saved").css("display", "block").delay(2000).fadeOut(400);
      });
      
    }
  })
  .disableSelection(); //Necessary to keep table row content from being selectable

});
  </script>

