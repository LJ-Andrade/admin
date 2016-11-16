<?php
    include("../../includes/inc.main.php");
    $ID           = $_GET['id'];
    $Edit         = new ProfileData($ID);
    $Data         = $Edit->GetData();
    ValidateID($Data);
    
    foreach($Edit->GetGroups() as $Group)
    {
      $Groups .= $Groups? ','.$Group['group_id'] : $Group['group_id']; 
    }
    $Menues = $DB->fetchAssoc("relation_menu_profile","DISTINCT(menu_id)","profile_id=".$ID);
    foreach($Menues as $MenuData)
    {
      $MenuArray[] = $MenuData['menu_id'];
    }
    if(is_array($MenuArray))
      $Menues = implode(",",$MenuArray);
    else
      $Menues = 0;
    
    $Head->setTitle($Menu->GetTitle());
    $Head->setStyle('../../../vendors/select2/select2.min.css'); // Select Inputs With Tags
    $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
    $Head->setHead();
    include('../../includes/inc.top.php');
?>
  <?php echo insertElement("hidden","action",'update'); ?>
  <?php echo insertElement("hidden","menues",$Menues); ?>
  <?php echo insertElement("hidden","groups",$Groups); ?>
  <?php echo insertElement("hidden","id",$ID); ?>
  <?php echo insertElement("hidden","newimage",$Edit->GetImg()); ?>
  <div class="box animated fadeIn">
    <div class="box-header flex-justify-center">
      <div class="col-lg-8 col-sm-12">
        <div class="innerContainer">
          <h4 class="subTitleB"><i class="fa fa-plus-circle"></i> Modifique los campos para editar al perfil <?php echo $Data['title']; ?></h4>
            <div class="row form-group inline-form-custom-2">
              <div class="col-xs-12 col-sm-6 inner">
                <label>T&iacute;tulo</label>
                <?php echo insertElement('text','title',$Data['title'],'form-control','placeholder="Ingrese un T&iacute;tulo" validateEmpty="Ingrese un t&iacute;tulo." validateFromFile="../../library/processes/proc.common.php///El perfil ya existe///action:=validate///actualtitle:='.$Data['title'].'///object:=ProfileData"'); ?>
              </div>
              <div class="col-xs-12 col-sm-6 inner">
                <label for="">Grupos</label>
                <div class="form-group" id="groups-wrapper">
                  <?php echo insertElement('multiple','group',$Groups,'form-control select2 selectGroupTags','data-placeholder="Seleccione Grupos" style="width: 100%;"',$DB->fetchAssoc('admin_group','group_id,title',"status<>'I' AND company_id = ".$_SESSION['company_id'])); ?>
                </div>
              </div>
              <!--<div class="col-xs-12 col-sm-12 inner">-->
              <!--  <label for="">Usuarios</label>-->
              <!--  <div class="form-group" id="groups-wrapper">-->
              <!--    <?php //echo insertElement('multiple','user','','form-control select2 selectUserTags','data-placeholder="Seleccione Usuarios" style="width: 100%;"',$DB->fetchAssoc('admin_user','admin_id,user',"status='A' AND company_id = ".$_SESSION['company_id'])); ?>-->
              <!--  </div>-->
              <!--</div>-->
              <div class="col-xs-12 col-sm-6 inner">
                <label for="">Im&aacute;gen</label>
                <div class="lineContainer txC">

                  <div class="flex-allCenter imgSelector">
                    <div class="imgSelectorInner">
                      <img src="<?php echo $Edit->GetImg(); ?>" class="img-responsive MainImg animated">
                      <?php echo insertElement('file','image','','Hidden'); ?>
                      <input readonly="readonly" id="Fileimage" name="FileField" class="Hidden" type="text">
                      <div style="height: 0px; width: 0px; overflow: hidden;">
                        <input id="image" name="image" class="Hidden" type="file">
                      </div>
                      <div class="imgSelectorContent">
                        <div id="SelectImg">
                          <i class="fa fa-upload"></i><br>
                           <p>Cargar Nueva Im&aacute;gen</p>
                        </div>
                      </div>
                      <div id="FileimageErrorDiv" class="ErrorText Red"></div>
                      <div id="imageErrorDiv" class="ErrorText Red"></div>
                    </div>
                  </div>
                  <div class="text-bottom">
                    <p><i class="fa fa-upload" aria-hidden="true"></i>
                    Haga Click sobre la im&aacute;gen </br> para cargar una desde su dispositivo</p>
                  </div>

                </div>
              </div>
              <div class="col-xs-12 col-sm-6 inner">
                <div id="treeview-checkbox" class="treeCheckBoxDiv">
                  <label for="">Permisos</label>
                  <?php echo $Menu->MakeTree(); ?>
                </div><!-- treeview-checkbox -->
              </div>
            </div><!-- inline-form -->
            <hr>
            <div class="txC">
              <button type="button" class="btn btn-success btnGreen" id="BtnCreate"><i class="fa fa-check"></i> Editar Perfil</button>
              <button type="button" class="btn btn-error btnRed" id="BtnCancel"><i class="fa fa-times"></i> Cancelar</button>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php
  $Foot->setScript('../../../vendors/bootstrap-switch/script.bootstrap-switch.min.js');
  $Foot->setScript('../../../vendors/select2/select2.min.js');
  $Foot->setScript('../../../vendors/treemultiselect/logger.min.js');
  $Foot->setScript('../../../vendors/treemultiselect/treeview.min.js');
  include('../../includes/inc.bottom.php');
?>
