<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Ingridient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function getFoods()
    {
        $foods['наборы'] = Food::where('category', 'наборы')->get();
        $foods['суши'] = Food::where('category', 'суши')->get();
        $foods['роллы'] = Food::where('category', 'роллы')->get();
        $foods['супы'] = Food::where('category', 'супы')->get();
        $foods['wok'] = Food::where('category', 'wok')->get();
        $foods['салаты'] = Food::where('category', 'салаты')->get();
        $foods['десерты'] = Food::where('category', 'десерты')->get();
        $foods['закуски'] = Food::where('category', 'закуски')->get();
        $foods['напитки'] = Food::where('category', 'напитки')->get();

        foreach ($foods as $category => $foodItems) {
            foreach ($foodItems as $food) {
                $temp = '';
                $foodIngridients = DB::table('food_ingridient')->select('ingridient_id')->where('food_id', $food->id)->get();
                $count = 0;
                foreach ($foodIngridients as $ingridient) {
                    if ($temp != '')
                        $temp .= ', ' . DB::table('ingridient')->select('name')->where('id', $ingridient->ingridient_id)->value('name');
                    else
                        $temp .= DB::table('ingridient')->select('name')->where('id', $ingridient->ingridient_id)->value('name');
                    $count += 1;
                    if ($count == 3) {
                        $temp .= '...';
                        break;
                    }
                }
                $food->ingridients = $temp;
            }
        }
        return $foods;
    }

    public function getRole(Request $request)
    {
        $token = explode(".", $request->cookie('Auth'));
        $data = json_decode(base64_decode($token[1]), true);
        $role = $data['role'];
        return $role;
    }

    public function getModal(Request $request)
    {
        $del['ingridients'] = '';
        $ingridients = [];
        $ingridientsTemp = Ingridient::all();
        $ingridientsIn = [];

        if ($request->input('id') !==   null) {
            $id = $request->input('id');
            $foodTemp = Food::where('id', $id)->get();
            $del['id'] = $id;
            $del['name'] = $foodTemp[0]->name;
            $del['cost'] = $foodTemp[0]->cost;
            $foodIngridients = DB::table('food_ingridient')->select('ingridient_id')->where('food_id', $id)->get();

            foreach ($foodIngridients as $ingridient) {
                $t = DB::table('ingridient')->select('name')->where('id', $ingridient->ingridient_id)->value('name');
                array_push($ingridientsIn, ['id' => $ingridient->ingridient_id, 'name' => $t]);
                if ($del['ingridients'] != '') {
                    $del['ingridients'] .= ', ' . $t;
                } else
                    $del['ingridients'] .= $t;
            }
        }
        $ing = explode(", ", $del['ingridients']);
        foreach ($ingridientsTemp as $tmp) {
            if (!in_array($tmp->name, $ing)) {
                array_push($ingridients, $tmp);
            }
        }

        return [$del, $ingridientsIn, $ingridients];
    }

    public function getData(Request $request)
    {
        $foods = $this->getFoods();
        $role = $this->getRole($request);

        $temp = $this->getModal($request);
        $del = $temp[0];
        $ingridientsIn = $temp[1];
        $ingridients = $temp[2];

        return view('home', ['foods' => $foods, 'role' => $role, 'del' => $del, 'ingridientsIn' => $ingridientsIn, 'ingridients' => $ingridients]);
    }

    public function getModalForAddNewFood(Request $request)
    {
        $foods = $this->getFoods();
        $role = $this->getRole($request);
        $modal = true;

        $ingridients = [];
        $newIngridients = Ingridient::all();

        Session::put('newIngridients', $newIngridients);
        Session::put('ingridients', $ingridients);
        return view('home', ['foods' => $foods, 'role' => $role, 'modal' => $modal, 'newIngridients' => $newIngridients, 'ingridients' => $ingridients]);
    }

    public function addIngridientNewFood(Request $request)
    {
        $foods = $this->getFoods();
        $role = $this->getRole($request);
        $modal = true;

        $ingridients = Session::get('ingridients', []);

        $newIngridients = Session::get('newIngridients', []);

        $id = $request->input('ingridient_id');

        $ingridient = Ingridient::where('id', $id)->get();

        array_push($ingridients, $ingridient);

        foreach ($newIngridients as $key => $ingridientTemp) {
            if ($ingridientTemp->id == $id) {
                unset($newIngridients[$key]);
            }
        }

        Session::put('newIngridients', $newIngridients);
        Session::put('ingridients', $ingridients);

        return view('home', ['foods' => $foods, 'role' => $role, 'modal' => $modal, 'newIngridients' => $newIngridients, 'ingridients' => $ingridients]);
    }


    public function addIngridient(Request $request)
    {
        $food_id = $request->input('id');
        $ingridient_id = $request->input('ingridient_id');

        DB::table('food_ingridient')->insert(['food_id' => $food_id, 'ingridient_id' => $ingridient_id]);

        $foods = $this->getFoods();
        $role = $this->getRole($request);

        $temp = $this->getModal($request);
        $del = $temp[0];
        $ingridientsIn = $temp[1];
        $ingridients = $temp[2];

        return view('home', ['foods' => $foods, 'role' => $role, 'del' => $del, 'ingridientsIn' => $ingridientsIn, 'ingridients' => $ingridients]);
    }

    public function deleteIngridient(Request $request)
    {
        $food_id = $request->input('id');
        $ingridient_id = $request->input('ingridient_id');

        DB::table('food_ingridient')->where('food_id', $food_id)->where('ingridient_id', $ingridient_id)->delete();

        $foods = $this->getFoods();
        $role = $this->getRole($request);

        $temp = $this->getModal($request);
        $del = $temp[0];
        $ingridientsIn = $temp[1];
        $ingridients = $temp[2];

        return view('home', ['foods' => $foods, 'role' => $role, 'del' => $del, 'ingridientsIn' => $ingridientsIn, 'ingridients' => $ingridients]);
    }

    public function deleteIngridientNewFood(Request $request)
    {
        $foods = $this->getFoods();
        $role = $this->getRole($request);
        $modal = true;

        $ingridients = Session::get('ingridients', []);

        $id = $request->input('ingridient_id');

        $ingridient = Ingridient::where('id', $id)->get();

        array_push($ingridients, $ingridient);

        $newId = [];

        foreach ($ingridients as $key => $ingridientTemp) {
            if ($ingridientTemp[0]->id == $id) {
                unset($ingridients[$key]);
            } else {
                array_push($newId, $ingridientTemp[0]->id);
            }
        }

        $newIngridients = Ingridient::all();
        foreach ($newIngridients as $key => $t) {
            if (in_array($t->id, $newId)) {
                unset($newIngridients[$key]);
            }
        }

        Session::put('newIngridients', $newIngridients);
        Session::put('ingridients', $ingridients);

        return view('home', ['foods' => $foods, 'role' => $role, 'modal' => $modal, 'newIngridients' => $newIngridients, 'ingridients' => $ingridients]);
    }

    public function AddNewFood(Request $request)
    {
        $foods = $this->getFoods();
        $role = $this->getRole($request);

        $name = $request->input('name');
        $cost = $request->input('cost');
        $category = $request->input('category');

        $ingridients = Session::get('ingridients');

        $food = new Food();

        $food->name = $name;
        $food->cost = $cost;
        $food->category = $category;

        $food->save();

        foreach ($ingridients as $ingridient) {
            DB::table('food_ingridient')->insert(['food_id' => $food->id, 'ingridient_id' => $ingridient[0]->id]);
        }

        return view('home', ['foods' => $foods, 'role' => $role]);
    }
    
    public function returnRoleManager(Request $request) {
        $role = $this->getRole($request);

        if ($role != 3) {
            return response()->json(['status' => Response::HTTP_FORBIDDEN]);
        }
        else {
            $users = User::all();
        }
        return view('role', ['role' => $role, 'users' => $users]);
    }
    
    public function changeRole(Request $request) {
        $user_id = $request->only('id')['id'];
        $new_role = $request->only('new_role')['new_role'];
        
        $role = User::updateOrCreate(['id' => $user_id], ['privilege' => $new_role]);

        return redirect('role');
    }
}
