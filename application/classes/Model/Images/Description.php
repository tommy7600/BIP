<?php

class Images_Description extends ORM
{
    protected $_belongs_to = array(
      'images_revision' => array()  
    );
}