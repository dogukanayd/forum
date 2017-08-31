<?php

namespace App\Http\Controllers;

use App\Activity;
use App\User;

class ProfilesController extends Controller {
	//

	public function show(User $user) {
		$activities = $this->getActivity($user);

		return view('profiles.show', [
			'profileUser' => $user,
			'activities' => \App\Activity::feed($user),
		]);
	}

	protected function getActivity(User $user) {
		return $user->activity()->latest()->with('subject')->take(50)->get()->groupBy(function ($activity) {
			return $activity->created_at->format('Y-m-d');
		});
	}
}
