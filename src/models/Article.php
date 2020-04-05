<?php

namespace Model;

class Article
{
    public $title;

    /**
     * Article constructor.
     */
    public function __construct()
    {
    }

    public function getSlug():string
    {
        $this->title = preg_replace('/\s+/','_',$this->title) ;
        return trim(preg_replace('/[^\w]+/','',$this->title),'_');
    }
}