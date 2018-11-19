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

class Feels extends Model
{
    const STATUS_TEXT = [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'Inactive',
    ];

    protected $table = 'feels';
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
        'title', 'description', 'image_url', 'content', 'userId', 'created_at','updated_at','status','name'
    ];

}