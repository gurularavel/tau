<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function attributes(): array
    {
        return [
            'id' => '#',
            'name' => __('translate.Name'),
            'email' => __('translate.Email'),
            'image' => __('translate.Image'),
            'password' => __('translate.Password'),
            'role_id' => __('translate.Role'),
            'actions' => __('translate.Actions'),
        ];
    }

    public static function headerAttributes(): array
    {
        return [
            'id',
            'image',
            'name',
            'email',
            'role_id',
            'actions',
        ];
    }

    /**
     * @return Attribute
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn(): string => $this->getAttribute('name') . ' ' . $this->getAttribute('surname'),
        );
    }

    /**
     * @return Attribute
     */
    protected function initials(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $name = mb_substr($this->getAttribute('name'), 0, 1);
                $surname = mb_substr($this->getAttribute('surname'), 0, 1);

                return $name . $surname;
            },
        );
    }

    /**
     * @return Attribute
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn(mixed $value) => $value ? bcrypt($value) : $this->password,
        );
    }

    /**
     * @return Attribute
     */
    protected function rolesLabel(): Attribute
    {
        return Attribute::make(
            get: fn(): string => implode(', ', $this->roles()->pluck('name')->toArray())
        );
    }

    /**
     * @return Attribute
     */
    protected function rolesIds(): Attribute
    {
        return Attribute::make(
            get: fn(): array => $this->roles()->pluck('id')->toArray()
        );
    }
}
