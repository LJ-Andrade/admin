<?php
    include("../../includes/inc.main.php");
    //$Head->setTitle("Nuevo Usuario");
    $Menu   = new Menu();
    $Group  = new GroupData();
    $Head->setTitle($Menu->GetTitle());
    $Head->setStyle('../../../vendors/bootstrap-switch/bootstrap-switch.css'); // Switch On Off
    $Head->setHead();
    include('../../includes/inc.top.php');
?>
  <?php echo insertElement("hidden","action",'insert'); ?>
  <?php echo insertElement("hidden","menues",""); ?>
  <?php echo insertElement("hidden","groups",""); ?>
  <?php echo insertElement("hidden","newimage",$Admin->DefaultImg); ?>


  <div class="box animated fadeIn">
    <div class="box-header flex-justify-center">
      <div class="col-md-8 col-sm-12">
        <div class="innerContainer main_form">
          <h4 class="subTitleB"><i class="fa fa-tag"></i> Nuevo Movimiento</h4>
          <div class="row form-group inline-form-custom">
            <div class="col-xs-12 col-sm-6">
              <label for="">Cliente</label>
              <select class="form-control">
                <option selected disabled>Seleccione...</option>
                <option>Cliente1</option>
                <option>Cliente2</option>
                <option>Cliente3</option>
              </select>
            </div>
            <div class="col-xs-12 col-sm-6">
              <label for="">Tipo de Movimiento</label>
              <select class="form-control">
                <option selected disabled>Seleccione...</option>
                <option>D&eacute;bito</option>
                <option>Cr&eacute;dito</option>
              </select>
            </div>
          </div>
          <div class="row form-group inline-form-custom">
            <div class="col-xs-12 col-sm-4">
              <label for="">Concepto</label>
              <input class="form-control" placeholder="Concepto">
            </div>
            <div class="col-xs-12 col-sm-4">
              <label for="">Monto</label>
              <input class="form-control" placeholder="$">
            </div>
            <div class="col-xs-12 col-sm-4">
              <label for="">Fecha</label>
              <input class="form-control" placeholder="Fecha">
            </div>
          </div>
          <div class="row form-group inline-form-custom">
            <div class="col-xs-12 col-sm-4">
              <label for="">Estado</label>
              <select class="form-control">
                <option selected disabled>Seleccione...</option>
                <option>Acreditado</option>
                <option>Esperando acreditaci&oacute;n</option>
                <!-- // En caso de que sea un trabajo -->
                <option>En proceso</option>
                <option>Finalizado</option>
              </select>
            </div>
            <div class="col-xs-12 col-sm-4">
              <label for="">Frecuencia de Pago</label>
              <select class="form-control">
                <option selected disabled>Seleccione...</option>
                <option>Semanal</option>
                <option>Mensual</option>
                <option>Anual</option>
              </select>
            </div>
            <div class="col-xs-12 col-sm-4">
              <label for="">Medio de Pago</label>
              <select class="form-control">
                <option selected disabled>Seleccione...</option>
                <option>Mercado Pago</option>
                <option>Efectivo</option>
                <option>Dep&oacute;sito</option>
                <option>Transeferencia</option>
                <option>Cheque?</option>
              </select>
            </div>
          </div>
          <hr>
          <div class="row txC">
            <button type="button" class="MainDoneBtn btn btnBlue"><i class="fa fa-check-circle"></i> Finalizar</button>
          </div>
        </div>
      </div>
    </div><!-- box -->
  </div><!-- box -->

<?php
$Foot->setScript('../../../vendors/bootstrap-switch/script.bootstrap-switch.min.js');
include('../../includes/inc.bottom.php');
?>
<script type="text/javascript">
////////////////// Bootstrap Switch ////////////
$("[name='switchCheckbox']").bootstrapSwitch();

</script>
