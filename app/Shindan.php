<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shindan extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function __contructor(array $attributes = []) {
        parent::__contructor($attributes);
        $this->attributes['id'] = Uuid::uuid4()->toString();
    }
}
