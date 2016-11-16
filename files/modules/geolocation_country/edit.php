<?php
    include("../../includes/inc.main.php");
    $ID           = $_GET['id'];
    $Edit         = new GeolocationCountry($ID);
    $Data         = $Edit->GetData();
    ValidateID($Data);
    
    $Head->setTitle($Menu->GetTitle());
    $Head->setHead();
    include('../../includes/inc.top.php');
?>
  <?php echo insertElement("hidden","action",'update'); ?>
  <?php echo insertElement("hidden","id",$ID); ?>
  <div class="box animated fadeIn">
    <div class="box-header flex-justify-center">
      <div class="col-lg-8 col-sm-12">
        <div class="innerContainer">
          <h4 class="subTitleB"><i class="fa fa-plus-circle"></i> Complete los campos para agregar un nuevo pa&iacute;s</h4>
            <div class="row form-group inline-form-custom-2">
              <div class="col-xs-12 col-sm-6 inner">
                <label>T&iacute;tulo</label>
                <?php echo insertElement('text','title',$Data['title'],'form-control','placeholder="Ingrese un T&iacute;tulo" validateEmpty="Ingrese un t&iacute;tulo." validateFromFile="../../library/processes/proc.common.php///El t&iacute;tulo ya existe///action:=validate///actualtitle:='.$Data['title'].'///object:=GeolocationCountry"'); ?>
              </div>
            </div><!-- inline-form -->
            <hr>
            <div class="txC">
              <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-check"></i> Editar Pa&iacute;s</button>
              <button type="button" class="btn btn-error btnRed" id="BtnCancel"><i class="fa fa-times"></i> Cancelar</button>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php
include('../../includes/inc.bottom.php');
?>
