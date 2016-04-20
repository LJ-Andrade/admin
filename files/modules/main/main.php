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
              <!-- checkboxes -->

              <div class="col-md-12 democheck checkboxDiv">
                <ul>
                  <li><input id="sizeXS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeXS"><span>Item1</span></li>
                  <li><input id="sizeS" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeS"><span>Item2</span></li>
                  <li><input id="sizeM" class="CheckBox TreeCheckbox checkbox-custom" type="checkbox"><label class="checkbox-custom-label" for="sizeM"><span>Item3</span></li>
                </ul>
              </div>

              <!-- checkboxes -->
            </div>

            <br><br>
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
