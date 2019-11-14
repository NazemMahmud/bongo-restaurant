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
     * If searching by restaurant returns empty object,
     * searching key is provided as a query parameter
     */
    public function testSearchingRestaurantsByNameEmptyObject()
    {
        $response = $this->json('GET', '/api/search-restaurants', ["searchKey" => "king"]);
        $response->assertStatus(400)
            ->assertJson([
                'message' => "No data found"
            ]);
    }

    /**
     * If searching key parameter is missing
     */
    public function testSearchingRestaurantsByNameNotFound()
    {
        $response = $this->json('GET', '/api/search-restaurants', ["searchKey" => ""]);
        $response->assertStatus(400);
    }

    /**
     * Sorting by column name
     * Without providing any orderBy value [descending or ascending]
     */
    public function testGettingAllRestaurantsSortedByColumnName()
    {
        $response = $this->json('GET', '/api/sort-restaurants',
            ["sortBy" => "ratingAverage",
                "orderBy" => ""
            ]);
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
     * Sorting by column name
     * Along with orderBy value
     */
    public function testGettingAllRestaurantsSortedByColumnNameWithOrderBy()
    {
        $response = $this->json('GET', '/api/sort-restaurants',
            ["sortBy" => "ratingAverage",
                "orderBy" => "desc"
            ]);
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
}
