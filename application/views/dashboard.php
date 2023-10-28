
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                <a href="<?=base_url();?>orders/status/1" style="color: #fff;">  
                  <div class="card-content">
                    <h4 class="card-title">Order Placed</h4>
                    <span style="font-size: 35px; margin-left: 70%;"><?php echo count($orders);?></span>
                    <!-- <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <!-- <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                      <span class="text-nowrap">Since last month</span>
                    </p> -->
                  </div>
                </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                <a href="<?=base_url();?>customers" style="color: #fff;"> 
                  <div class="card-content">
                    <h4 class="card-title">Users</h4>
                    <span style="font-size: 35px; margin-left: 65%;"><?php echo count($customers);?></span>
                    <!-- <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <!-- <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                      <span class="text-nowrap">Since last month</span>
                    </p> -->
                  </div>
                </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                <a href="<?=base_url();?>products" style="color: #fff;"> 
                  <div class="card-content">
                    <h4 class="card-title">Products</h4>
                    <span style="font-size: 35px; margin-left: 65%;"><?php echo count($products);?></span>
                    <!-- <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                      <span class="text-nowrap">Since last month</span>
                    </p> -->
                  </div>
                </a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                <a href="<?=base_url();?>categories" style="color: #fff;">  
                  <div class="card-content">
                    <h4 class="card-title">Categories</h4>
                    <span style="font-size: 35px; margin-left: 70%;"><?php echo count($categories);?></span>
                    <!-- <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                      <span class="text-nowrap">Since last month</span>
                    </p> -->
                  </div>
                </a>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3">
                <a href="<?=base_url();?>subcategories" style="color: #fff;">  
                  <div class="card-content">
                    <h4 class="card-title">Sub Categories</h4>
                    <span style="font-size: 35px; margin-left: 70%;"><?php echo count($sub);?></span>
                    <!-- <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                      <span class="text-nowrap">Since last month</span>
                    </p> -->
                  </div>
                </a>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-purple-dark">
                <div class="card-statistic-3">
                <a href="<?=base_url();?>orders/status/2" style="color: #fff;">  
                  <div class="card-content">
                    <h4 class="card-title">Order Process</h4>
                    <span style="font-size: 35px; margin-left: 70%;"><?php echo count($process);?></span>
                    <!-- <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                      <span class="text-nowrap">Since last month</span>
                    </p> -->
                  </div>
                </a>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3">
                <a href="<?=base_url();?>orders/status/3" style="color: #fff;">  
                  <div class="card-content">
                    <h4 class="card-title">Dispatch Orders</h4>
                    <span style="font-size: 35px; margin-left: 70%;"><?php echo count($dispatch);?></span>
                    <!-- <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                      <span class="text-nowrap">Since last month</span>
                    </p> -->
                  </div>
                </a>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3">
                <a href="<?=base_url();?>orders/status/4" style="color: #fff;">  
                  <div class="card-content">
                    <h4 class="card-title">Delivered Orders</h4>
                    <span style="font-size: 35px; margin-left: 70%;"><?php echo count($delivered);?></span>
                    <!-- <div class="progress mt-1 mb-1" data-height="8">
                      <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0 text-sm">
                      <span class="mr-2"><i class="fa fa-arrow-up"></i> 10%</span>
                      <span class="text-nowrap">Since last month</span>
                    </p> -->
                  </div>
                </a>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Quantity of Items in</h4>
                    <select class="form-control">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                      </select>
                </div>
                <div class="card-body">
                  <div id="echart_graph_line" class="chartsh"></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Articles with Major</h4>
                    <select class="form-control">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                      </select>
                </div>
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                      <div id="echart_area_line" class="chartsh"></div>
                    </div>
                    <div data-tab-group="summary-tab" id="summary-text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          
        </section>
        
      </div>
