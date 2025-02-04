<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function fizzBuzz(Request $request)
    {
        $fizzBuzz = '';
        if ($request->fizzBuzzNumber) {
            $fizzBuzz = $this->calculateFizzBuzz($request);
        }
        return view('fizzBuzz', [
            'fizzBuzz' => $fizzBuzz,
        ]);
    }

    protected function calculateFizzBuzz(Request $request)
    {
        $res = [];
        $mp = [3 => "Fizz", 5 => "Buzz"];
        $divisors = [3, 5];
        for ($i = 1; $i <= $request->fizzBuzzNumber; $i++) {
            $s = "";
            foreach ($divisors as $d) {
                if ($i % $d === 0) {
                    $s .= $mp[$d];
                }
            }
            if ($s === "") {
                $s .= $i;
            }
            $res[] = $s;
        }
        $fizzBuzz = implode(' ', $res);
        return $fizzBuzz;
    }
}
