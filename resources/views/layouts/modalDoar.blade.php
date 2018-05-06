<!-- Modal Doar -->
<div class="modal fade" id="modalDoar" role="dialog">
	<div class="modal-dialog modal-md centro">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Doação para <b>Asilo Vovô Simeão</b></h3>
			</div>
			<div class="modal-body">
				<div class="container">
					<form role="form" class="" method="post">
						<div class="col-md-6">
							<h3>Necessidade: <b>20 Litros de Leite</b></h3>
							<p>Data: 15/02/2018 - Data Crítica: 19/03/2018</p>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="txt_quant">Quant.</label>  
								<div class="col-md-10">
									<input id="txt_quant" type="number" class="form-control input-lg fonte30" name="txt_quant" min="0" required>
									<span class="help-block">Quant. de <b>Litros de Leite</b> está doando.</span>  
								</div>
							</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="txt_data">Data</label>  
								<div class="col-md-10">
									<input id="txt_data" name="txt_data" type="date" class="form-control input-lg fonte24" required>
									<span class="help-block">Melhor dia para recolher a doação.</span>  
								</div>
							</div>
			
							<div>
								<button type="submit" id="bt_confirmaDoacao" class="btn btn-lg btn-success">Confirmar Doação</button><div id="success" style="color:#34495e;"></div>
							</div>
						</div>
					</form>
				</div> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>
<!-- /Modal Doar -->