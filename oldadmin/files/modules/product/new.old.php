<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Producto");
    $Head->setHead();
?>
<body>
  <div id="wrapper">
    <?php echo insertElement("hidden","action",'insert'); ?>
    <?php include '../../includes/inc.subTop.php'; ?>
    <div class="container-fluid pageWrapper">

      <!-- New Item Window -->
      <!-- WindowHead -->
      <div class="row windowHead animated fadeInDown">
        <div class="col-md-7 col-xs-12">
          <h3>Complete el formulario para agregar un producto</h3>
        </div>
        <div class="col-md-5 col-xs-12 switchDiv switchHead">
          <span>Estado Inicial: </span>
          <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
        </div>
      </div><!-- /WindowHead -->
      <div class="container addItemDiv animated zoomIn">
        Hola
        <div class="row col-sm-12 form-box">
          <!-- Inputs -->
          <div id="newInputs" class="animated fadeIn" >
            <div class="row"><!-- Title & Code -->
              <div class="col-md-6 form-group ">
                <input id="" name="user" class="form-first-name formNewItem" placeholder="T&iacute;tulo" type="text">
              </div>
              <div class="col-md-6 form-group">
                <input id="" name="user" class="form-first-name formNewItem" placeholder="C&oacute;digo" type="text">
              </div>
            </div>
            <div class="row"><!-- Composition & Price -->
              <div class="col-md-6 form-group">
                <input id="" name="user" class="form-first-name formNewItem" placeholder="Composici&oacute;n" type="text">
              </div>
              <div class="col-md-6 form-group">
                <input id="" name="user" class="form-first-name formNewItem" placeholder="Precio" type="text">
              </div>
            </div>
            <div class="row"><!-- Sizes & Colors -->
              <div class="col-md-6 form-group">
                <div class="addItemNoformTit">
                  <span>Talles</span>
                </div>
                <div class="form-group addItemSizes">
                  <ul>
                    <li><input id="sizeXS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXS"><span>XS</span></li>
                    <li><input id="sizeS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeS"><span>S</span></li>
                    <li><input id="sizeM" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeM"><span>M</span></li>
                    <li><input id="sizeL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeL"><span>L</span></li>
                    <li><input id="sizeXL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXL"><span>XL</span></li>
                    <li><input id="sizeXXL" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXXL"><span>XXL</span></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="addItemNoformTit">
                  <span>Colores</span>
                  <!-- Colors Modal Trigger -->
                  <div class="helpModalTrigger adminColors"><span data-toggle="modal" data-target="#colorsModal" >Galer&iacute;a (M&aacute;s usados)</i></span></div>
                  <!-- /Colors Modal Trigger-->
                </div>
                <div class="circles circlesAddItem">
                  <div class="circleInput Hidden animated fadeIn"><input name="color" type="color" value="#8551d9" /></div>
                  <div class="ColorPicker colorPalette" name="color" type="color"><img src="../../../skin/images/body/icons/colpicker.png" alt=""/></div>
                  <div class="ColorSelect circle circleAddItem" style="background-color: #b83232"></div>
                  <div><p>No hay colores seleccionados</p></div>
                  <div><button type="button" name="button" class="btn mainbtnred delColBtn animated fadeIn"><i class="fa fa-trash-o"></i></button></div>
                </div>
              </div>
            </div>
            <!-- Description & Select Image  -->
            <!-- Description (Character counter) -->
            <div class="col-md-6 form-group addItemDescription">
              <form class="form-group">
                <?php echo insertElement('textarea','description',$Data['description'],'form-controlitems textareaitems text-center','placeholder="Descripción" rows="4" maxlength="150"'); ?>
                <div class="remchar"><p> Caracteres restantes: </p></div>
                  <div class="indicator-wrapper">
                    <div class="indicator"><span class="current-length">150</span></div>
                  </div>
              </form>
            </div>
            <!-- /Description (Character counter) -->
            <!-- Choose Img -->
            <div class="col-md-6 col-sm-12 imgSelector">
              <div class="imgSelectorInner">
                <img src="../../../skin/images/products/cod1.jpg" class="img-responsive">
                <div class="imgSelectorContent">
                  <div id="SelectImg">
                    <i class="fa fa-picture-o"></i><br>
                    Cambiar Im&aacute;gen
                  </div>
                </div>
              </div>
            </div><!-- /Choose Img -->
          </div><!-- /newInputs -->
          <!-- Images (HIDDEN) -->
          <div id="MultipleImgWd" class="row imgWindow animated fadeIn Hidden">
            <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
            <div class="imgWindowTitle">
              <div class="row tipAndButton">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <button id="createUser" type="button" name="button" class="btn mainbtn" role="button"><i class="fa fa-check-square-o fa-fw"></i> Agregar Im&aacute;gen</button>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <div class="tipText"><i class="fa fa-question-circle" aria-hidden="true"></i><p> Arrastre las im&aacute;genes para ordenarlas</p></div>
                </div>
              </div>
            </div>
            <div class="col-md-12 activeImgs SelectProdImg">
              <ul id="ImageBox" class="connected sortable grid">
                <li><img src="../../../skin/images/users/default/caras1.png" alt="" class="img-responsive">
                  <span>
                    <i class="fa fa-arrows moveImg"></i>
                    <i class="fa fa-trash delImgIco"></i>
                    <i class="fa fa-arrow-left moveLeft"></i>
                    <i class="fa fa-arrow-right moveRight"></i>
                  </span>
                </li>
                <li><img src="../../../skin/images/users/default/caras2.png" alt="" class="img-responsive">
                  <span>
                    <i class="fa fa-arrows moveImg"></i>
                    <i class="fa fa-trash delImgIco"></i>
                    <i class="fa fa-arrow-left moveLeft"></i>
                    <i class="fa fa-arrow-right moveRight"></i>
                  </span>
                </li>
                <li><img src="../../../skin/images/users/default/usuario.jpg" alt="" class="img-responsive">
                  <span>
                    <i class="fa fa-arrows moveImg"></i>
                    <i class="fa fa-trash delImgIco"></i>
                    <i class="fa fa-arrow-left moveLeft"></i>
                    <i class="fa fa-arrow-right moveRight"></i>
                  </span>
                </li>
              </ul>
            </div>
          </div><!-- /Images -->
          <!-- Help Modal Trigger -->
          <div class="helpModalTrigger"><span data-toggle="modal" data-target="#helpModal" >Ayuda <i class="fa fa-question-circle" aria-hidden="true"></i> </span></div>
          <!-- /Help Modal Trigger-->
        </div><!-- /FormItems -->
      </div><!-- /addItemDiv -->
        <!-- Create User Button Div  -->
      <div class="container animated fadeInUp donediv">
        <div class="form-group">
          <button id="createUser" type="button" name="button" class="btn mainbtn newItemBtn" role="button"><i class="fa fa-check-square-o fa-fw"></i> Crear Producto</button>
          <button id="createAndAdd" type="button" name="button" class="btn mainbtn newItemBtn" role="button"><i class="fa fa-plus-square"></i> Crear y Agregar Otro...</button>
          <button id="acceptBtnImg" type="button" name="button" class="btn mainbtn newItemBtn Hidden"><i class="fa fa-check"></i> Aceptar</button>
        </div>
      </div>    <!-- /Create User Button Div  -->
    </div> <!-- /Container Fluid  -->
  </div><!-- /#wrapper -->




  <!-- /////////////// MODALS //////////////////// -->
  <!-- HELP MODAL -->
  <div id="helpModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ayuda para el usuario</i></h4>
        </div>
        <div class="modal-body">
          <p>Le informaci&oacute;n colocada en el formulario saldr&aacute; luego en el sitio web como un nuevo producto en la secci&oacute;n cat&aacute;logo.</p>
          <hr>
          <b><i class="fa fa-tint"></i> COLORES:</b></span>
          <p><b>Agregar Colores:</b> Haga click en la paleta de colores   <span class="colorPaletteHelp" name="color" type="color"><img src="../../../skin/images/body/icons/colpicker.png" alt=""/>
           y seleccione el o los colores de su producto. <br>
           <b>Galer&iacute;a (M&aacute;s usados):</b>
            Seleccione y guarde los colores que m&aacute; utiliza para una carga r&aacute;pida de productos.<br>
          <b>Eliminar Colores:</b> Selecciones y haga click en eliminar para borrar los colores</p>
          <hr>
          <p><i class="fa fa-bars"></i><b> DESCRIPCI&Oacute;N:</b><br>
            Llene el campo para agregar una descripci&oacute; al producto. El l&iacute;mite de caracteres es de hasta 150. El progresor le avisar&aacute; cuantos caracteres restan.
          </p>
          <hr>
          <p><i class="fa fa-file-image-o"></i><b> SELECCI&Oacute;N DE IM&Aacute;GENES:</b><br>
            Haga click en cambiar im&aacute;gen para entrar al menu de selecci&oacute;n de im&aacute;genes.<br>
            Luego presione el bot&oacute;n "Seleccionar Im&aacute;gen" para cargar las mismas.<br>
            <b>Orden y Prioridad</b>:<br>
            Arrastre las im&aacute;genes para ordenarlas.<br>
            La im&aacute;gen que quede a la izquierda ser&aacute; la destacada y la que se ver&aacute; en el cat&aacute;logo.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" name="button" class="btn mainbtn" data-dismiss="modal">OK</button><br>
        </div>
      </div>
    </div>
  </div>
  <!-- Help Modal -->

  <!-- Colors Modal -->
  <div id="colorsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Administrar Colores</i></h4>
        </div>
        <div class="modal-body">
          <p>Guarde aqu&iacute; los colores que m&aacute;s utiliza para la carga r&aacute;pida de productos.<br>
          Seleccione y clique&eacute; "Agregar Seleccionados" para agregarlos a los colores de el producto.<hr></p>
          <div class="circles circlesAddItem">
            <div class="circleInput Hidden animated fadeIn"><input name="color" type="color" value="#8551d9"/></div>
            <div class="ColorPicker colorPalette" name="color" type="color"><img src="../../../skin/images/body/icons/colpicker.png" alt=""/></div>
            <div class="ColorSelectModal circle circleAddItem" style="background-color: #b83232"></div>
            <div class="ColorSelectModal circle circleAddItem" style="background-color: #b69595"></div>
            <div class="ColorSelectModal circle circleAddItem" style="background-color: #2d02fa"></div>
            <div class="ColorSelectModal circle circleAddItem" style="background-color: #d5be26"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" name="button" class="btn mainbtn modalBtnRed" data-dismiss="modal"><i class="fa fa-trash-o"></i> Eliminar Seleccionados</button>
          <button type="button" name="button" class="btn mainbtn" data-dismiss="modal"><i class="fa fa-plus"></i> Agregar Seleccionados</button><br>
        </div>
      </div>
    </div>
  </div>
  <!-- Colos Modal -->



<?php $Foot->setFoot(); ?>
