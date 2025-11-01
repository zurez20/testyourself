<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function playeranswer()
    {
        return $this->hasMany(Playeranswer::class, 'resultId', 'id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categoryId');
    }
    public function ageRange()
    {
        return $this->hasOne(Agerange::class, 'id', 'ageRangeId');
    }
    public function player()
    {
        return $this->hasOne(Player::class, 'id', 'playerId');
    }
}
