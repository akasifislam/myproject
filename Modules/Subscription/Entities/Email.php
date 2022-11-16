<?php

namespace Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    protected static function newFactory()
    {
        return \Modules\Subscription\Database\factories\EmailFactory::new();
    }
}
