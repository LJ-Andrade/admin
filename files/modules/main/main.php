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
        <div class="titleDiv">
          <div class="col-md-6 breadCrumTitle">
            <!-- <a href=""><span><i class="fa fa-angle-double-left"></i> Volver <b>|</b></span></a> -->
            <span class="breadCrums"><i class="fa fa-home"></i> Home</span><i class="fa fa-angle-right"></i>
            <span class="breadCrums">Usuarios</span><i class="fa fa-angle-right"></i>
            <span class="mainTitle"><i class="fa fa-user" aria-hidden="true"></i>
             COMMON ELEMENST</span>
          </div>
          <div class="col-md-6 titleDivOptions"><button type="button" class="mainbtn">Opcion</button></div>
        </div><!-- /Title and options -->

        <div class="container">
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
                <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred modBtnList"><i class="fa fa-trash"></i></button></a>
                <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred delBtnList"><i class="fa fa-times"></i></button></a>
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

        </div>
      </div><!-- Row -->

    <div class="clearfix"></div>

    <!-- Cards For Links -->
    <div class="container">
      <div class="row">
        <div class="col-md-3 genCard">
          <a href="#">
            <i class="fa fa-beer"></i><br>
            <span>Categor&iacute;a</span>
          </a>
        </div>
        <div class="col-md-3 genCard">
          <a href="#">
            <i class="fa fa-beer"></i><br>
            <span>Categor&iacute;a</span>
          </a>
        </div>
        <div class="col-md-3 genCard">
          <a href="#">
            <i class="fa fa-beer"></i><br>
            <span>Categor&iacute;a</span>
          </a>
        </div>
        <div class="col-md-3 genCard">
          <a href="#">
            <i class="fa fa-beer"></i><br>
            <span>Categor&iacute;a</span>
          </a>
        </div>
      </div>
    </div><!-- /Cards For Links -->

    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
