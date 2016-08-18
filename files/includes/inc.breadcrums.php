<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $Head->getIcon()." ".$Head->getTitle(); ?>
    <small><?php echo $Head->getSubTitle(); ?></small>
  </h1>
  <ol class="breadcrumb">
    <?php $Menu -> insertBreadCrumbs(); ?>
  </ol>
</section>
