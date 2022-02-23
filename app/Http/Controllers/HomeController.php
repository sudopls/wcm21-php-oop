<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hero;

class HomeController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		// Loop over collection of data (User object with hero object)
		foreach (User::all() as $user)
		{
			// $user är nu ett objekt innehållandes en array där den första innehåller våran hero.
			// $hero = $user->hero[0]->name;
			echo $user->hero;
		}

		return view('home', [
			'user' => $user,
			// 'hero' => $hero,
		]);
	}
}
