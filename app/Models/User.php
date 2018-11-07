<?php

namespace App\Models;

use App\Contracts\ModuleInterface;

use App\Fields\Column;
use App\Fields\FileField;
use App\Fields\TextField;
use App\Fields\ColumnSend;
use App\Fields\EmailField;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail, ModuleInterface
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function getColumns()
    {
        return [
            __('Nazwa'),
            __('Adres e-mail')
        ];
    }

    public function getFields()
    {
        return [
            'name', 'email'
        ];
    }

    public function saveFields()
    {
        return [
            'name', 'email'
        ];
    }

    public function getForm($item = null)
    {
        $fields = [
            (new TextField)->name('name[test]')->value($item->name?? null)->label(__('Nazwa użytkownika'))->placeholder(__('Wprowadź imię'))->class('form-control')->column(6)->render(), // Text field name
            (new EmailField)->name('email')->value($item->email?? null)->column(6)->label(__('Adres e-mail'))->placeholder(__('Wprowadź adres e-mail'))->class('form-control')->render(), // Email field email
        ];

        return [
            (new Column($fields))->name(__('Informacje'))->column(8)->render(),
            (new ColumnSend($fields))->name(__('Publikacja'))->column(4)->render()
        ];
    }

    public function getRules()
    {
        return [
            'name.test' => 'required|min:2|max:32',
            'email' => 'required|min:5|max:32|unique:users,email'
        ];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
