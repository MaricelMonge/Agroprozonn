<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Insumo', array('type'=>'file', 'novalidate'=>'novalidate')); ?>
			<fieldset>
				<div class="page-header">
					<font color="green">
						<h2><?php echo __('Editar foto'); ?></h2>
						<br>
						<h3>Insumo: <?php echo $this->request->data['Insumo']['nombre'];?></h3>
					</font>
				</div>
				<?php
					echo $this->Form->input('codigo');?>
					<div>&nbsp</div>
						<?php echo $this->Form->input('image', array('type'=>'file','label'=>'Foto: ', 'id'=>'foto', 'class'=>'file', 'data-show-upload'=>'false','data-show-caption'=>'true'));
								echo $this->Form->input('image_dir', array('type'=>'hidden'));?>
					<div>&nbsp</div>
			</fieldset>
			<br>
			<?php echo $this->Form->end(array('label'=>'Guardar', 'class'=>'btn btn-success')); ?>
		</div>
	</div>
</div>	