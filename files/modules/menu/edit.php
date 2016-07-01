<?php
    include("../../includes/inc.main.php");

    $ID   = $_GET['id'];
    $Menu = new Menu($ID);
    $Data = $Menu->GetData();
    $Link = $Data['link']=='#'? '' : $Data['link'];

    $Head->setTitle("Modificar Menú ".$Data['title']);
    $Head->setHead();

    $Status       = array();
    $Status['A']  = "Activo";
    $Status['I']  = "Inactivo";
    $Status['O']  = "Oculto";
?>
<?php include '../../includes/inc.modal.icon.php'; ?>
<body>
  <div id="wrapper">
    <?php include '../../includes/inc.subTop.php'; ?>
    <?php echo insertElement("hidden","action","update"); ?>
    <?php echo insertElement("hidden","id",$ID); ?>
    <div class="container-fluid pageWrapper">
      <!-- WindowHead -->
      <div class="row windowHead">
        <div class="col-md-6 col-xs-12">
          <h3><i class="fa fa-plus-square" aria-hidden="true"></i> <?php echo "Editar Menú '".$Data['title']."'"; ?></h3>
        </div>
        <div class="col-md-6 col-xs-12 switchDiv switchHead">
          <span class="userstatustit">Men&uacute; P&uacute;blico: </span>
          <?php $Checked = $Data['public']=='Y'? 'checked="checked"':''; ?>
          <input type="checkbox" class="centered" name="public" id="public" data-on-text="Si" data-off-text="No" data-size="mini" data-label-width="auto" <?php echo $Checked ?>>
        </div>
      </div><!-- /WindowHead -->
      <div class="container additemdiv animated fadeIn">
        <div class="col-sm-12 form-box formitems">
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement("text","title",$Data['title'],"form-first-name formNewItem",'placeholder="Título del Menú" validateEmpty="El título es obligatorio." tabindex="1"'); ?>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
              <?php echo insertElement("text","link",$Link,"form-first-name formNewItem",'placeholder="Link" tabindex="2"'); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <div class="form-group">
                <?php echo insertElement('select','parent',$Data['parent_id'],'formNewItem','tabindex="3"',$DB->fetchAssoc('menu','menu_id,title',"","title"),'0','Men&uacute; Principal'); ?>
              </div>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
              <div class="form-group">
                <?php echo insertElement('select','status',$Data['status'],'formNewItem','tabindex="4"',$Status,'','','A'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group animated bounceInLeft">
              <?php echo insertElement('text','position',$Data['position'],'form-first-name formNewItem','tabindex="5" placeholder="Posici&oacute;n"'); ?>
            </div>
            <div class="col-md-6 form-group animated bounceInRight">
              <button type="button" class="btn mainbtn" data-toggle="modal" data-target="#myModal">Agregar &Iacute;cono</button>

              <?php //echo insertElement('text','icon',$Data['icon'],'form-first-name formNewItem','tabindex="6" placeholder="&Iacute;cono"'); ?>
            </div>
          </div>

        </div>
      </div>
      <!--  Add Img & Done Button Div  -->
      <div class="container centrarbtn animated fadeInUp donediv">
        <div class="form-group">
          <!-- <li id="chooseimg" class="animated fadeIn btn additembtn"><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></li>-->
          <a href="#" class="btn mainbtn btnsave" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Modificar Menú</a>
        </div>
      </div>
    </div>
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
