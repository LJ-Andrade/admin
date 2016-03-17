<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Menú");
    $Head->setHead();

    $Status       = array();
    $Status['A']  = "Activo";
    $Status['I']  = "Inactivo";
    $Status['O']  = "Oculto";
?>
<body>
    <div id="wrapper">
      <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
      <?php echo insertElement("hidden","action","insert"); ?>
        <!-- Filtros -->
            <div class="container additemdiv animated fadeIn">
                <div class="col-sm-12 form-box formitems">
                  <div class="additemtit">
                    <div class="maintitle"><h4 class="maintitletxt">Agregar Nuevo Men&uacute;</h4></div>
                  </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <?php echo insertElement("text","title",'',"form-first-name form-controlusers",'placeholder="Título del Menú" validateEmpty="El título es obligatorio." tabindex="1"'); ?>
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
                      <div class="row">
                        <div class="col-md-6 form-group animated bounceInRight switchuser">
                              <span class="userstatustit">Menú Público:</span>
                              <input type="checkbox" class="centered" name="public" id="public" data-on-text="Si" data-off-text="No" data-size="large" data-label-width="auto" checked>                                     
                        </div>
                    </div>
                </div>   
            </div>
                       
                        <!--  Add Img & Done Button Div  -->
                        <div class="container centrarbtn animated fadeInUp donediv">
                             <div class="form-group">
                               <!-- <li id="chooseimg" class="animated fadeIn btn additembtn"><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></li>-->
                               <a href="#" class="btn masterbtn btnsave" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Menú</a>
                             </div>
                        </div>  
<!-- /#wrapper -->
<script>
    
</script>
<?php $Foot->setFoot(); ?>