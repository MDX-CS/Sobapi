<?php

namespace App\Auth\Providers;

use App\Auth\LdapConnector;
use Illuminate\Support\Str;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class SobapiUserProvider implements UserProvider
{
    /**
     * The hasher implementation.
     *
     * @var \Illuminate\Contracts\Hashing\Hasher
     */
    protected $hasher;

    /**
     * Ldap connector instance.
     *
     * @var \App\Auth\LdapConnector
     */
    protected $ldap;

    /**
     * Staff table model.
     *
     * @var string
     */
    protected $staff;

    /**
     * Student table model.
     *
     * @var string
     */
    protected $student;

    /**
     * Class constructor.
     *
     * @param  string  $staff
     * @param  string  $student
     * @return void
     */
    public function __construct(Hasher $hasher, LdapConnector $ldap, $staff, $student)
    {
        $this->hasher = $hasher;
        $this->ldap = $ldap;
        $this->staff = $staff;
        $this->student = $student;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        if ($student = $this->find('student', $identifier)) {
            return $student;
        }

        return $this->find('staff', $identifier);
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed   $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        //
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        //
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials)) {
            return;
        }

        if (! $this->ldap->attempt($credentials)) {
            return;
        }

        $staff = $this->createModel($this->staff)->newQuery();
        $student = $this->createModel($this->student)->newQuery();

        foreach ($credentials as $key => $value) {
            if (! Str::contains($key, 'password')) {
                $staff->where($key, $value);
                $student->where($key, $value);
            }
        }

        if ($student->first()) {
            return $student->first();
        }

        return $staff->first();
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $plain = $credentials['password'];

        return $this->hasher->check($plain, $user->getAuthPassword());
    }

    /**
     * Create a new instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function createModel($model)
    {
        $class = '\\'.ltrim($model, '\\');

        return new $class;
    }

    protected function find($type, $id)
    {
        return $this->createModel($this->{$type})->newQuery()->where(
            $this->createModel($this->{$type})->getKeyName(), $id
        )->first();
    }
}
