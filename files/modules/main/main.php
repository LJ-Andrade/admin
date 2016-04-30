<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Renovatio Home");
  $Head->setHead();
?>
<body>
  <?php include('../../includes/inc.loader.php'); ?> <!-- Loader -->
  <div id="wrapper">
    <?php include('../../includes/inc.nav.php'); ?> <!-- Navegation -->
    <div class="container-fluid">
      <div class="row">
        <!-- Title and options -->
        <div class="titleDiv"><!-- Page Title & back btn -->
          <div class="optionIcons backOpt">
            <ul>
              <li id="backtolastpage" class="animated fadeIn SubTopBtn">
                <a href="javascript: history.go(-1)" class="btn subitbtn BackToLastPage" role="button">
                <i class="fa fa-angle-double-left"></i> Volver</a></li>
            </ul>
          </div>
          <h4 class="maintitletxt"> Título</h4>
        </div>
        <div class="optionsDiv"><!-- Option Icons & Buttons-->
          <button id="delselected" class="animated slideInDown mainbtn mainbtnred"><i class="fa fa-trash"></i> Eliminar seleccionados</button>
          <a href="new.php"><button class="mainbtn"><i class="fa fa-user-plus"></i> Agregar Producto</button></a>
          <div class="optionIcons">
            <ul><!-- View Icons -->
              <li id="viewlistbt" class="animated fadeIn SubTopBtn "><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th-list  fa-fw"></i> Lista </a></li>
              <li id="viewgridbt" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-th  fa-fw"></i> Grilla </a></li>
              <!-- Search -->
              <li id="showitemfiltersuser" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
              <li id="showitemfilters" class="animated fadeIn SubTopBtn"><a href="#" class="btn subitbtn" role="button"><i class="fa fa-search fa-fw"></i> Buscar</a></li>
              <!-- Add New Item -->
              <li id="newprod" class="Hidden"><a href="../product/new.php" class="btn subitbtn SubTopBtn" role="button"><i class="fa fa-plus-square fa-fw"></i> Nuevo Producto</a></li>
              <li id="newuser" class="Hidden"><a href="../user/new.php" class="btn subitbtn SubTopBtn" role="button"><i class="fa fa-user-plus  fa-fw"></i> Nuevo Usuario</a></li>
            </ul>
          </div>
        </div><!-- /Title and options -->

        <div class="container">
          <h2>Common Elements</h2>
          <!--- Item-Cards -->
          <div class="row-centered wrapOverlayItem">
            <!-- Item / Product -->
            <div class="col-md-4 col-sm-6 col-xs-12 col-centered overlayItem">
              <div class="show overlay1">
                <img src="../../../skin/images/products/01.jpg" />
                <div class="mask">
                  <div class="OnOffDiv">
                    <input type="checkbox" name="status" id="status" data-on-text="Publicado" data-off-text="Pausado" data-size="mini" data-label-width="auto">
                  </div>
                  <div class="overlayDetails">
                  <h3><strong>Título</strong></h3>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod td est laborum.</p>
                    <h4><strong>Composición:</strong> Raso</h4>
                    <h4><strong>Talles:</strong> Xs - S</h4>
                    <div class="circles">
                      <span><strong>Colores:</strong></span>
            					<ul>
            						<li><div class="circle" style="background-color: #fff"></div></li>
            						<li><div class="circle" style="background-color: #c17996"></div></li>
            						<li><div class="circle" style="background-color: #768754"></div></li>
            						<li><div class="circle" style="background-color: #5643a0"></div></li>
            					</ul>
            				</div>
                    <h4><strong>Precio:</strong> $1500</h4>
                  </div>
                  <div class="delModDiv">
                    <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                    <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Item / Product-->

            <div class="mobile-clear"></div>
          </div>
          <!--- /Item-Card -->
          <div class="row">
            <div class="container">
              <!-- Buttons -->
              <div class="col-md-12 demotittles">
                <a href="#"><button type="button" name="button" class="btn mainbtn"> Button</button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn"> Button <i class="fa fa-hand-spock-o"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-hand-spock-o"></i> Button</button><br></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn acceptBtn"><i class="fa fa-hand-spock-o"></i> Button</button><br></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"> Button Red</button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"> Button Red <i class="fa fa-hand-spock-o"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-hand-spock-o"></i> Button Red</button></a>
                <hr>
                <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-times"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn closeBtn"><i class="fa fa-times"></i></button></a>
              </div>
              <!-- /Buttons -->
            </div>

            <br><br>
          </div>



<!-- TREE CHECKBOXES -->
<div class="col-md-6 form-group checkboxDiv">
  <ul>
    <li class="treeLv1">
      <input id="1" name="#" value="#" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox">
      <label class="checkbox-custom-label" for="1"></label><span id="menu13" class="TreeElement"><i class="fa fa-smile-o"></i> Inicio</span>
      <div id="menu13ErrorDiv" class="ErrorText Red"></div>
    </li>
    <li class="treeLv1">
      <input id="2" name="#" value="#" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox">
      <label class="checkbox-custom-label" for="2"></label>
      <span id="#" style="cursor:pointer;" class="TreeElement">
      <!-- Icon and Text --><i class="fa fa-smile-o"></i> Productos </span>
      <div id="menu2ErrorDiv" class="ErrorText Red"></div>
      <i class="fa fa-caret-down treeArrow" aria-hidden="true"></i><!-- Arrow -->
    </li>
    <ul id="#">
      <li class="treeLv2">
        <input id="3" name="#" value="#" class="CheckBox TreeCheckbox checkbox-custom" disabled="disabled" type="checkbox">
        <label class="checkbox-custom-label" for="3"></label>
        <span id="#" class="TreeElement"><i class="fa fa-smile-o"></i> Agregar Producto</span>
        <div id="#" class="ErrorText Red"></div>
      </li class="treeLv2">
      <li class="treeLv2">
        <input id="4" name="#" value="#" class="CheckBox TreeCheckbox checkbox-custom" disabled="disabled" type="checkbox">
        <label class="checkbox-custom-label" for="4"></label>
        <span id="#" class="TreeElement"><i class="fa fa-smile-o"></i> Agregar Producto</span>
        <div id="#" class="ErrorText Red"></div>
      </li class="treeLv2">
      <li class="treeLv2">
        <input id="5" name="#" value="#" class="CheckBox TreeCheckbox checkbox-custom" disabled="disabled" type="checkbox">
        <label class="checkbox-custom-label" for="5"></label>
        <span id="#" class="TreeElement"><i class="fa fa-smile-o"></i> Agregar Producto</span>
        <div id="#" class="ErrorText Red"></div>
      </li class="treeLv2">
    </ul>
  </ul>
</div>
<!-- /TREE CHECKBOXES -->
<div class="col-md-6">
  <button class="btn mainbtn testInfo" type="button" name="button">Test Info</button>
  <button class="btn mainbtn testOk" type="button" name="button">Test Ok</button>
</div>


          <div class="col-md-12 demotittles">
            <h1>Title h1</h1>
            <h2>Title h2</h2>
            <h3>Title h3</h3>
            <h4>Title h4</h4>
            <h5>Title h5</h5>
          </div>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
      </div><!-- Row -->
    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
