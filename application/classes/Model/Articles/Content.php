<?php

class Model_Articles_Content extends ORM
{
    protected $_belongs_to = array(
        'articles_revision'   => array()
    );
}