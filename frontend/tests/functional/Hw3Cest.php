<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class Hw3Cest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests

    /**
     * @param FunctionalTester $I
     * @dataProvider pageProvider
     */
    public function tryToTest(FunctionalTester $I, \Codeception\Example $data)
    {
        $I->amOnPage([$data['url']]);
        $I->see($data['a'],'li.active>a');

    }
    /**
     * @return array
     */
    protected function pageProvider() // alternatively, if you want the function to be public, be sure to prefix it with `_`
    {
        return [
            ['url'=>"/", 'a'=>"Home"],
            ['url'=>"site/about", 'a'=>"About"],
            ['url'=>"site/contact", 'a'=>"Contact"],
            ['url'=>"site/signup", 'a'=>"Signup"],
            ['url'=>"site/login", 'a'=>"Login"],
        ];
    }

}
