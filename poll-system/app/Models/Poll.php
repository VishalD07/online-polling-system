<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    // allow mass assignment
    protected $fillable = ['question', 'status'];

    // relationship: poll has many options
    public function options()
    {
        return $this->hasMany(PollOption::class);
    }
}
