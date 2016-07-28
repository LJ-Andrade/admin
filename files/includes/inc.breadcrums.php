<!-- Breadcrums  -->
<!-- <div class="col-md-6 col-sm-7 col-xs-12 breadCrumTitle">
  <span class="breadCrums"><a href="../main/main.php"><i class="fa fa-home"></i><a></span><?php //$Menu -> insertBreadCrumbs(); ?>
</div> -->
<!-- /Breadcrums  -->


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $Head->getTitle(); ?>
    <small><?php echo $Head->getSubTitle(); ?></small>
  </h1>
  <ol class="breadcrumb">
    <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li> -->
    <?php $Menu -> insertBreadCrumbs(); ?>
  </ol>
</section>
