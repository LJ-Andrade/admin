<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar customer panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../../skin/images/customers/1.png" style="max-width:100%;" alt="User Image">
      </div>
      <!-- <div class="pull-left info">
        <h4><p>Fascination</p></h4>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div> -->
    </div>

    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MEN&Uacute; DEL SISTEMA</li>
      <?php
        $Menu   ->insertMenu($_SESSION['profile_id'],$_SESSION['admin_id']);
      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
