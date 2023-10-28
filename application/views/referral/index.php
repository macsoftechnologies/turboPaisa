
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
                    <h4>Referral Settings</h4>
                      <!-- <a href="<?=base_url();?>banner/create"  class="btn btn-primary pull-right" style="color:#fff;"><i class="fas fa-plus-circle"></i> New Banner</a> -->
                  </div>
                  <div class="card-body">
                    <div class="" style="width: 100%;overflow-x: scroll;">
                      <table class="table table-striped"  id="table-1" >
                        <thead>
                          <tr>
                            
                            <th class="text-center" width="15%">S.no</th>
                            <th>Title</th>
                            <th>Tagline</th>
                            <th>Amount</th>
                            <th>Image</th>
                            <th>hreflink </th>
                            <th>Description</th>
                            <th>Withdraw Limit</th>
                            <th class="text-center" width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($settings->num_rows() > 0) {
                            foreach ($settings->result() as $key => $set) { ?>
                          <tr>
                              
                            <td class="text-center">
                                    <i><?php echo $key+1;?></i>
                            </td>
                            <td><?php echo $set->referral_title;?></td>
                            <td><?php echo $set->referral_tagline;?>
                            </td>
                            <td><?php echo $set->referral_amount;?>
                            </td>
                            <td><img src="<?php echo $set->referral_banner;?>" height="50" width="50"></td>
                            <td><?php echo $set->referral_url;?></td>
                            <td><?php echo $set->referral_desc;?></td>
                            <td><?php echo $set->withdrawlimit;?></td>
                             <td class="text-center">
                              <a class="btn btn-primary btn-action" data-toggle="tooltip" title="Edit"  href="<?=base_url();?>settings/edit/<?php echo $set->referral_setting_id?>">
                                    <i class="fa fa-pencil"></i>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>



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

