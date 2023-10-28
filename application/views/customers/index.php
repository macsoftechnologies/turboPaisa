
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

  #pagination>a {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #666;
    text-decoration: none;
    border: 1px solid #EEE;
    background-color: #FFF;
    box-shadow: 0px 0px 10px 0px #eee
}

#pagination>strong {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: white;
    text-decoration: none;
    background-color: #016db5;
    border: 1px solid #ddd;
    box-shadow: 0px 0px 10px 0px #eee

}

.modal-backdrop.show {
    opacity: -0.5;
}
</style>
<?php 
 // function file_get_contents($ip)
 //    {
 //        $ch = curl_init('http://ipinfo.io/' . $ip);
 //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //        $json = curl_exec($ch);
 //        curl_close($ch);
 //        // Decode JSON response
 //        $ipWhoIsResponse = json_decode($json, true);
 //        // Country code output, field "country_code"
 //        return $ipWhoIsResponse;
 //    }
?>

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
                    <h4>Customers</h4>
                    <!-- <a href="<?=base_url()?>customers/excelgenerateXls" class="btn btn-success btn-xs pull-right"  data-toggle="tooltip" data-placement="left" title="Export in excel" style="margin-left: 8px;"><i class="fa fa-files-o"></i>Export in excel</a> -->
                  </div>
                  <div class="card-body">
                    <div class="" style="width: 100%;overflow-x: scroll;">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center" width="15%">S.no</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Bank Details</th>
                            <th>Location</th>
                            <th>Lifetime Earned</th>
                            <th>Amount Withdraw</th>
                            <th>Current Balance</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (count($usersdata) > 0){
                            for ($i=0; $i < count($usersdata); $i++) {  ?>
                          <tr>
                            <td class="text-center"><?php echo $i+1;?></td>
                            <td><?php echo $usersdata[$i]['name'];?></td>
                            <td><?php echo $usersdata[$i]['mobile'];?></td>
                            <td><?php echo $usersdata[$i]['email'];?></td>
                            <td> 
                              <?php 
                            $beneficiary = $this->db->query("SELECT * FROM beneficiaries WHERE user_id = '".$usersdata[$i]['user_id']."'; ")->row_array();
                            ?>
                            <?php if($beneficiary == '') {?>
                            <?php } else { ?>

                              <?php if($beneficiary == '') {?>
                            <?php }else { ?>
                              <p><b>Bank Name : </b><?php echo $beneficiary['bank_name'];?></p>
                            <?php } ?>
                            
                            <?php if($beneficiary == '') {?>
                            <?php }else { ?>
                             <p><b>Account Number : </b><?php echo $beneficiary['account_number'];?></p>
                            <?php } ?>
                            <?php if($beneficiary == '') {?>
                            <?php }else { ?>
                              <p><b>IFSC Code : </b><?php echo $beneficiary['ifsc_code'];?></p>
                            <?php } ?>
                            <?php if($beneficiary == '') {?>
                            <?php }else { ?>
                              <p><b>UPI Id : </b><?php echo $beneficiary['upi_id'];?></p>
                            <?php } ?>
                               <!-- <a data-toggle="modal" data-target="#Modaldata<?php echo $i+1;?>"  class="btn btn-primary pull-right" style="color:#fff;">Bank Details</a> -->
                            <?php } ?>
                             
                            

<!-- 
 <div class="modal fade" id="Modaldata<?php echo $i+1;?>" style="margin-top: 90px;">
              <div class="modal-dialog">
                <div class="modal-content photo-modal data-modal">
                
                  <div class="modal-header">
                    <h4 class="modal-title">Bank Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
                    
                  </div>
                  
                  <div class="modal-body">
                    <div class="add-photo">
                       
                            <?php if($beneficiary == '') {?>
                            <?php }else { ?>
                              <p><b>Bank Name : </b><?php echo $beneficiary['bank_name'];?></p>
                            <?php } ?>
                            
                            <?php if($beneficiary == '') {?>
                            <?php }else { ?>
                             <p><b>Account Number : </b><?php echo $beneficiary['account_number'];?></p>
                            <?php } ?>
                            <?php if($beneficiary == '') {?>
                            <?php }else { ?>
                              <p><b>IFSC Code : </b><?php echo $beneficiary['ifsc_code'];?></p>
                            <?php } ?>
                            <?php if($beneficiary == '') {?>
                            <?php }else { ?>
                              <p><b>UPI Id : </b><?php echo $beneficiary['upi_id'];?></p>
                            <?php } ?>

                    </div>
                  </div>
                  
                </div>
              </div>
            </div> -->
                            </td>
                            <td>
                              <!-- <?php echo $usersdata[$i]['state'];?><br><?php echo $usersdata[$i]['city'];?><br><?php echo $usersdata[$i]['pincode'];?> -->
                            </td>
                            <td>
                              <?php 
                            $offers = $this->db->query("SELECT offer_log.user_id, offers.offer_amount FROM offer_log INNER JOIN offers ON offer_log.offer_id=offers.offer_id WHERE offer_log.user_id = '".$usersdata[$i]['user_id']."'; ");
                            ?>
                        <?php 
                        $offerprice = 0;
                        if($offers->num_rows() > 0) {
                          foreach ($offers->result() as $key => $of) { 

                          $offerprice = $of->offer_amount+$offerprice;
                          }
                        } ?>
                        <?php 
                        $scratchcard = $this->db->query("SELECT * FROM `user_scratch` WHERE user_id = '".$usersdata[$i]['user_id']."'");
                        ?>
                         <?php 
                        $scratchcardprice = 0;
                        if($scratchcard->num_rows() > 0) {
                          foreach ($scratchcard->result() as $key => $sc) { 

                          $scratchcardprice = $sc->amount+$scratchcardprice;
                          }
                        } ?>
                         <?php 
                        $spins = $this->db->query("SELECT * FROM `user_spin` WHERE user_id = '".$usersdata[$i]['user_id']."'");
                        ?>
                         <?php 
                        $spinprice = 0;
                        if($spins->num_rows() > 0) {
                          foreach ($spins->result() as $key => $sp) { 

                          $spinprice = $sp->amount+$spinprice;
                          }
                        } ?>
                        <?php 
                        $referral = $this->db->query("SELECT * FROM `referral_log` WHERE referral_id = '".$usersdata[$i]['user_unique_id']."'");
                        ?>
                        <?php 
                        $referralprice = 0;
                        if($referral->num_rows() > 0) {
                          foreach ($referral->result() as $key => $ref) { 

                          $referralprice = $ref->referral_amount+$referralprice;
                          }
                        } ?>
                        <?php echo number_format($offerprice+$scratchcardprice+$spinprice+$referralprice, 2);?>
                            </td>
                            <td>

                              <?php 
                        $withdraw = $this->db->query("SELECT * FROM `transfers` WHERE user_id = '".$usersdata[$i]['user_id']."'");
                        ?>
                        <?php 
                        $withdrawprice = 0;
                        if($withdraw->num_rows() > 0) {
                          foreach ($withdraw->result() as $key => $wit) { 

                          $withdrawprice = $wit->amount+$withdrawprice;
                          }
                        } ?>

                        <?php echo number_format($withdrawprice, 2);?>
                              
                            </td>
                            <td>
                             <?php $price = $offerprice+$scratchcardprice+$spinprice+$referralprice;
                             $withdrawsdf = $withdrawprice;?>
                             <?php echo number_format($price-$withdrawsdf, 2);?>
                            </td>
                            <td>
                              <?php if($usersdata[$i]['status'] == 'Y') {?>
                                <a href="<?=base_url()?>customers/statsinactive/<?php echo $usersdata[$i]['user_id'];?>" data-toggle="tooltip" data-placement="top" title="Inactive" onclick="return statusInActiveItem();" class="btn btn-success btn-action mr-1"><i class="fa fa-thumbs-up"></i></a>
                                <?php }else { ?>
                                  <a href="<?=base_url()?>customers/statusactive/<?php echo $usersdata[$i]['user_id'];?>" data-toggle="tooltip" data-placement="top" title="Active" onclick="return StatusActiveItem();" class="btn btn-warning btn-action mr-1"><i class="fa fa-thumbs-down"></i></a>
                                <?php } ?>
                              <a href="<?=base_url()?>customers/delete/<?php echo $usersdata[$i]['user_id'];?>" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return deleteItem();" class="btn btn-danger btn-action mr-1"><i class="fa fa-trash"></i></a></td>
                          </tr>
                          <?php }
                        } ?>
                        </tbody>
                      </table>
                      <!-- <div id='pagination' class="pull-right"></div> -->
                    </div>
                  </div>

                </div>
              </div>
            </div>
            
          </div>
        </section>
      </div>
    </div>
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
            var baseurl = "<?php echo base_url();?>";
        </script>

    <script type='text/javascript'>
$(document).ready(function() {
    createPagination(0);
    $('#pagination').on('click','a',function(e){
        e.preventDefault(); 
        var pageNum = $(this).attr('data-ci-pagination-page');
        createPagination(pageNum);
    });
    function createPagination(pageNum){
        $.ajax({
            url: '<?=base_url()?>Products/loadData/'+pageNum,
            type: 'get',
            dataType: 'json',
            success: function(responseData){
                $('#pagination').html(responseData.pagination);
                paginationData(responseData.empData);
            }
        });
    }
    function paginationData(data) {
        $('#employeeList tbody').empty();
        for(emp in data){
            var empRow = "<tr>";
            var count = parseFloat(emp)+parseFloat(1);
            var date = new Date(data[emp].created_at);
            empRow += "<td><span class='btn btn-primary btn-xs'>"+ count +"</span></td>";


            
            empRow += "<td>"+ data[emp].name +"</td>";
            empRow += "<td>"+ data[emp].mobile +"</td>";
            empRow += "<td>"+ data[emp].email +"</td>";
            empRow += "<td>"+ data[emp].pincode +"</td>";
            empRow += "<td><a href='<?=base_url()?>customers/delete/"+ data[emp].user_id +"' data-toggle='tooltip' data-placement='top' title='Delete' onclick='return deleteItem();' class='btn btn-danger btn-action mr-1'><i class='fa fa-trash'></i></a></td>";
            empRow += "</tr>";
            $('#employeeList tbody').append(empRow);                    
        }
    }
});
</script>

<script type="text/javascript">
    function deleteItem() {
    if (confirm("Are you sure you want to remove ?")) {
        return true;
    }
    return false;
}
</script>

<script type="text/javascript">
    function statusInActiveItem() {
    if (confirm("Are you sure you want to inactive ?")) {
        return true;
    }
    return false;
}
</script>

<script type="text/javascript">
    function StatusActiveItem() {
    if (confirm("Are you sure you want to active ?")) {
        return true;
    }
    return false;
}
</script>

<script type="text/javascript">
  $(".close").click(function(){
  $(".modal").hide();
});

</script>
