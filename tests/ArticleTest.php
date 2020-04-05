<?php


use Model\Article;
use PHPUnit\Framework\TestCase;

/**
 * TDD example
 * Test Driven Development
 * Testing the behavior of the code, not how its implemented
 * Class ArticleTest
 */
class ArticleTest extends TestCase
{

    protected Article $article;

    public function setUp(): void
    {
        $this->article = new Model\Article();;
    }


    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTittle()
    {

        $this->assertSame($this->article->getSlug(),'');
    }

    public function testSlugsSpacesReplacedByUnderScores()
    {
        $this->article->title = 'An example article';
        $this->assertSame($this->article->getSlug(),'An_example_article');
    }

    public function testSlugsSpacesReplacedBySingleUnderScores()
    {
        $this->article->title = "An example  \n  article";
        $this->assertSame($this->article->getSlug(),'An_example_article');
    }


    public function testSlugDoesNotStartOrEndWithUnderScore()
    {
        $this->article->title = ' An example article ';
        $this->assertSame($this->article->getSlug(),'An_example_article');
    }

    public function testSlugDoesNotHaveAnyNonWord()
    {
        $this->article->title = ' Read! This! Now! ';
        $this->assertSame($this->article->getSlug(),'Read_This_Now');
    }

    public function titleProvider(): array
    {
        return [
            'Slug has spaces Replaced by UnderScores'=> ['Just a Title','Just_a_Title'],
            'Slug Special characters'=> [' Read! This! Now! ','Read_This_Now']
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug(string $title,string $slug)
    {
        $this->article->title = $title;
        $this->assertEquals($this->article->getSlug(),$slug);
    }
}
