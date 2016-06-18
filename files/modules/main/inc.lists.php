<div class="ListWrapper HiddenNo"><!-- Wrapper of all lists -->
  <!--  // List DeskTop // -->
  <div id="" class="viewlist row animated fadeIn">
    <!-- Titles  -->
    <div class="glassListRow listRow listTits">
      <div class="col-md-1 col-sm-1 col-xs-12"><p>Im&aacute;gen</p></div>
      <div class="col-md-1 col-sm-1 col-xs-12"><p>T&iacute;tulo</p></div>
      <div class="col-md-2 col-sm-2 col-xs-12"><p>Descripci&oacute;n</p></div>
      <div class="col-md-2 col-sm-2 col-xs-12"><p>Composici&oacute;n</p></div>
      <div class="col-md-1 col-sm-1 col-xs-12"><p>Talle</p></div>
      <div class="col-md-2 col-sm-2 col-xs-12"><p>Colores</p></div>
      <div class="col-md-1 col-sm-1 col-xs-12"><p>Precio</p></div>
      <div class="col-md-2 col-sm-2 col-xs-12 listRowLast"><p>Mod.</p></div>
    </div> <!-- /Titles  -->
    <!-- Items -->
    <div id="" class="glassListRow listRow listHover">
      <div class="col-md-1 col-sm-1 col-xs-12">
        <img src="../../../skin/images/users/3/user69110__3.jpeg" class="img-responsive listImg">
      </div>
      <div class="col-md-1 col-sm-1 col-xs-12"><p>Pijama</p></div>
      <div class="col-md-2 col-sm-2 col-xs-12"><p>Pijama para dormir seguro en casa</p></div>
      <div class="col-md-2 col-sm-2 col-xs-12"><p>Kevlar</p></div>
      <div class="col-md-1 col-sm-1 col-xs-12"><p>XSS - L - SS</p></div>
      <div class="col-md-2 col-sm-2 col-xs-12"><p>Blanco, rojo</p></div>
      <div class="col-md-1 col-sm-1 col-xs-12"><p>$7000</p></div>
      <div class="col-md-2 col-sm-2 col-xs-12">
        <a href=""><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
        <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
      </div>
    </div><!-- /Items -->
  </div><!--  /List DeskTop -->
  <!-- List Mobile Large -->
  <div id="" class="row viewListMobileLarge viewListMobile1 animated fadeIn">
      <div class="col-md-2 col-sm-2 col-xs-3"><img src="../../../skin/images/users/3/user69110__3.jpeg" class="img-responsive listImg"></div>
      <div class="col-md-3 col-sm-3 col-xs-3"><p>Pijama</p></div>
      <div class="col-md-4 col-sm-4 col-xs-3"><p>$7000</p></div>
      <div class="col-md-3 col-sm-3 col-xs-3">
        <a href=""><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
        <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>'?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
      </div>
  </div><!-- / List Mobile Large -->
  <!-- List Mobile Small -->
  <div id="" class="row viewListMobile viewListMobile2 animated fadeIn">
    <div class="col-md-4 col-xs-2 listMobile2Img"><img src="../../../skin/images/users/3/user69110__3.jpeg" class="img-responsive listImg"></div>
    <div class="col-md-4 col-xs-5"><p>Pijama</p></div>
    <div class="col-md-4 col-xs-5"><p><p>$7000</p></p></div>
    <div class="col-xs-12 viewListMobileMod animated fadeIn Hidden">
      <a href="edit.php?id=<?php echo $User->AdminID ?>"><button type="button" name="button" class="btn mainbtn modBtnList"><i class="fa fa-pencil"></i></button></a>
      <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred modBtnList deleteElement" deleteElement="<?php echo $User->AdminID ?>" deleteParent="userlist<?php echo $User->AdminID ?>/user<?php echo $User->AdminID ?>" deleteProcess="process.php" confirmText="¿Desea eliminar el usuario '<?php echo $User->FullName ?>' alias '<?php echo $User->User; ?>' ?" successText="'<?php echo $User->FullName ?>' alias '<?php echo $User->User ?>' ha sido eliminado correctamente"><i class="fa fa-trash"></i></button></a>
      <div class="listMobileSelected">
        <i class="fa fa-check"></i>
      </div>
    </div>
  </div><!-- /List Mobile Small -->
</div><!-- /Wrapper of all lists -->
