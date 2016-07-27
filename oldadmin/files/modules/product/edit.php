<?php
  include("../../includes/inc.main.php");

  $ID = $_GET['id'];
  $Edit  = new Product($ID);
  $Data  = $Edit->getData();

  $Title = "Modificar producto '".$Data['title']."'";

  $Head->setTitle("Modificar Producto");
  $Head->setHead();
?>
<body>
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
    <?php echo insertElement("hidden","action",'update'); ?>
    <?php echo insertElement("hidden","id",$ID); ?>
    <div class="container additemdiv animated fadeIn">
      <div class="col-sm-12 form-box formitems">
        <div class="additemtit">
          <div class="maintitle"><h4 class="maintitletxt"><?php echo $Title; ?></h4></div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group animated bounceInLeft">
            <?php echo insertElement('text','title',$Data['title'],'form-first-name form-controlusers','validateEmpty="Ingrese un nombre de producto." placeholder="Nombre del Producto"'); ?>
          </div>
          <div class="col-md-6 form-group animated bounceInRight">
            <?php echo insertElement('text','code',$Data['code'],'form-first-name form-controlusers','placeholder="Código"'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group animated bounceInLeft">
            <?php echo insertElement('text','model',$Data['model'],'form-first-name form-controlusers','placeholder="Modelo"'); ?>
          </div>
          <div class="col-md-6 form-group animated bounceInRight">
            <?php echo insertElement('text','size',$Data['size'],'form-first-name form-controlusers','placeholder="Medida"'); ?>
          </div>
        </div>

        <!-- Price - Img - Status -->
        <div class="row priceimgstatus">
          <div class="col-md-6">
            <div class="col-md-12 form-group animated bounceInLeft">
              <?php echo insertElement('text','price',$Data['price'],'form-first-name form-controlusers','placeholder="Precio"'); ?>
            </div>
            <div class="col-md-12 animated bounceInRight productstatus">
              <div class="itemstatustit"><span>Publicación</span></div>
              <?php $Checked = $Data['status']=='A'? 'checked="checked"':''; ?>
              <?php echo insertElement('checkbox','status','','centered',' data-on-text="Activa" data-off-text="Pausada"  data-label-width="auto" data-size="large" '.$Checked); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-12 additemtxt"><span>Agregar imágen</span></div>
            <div class="col-md-12"><img src="../../../skin/images/body/pictures/mas.jpg" class="img-responsive additemimg" alt=""></div>
          </div>
        </div>
        <!-- /Price - Img - Status -->
        <!-- Character counter -->
        <div class="row-fluid col-md-12 form-group animated bounceInDown itemdesctextarea">
          <form class="form-group">
            <?php echo insertElement('textarea','description',$Data['description'],'form-controlitems textareaitems text-center','placeholder="Descripción" rows="4" maxlength="150"'); ?>
            <div class="remchar"><p> Caracteres restantes: </p></div>
            <div class="indicator-wrapper">
              <div class="indicator"><span class="current-length">150</span></div>
            </div>
          </form>
        </div>
        <!-- /Character counter -->
        <!--  Generic Img and AddImg  -->
        <div id="itemimg" class="itemimgmain">
          <div class="row">
            <div class="col-xs-6 col-md-3 addimgdiv">
              <div id="file"><img src="skin/users/mas.jpg" class="img-responsive thumbimgadd animated fadeInUp thumbimg"></div>
              <!-- <input type="file" name="file" /> -->
            </div>
            <div class="col-xs-6 col-md-3 addimgdiv">
              <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
            </div>
            <div class="col-xs-6 col-md-3 addimgdiv">
              <img src="skin/images/products/cod1.jpg" class="img-responsive thumbimg animated fadeInUp">
            </div>
            <div class="col-xs-6 col-md-3 addimgdiv">
              <img src="skin/images/products/cod2.jpg" class="img-responsive thumbimg animated fadeInUp">
            </div>
            </div>
            <div class="row">
            <div class="col-xs-6 col-md-3 addimgdiv">
              <img src="skin/images/products/cod3.jpg" class="img-responsive thumbimg animated fadeInUp">
            </div>
            <div class="col-xs-6 col-md-3 addimgdiv">
              <img src="skin/images/products/cod4.jpg" class="img-responsive thumbimg animated fadeInUp">
            </div>
            <div class="col-xs-6 col-md-3 addimgdiv">
              <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
            </div>
            <div class="col-md-3 addimgdiv">
              <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  Add Img & Done Button Div  -->
    <div class="container centrarbtn animated fadeInUp donediv">
      <div class="form-group">
        <a href="#" class="btn mainbtn" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Modificar Producto</a>
      </div>
    </div>
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
