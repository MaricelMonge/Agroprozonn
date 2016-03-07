<div class="container">
	<div class="row">
		<div class="col-md-6">
<?php echo $this->Form->create('Producto', array('type'=>'file', 'novalidate'=>'novalidate')); ?>
	<fieldset>
	<div class="page-header">
		<h2><?php echo __('Nuevo Producto'); ?></h2>
	</div>
	<?php 
	echo $this->Form->input('nombre', array('class'=>'form-control','label'=>'Nombre:'));
	echo $this->Form->input('precio', array('class'=>'form-control','label'=>'Precio ₡: '));
	echo $this->Form->input('descripcion', array('class'=>'form-control','label'=>'Descripción:'));
	echo $this->Form->input('image', array('type'=>'file','label'=>'Foto: ', 'id'=>'foto', 'class'=>'file', 'data-show-upload'=>'false','data-show-caption'=>'true'));
	echo $this->Form->input('image_dir',array('type'=>'hidden'));
	?>
	<br>
	</fieldset>
<?php echo $this->Form->end(array('label'=>'Crear Producto', 'class'=>'btn btn-success')); ?>
</div>
</div>
</div>