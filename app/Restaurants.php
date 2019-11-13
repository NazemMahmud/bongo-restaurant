<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $table="restaurants";

    /**
     * Return Restaurants by its opening state
     * @return Restaurants[]|\Illuminate\Database\Eloquent\Collection
     */
    function getRestaurantByOpeningState(){
        $resource = Restaurants::orderBy('open', 'desc')->get();
        return $resource;
    }

    /**
     * Search restaurant by name
     * @param $searchKey
     * @return mixed
     */
    function searchByRestaurantName($searchKey){
        $resource = Restaurants::where('name', 'like', "%{$searchKey}%")->get();
        return $resource;
    }

    /**
     * @param string $sortBy, Here $sortBy value is the column name of the table. Default column name is "open"
     * According to the task, other column name might be: bestMatch, newestScore, ratingAverage, popularity, averageProductPrice, deliveryCosts, minimumOrderAmount
     * @param string $orderBy, Here  default ordering is Descending order
     * @return mixed
     */
    function getSortedRestaurants($sortBy="open", $orderBy="desc"){
        $resource = ($orderBy == "desc") ? Restaurants::orderBy($sortBy, $orderBy )->get() : Restaurants::orderBy($sortBy)->get();
        return $resource;
    }
}
