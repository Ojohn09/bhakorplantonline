<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factory;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;



class ProductControllerTest extends TestCase
{

    use RefreshDatabase;
    use DatabaseMigrations;
    protected $product;



     /**
     * Define hooks to migrate the database before and after each test.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }



    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


     /** @test */
     public function it_can_list_all_products()
     {
         $product = factory(Product::class, 5)->create();
        //  $product = factory(Product::class)->create();

         $response = $this->get(route('products.index'));

         $response->assertStatus(200);
         $response->assertViewIs('products.index');
         $response->assertViewHas('products');
         $response->assertSeeText($product->name);
     }


      /** @test */
    public function it_can_show_a_product()
    {
        $product = factory(Product::class)->create();

        $response = $this->get(route('products.show', $product));

        $response->assertStatus(200);
        $response->assertViewIs('products.show');
        $response->assertViewHas('product');
        $response->assertSeeText($product->name);
    }


    /** @test */
    public function it_can_create_a_product()
    {
        $productData = [
            'product_id' => '001',
            'name' => 'Product 1',
            'price' => '100',
        ];

        $response = $this->post(route('products.store'), $productData);

        $response->assertStatus(302
    );
    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseHas('products', $productData);
    $response->assertSessionHas('success', 'Product created successfully.');
    }


    /** @test */
public function it_can_update_a_product()
{
    $product = factory(Product::class)->create();
    $newProductData = [
        'product_id' => '002',
        'name' => 'Product 2',
        'price' => '200',
    ];

    $response = $this->put(route('products.update', $product), $newProductData);

    $response->assertStatus(302);
    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseHas('products', $newProductData);
    $response->assertSessionHas('success', 'Product updated successfully');
}

/** @test */
public function it_can_delete_a_product()
{
    $product = factory(Product::class)->create();

    $response = $this->delete(route('products.destroy', $product));

    $response->assertStatus(302);
    $response->assertRedirect(route('products.index'));
    $this->assertDatabaseMissing('products', ['id' => $product->id]);
    $response->assertSessionHas('success', 'Product deleted successfully');
}

}


