<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testGettingAllRestaurantsByOpeningStateOrder()
    {
        $response = $this->json('GET', '/api/restaurant-list');
        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        [
                            'id',
                            'RestaurantName',
                            'Branch',
                            'Phone',
                            'Email',
                            'Logo',
                            'Address',
                            'HouseNumber',
                            'Postcode',
                            'City',
                            'Latitude',
                            'Longitude',
                            'Url',
                            'Open',
                            'BestMatch',
                            'NewestScore',
                            'RatingAverage',
                            'Popularity',
                            'AverageProductPrice',
                            'DeliveryCosts',
                            'MinimumOrderAmount',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]
            );
    }

    /**
     * If searching by restaurant returns any value, searching key is provided as a query parameter
     */
    public function testSearchingRestaurantsByNameFound()
    {
        $response = $this->json('GET', '/api/search-restaurants', ["searchKey" => "la"]);
        $response->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        [
                            'id',
                            'RestaurantName',
                            'Branch',
                            'Phone',
                            'Email',
                            'Logo',
                            'Address',
                            'HouseNumber',
                            'Postcode',
                            'City',
                            'Latitude',
                            'Longitude',
                            'Url',
                            'Open',
                            'BestMatch',
                            'NewestScore',
                            'RatingAverage',
                            'Popularity',
                            'AverageProductPrice',
                            'DeliveryCosts',
                            'MinimumOrderAmount',
                            'created_at',
                            'updated_at'
                        ]
                    ]
                ]
            );
    }

    /**
     * If searching key parameter is missing
     */
    public function testSearchingRestaurantsByNameNotFound()
    {
        $response = $this->json('GET', '/api/search-restaurants', [ "searchKey" => ""]);
        $response->assertStatus(400);
    }
}
