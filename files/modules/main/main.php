<?php
  include("../../includes/inc.main.php");
  $Head->setTitle("Renovatio Home");
  $Head->setHead();
?>
<body>
  <?php include('../../includes/inc.loader.php'); ?> <!-- Loader -->
  <?php include('../../includes/inc.nav.php'); ?> <!-- Navegation -->
  <div id="wrapper">
    <?php include '../../includes/inc.subTop.php'; ?>
    <div class="container-fluid pageWrapper">
      <!-- Cards For Links -->
      <div class="mainDemoTitles"><h2>Generic Cards</h2></div>
      <div class="container-fluid flex-allCenter">
        <div class="col-md-4 col-sm-6 col-xs-12 genCard">
          <div class="genCardHead">
            <a href="#"><i class="fa fa-user-plus"></i></a>
          </div>
          <div class="genCardContent">
            <span>Agregar Usuario</span>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 genCard">
          <div class="genCardHead">
            <a href="#"><i class="fa fa-list-ul"></i></a>
          </div>
          <div class="genCardContent">
            <span>Lista de Usuarios</span>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 genCard">
          <div class="genCardHead">
            <a href="#"><i class="fa fa-trash"></i></a>
          </div>
          <div class="genCardContent">
            <span>Usuarios Eliminados</span>
          </div>
        </div>
      </div><!-- /Cards For Links -->
      <br> <br> <br><br><br>

      <div class="mainDemoTitles"><h2>Creation Window (Single Image)</h2></div>
      <?php include 'inc.singleImgForm.php'; ?>


      <div class="mainDemoTitles"><h2>Creation Window (Multiple Image)</h2></div>
      <?php include 'inc.multipleImgForm.php'; ?>


      <div class="mainDemoTitles"><h2>Lists</h2></div>
      <?php include 'inc.lists.php'; ?>
      <br> <br> <br><br><br>

      <div class="mainDemoTitles"><h2>Buttons</h2></div>
      <div class="col-md-12">
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
      </div>
      <!-- /Buttons -->
 <br><br><br>


        <div class="mainDemoTitles"><h2>CheckBox</h2></div>
        <div class="col-md-12">
          <!-- TREE CHECKBOXES -->
          <div class="col-md-4">
            <?php include 'inc.checkbox.php'; ?>
          </div>
          <!-- /TREE CHECKBOXES -->
        </div>

        <div class="col-md-12">
          <div class=""><h2>Alerts</h2></div>
          <div class="col-md-6">
            <button class="btn mainbtn testInfo" type="button" name="button">Test Info</button>
            <button class="btn mainbtn testOk" type="button" name="button">Test Ok</button>
          </div>
        </div>



    </div><!-- /.container-fluid -->
  </div><!-- /#wrapper -->
<?php $Foot->setFoot(); ?>
