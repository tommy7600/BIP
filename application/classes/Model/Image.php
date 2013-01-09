<?php

class Model_Image extends ORM
{
    protected $_belongs_to = array(
      'Images_Revision' => array()  
    );
}