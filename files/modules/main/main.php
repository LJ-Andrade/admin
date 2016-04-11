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
          <div class="container">
            <h2>Common Elements</h2>
            <!--- Item-Cards -->
            <div class="wrap">
                <div class="col-md-4">
                  <div class="show overlay1">
                    <img src="../../../skin/images/products/01.jpg" />
                    <div class="mask">
                      <h2>Fry</h2>
                      <p class="price">$14.00</p>
                      <a href="#" class="more">More info</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="show overlay2">
                    <img src="../../../skin/images/products/01.jpg" />
                    <div class="mask">
                      <h2>Nibler</h2>
                      <p>$14.00</p>
                      <a href="#" class="more">More info</a>
                    </div>
                  </div>
                </div>

                <!-- <div class="mobile-clear"></div> -->
            </div>
            <!--- /Item-Card -->
            <div class="row">
              <div class="container">
                <div class="col-md-4 demotittles">
                  <h1>Title h1</h1>
                  <h2>Title h2</h2>
                  <h3>Title h3</h3>
                  <h4>Title h4</h4>
                  <h5>Title h5</h5>
                </div>
                <!-- Buttons -->
                <div class="col-md-7 demotittles">
                  <a href="#"><button type="button" name="button" class="btn mainbtn"> Button</button></a>
                  <a href="#"><button type="button" name="button" class="btn mainbtn"> Button <i class="fa fa-hand-spock-o"></i></button></a>
                  <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-hand-spock-o"></i> Button</button><br></a>
                  <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"> Button Red</button></a>
                  <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"> Button Red <i class="fa fa-hand-spock-o"></i></button></a>
                  <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-hand-spock-o"></i> Button Red</button></a>
                  <hr>
                  <a href="#"><button type="button" name="button" class="btn mainbtn"><i class="fa fa-pencil"></i></button></a>
                  <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-trash"></i></button></a>
                  <a href="#"><button type="button" name="button" class="btn mainbtn mainbtnred"><i class="fa fa-times"></i></button></a>
                  <a href="#"><button type="button" name="button" class="btn mainbtn closeBtn"><i class="fa fa-times-circle"></i></button></a>
                </div>
                <!-- /Buttons -->
              </div>
            </div>

            <!-- New Item Window -->
            <div class="windowHead"><h3>Agregar Nuevo Item</h3></div>
            <div class="container animated fadeIn additemdiv">
              <div class="col-sm-12 form-box formitems">
                <div class="row">
                  <div class="col-md-6 form-group animated bounceInLeft">
                    <?php echo insertElement("text","title",'',"form-first-name form-controlusers",'placeholder="Título" validateEmpty="El título es obligatorio." tabindex="1"'); ?>
                  </div>
                  <div class="col-md-6 form-group animated bounceInRight">
                    <?php echo insertElement("text","link",'',"form-first-name form-controlusers",'placeholder="Link" tabindex="2"'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group animated bounceInLeft">
                    <div class="form-group">
                      <?php echo insertElement('select','parent','','form-controlusers','tabindex="3"',$DB->fetchAssoc('menu','menu_id,title',"","title"),'0','Men&uacute; Principal'); ?>
                    </div>
                  </div>
                  <div class="col-md-6 form-group animated bounceInRight">
                    <div class="form-group">
                      <?php echo insertElement('select','status','','form-controlusers','tabindex="4"',$Status,'','','A'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group animated bounceInLeft">
                    <?php echo insertElement('text','position','','form-first-name form-controlusers','tabindex="5" placeholder="Posici&oacute;n"'); ?>
                  </div>
                  <div class="col-md-6 form-group animated bounceInRight">
                    <?php echo insertElement('text','icon','','form-first-name form-controlusers','tabindex="6" placeholder="&Iacute;cono"'); ?>
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
            <!-- /New Item Window -->

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          </div>
        </div><!-- Row -->
      </div><!-- /.container-fluid -->
    </div><!-- /#wrapper -->

<script>
  $( document ).ready(function() {

  ////////////// End /////////////////
  });
  </script>
<?php $Foot->setFoot(); ?>
