<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public static function attributes(): array
    {
        return [
            'id' => '#',
            'name' =>  __('translate.Name'),
            'permissions_id' =>  __('translate.Permissions'),
            'actions' =>  __('translate.Operations'),
        ];
    }

    /**
     * Datatable header attributes
     *
     * @return array
     */
    public static function headerAttributes(): array
    {
        return [
            'id',
            'name',
            'actions',
        ];
    }

    protected function permissionsLabel(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                return implode(', ', $this->permissions->pluck('description')->toArray());
            }
        );
    }
}
