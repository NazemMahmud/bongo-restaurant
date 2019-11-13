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
        $response->assertStatus(200);

        $response->assertJsonStructure(
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
}
