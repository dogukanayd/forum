<?php

namespace App;

use App\Thread;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model {
	use Favoritable, RecordsActivity;
	protected $guarded = [];

	protected $with = ['owner', 'favorites'];

	public function owner() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function thread() {
		return $this->belongsTo(Thread::class);
	}

}
