<?php

class Model_Galleries_Title extends ORM
{
    protected $_belongs_to = array(
        'Galleries_Revision' => array()
    );
}