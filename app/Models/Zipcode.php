<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    use HasFactory;

    public function federalEntity() {
        return $this->hasOne(FederalEntity::class);
    }

    public function municipality() {
        return $this->hasOne(Municipality::class);
    }

    public function settlements() {
        return $this->hasMany(Settlement::class);
    }
}
