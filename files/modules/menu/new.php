<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Menú");
    $Head->setHead();

    $Status       = array();
    $Status['A']  = "Activo";
    $Status['I']  = "Inactivo";
    $Status['O']  = "Oculto";
?>
  <?php include '../../includes/inc.modal.icon.php'; ?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.subtop.php'); ?>
    <div class="container-fluid pageWrapper">
      <?php echo insertElement("hidden","action","insert"); ?>

      <!-- WindowHead -->
      <div class="row windowHead">
        <div class="col-md-6 col-xs-12">
          <h3><i class="fa fa-bars" aria-hidden="true"></i> Complete el formulario para agregar un men&uacute;</h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <span class="userstatustit">Men&uacute; P&uacute;blico: </span>
          <?php echo insertElement('checkbox','public','','centered','tabindex="7" data-on-text="Si" data-off-text="No" data-size="mini" data-label-width="auto" checked'); ?>
        </div>
      </div><!-- /WindowHead -->
      <div class="container animated fadeIn additemdiv">
        <div class="col-sm-12 form-box formitems">
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement("text","title",'',"form-first-name formNewItem",'placeholder="Título del Menú" validateEmpty="El título es obligatorio." tabindex="1"'); ?>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
              <?php echo insertElement("text","link",'',"form-first-name formNewItem",'placeholder="Link" tabindex="2"'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <div class="form-group">
                <?php echo insertElement('select','parent','','formNewItem','tabindex="3"',$DB->fetchAssoc('menu','menu_id,title',"","title"),'0','Men&uacute; Principal'); ?>
              </div>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
              <div class="form-group">
                <?php echo insertElement('select','status','','formNewItem','tabindex="4"',$Status,'','','A'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('text','position','','form-first-name formNewItem','tabindex="5" placeholder="Posici&oacute;n"'); ?>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
              <button type="button" class="btn mainbtn" data-toggle="modal" data-target="#myModal">Agregar &Iacute;cono</button>
              <?php // echo insertElement('text','icon','','form-first-name formNewItem','tabindex="6" placeholder="&Iacute;cono"'); ?>
            </div>

          </div>
        </div>
      </div>
      <!--  Add Img & Done Button Div  -->
      <div class="container centrarbtn animated fadeInUp donediv">
        <div class="form-group">
          <!-- <li id="chooseimg" class="animated fadeIn btn additembtn"><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></li>-->
          <a href="#" class="btn mainbtn btnsave" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Menú</a>
        </div>
      </div>
    </div><!-- /#container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
