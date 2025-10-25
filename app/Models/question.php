<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categoryId')->where('status', 1);
    }
    public function agerange()
    {
        return $this->hasOne(Agerange::class, 'id', 'ageRangeId')->where('status', 1);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class, 'questionId', 'id');
    }
}
