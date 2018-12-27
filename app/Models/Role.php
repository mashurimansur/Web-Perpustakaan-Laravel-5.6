<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $casts = ['permissions' => 'array'];
    protected $fillable = ['nama_role', 'permissions'];

    public function hasAccess(array $permissions) {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {
                return true;
            }
        }
    }

    public function hasPermission(string $permission) {
        return isset($this->permissions[$permission])  ? $this->permissions[$permission] : false;
    }
}
