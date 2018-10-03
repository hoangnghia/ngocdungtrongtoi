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

class Culture extends Model
{
    const STATUS_TEXT = [
        'ACTIVE' => 'Active',
        'INACTIVE' => 'Inactive',
    ];
    const TYPE = [
        '1' => 'Tầm nhìn',
        '2' => 'Sứ mệnh',
        '3' => 'Giá trị cốt lõi',
        '4' => 'Chính sách/phúc lợi',
    ];

    protected $table = 'culture';
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
        'id','title', 'description', 'image_url', 'content', 'type','created_at','updated_at','status'
    ];

}