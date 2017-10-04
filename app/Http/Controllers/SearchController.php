<?php

namespace App\Http\Controllers;

use Auth;
use File;
use App\User;
use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function searchForm()
    {
        $carsCount = DB::table('cars')->get();
        $brand = DB::table('brands')->get();
        $modelb = DB::table('modelbs')->get();
        $engine = DB::table('engines')->get();
        $color = DB::table('colors')->get();
        $data = [
            "brand"    => $brand,
            "modelb"    => $modelb,
            "engine"   => $engine,
            "color"    => $color,
            "carsCount" => count($carsCount),
        ];

        return view('search/search', $data);
    }

    public function searchResult(SearchRequest $request)
    {
        $range = str_replace(['BGN',','], '', $request->input('amount'));
        $price_range = explode("-", $range);
        $lowerPrice = (int)$price_range[0];
        $higherPrice = (int)$price_range[1];

        $conditions = array();
        foreach ($request->all() as $key => $value) {
            if ($value !== null) {
                switch ($key) {
                    case 'brand':
                            $conditions['brands.id'] = $value;
                        break;
                    case 'engine':
                            $conditions['engine_id'] = $value;
                        break;
                    case 'color':
                            $conditions['color_id'] = $value;
                        break;
                    case 'modelb':
                            $conditions['modelb_id'] = $value;
                        break;
                }
            }
        }

        $car = DB::table('cars')
                ->join('brands', 'cars.brand_id', '=', 'brands.id')
                ->join('modelbs', 'cars.modelb_id', '=', 'modelbs.id')
                ->join('engines', 'cars.engine_id', '=', 'engines.id')
                ->join('colors', 'cars.color_id', '=', 'colors.id')
                ->select('cars.*',
                        'brands.brand AS brand',
                        'modelbs.modelb AS modelb',
                        'engines.engine AS engine',
                        'colors.color AS color')
                ->whereBetween('price',[$lowerPrice, $higherPrice])
                ->where($conditions)->get();

        return view('search/list', ["car" => $car]);
    }
}
