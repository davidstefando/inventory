<?php

class ProductSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = array(
				array('sku' => 'SKU-PROD-1', 'barcode' => '345346','name' => 'Product Number 1', 'category' => 
					2, 'location' => 1, 'unit' => 1, 'minimum_stock' => 10),
				array('sku' => 'SKU-PROD-2', 'barcode' => '345347','name' => 'Product Number 2', 'category' => 
					2, 'location' => 1, 'unit' => 1, 'minimum_stock' => 10),
				array('sku' => 'SKU-PROD-3', 'barcode' => '345348','name' => 'Product Number 3', 'category' => 
					2, 'location' => 1, 'unit' => 1, 'minimum_stock' => 10),
				array('sku' => 'SKU-PROD-4', 'barcode' => '345342','name' => 'Product Number 4', 'category' => 
					2, 'location' => 1, 'unit' => 1, 'minimum_stock' => 10),
				array('sku' => 'SKU-PROD-5', 'barcode' => '345354','name' => 'Product Number 5', 'category' => 
					2, 'location' => 1, 'unit' => 1, 'minimum_stock' => 10),
				array('sku' => 'SKU-PROD-6', 'barcode' => '345362','name' => 'Product Number 6', 'category' => 
					2, 'location' => 1, 'unit' => 1, 'minimum_stock' => 10),
				array('sku' => 'SKU-PROD-7', 'barcode' => '345312','name' => 'Product Number 7', 'category' => 
					2, 'location' => 1, 'unit' => 1, 'minimum_stock' => 10),
				array('sku' => 'SKU-PROD-8', 'barcode' => '345355','name' => 'Product Number 8', 'category' => 
					2, 'location' => 1, 'unit' => 1, 'minimum_stock' => 10),
			);

		DB::table('products')->insert($data);
	}

} 