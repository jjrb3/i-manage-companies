<?php


namespace App\Models\Traits;


use Illuminate\Support\Facades\Storage;

/**
 * Trait CompanyMutatorsTraits
 * @package App\Models\Traits
 */
trait CompanyMutatorsTrait
{
    /**
     * @param $value
     * @return mixed
     */
    public function getLogoAttribute($value)
    {
        return Storage::url($value);
    }
}