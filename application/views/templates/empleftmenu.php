
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url();?>emplogin"> <img alt="image" src="<?=base_url();?>assets/logo.jpg" class="header-logo" / style="height: 70px; width: 248px;"> <!-- <span
                class="logo-name">InTrack</span> -->
            </a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
              <img alt="image" src="http://localhost/serviceApp/assets1/img/logo-1.jpg" style="height: 60px;">
            </div>
            <div class="sidebar-user-details">
              <div class="user-name"><?php echo $this->session->userdata('employee_name');?></div>
              <div class="user-role">Employee</div>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li <?php if($this->router->fetch_class()== "dashboard") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>dashboard"><i data-feather="monitor"></i><span>Dashboard</span></a></li>
            
           <!--  <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i data-feather="file"></i><span>Master Files</span></a>
              <ul class="dropdown-menu">
                <li <?php if($this->router->fetch_class()== "serv") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>serv">Services</a></li>
                <li><a class="nav-link" href="<?=base_url();?>employeesdata">Employees Data</a></li>
                <li><a class="nav-link" href="<?=base_url();?>companies">Companies</a></li>
                <li><a class="nav-link" href="articles.html">Articles</a></li>
              </ul>
            </li>

            <li <?php if($this->router->fetch_class()== "customers") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>customers"><i data-feather="users"></i><span>Customers</span></a></li>

            <li <?php if($this->router->fetch_class()== "branches") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>branches"><i data-feather="monitor"></i><span>Branches</span></a></li>

            <li <?php if($this->router->fetch_class()== "employee") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>employee"><i data-feather="user-plus"></i><span>Employees</span></a></li>
            <li <?php if($this->router->fetch_class()== "complaint") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>complaint"><i data-feather="file"></i><span>Complaint Registration</span></a></li>
            <li <?php if($this->router->fetch_class()== "walkin") echo 'class="active"';?>><a class="nav-link" href="<?=base_url();?>walkin"><i data-feather="file"></i><span>Walk-In Complaint Registration</span></a></li>
 -->
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