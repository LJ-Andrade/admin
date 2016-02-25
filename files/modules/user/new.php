<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Home");
    $Head->setHead();
?>
<body>
    <div id="wrapper">
       <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
       <?php include('../../includes/inc.delpopup.php'); ?> <!-- Del PopUp Window -->
        <div id="page-wrapper">
  
        <!-- Filtros -->
            <div class="container additemdiv animated fadeIn">
                <div class="col-sm-12 form-box formitems">
                  <div class="additemtit">
                       <h3>Agregar Nuevo Usuario</h3>
                  </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <input type="text" id="user" name="user" placeholder="Nombre de Usuario" class="form-first-name form-controlusers">
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <input type="password" id="password" name="password" placeholder="Contrase&ntilde;a" class="form-first-name form-controlusers">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <input type="text" id="first_name" name="first_name" placeholder="Nombre" class="form-first-name form-controlusers">
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <input type="text" id="last_name" name="last_name"  placeholder="Apellido" class="form-last-name form-controlusers">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInRight">
                              <div class="form-group">
                                  <select class="form-controlusers" id="group">
                                    <option>Grupo...</option>
                                    <option>Grupo 1</option>
                                    <option>Grupo 2</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                              <div class="form-group">
                                  <select class="form-controlusers" id="profile">
                                    <option id="0">Permisos...</option>
                                    <option id="333">Superadministrador</option>
                                    <option id="333">Proveedor</option>
                                    <option id="333">Cliente</option>
                                  </select>
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
    $('#volverusers').show( 500 );
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