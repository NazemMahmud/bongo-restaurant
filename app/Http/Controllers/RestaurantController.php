<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestaurantCollection;
use App\Restaurants;
use Illuminate\Http\Request;
use App\Http\Resources\Restaurants as RestaurantsResource;
class RestaurantController extends Controller
{
    private $restaurants;
    function __construct(Restaurants $restaurants)
    {
        $this->restaurants = $restaurants;
    }

    /**
     * Return Restaurants by its opening state
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getRestaurantByOpeningStateOrder(){
        return RestaurantsResource::collection($this->restaurants->getRestaurantByOpeningState()) ;
//        return $this->restaurants->getRestaurantByOpeningState();
    }

    /**
     * Search restaurant by name
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function searchByRestaurantName(Request $request){
        if(isset($request->searchKey))
            return RestaurantsResource::collection($this->restaurants->searchByRestaurantName($request->searchKey)) ;

        return response()->json(['error' => 'No Data Found'], 401);
    }

    /**
     * @param Request $request
     * Here,  Parameter sortBy value should be a column name of the table. No mismatch will work.
     * Here,  Parameter orderBy value should be "desc" OR any other value OR empty. If the value is "desc", it will return in Descending Order.
     * For Any other orderBy value or empty orderBy value, it will return in Ascending Order.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getSortedRestaurants(Request $request){
        $sortBy = (isset($request->sortBy)) ? $request->sortBy : "" ;
        $orderBy = (isset($request->orderBy)) ? $request->orderBy : "" ;
        return RestaurantsResource::collection($this->restaurants->getSortedRestaurants($sortBy, $orderBy)) ;
    }
}
