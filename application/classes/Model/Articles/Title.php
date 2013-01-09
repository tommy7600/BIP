<?php

class Model_Articles_Title extends ORM
{
    protected $_belongs_to = array(
        'Articles_Revision'   => array()
    );
}