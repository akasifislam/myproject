<?php

namespace Modules\Chat\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return \Modules\Chat\Database\factories\ChatFactory::new();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
