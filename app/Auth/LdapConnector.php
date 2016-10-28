<?php

namespace App\Auth;

use ErrorException;

class LdapConnector
{
    /**
     * Stores the database column for username.
     *
     * @var string
     */
    protected $username = 'network_name';

    /**
     * Attempts to connect to the ldap service.
     *
     * @return \Ldap|null
     */
    protected function connect()
    {
        return ldap_connect(
            config('services.ldap.host'),
            config('services.ldap.port')
        );
    }

    /**
     * Attempts to connects vie the uni ldap auth system.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function attempt(array $credentials)
    {
        if (! $conn = $this->connect()) {
            return false;
        }

        $username = config('services.ldap.prefix') . $credentials[$this->username];

        try {
            ldap_bind($conn, $username, $credentials['password']);
        } catch (ErrorException $e) {
            return false;
        }

        return true;
    }
}
