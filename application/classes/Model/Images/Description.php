<?php

class Model_Images_Description extends ORM
{
    protected $_belongs_to = array(
      'Images_Revision' => array()  
    );
}