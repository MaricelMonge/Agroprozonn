<?php echo $this->Html->script(array('cart.js', 'jquery.animate-colors'), array('inline' => false)); ?>
<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'pedidos', 'action' => 'recalcular'))); ?>
<div class="page-header">
<h2><?php echo __('Pedidos'); ?></h2>
</div>
<div class="col-md-12">
<table class="table table-striped">
<thead>
<tr>
		<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
		<th><?php echo $this->Paginator->sort('Imagen'); ?></th>
		<th><?php echo $this->Paginator->sort('Precio'); ?></th>
		<th><?php echo $this->Paginator->sort('Cantidad'); ?></th>
		<th><?php echo $this->Paginator->sort('Subtotal'); ?></th>
		<th class="actions"><?php echo __('Actividad'); ?></th>
</tr>
</thead>
<tbody>
<?php $tabindex = 1; ?>	
<?php foreach($pedidos as $pedido): ?>
<tr>
	<td><div>
		<?php echo $this->Html->link($pedido['Producto']['nombre'], array('controller' => 'productos', 'action' => 'view', $pedido['Pedido']['producto_id'])); ?>
		</div>&nbsp;</td>
	<td><div>
		<?php echo $this->Html->image('../files/producto/image/' . $pedido['Producto']['image_dir']. '/' . 'thumb_' . $pedido['Producto']['image'],array('class' => 'img-pedidos')); ?>
		</div></td>
	<td><div id="price-<?php echo $pedido['Pedido']['id']; ?>">
			₡<?php echo $pedido['Producto']['precio']; ?>
		</div></td>
	<td><div>
			<?php echo $this->Form->input($pedido['Pedido']['id'], array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlenght' => 2, 'tabindex' => $tabindex++, 'data-id' => $pedido['Pedido']['id'], 'value' => $pedido['Pedido']['cantidad'])); ?>
		</div></td>
	<td><div style="background-color: none;" id="subtotal_<?php echo $pedido['Pedido']['id']; ?>">
			₡<?php echo $pedido['Pedido']['subtotal']; ?>
		</div></td>
	<td class="actions">
		<?php echo $this->Form->button('Eliminar', array('class' => 'btn btn-xs btn-danger remove', 'id' => $pedido['Pedido']['id']) );?>
	</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<div class="row">
	<div class="col col-sm-12">
		<div class="pull-right tr">

		<?php echo $this->Html->link('Quitar pedidos', array('controller' => 'pedidos', 'action' => 'quitar'), array('class' => 'btn btn-danger', 'confirm' => 'Está seguro de quitar todos los pedidos?')); ?>
		
		&nbsp;&nbsp;

		<?php echo $this->Form->button('Actualizar', array('class' => 'btn btn-success', 'escape' => false, 'name' => 'recalcular', 'value' => 'recalcular')); ?>

		<br><br><br><br>
		<span class="total">Total Orden:</span>
		<span id="total" class="total">
			₡<?php echo $total_pedidos; ?>
		</span>

		<br><br>
		
		<?php echo $this->Form->button('Procesar Orden', array('class' => 'btn btn-primary', 'escape' =>false, 'name' => 'procesar', 'value' => 'procesar')); ?>

		<?php echo $this->Form->end(); ?>

		</div>
	</div>
</div>
</div>
