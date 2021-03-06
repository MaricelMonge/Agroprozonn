<?php
App::uses('Producto', 'Model');

/**
 * Producto Test Case
 */
class ProductoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.producto',
		'app.cliente',
		'app.clientes_producto',
		'app.socio',
		'app.productos_socio',
		'app.proveedore',
		'app.insumo',
		'app.insumos_proveedore',
		'app.proveedores_socio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Producto = ClassRegistry::init('Producto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Producto);

		parent::tearDown();
	}

}
