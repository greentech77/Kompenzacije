<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entities';

    protected $fillable = ['address', 'post_num', 'post_town', 'email', 'fax', 'mobile', 'phone', 'vat_num', 'registration_num', 'bank_account'];
}
