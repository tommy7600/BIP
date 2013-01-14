<?php

/**
 * config for menu generator
 * controller
 * |- action
 * |-- title
 * |-- role
 */
return array(
    'Index' => array(
        'title' => NULL,
        'actions' => array(
            'index' => array(
                'title' => 'Home',
                'roles' => array('all'),
            ),
        ),
    ),
    'Articles' => array(
        'title' => 'Articles',
        'actions' => array(
            'index' => array(
                'title' => 'All articles',
                'roles' => array('all'),
            ),
            'add' => array(
                'title' => 'Add new',
                'roles' => array('redactor', 'god'),
            ),
            'edit' => array(
                'title' => NULL,
                'roles' => array('redactor', 'god'),
            ),
            'search' => array(
                'title' => 'Search',
                'roles' => array('all'),
            ),
            'show' => array(
                'title' => 'List',
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
    ),
    'Galleries' => array(
        'title' => 'Galleries',
        'actions' => array(
            'add' => array(
                'title' => 'Add new',
                'roles' => array('redactor', 'god'),
            ),
            'edit' => array(
                'title' => NULL,
                'roles' => array('redactor', 'god'),
            ),
            'list' => array(
                'title' => 'List',
                'roles' => array('redactor', 'god'),
            ),
            'remove' => array(
                'title' => NULL,
                'roles' => array('god'),
            ),
            'uploadImages' => array(
                'title' => NULL,
                'roles' => array('redactor', 'god'),
            ),
            'selectImages' => array(
                'title' => NULL,
                'roles' => array('redactor', 'god'),
            ),
            'show' => array(
                'title' => NULL,
                'roles' => array('all'),
            ),
        ),
    ),
    'Users' => array(
        'title' => 'Users',
        'actions' => array(
            'add' => array(
                'title' => 'Add new',
                'roles' => array('admin'),
            ),
            'settings' => array(
                'title' => 'Settings',
                'roles' => array('admin', 'redactor', 'god'),
            ),
            'edit' => array(
                'title' => NULL,
                'roles' => array('admin'),
            ),
            'index' => array(
                'title' => 'List',
                'roles' => array('admin'),
            ),
        ),
    ),
    'Auth' => array(
        'title' => 'Authorization',
        'actions' => array(
            'login' => array(
                'title' => NULL,
                'roles' => array('all'),
            ),
            'logout' => array(
                'title' => NULL,
                'roles' => array('redactor', 'god', 'admin'),
            ),
        )
    ),
);
?>
