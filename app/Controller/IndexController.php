<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use App\Controller\WfTest;
use Hyperf\View\RenderInterface;
#[AutoController]
#[WfTest(foo="123")]
class IndexController extends AbstractController
{
    private WfTest $wftest;

    public function __construct(WfTest $wfTest)
    {
        $this->wftest=$wfTest;
    }

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function test(RenderInterface $render)
    {
//    var_dump($this->wftest);
//        $id=$request->input('id',1);
//    //return (string)$id;
//
//        return $this->wftest->wftest();

        $res=AnnotationCollector::getClassesByAnnotation(WfTest::class);
        var_dump($res);
    return $render->render('test',['name'=>'Hyperf']);
    }
}
