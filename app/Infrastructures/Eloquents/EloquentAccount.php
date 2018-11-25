<?php

namespace App\Infrastructures\Eloquents;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Domains\Account\AccountId;
use App\Domains\Account\AccountName;
use App\Domains\Account\Account;
use App\Domains\Account\AccountHashedPassword;

use App\Domains\Email\EmailAddress;

use App\Domains\CardAccount\CardAccounts;

class EloquentAccount extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'users';

    public function toDomain()
    {
        return new Account(
            new AccountId($this->id),
            new AccountName($this->name),
            new EmailAddress($this->email),
            new AccountHashedPassword($this->password),
            new CardAccounts
        );
    }
}
