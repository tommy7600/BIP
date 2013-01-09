<?php

/**
 * config for menu generator
 * controller
 * |- action
 * |-- title
 * |-- role
 */
return array(
    'auth' => array(
        'login' => array(
            'title' => 'Login',
            'roles' => array('all'),
        ),
        'logout' => array(
            'title' => 'Logout',
            'roles' => array('all'),
        ),
    ),
    'articles' => array(
        'add' => array(
            'title' => 'Add new',
            'roles' => array('redactor', 'god'),
        ),
        'edit' => array(
            'title' => NULL,
            'roles' => array('redactor', 'god'),
        ),
        'search' => array(
            'title' => 'Add new',
            'roles' => array('redactor', 'god'),
        ),
        'index' => array(
            'title' => 'Add new',
            'roles' => array('redactor', 'god'),
        ),
        'remove' => array(
            'title' => NULL,
            'roles' => array('god'),
        ),
        'confirm' => array(
            'title' => NULL,
            'roles' => array('god'),
        ),
    ),
    'galleries' => array(
        'add' => array(
            'title' => 'Add new',
            'roles' => array('redactor', 'god'),
        ),
        'edit' => array(
            'title' => NULL,
            'roles' => array('redactor', 'god'),
        ),
        'index' => array(
            'title' => 'List',
            'roles' => array('redactor', 'god'),
        ),
        'remove' => array(
            'title' => NULL,
            'roles' => array('god'),
        ),
    ),
    'users' => array(
        'add' => array(
            'title' => 'Add new',
            'roles' => array('admin'),
        ),
        'settings' => array(
            'title' => NULL,
            'roles' => array('admin', 'redactor', 'god'),
        ),
        'index' => array(
            'title' => 'Add new',
            'roles' => array('admin'),
        ),
    ),
);
?>
