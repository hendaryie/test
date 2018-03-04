<?php
/**
 * Created by PhpStorm.
 * User: edwinnnss
 * Date: 8/18/16
 * Time: 2:56 PM
 */

namespace App\Domain\Core\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserStampsModel extends Model
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });

        static::deleting(function ($model) {
            $model->deleted_by = Auth::user()->id;
            $model->save();
        });
    }

}