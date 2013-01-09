<?php

class Model_Image extends ORM
{
    protected $_belongs_to = array(
      'images_revision' => array()  
    );
}