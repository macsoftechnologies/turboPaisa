
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url();?>adminlogin"> <!-- <img alt="image" src="<?=base_url();?>assets1/logo.png" class="header-logo" / style="height: 70px; width: 248px; background-color: #fff;"> --><!--  <span
                class="logo-name" style="font-size: 27px;">Vysyaraju Jewellers</span> -->
            </a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
              <img alt="image" src="<?=base_url();?>assets/149071.png" style="height: 60px;">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name"><?php echo $this->session->userdata('admin_name');?></div>
              <div class="user-role">Administrator</div>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li <?php if($this->router->fetch_class()== "addashboard") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>addashboard"><i data-feather="monitor"></i><span>Dashboard</span></a></li>

            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="file"></i><span>Masters</span></a>
              <ul class="dropdown-menu">
                <li <?php if($this->router->fetch_class()== "categories") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>categories"><span style="color: #fff;">Categories</span></a></li>
                <li <?php if($this->router->fetch_class()== "goals") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>goals"><span style="color: #fff;">Goals</span></a></li>

                <li <?php if($this->router->fetch_class()== "settings") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>settings"><span style="color: #fff;">Refferal Settings</span></a></li>

                <li <?php if($this->router->fetch_class()== "locations") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>locations"><span style="color: #fff;">Locations</span></a></li>
              </ul>
            </li>

            <li <?php if($this->router->fetch_class()== "customers") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>customers"><i data-feather="users"></i><span>Users</span></a></li>

            <li <?php if($this->router->fetch_class()."-".$this->router->fetch_method() == "customers-payments") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>customers/payments"><i data-feather="credit-card"></i><span>Users Payments</span></a></li>

            <li <?php if($this->router->fetch_class()== "offers") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>offers"><i data-feather="circle"></i><span>Offers</span></a></li>

            <li <?php if($this->router->fetch_class()."-".$this->router->fetch_method() == "scartchcard-greencard") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>scartchcard/greencard"><i data-feather="credit-card"></i><span>Green Scratch Card</span></a></li>

            <li <?php if($this->router->fetch_class()== "scartchcard") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>scartchcard"><i data-feather="credit-card"></i><span>Scratch Card</span></a></li>

            <li <?php if($this->router->fetch_class()== "spin") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>spin"><i data-feather="settings"></i><span>Spin</span></a></li>

            <li <?php if($this->router->fetch_class()== "earngames") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>earngames"><i data-feather="circle"></i><span>Earn Games</span></a></li>

            <li <?php if($this->router->fetch_class()== "banner") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>banner"><i data-feather="circle"></i><span>Banners</span></a></li>
            
            

            <!-- <li <?php if($this->router->fetch_class()== "customers") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>customers"><i data-feather="users"></i><span>Customers</span></a></li>

            <li <?php if($this->router->fetch_class()== "branches") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>branches"><i data-feather="monitor"></i><span>Branches</span></a></li>

            <li <?php if($this->router->fetch_class()== "employee") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>employee"><i data-feather="user-plus"></i><span>Employees</span></a></li>
            <li <?php if($this->router->fetch_class()== "complaint") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>complaint"><i data-feather="file"></i><span>Complaint Registration</span></a></li>
            <li <?php if($this->router->fetch_class()== "walkin") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>walkin"><i data-feather="file"></i><span>Walk-In Complaint Registration</span></a></li> -->

           <!--  <li <?php if($this->router->fetch_class()== "branches") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>branches"><i data-feather="university"></i><span>Branches</span></a></li> -->
            <!-- <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>Warehouse Inventory</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="warehouseInventory.html">Chat</a></li>
                <li><a class="nav-link" href="warehouseentries.html">Portfolio</a></li>
                <li><a class="nav-link" href="datatables.html">Blog</a></li>
                <li><a class="nav-link" href="datatables.html">Calendar</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Administration</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="datatables.html">Inbox</a></li>
                <li><a class="nav-link" href="datatables.html">Compose</a></li>
                <li><a class="nav-link" href="datatables.html">read</a></li>
              </ul>
            </li> -->
            
          </ul>
        </aside>
      </div>