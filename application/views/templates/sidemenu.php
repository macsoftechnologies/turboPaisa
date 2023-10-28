<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('adminName'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Dashboard -->
        <li <?php if($this->router->fetch_class()== "addashboard") echo 'class="active"';?>><a href="<?=base_url()?>addashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
