<div class="singleImgWindow">
  <!-- HEAD -->
  <div class="row windowHead animated fadeInDown">
    <button type="button" name="button" class="btn closeBtn MainButton BackToLastPage"><i class="fa fa-times"></i></button>
    <div class="col-md-6 col-xs-12">
      <h3>Complete el formulario </h3>
    </div>
    <div class="col-md-5 col-xs-12 switchDiv switchHead">
      <input type="checkbox" name="status" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="mini" data-label-width="auto" checked>
    </div>
  </div><!-- /HEAD -->

  <!-- FORM -->
  <div class="container addItemDiv animated fadeIn">
    <div class="col-md-12 form-box formitems">
      <!-- User Data -->
      <div id="newInputs" class="animated fadeIn">
        <div class="row">
          <div class="col-md-6 form-group"><!-- User -->
            <input id="user" name="user" class="form-first-name form-controlusers" placeholder="Input" type="text">
          </div>
          <div class="col-md-6 form-group"><!-- Name -->
            <input id="user" name="user" class="form-first-name form-controlusers" placeholder="Input" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group"><!-- PassWord -->
            <input id="user" name="user" class="form-first-name form-controlusers" placeholder="Input" type="text">
          </div>
          <div class="col-md-6 form-group">
            <input id="user" name="user" class="form-first-name form-controlusers" placeholder="Input" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group"><!-- Confirm PassWord -->
            <input id="user" name="user" class="form-first-name form-controlusers" placeholder="Input" type="text">
          </div>
          <div class="col-md-6 form-group"><!-- E-Mail -->
            <input id="user" name="user" class="form-first-name form-controlusers" placeholder="Input" type="text">
          </div>
        </div>
        <!-- /User Data -->
        <!-- Image and Groups -->
        <div class="col-md-12">
          <!-- Group and Perm -->
          <div class="col-md-6 form-group centrarbtn">
            <div class="form-group">
              <div class="marg20">
                <?php echo insertElement('select','profile','','form-controlusers','tabindex="6" validateEmpty="El perfil es obligatorio."',$DB->fetchAssoc("admin_profile","profile_id,title","status = 'A'","title"),'','Elegir Perfil'); ?>
              </div>
              <div class="marg20">
                <button id="showTreeDiv" class="btn mainbtn">Permisos y Grupos</button>
              </div>
            </div>
          </div>
          <!-- Choose Img -->
          <div id="SelectImg" class="col-md-6 col-sm-12 imgSelector">
            <div class="imgSelectorInner">
              <img src="<?php echo $Admin->DefaultImg ?>" class="img-responsive MainImg">
              <div class="imgSelectorContent">
                <div id="SelectImg">
                  <i class="fa fa-picture-o"></i><br>
                  Cambiar Im&aacute;gen
                </div>
              </div>
            </div>
          </div><!-- /Choose Img -->
        </div><!-- /Image and Groups  -->
      </div><!-- New Inputs -->
      <!-- Single Image Selection Window (Hidden) -->
      <div id="SingleImgWd" class="row imgWindow Hidden animated fadeIn">
        <!-- <span id="cancelImgChange" class="eraseImgX"><i class="fa fa-times"></i></span> -->
        <button id="cancelImgChange" type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button>
        <div class="imgWindowTitle"><h5>Agregar o Cambiar Im&aacute;genes</h5></div>
        <!-- Choose Img -->
        <div id="SelectImg" class="col-md-12 imgSelector">
          <div class="imgSelectorInner">
            <img src="<?php echo $Admin->DefaultImg ?>" id="MainImageSelector" class="MainImg img-responsive">
            <div class="imgSelectorContent SelectNewImg">
              <div id="SelectImg"><i class="fa fa-picture-o"></i><br>Cambiar Im&aacute;gen</div>
            </div>
          </div>
        </div><!-- /Choose Img -->
        <?php echo insertElement('file','image','','Hidden'); ?>
        <div class="col-md-12 activeImgs singleImg">
          <ul id="ImageBox">
            <?php
            foreach($Admin->AllImages() as $Image)
            {
              if($Image==$Admin->DefaultImg)
                $MainImg = 'selectImg LastClicked';
              else
                $MainImg = '';

              $GalleryID = array_reverse(explode('/',$Image));
              if($Admin->AdminID == $GalleryID[1] && $Admin->Img != $Image)
                $DelIcon = '<span class="GenImg '.$MainImg.'"><i class="fa fa-trash delImgIco Hidden"></i></span>';
              else
                $DelIcon = '<span class="GenImg '.$MainImg.'"></span>';
            ?>
            <li>
              <img src="<?php echo $Image ?>" alt="" class="img-responsive" >
              <?php echo $DelIcon; ?>
            </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div><!-- /Images -->
      <!-- /Single Image Selection Window (Hidden) -->
    </div><!-- /Formitems -->
    <!-- Menu Tree -->
    <div class="row treeDivRow animated fadeIn Hidden">
      <div class="col-md-6 col-xs-12">
        CHECKBOX
      </div>
      <div class="col-md-6 col-xs-12">
        CHECKBOX
      </div>
    </div><!-- /Menu Tree -->
  </div><!-- /addItemDiv -->
  <!-- /FORM -->

  <!-- BUTTONS -->
  <div class="container donediv animated fadeInUp">
    <div class="form-group">
      <button id="createUser" type="button" name="button" class="btn mainbtn MainButton" role="button"><i class="fa fa-check-square-o fa-fw"></i> Crear</button>
      <button id="createAndAdd" type="button" name="button" class="btn mainbtn MainButton" role="button"><i class="fa fa-plus-square"></i> Crear y Agregar Otro...</button>
      <button type="button" name="button" class="btn mainbtn mainbtnred MainButton BackToLastPage"><i class="fa fa-times"></i> Cancelar</button>
      <button id="acceptBtnImg" type="button" name="button" class="btn mainbtn Hidden OtherButton"><i class="fa fa-check"></i> Aceptar</button>
      <button id="acceptPermGroup" type="button" name="button" class="btn mainbtn centrarbtn Hidden OtherButton"><i class="fa fa-check"></i> Aceptar</button><br>
    </div>
  </div><!-- /BUTTONS -->
  
</div><!-- /single Img Window -->
