<?php
/**
 * Created by PhpStorm.
 * User: NgocDung
 * Date: 08/09/2018
 * Time: 3:57 CH
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;

class Branch extends Model
{
    const STATUS_TEXT = [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'Inactive',
    ];

    protected $table = 'branch';
    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'created_at','updated_at','status','phone','note','alias'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function room()
    {
        return $this->hasMany('App\Models\room', 'branchid');
    }

}