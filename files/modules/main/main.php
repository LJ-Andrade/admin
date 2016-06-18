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
      <!-- Title and options -->
      <div class="row">
        <div class="titleDiv">
          <div class="col-md-6 breadCrumTitle">
            <!-- <a href=""><span><i class="fa fa-angle-double-left"></i> Volver <b>|</b></span></a> -->
            <span class="breadCrums"><i class="fa fa-home"></i></span><i class="fa fa-angle-right"></i>
            <span class="breadCrums">Usuarios</span><i class="fa fa-angle-right"></i>
            <span class="mainTitle"><i class="fa fa-user" aria-hidden="true"></i>
             COMMON ELEMENTS</span>
          </div>
          <div class="col-md-6 titleDivOptions"><button type="button" class="mainbtn">Opcion</button></div>
        </div>
      </div><!-- /Title and options -->



      <!-- Cards For Links -->
      <div class="container">
        <div class="mainDemoTitles"><h2>Generic Cards</h2></div>
        <div class="col-md-4 genCard">
          <div class="genCardHead">
            <a href="#"><i class="fa fa-user-plus"></i></a>
          </div>
          <div class="genCardContent">
            <span>Agregar Usuario</span>
          </div>
        </div>
        <div class="col-md-4 genCard">
          <div class="genCardHead">
            <a href="#"><i class="fa fa-list-ul"></i></a>
          </div>
          <div class="genCardContent">
            <span>Lista de Usuarios</span>
          </div>
        </div>
        <div class="col-md-4 genCard">
          <div class="genCardHead">
            <a href="#"><i class="fa fa-trash"></i></a>
          </div>
          <div class="genCardContent">
            <span>Usuarios Eliminados</span>
          </div>
        </div>
      </div><!-- /Cards For Links -->
      <br> <br> <br><br><br>

      <div class="container">
        <div class="mainDemoTitles"><h2>Creation Window (Single Image)</h2></div>
        <?php include 'inc.singleImgForm.php'; ?>
      </div><br><br><br><br>
      <div class="container">
        <div class="mainDemoTitles"><h2>Creation Window (Multiple Image)</h2></div>
        <?php include 'inc.multipleImgForm.php'; ?>
              <br> <br> <br><br><br>
      </div>


      <div class="container">
        <div class="mainDemoTitles"><h2>Lists</h2></div>
      </div>
        <?php include 'inc.lists.php'; ?>
        <br> <br> <br><br><br>

        <div class="container">
          <div class="row">
            <div class="mainDemoTitles"><h2>Buttons</h2></div>
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
          </div>
        </div>

        <br> <br> <br>

        <div class="row">
          <div class="container">
            <div class="mainDemoTitles"><h2>CheckBox</h2></div>
            <!-- TREE CHECKBOXES -->
            <div class="col-md-4">
              <?php include 'inc.checkbox.php'; ?>
            </div>
            <!-- /TREE CHECKBOXES -->
          </div>
        </div>

        <br> <br> <br>


        <div class="row">
          <div class="container">
            <div class="mainDemoTitles"><h2>Alerts</h2></div>
            <div class="col-md-6">
              <button class="btn mainbtn testInfo" type="button" name="button">Test Info</button>
              <button class="btn mainbtn testOk" type="button" name="button">Test Ok</button>
            </div>
          </div>
        </div>



    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
