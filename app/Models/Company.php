<?php

namespace App\Models;

use App\Models\Traits\CompanyMutatorsTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App
 */
class Company extends Model
{
    use CompanyMutatorsTrait;

    /**
     * @var string
     */
    protected $table = "companies";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];
}
