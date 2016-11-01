<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Cuenta Corriente");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Estado de Cuentas");
  $Head->setHead();

  /* Header */
  include('../../includes/inc.top.php');

  /* Body Content */
  // Search List Box
  ?>
  <div class="box animated fadeIn">
    <div class="box-header">
      <!-- List -->
      <div class="row ListView ListElement animated fadeIn ">
        <div class="container-fluid">
          <!-- sheet-title -->
          <div class="row  listRowSheet list-sheet-title">
            <div class="Sheet-Col sheet-column col-xs-2 Sheet-Date">
							<div class="listRowInner">
								<span>Fecha</span>
							</div>
						</div>
  					<div class="Sheet-Col sheet-column col-xs-3">
  						<div class="listRowInner">
  							<span>Concepto</span>
  						</div>
  					</div>
  					<div class="Sheet-Col sheet-column col-xs-4">
  						<div class="listRowInner">
  							<span>Forma de Pago</span>
  						</div>
  					</div>
  					<div class="Sheet-Col sheet-column col-xs-3">
  						<div class="listRowInner">
  							<span>Monto</span>
  						</div>
  					</div>
  					<div class="listActions flex-justify-center Hidden">
              <button class="btn action-btn blueBack"><i class="fa fa-pencil"></i></button>
              <button class="btn action-btn redBack"><i class="fa fa-trash"></i></button>
              <button class="Sheet-Notes-btn btn action-btn greenBack"><i class="fa fa-sticky-note-o"></i></button>
              <button class="btn action-btn yellowBack"><i class="fa fa-file-pdf-o"></i></button>
  					</div>
  				</div>
          <!-- /sheet-title -->
          <!-- sheet-item -->
          <div class="row listRow listRowSheet">
            <div class="Sheet-Col sheet-column col-xs-2 Sheet-Date">
							<div class="listRowInner">
								<span>31/10/16</span>
							</div>
						</div>
  					<div class="Sheet-Col sheet-column col-xs-3">
  						<div class="listRowInner">
  							<span>Sitio Web</span>
  						</div>
  					</div>
  					<div class="Sheet-Col sheet-column col-xs-4">
  						<div class="listRowInner">
  							<span>Debito</span>
  						</div>
  					</div>
  					<div class="Sheet-Col sheet-column col-xs-3">
  						<div class="listRowInner">
  							<span>$10</span>
  						</div>
  					</div>
            <div class="Sheet-Notes col-md-12 sheet-notes Hidden">
              <hr>
              <b>Observaciones:</b> Esta es una nota
            </div>
  					<div class="listActions flex-justify-center Hidden">
              <button class="btn action-btn greenBack"><i class="fa fa-sticky-note-o"></i></button>
              <button class="btn action-btn yellowBack"><i class="fa fa-file-pdf-o"></i></button>
              <button class="btn action-btn blueBack"><i class="fa fa-pencil"></i></button>
              <button class="btn action-btn redBack"><i class="fa fa-trash"></i></button>
  					</div>
  				</div>
          <!-- /sheet-item -->

          <!-- sheet-item -->
          <div class="row listRow listRowSheet">
            <div class="Sheet-Col sheet-column col-xs-2 Sheet-Date">
              <div class="listRowInner">
                <span>31/10/16</span>
              </div>
            </div>
            <div class="Sheet-Col sheet-column col-xs-3">
              <div class="listRowInner">
                <span>Sitio Web</span>
              </div>
            </div>
            <div class="Sheet-Col sheet-column col-xs-4">
              <div class="listRowInner">
                <span>Debito</span>
              </div>
            </div>
            <div class="Sheet-Col sheet-column col-xs-3">
              <div class="listRowInner">
                <span>$10</span>
              </div>
            </div>
            <div class="Sheet-Notes col-xs-12 sheet-notes">
              <hr>
              <b>Observaciones:</b> Esta es una nota
            </div>
            <div class="listActions flex-justify-center Hidden">
              <button class="btn action-btn greenBack"><i class="fa fa-sticky-note-o"></i></button>
              <button class="btn action-btn yellowBack"><i class="fa fa-file-pdf-o"></i></button>
              <button class="btn action-btn blueBack"><i class="fa fa-pencil"></i></button>
              <button class="btn action-btn redBack"><i class="fa fa-trash"></i></button>
            </div>
          </div>
          <!-- /sheet-item -->


          <!-- sheet-results -->
          <div class="row list-sheet-resuls">
  					<div class="col-xs-12 col-sm-3">
  					  <span class="result-title"><b>TOTAL:</b></span><span class="result-number">  <b>$1500</b></span>
  					</div>
  					<div class="col-xs-12 col-sm-3">
  					  <span class="result-title"><b>DEUDA:</b></span><span class="result-debt">  <b>$1500</b></span>
  					</div>
  				</div>
          <!-- /sheet-results -->
        </div><!-- container-fluid -->
      </div>

      <!-- /List -->
    </div><!-- box -->
  </div><!-- box -->

<?php

  /* Footer */
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>
