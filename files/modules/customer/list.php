<?php
  include('../../includes/inc.main.php');
  $Menu   = new Menu();
  $Head->setTitle("Usuarios");
  $Head->setIcon($Menu->GetHTMLicon());
  $Head->setSubTitle("Listado de Usuarios");
  $Head->setHead();

  /* Header */
  include('../../includes/inc.top.php');
  
  /* Body Content */ 
  // Search List Box
  
  ?>
<section class="content">
<div class="box">
    		<div class="box-body">
    			<!-- New User Button -->
		    	<a href="new.php"><button type="button" class="NewElementButton btn btnGreen animated fadeIn"><i class="fa fa-user-plus"></i> Nuevo Menú</button></a>
		    	<!-- /New User Button -->
		    	<!-- Search Filters -->
		    	<div class="SearFilters searchFiltersHorizontal animated fadeIn Hidden">
			        <div class="form-inline" id="SearchFieldsForm">
			        	<input id="view_type" name="view_type" value="list" type="hidden">
			        	<input id="view_page" name="view_page" value="1" type="hidden">
			        	<input id="view_order_field" name="view_order_field" value="title" type="hidden">
			        	<input id="view_order_mode" name="view_order_mode" value="asc" type="hidden">
			        	<!-- Title -->
          <div class="input-group">
            <span class="input-group-addon order-arrows sort-activated" order="title" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            <input id="title" name="title" class="form-control" placeholder="Título" type="text">
          <div id="titleErrorDiv" class="ErrorText Red"></div></div>
          <!-- Link -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="link" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            <input id="link" name="link" class="form-control" placeholder="Link" type="text">
          <div id="linkErrorDiv" class="ErrorText Red"></div></div>
          <!-- Parent -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="parent" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            <select id="parent" name="parent" class="form-control" firstvalue="" firsttext="Ubicación"><option value="">Ubicación</option></select>
          <div id="parentErrorDiv" class="ErrorText Red"></div></div>
          <!-- Public -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="public" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            <select id="public" name="public" class="form-control" firstvalue="" firsttext="Privacidad"><option value="">Privacidad</option><option value="N">Privado</option><option value="Y">Público</option></select>
          <div id="publicErrorDiv" class="ErrorText Red"></div></div>
          <!-- Type -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="status" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            <select id="view_status" name="view_status" class="form-control" firstvalue="" firsttext="Visibilidad"><option value="">Visibilidad</option><option value="A">Visible</option><option value="O">Oculto</option></select>
          <div id="view_statusErrorDiv" class="ErrorText Red"></div></div>
          <!-- Profile -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="profile" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            <select id="profile" name="profile" class="form-control" firstvalue="" firsttext="Perfil"><option value="">Perfil</option><option value="333">Superadministrador</option><option value="353">Pruebas Administrador</option></select>
          <div id="profileErrorDiv" class="ErrorText Red"></div></div>
          <!-- Group -->
          <div class="input-group">
            <span class="input-group-addon order-arrows" order="group" mode="asc"><i class="fa fa-sort-alpha-asc"></i></span>
            <select id="group" name="group" class="form-control" firstvalue="" firsttext="Grupo"><option value="">Grupo</option><option value="8">7UP</option><option value="6">Coca Cola</option><option value="9">Fanta</option><option value="11">Manaos</option><option value="12">Mirinda</option><option value="5">Pepsi</option><option value="7">Sprite</option></select>
          <div id="groupErrorDiv" class="ErrorText Red"></div></div>
			          <!-- Submit Button -->
			          <button type="button" class="btn btnGreen searchButton">Buscar</button>
			          <button type="button" class="btn btnGrey" id="ClearSearchFields">Limpiar</button>
			          <!-- Decoration Arrow -->
			          <div class="arrow-right-border">
			            <div class="arrow-right-sf"></div>
			          </div>
			        <div id="view_typeErrorDiv" class="ErrorText Red"></div><div id="view_pageErrorDiv" class="ErrorText Red"></div><div id="view_order_fieldErrorDiv" class="ErrorText Red"></div><div id="view_order_modeErrorDiv" class="ErrorText Red"></div></div>
			      </div>
			      <!-- /Search Filters -->
			      <div class="changeView">
			        <button class="ShowFilters SearchElement btn"><i class="fa fa-search"></i></button>
			        <button class="ShowList GridElement btn"><i class="fa fa-list"></i></button>
			        <button class="ShowGrid ListElement btn Hidden"><i class="fa fa-th-large"></i></button>
			      </div>
			      <div class="contentContainer txC" id="SearchResult" object="Menu"><!-- List Container -->
			        <div class="GridView row horizontal-list flex-justify-center GridElement animated fadeIn">
			          <ul>
			            <li id="grid_1" class="RoundItemSelect roundItemBig" title="Administración">
				            <div class="flex-allCenter imgSelector">
				              <div class="imgSelectorInner">
				                <img src="../../../skin/images/body/pictures/img-back-gen.jpg" alt="Administración" class="img-responsive">
				                <div class="imgSelectorContent">
				                  <div class="roundItemBigActions">
				                    <span class="roundItemActionsGroup"><a href="edit.php?id=1"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_1"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span>
				                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
				                  </div>
				                </div>
				              </div>
  				              <div class="roundItemText">
  				                <p><b>Administración</b></p>
  				              </div>
					            </div>
					          </li>
						        <li id="grid_19" class="RoundItemSelect roundItemBig" title="Agregar Producto">
					            <div class="flex-allCenter imgSelector">
					              <div class="imgSelectorInner">
					                <img src="../../../skin/images/body/pictures/img-back-gen.jpg" alt="Agregar Producto" class="img-responsive">
					                <div class="imgSelectorContent">
					                  <div class="roundItemBigActions">
					                    <span class="roundItemActionsGroup"><a href="edit.php?id=19"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_19"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span>
					                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
					                  </div>
					                </div>
					              </div>
					              <div class="roundItemText">
					                <p><b>Agregar Producto</b></p>
						            <p>(../product/new.php)</p>
					              </div>
					            </div>
						        </li>
						        <li id="grid_3" class="RoundItemSelect roundItemBig" title="Categorías">
				            <div class="flex-allCenter imgSelector">
				              <div class="imgSelectorInner">
				                <img src="../../../skin/images/body/pictures/img-back-gen.jpg" alt="Categorías" class="img-responsive">
				                <div class="imgSelectorContent">
				                  <div class="roundItemBigActions">
				                    <span class="roundItemActionsGroup"><a href="edit.php?id=3"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_3"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span>
				                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
				                  </div>
				                </div>
				              </div>
				              <div class="roundItemText">
				                <p><b>Categorías</b></p>
				              </div>
				            </div>
				          </li>
				          <li id="grid_24" class="RoundItemSelect roundItemBig" title="Categorías Eliminadas">
				            <div class="flex-allCenter imgSelector">
				              <div class="imgSelectorInner">
				                <img src="../../../skin/images/body/pictures/img-back-gen.jpg" alt="Categorías Eliminadas" class="img-responsive">
				                <div class="imgSelectorContent">
				                  <div class="roundItemBigActions">
				                    <span class="roundItemActionsGroup"><a href="edit.php?id=24"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_24"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span>
				                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
				                  </div>
				                </div>
				              </div>
				              <div class="roundItemText">
				                <p><b>Categorías Eliminadas</b></p>
					            <p>(../category/list.php?status=I)</p>
				              </div>
				            </div>
				          </li>
				          <li id="grid_36" class="RoundItemSelect roundItemBig" title="Clientes">
				            <div class="flex-allCenter imgSelector">
				              <div class="imgSelectorInner">
				                <img src="../../../skin/images/body/pictures/img-back-gen.jpg" alt="Clientes" class="img-responsive">
				                <div class="imgSelectorContent">
				                  <div class="roundItemBigActions">
				                    <span class="roundItemActionsGroup"><a href="edit.php?id=36"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_36"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span>
				                    <span class="roundItemCheckDiv"><a href="#"><button type="button" class="btn roundBtnIconGreen Hidden" name="button"><i class="fa fa-check"></i></button></a></span>
				                  </div>
				                </div>
				              </div>
				              <div class="roundItemText">
				                <p><b>Clientes</b></p>
				              </div>
				            </div>
				          </li>
			          </ul>
			        </div><!-- /.horizontal-list -->
			        <div class="row ListView ListElement animated fadeIn Hidden">
			          <div class="container-fluid">
			            <div class="row listRow" id="row_1" title="Administración">
									<div class="col-lg-2 col-md-2 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<span class="smallDetails">Icono</span>
											<span class="itemRowtitle"><i class="fa fa-gears" alt="Administración"></i></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="itemRowtitle">Administración</span>
											<span class="smallDetails"></span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Privacidad</span>
											<span class="itemRowtitle">Privado</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Perfiles</span>
											<span class="itemRowtitle">
											<span class="label label-primary">Pruebas Administrador</span> 
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Grupos</span>
											<span class="listTextStrong">
												<span class="label label-warning">Manaos</span> <span class="label label-warning">Mirinda</span> 
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990"></div>
									<div class="listActions flex-justify-center Hidden">
										<div><span class="roundItemActionsGroup"><a href="edit.php?id=1"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_1"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span></div>
									</div>
								</div><div class="row listRow listRow2 " id="row_19" title="Agregar Producto">
									<div class="col-lg-2 col-md-2 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<span class="smallDetails">Icono</span>
											<span class="itemRowtitle"><i class="fa fa-plus-square" alt="Agregar Producto"></i></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="itemRowtitle">Agregar Producto</span>
											<span class="smallDetails">../product/new.php</span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Privacidad</span>
											<span class="itemRowtitle">Privado</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Perfiles</span>
											<span class="itemRowtitle">
											Ninguno
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Grupos</span>
											<span class="listTextStrong">
												<span class="label label-warning">Pepsi</span> 
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990"></div>
									<div class="listActions flex-justify-center Hidden">
										<div><span class="roundItemActionsGroup"><a href="edit.php?id=19"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_19"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span></div>
									</div>
								</div><div class="row listRow" id="row_3" title="Categorías">
									<div class="col-lg-2 col-md-2 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<span class="smallDetails">Icono</span>
											<span class="itemRowtitle"><i class="fa fa-tag" alt="Categorías"></i></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="itemRowtitle">Categorías</span>
											<span class="smallDetails"></span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Privacidad</span>
											<span class="itemRowtitle">Privado</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Perfiles</span>
											<span class="itemRowtitle">
											Ninguno
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Grupos</span>
											<span class="listTextStrong">
												Ninguno
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990"></div>
									<div class="listActions flex-justify-center Hidden">
										<div><span class="roundItemActionsGroup"><a href="edit.php?id=3"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_3"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span></div>
									</div>
								</div><div class="row listRow listRow2 " id="row_24" title="Categorías Eliminadas">
									<div class="col-lg-2 col-md-2 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<span class="smallDetails">Icono</span>
											<span class="itemRowtitle"><i class="fa fa-trash" alt="Categorías Eliminadas"></i></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="itemRowtitle">Categorías Eliminadas</span>
											<span class="smallDetails">../category/list.php?status=I</span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Privacidad</span>
											<span class="itemRowtitle">Privado</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Perfiles</span>
											<span class="itemRowtitle">
											Ninguno
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Grupos</span>
											<span class="listTextStrong">
												Ninguno
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990"></div>
									<div class="listActions flex-justify-center Hidden">
										<div><span class="roundItemActionsGroup"><a href="edit.php?id=24"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_24"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span></div>
									</div>
								</div><div class="row listRow" id="row_36" title="Clientes">
									<div class="col-lg-2 col-md-2 col-sm-10 col-xs-10">
										<div class="listRowInner">
											<span class="smallDetails">Icono</span>
											<span class="itemRowtitle"><i class="fa fa-child" alt="Clientes"></i></span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="itemRowtitle">Clientes</span>
											<span class="smallDetails"></span>
										</div>
									</div>
									<div class="col-lg-3 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Privacidad</span>
											<span class="itemRowtitle">Privado</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallDetails">Perfiles</span>
											<span class="itemRowtitle">
											<span class="label label-primary">Superadministrador</span> 
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990">
										<div class="listRowInner">
											<span class="smallTitle">Grupos</span>
											<span class="listTextStrong">
												Ninguno
											</span>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 hideMobile990"></div>
									<div class="listActions flex-justify-center Hidden">
										<div><span class="roundItemActionsGroup"><a href="edit.php?id=36"><button type="button" class="btn btnBlue"><i class="fa fa-pencil"></i></button></a><a class="deleteElement" process="../../library/processes/proc.common.php" id="delete_36"><button type="button" class="btn btnRed"><i class="fa fa-trash"></i></button></a></span></div>
									</div>
								</div>
			          </div><!-- container-fluid -->
			        </div><!-- row -->
			        <input id="totalregs" name="totalregs" value="36" type="hidden">
			      <div id="totalregsErrorDiv" class="ErrorText Red"></div></div><!-- /Content Container -->
			    </div><!-- /.box-body -->
			    <div class="box-footer clearfix">
			      <!-- Paginator -->
			      <div class="pull-left form-inline paginationLeft">
			          <label for="RegsPerView" class="control-label">Mostrar </label>
			          <select id="regsperview" name="regsperview" class="form-control" firstvalue="" firsttext=""><option value="5">5</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>
			          de <b><span id="TotalRegs">36</span></b>
			      <div id="regsperviewErrorDiv" class="ErrorText Red"></div></div>
			      <ul class="paginationRight pagination no-margin pull-right"><li class="PrevPage"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li><li class="active pageElement" page="1"><a href="#">1</a></li><li class="pageElement" page="2"><a href="#">2</a></li><li class="pageElement" page="3"><a href="#">3</a></li><li class="pageElement" page="8"><a href="#">...8</a></li><li class="NextPage"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li></ul>
			      <!-- Paginator -->
			    </div>
			  </div><!-- /.box -->
			  <!-- DELETE SELECTED BUTTON -->
		    <div class="deleteSelectedAbs Hidden DeleteSelectedElements">
		      <i class="fa fa-trash-o"></i> Eliminar Seleccionados
		    </div>
			  <!-- DELETE SELECTED BUTTON-->
			  <!-- ACTIVATE SELECTED BUTTON -->
		    <div class="activateSelectedAbs  ActivateSelectedElements">
		      <i class="fa fa-check-circle"></i> Activar Seleccionados
		    </div>
       
      </section>


<?php
  
  /* Footer */
  $Foot->SetScript('../../js/script.searchlist.js');
  include('../../includes/inc.bottom.php');
?>