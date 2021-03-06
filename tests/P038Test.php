<?php

use tests\Base;
use Yaf\View\Simple;

/**
 * Check for Yaf_View_Simple error message outputing
 *
 * @run ./vendor/bin/phpunit --bootstrap ./tests/bootstrap.php ./tests/P038Test.php
 */
class P038Test extends Base
{
    public function setUp()
    {
        parent::setUp();

        require_once __DIR__ . '/common/build.inc';
        startup();
    }

    /**
     * @expectedException
     * @throws Exception
     */
    public function test()
    {
        $view = new Simple(__DIR__);

        $view->assign('name', 'laruence');
        $tpl  =  YAF_TEST_APPLICATION_PATH . '/tpls/foo.phtml';

        $html = <<<HTML
<?php 
   if ((x) { //syntax errors
   } 
?>
HTML;

        $exception = false;
        file_put_contents($tpl, $html);
        try {
            echo $view->render($tpl);
        } catch (Error $e) {
            $exception = true;
            $this->assertSame("syntax error, unexpected '}'", $e->getMessage());
        }

        $this->assertTrue($exception);
    }

    public function tearDown()
    {
        parent::setUp();
    }
}
