<?php

namespace App;

trait Favoritable {
	protected static function bootFavoritable() {
		if (!auth()->check()) {
			return;
		}
		static::deleting(function ($model) {
			$model->favorites->each(function ($model) {
				$model->delete();
			});
		});
	}

	public function favorites() {
		return $this->morphMany(Favorite::class, 'favorited');
	}

	public function favorite() {
		$attributes = ['user_id' => auth()->id()];
		if (!$this->favorites()->where($attributes)->exists()) {
			return $this->favorites()->create($attributes);
		}
	}

	public function unfavorite() {
		$attributes = ['user_id' => auth()->id()];

		$this->favorites()->where($attributes)->delete();
	}

	public function isFavorited() {
		return !!$this->favorites->where('user_id', auth()->id())->count();
	}

	public function getIsFavoritedAttribute() {
		return $this->isFavorited();
	}

	public function getFavoritesCountAttribute() {
		return $this->favorites->count();
	}

}