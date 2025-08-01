<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermissions extends Model
{
    use HasFactory;

    protected $table = 'role_permissions';
    protected $fillable = [
        'role_id',
        'permission_id',
        'created_at',
        'updated_at',
    ];
}
