<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Usuario");
    $Head->setHead();

    $Groups[1] = "Pepe";
    $Groups[2] = "Pepe2";
    $Groups[3] = "Pepe3";
?>
<body>
    <div id="wrapper">
       <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
       <?php include('../../includes/inc.delpopup.php'); ?> <!-- Del PopUp Window -->
        <div id="page-wrapper">
      <?php insertElement("hidden","action",'insert'); ?>
        <!-- Filtros -->
            <div class="container additemdiv animated fadeIn">
                <div class="col-sm-12 form-box formitems">
                  <div class="additemtit">
                       <h3>Agregar Nuevo Usuario</h3>
                  </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <?php echo insertElement('text','user','','form-first-name form-controlusers','placeholder="Nombre de Usuario" tabindex="1" validateEmpty="El usuario es obligatorio." validateFromFile="process.php/El usuario ya existe/action:=validate"'); ?>
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <?php echo insertElement('password','password','','form-first-name form-controlusers','placeholder="Contrase&ntilde;a" tabindex="2"'); ?>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <?php echo insertElement('text','first_name','','form-first-name form-controlusers','placeholder="Nombre" tabindex="3"'); ?>
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <?php echo insertElement('text','last_name','','form-first-name form-controlusers','placeholder="Apellido" tabindex="4" pepe="nana"'); ?>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInRight">
                              <div class="form-group">
                                <?php echo insertElement('select','group','','form-controlusers','tabindex="5"',$Groups,'0','Elegir Grupo'); ?>
                              </div>
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                              <div class="form-group">
                                  <?php echo insertElement('select','profile','','form-controlusers','tabindex="6"',$DB->fetchAssoc("select","admin_profile","profile_id,title","","title"),'0','Elegir Perfil'); ?>
                              </div>
                          </div>
                      </div>
                      <div class="row animated bounceInRight switchuser">
                            <span class="userstatustit">Estado:</span>
                            <input type="checkbox" class="centered" name="my-checkbox" id="status" data-on-text="Activo" data-off-text="Inactivo" data-size="large" data-label-width="auto" checked>                                     
                      </div>
                     <!--   Generic Img and AddImg Div       -->
                     <div id="itemimg" class="itemimgmain">
                        <div class="row"> 
                        <div class="col-xs-6 col-md-3 addimgdiv">
                             <div id="file"><img src="../../../skin/images/users/mas.jpg" class="img-responsive thumbimgadd animated fadeInUp thumbimg"></div>
                             <input type="file" name="img" id="img" />
                         </div>
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                         </div>   
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="../../../skin/images/products/cod1.jpg" class="img-responsive thumbimg animated fadeInUp">
                         </div>   
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="../../../skin/images/products/cod2.jpg" class="img-responsive thumbimg animated fadeInUp">
                         </div>
                         </div>
                         <div class="row"> 
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="../../../skin/images/products/cod3.jpg" class="img-responsive thumbimg animated fadeInUp">
                         </div>
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="../../../skin/images/products/cod4.jpg" class="img-responsive thumbimg animated fadeInUp">
                         </div>   
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                         </div>   
                         <div class="col-md-3 addimgdiv">
                             <img src="../../../skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                         </div>
                         </div>  
                    </div>        
                </div>   
            </div>
                       
                        <!--  Add Img & Done Button Div  -->
                        <div class="container centrarbtn animated fadeInUp donediv">
                             <div class="form-group">
                               <li id="chooseimg" class="animated fadeIn btn additembtn"><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></li>
                               <a href="#" class="btn additembtn btnsave" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Guardar</a>
                             </div>
                        </div>  
        <!-- /#page-wrapper -->
        </div>
<!-- /#wrapper -->
<script>
// Subtop Bar Icons
$(document).ready(function() {  
    $('#volverprod').hide();
    $('#newuser').hide();
    $('#newprod').hide();
    $('#volverusers').fadeIn( 500 );
});

// Show Img selection div
$('#chooseimg').click(function() {
         $('#itemimg').toggle("slide");
         $('#chooseimg').hide( 100 );
    });

    
// Insert Img
var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
var fileInput = $(':file').wrap(wrapper);

fileInput.change(function(){
    $this = $(this);
    $('#file').text($this.val());
})

$('#file').click(function(){
    fileInput.click();
}).show();

// Caracters limiter
$('input, textarea').keyup(function() {
  var max = $(this).attr('maxLength');
  var curr = this.value.length;
  var percent = (curr/max) * 100;
  var indicator = $(this).parent().children('.indicator-wrapper').children('.indicator').first();
   
  // Shows characters left
  indicator.children('.current-length').html(max - curr);
   
  // Change colors periodically
  if (percent > 30 && percent <= 50) { indicator.attr('class', 'indicator low'); }
  else if (percent > 50 && percent <= 70) { indicator.attr('class', 'indicator med'); }
  else if (percent > 70 && percent < 100) { indicator.attr('class', 'indicator high'); }
  else if (percent == 100) { indicator.attr('class', 'indicator full'); }
  else { indicator.attr('class', 'indicator empty'); }
  indicator.width(percent + '%');
});

// Active Inactive Switch
$("[name='my-checkbox']").bootstrapSwitch();
    
</script>
<?php include('../../includes/inc.foot.php'); ?>