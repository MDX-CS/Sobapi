<?php

return [

    /*
    |--------------------------------------------------------------------------
    | HTTP Responses
    |--------------------------------------------------------------------------
    |
    */

    'deleted' => [
        'message' => 'Resource successfully deleted.',
    ],

    'created' => [
        'message' => 'Your entry was successfully stored.',
    ],

    'accepted' => [
        'message' => 'Your entry was successfully updated',
    ],

    'unauthenticated' => [
        'message' => 'Your access token is not valid.',
    ],

    'unauthorized' => [
        'message' => 'You are not authorized to perform this action.',
    ],

    'not_found' => [
        'message' => 'Desired resource was not found.',
    ],

    'unprocessable' => [
        'message' => 'Your data structure is invalid.',
    ],

    'internal_error' => [
        'message' => 'We are experiencing major issues on our servers. Try again later.',
    ],
];
