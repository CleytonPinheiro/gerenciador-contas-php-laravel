<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'debit', 'credit', 'description', 'start_account', 'holder_id'];

    public function holder()
    {
        return $this->hasOne(Holders::class);
    }
}
