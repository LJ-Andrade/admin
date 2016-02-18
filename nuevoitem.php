<?php include('head.php'); ?>

<body>
    <div id="wrapper">
       <?php include('nav.php'); ?> <!-- Nav -->
       <?php include('delpopup.php'); ?> <!-- Del PopUp Window -->
        <div id="page-wrapper">
  
        <!-- Filtros -->
            <div class="container additemdiv animated fadeIn">
                <div class="col-sm-12 form-box formitems">
                  <div class="additemtit">
                       <h3>Agregar Nuevo Producto</h3>
                  </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <input type="text" name="form-first-name" placeholder="Nombre de Prod." 
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <input type="text" name="form-first-name" placeholder="C&oacute;digo"  
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <input type="text" name="form-first-name" placeholder="Modelo" 
                               class="form-first-name form-controlusers" id="form-first-name">
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <input type="text" name="form-last-name"  placeholder="Medida"
                               class="form-last-name form-controlusers" id="form-last-name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInRight">
                              <div class="form-group">
                                  <select class="form-controlusers" id="sel1">
                                    <option>Categor&iacute;a...</option>
                                    <option>Muebles</option>
                                    <option>Camas</option>
                                    <option>Sillas</option>
                                    <option>Mesas</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                              <div class="form-group">
                                  <select class="form-controlusers" id="sel1">
                                    <option>Grupo...</option>
                                    <option>Activo</option>
                                    <option>Pausado</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 form-group animated bounceInLeft">
                              <input type="text" name="form-last-name" placeholder="Precio"
                              class="form-last-name form-controlusers" id="form-last-name">
                          </div>
                         <div class="col-md-6 animated bounceInRight switchuser">
                            <input type="checkbox" class="centered" name="my-checkbox" data-on-text="Activo"
       data-off-text="Pausado"  data-label-width="auto" checked>                                     
                          </div>
                      </div>
                      <div class="row-fluid col-md-12 form-group animated bounceInDown itemdesctextarea">
                         <form class="form-group">
                                <textarea id="description" value="Try me out!" maxlength="150" class="form-controlitems textareaitems" rows="4" name="message" placeholder="Descripci&oacute;n"></textarea>
                                <div class="remchar"><p> Caracteres restantes: </p></div>
                                <div class="indicator-wrapper">
                                    <div class="indicator"><span class="current-length">0</span></div>        
                                </div>
                          </form>
                     </div>
                     <!--   Generic Img and AddImg       -->
                     <div id="itemimg" class="itemimgmain">
                        <div class="row"> 
                        <div class="col-xs-6 col-md-3 addimgdiv">
                             <div id="file"><img src="skin/users/mas.jpg" class="img-responsive thumbimgadd animated fadeInUp thumbimg"></div>
                             <input type="file" name="file" />
                         </div>
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                         </div>   
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="skin/images/products/cod1.jpg" class="img-responsive thumbimg animated fadeInUp">
                         </div>   
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="skin/images/products/cod2.jpg" class="img-responsive thumbimg animated fadeInUp">
                         </div>
                         </div>
                         <div class="row"> 
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="skin/images/products/cod3.jpg" class="img-responsive thumbimg animated fadeInUp">
                         </div>
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="skin/images/products/cod4.jpg" class="img-responsive thumbimg animated fadeInUp">
                         </div>   
                         <div class="col-xs-6 col-md-3 addimgdiv">
                             <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                         </div>   
                         <div class="col-md-3 addimgdiv">
                             <img src="skin/images/products/genericproduct.png" class="img-responsive thumbimg animated fadeInUp">
                         </div>
                         </div>  
                    </div>        
                </div>   
            </div>
                       
                        <!--  Add Img & Done Button Div  -->
                        <div class="container centrarbtn animated fadeInUp donediv">
                             <div class="form-group">
                               <li id="chooseimg" class="animated fadeIn btn additembtn"><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></li>
                               <a href="nuevoitem.php" class="btn additembtn btnsave" role="button"><i class="fa fa-check-square-o fa-fw"></i> Guardar</a>
                             </div>
                         </div>  
        <!-- /#page-wrapper -->
        </div>
<!-- /#wrapper -->
<?php include('foot.php'); ?>
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

// Characters limiter
$('input, textarea').keyup(function() {
  var max = $(this).attr('maxLength');
  var curr = this.value.length;
  var percent = (curr/max) * 100;
  var indicator = $(this).parent().children('.indicator-wrapper').children('.indicator').first();
   
  // Shows characters left
  indicator.children('.current-length').html(max - curr);
   
  // Change colors
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
</body>
</html>