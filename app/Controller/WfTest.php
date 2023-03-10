<?php


namespace App\Controller;
use Hyperf\Di\Annotation\AnnotationInterface;

#[ClassAnnotation]
class WfTest
{

   public $foo;
    public function wftest()
    {
        return "wftest";
    }
}