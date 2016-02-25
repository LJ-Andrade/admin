<?php
    include("../../includes/inc.main.php");
    $Head->setTitle("Nuevo Menú");
    $Head->setHead();

    $Status             = array();
    $Status['A']   = "Activo";
    $Status['I']    = "Inactivo";
    $Status['O']    = "Oculto";
?>
<body>
    <div id="wrapper">
       <?php include('../../includes/inc.nav.php'); ?> <!-- Nav -->
       <?php include('../../includes/inc.delpopup.php'); ?> <!-- Del PopUp Window -->
        <div id="page-wrapper">
      <?php echo insertElement("hidden","action","insert"); ?>
        <!-- Filtros -->
            <div class="container additemdiv animated fadeIn">
                <div class="col-sm-12 form-box formitems">
                  <div class="additemtit">
                       <h3>Agregar Nuevo Menú</h3>
                  </div>
                      <div class="row">
                          <div class="col-md-6 form-group animated bounceInLeft">
                               <?php echo insertElement("text","title",'',"form-first-name form-controlusers",'placeholder="Nombre del Menú" tabindex="1"'); ?>
                          </div>
                          <div class="col-md-6 form-group animated bounceInRight">
                               <?php echo insertElement("text","link",'',"form-first-name form-controlusers",'placeholder="Link" tabindex="2"'); ?>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 form-group animated bounceInLeft">
                              <div class="form-group">
                                  <?php echo insertElement('select','parent','','form-controlusers','tabindex="3"',$DB->fetchAssoc('select','menu','menu_id,title',"","title"),'0','Men&uacute; Principal'); ?>
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

                      <div class="col-md-6 form-group animated bounceInRight switchuser">
                            <span class="userstatustit">Menú Público:</span>
                            <input type="checkbox" class="centered" name="my-checkbox" id="public" data-on-text="Si" data-off-text="No" data-size="large" data-label-width="auto" checked>                                     
                      </div>

                      
                     <!--   Generic Img and AddImg Div       -->
                     <!--
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
                    -->      
                </div>   
            </div>
                       
                        <!--  Add Img & Done Button Div  -->
                        <div class="container centrarbtn animated fadeInUp donediv">
                             <div class="form-group">
                               <!-- <li id="chooseimg" class="animated fadeIn btn additembtn"><a href="#" class="" role="button"><i class="fa fa-file-image-o fa-fw"></i> Elegir Im&aacute;gen...</a></li>-->
                               <a href="#" class="btn additembtn btnsave" role="button" id="create"><i class="fa fa-check-square-o fa-fw"></i> Crear Nuevo Menú</a>
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