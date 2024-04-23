<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getData(Request $request)
    {
        $foods['наборы'] = Food::where('category','наборы')->get();
        $foods['суши'] = Food::where('category','суши')->get();
        $foods['роллы'] = Food::where('category','роллы')->get();
        $foods['супы'] = Food::where('category','супы')->get();
        $foods['wok'] = Food::where('category','wok')->get();
        $foods['салаты'] = Food::where('category','салаты')->get();
        $foods['десерты'] = Food::where('category','десерты')->get();
        $foods['закуски'] = Food::where('category','закуски')->get();
        $foods['напитки'] = Food::where('category','напитки')->get();

        foreach($foods as $category => $foodItems)
        {
            foreach($foodItems as $food)
            {
                $temp = '';
                $foodIngridients = DB::table('food_ingridient')->select('ingridient_id')->where('food_id',$food->id)->get();
                $count = 0;
                foreach ($foodIngridients as $ingridient)
                {
                    if ($temp != '')
                        $temp .= ', ' . DB::table('ingridient')->select('name')->where('id',$ingridient->ingridient_id)->value('name');
                    else
                        $temp .= DB::table('ingridient')->select('name')->where('id',$ingridient->ingridient_id)->value('name');
                    $count+=1;
                    if ($count==3)
                    {
                        $temp.='...';
                        break;
                    }
                    }
                $food->ingridients = $temp;
            }
        }

        return view('home', ['foods' => $foods]);
    }
}