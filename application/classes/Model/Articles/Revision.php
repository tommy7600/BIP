<?php

class Model_Articles_Revision extends ORM
{
    protected $_belongs_to = array(
        'title' => array(
            'model' => 'Articles_Title',
            'foreign_key' => 'title_id'
        ),
        'content' => array(
            'model' => 'Articles_Content',
            'foreign_key' => 'content_id'
        ),
        'article'   => array(
            'model' => 'Article',
            'foreign_key' => 'article_id'
        ),
        'gallery' => array(
            'model' => 'Gallery',
            'foreign_key' => 'gallery_id'
        ),
        'author' => array(
            'model' => 'User',
            'foreign_key' => 'author_id'
        ),
        'approved_by' => array(
            'model' => 'User',
            'foreign_key' => 'approved_by_id'
        ),
    );
    
   
}