<?php

use Kirby\Exception\PermissionException;

return function ($kirby) {
    // send already logged-in user somewhere else if needed
    // if ($kirby->user()) {
    //     go('panel/login');
    // }

    // create empty error/success
    $errors = [];
    $success = null;

    // the form was sent
    if (get('register') && $kirby->request()->is('POST')) {
        if (site()->portfolio_mode()->toBool() === true) {
            $errors[] = 'Registration is disabled in Portfolio Mode.';

            return [
                'errors' => $errors,
                'success' => $success,
                'data' => [],
            ];
        }

        // honeypot field filled?
        if(!empty(get('website'))) {
            go('/');
            exit;
        }
        // validate CSRF token
        if (csrf(get('csrf')) === true) {
            // get form data
            $data = [
                'email' => get('email'),
                'password' => get('password'),
                'validate' => get('validate'),
            ];
            // validation rules
            $rules = [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ];
            // error messages
            $messages = [
                'email' => 'Please enter a valid email address',
                'password' => 'Please enter a password',
            ];
            // check if data is valid
            if ($invalid = invalid($data, $rules, $messages)) {
                $errors = $invalid;
            } elseif (strlen($data['password']) < 8) {
                $errors[] = 'Please enter a password with at least 8 characters';
            } elseif ($data['password'] !== $data['validate']) {
                $errors[] = 'The passwords do not match';

            // the data is fine, let's create a user
            } else {
                // authenticate
                $kirby->impersonate('kirby');
                try {
                    // create new user
                    $user = $kirby->users()->create([
                        'email' => $data['email'],
                        'password' => $data['password'],
                        'role' => 'user',
                        'language' => 'en',
                    ]);
                    if (isset($user) === true) {
                        // create the authentication challenge
                        try {
                            $success = 'The user "' . $user->email() . '" has been created';
                        } catch (PermissionException $e) {
                            $errors[] = $e->getMessage();
                        }
                    }
                } catch (Exception $e) {
                    $errors[] = $e->getMessage();
                }
            }
        } else {
            $errors[] = 'Invalid CSRF token.';
        }
    }

    return [
        'errors' => $errors,
        'success' => $success,
        'data' => $data ?? [],
    ];
};
