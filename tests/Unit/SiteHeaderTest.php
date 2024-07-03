<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SiteHeaderTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function it_has_a_logo()
    {
        $this->visit(route('index'))
             ->seeElement('.logo-img');
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function it_has_working_navigation_links()
    {
        $categories = \TCG\Voyager\Models\Category::withTranslation(app()->getLocale())->get();
        $posts = \TCG\Voyager\Models\Post::withTranslation(app()->getLocale())->get();

        foreach($categories as $category) {
            $this->visit(route('index'))
                 ->click(\Illuminate\Support\Str::upper($category->name))
                 ->seePageIs(route('index'));

            foreach($posts as $post) {
                if($post->category_id == $category->id) {
                    $this->visit(route('index'))
                         ->click($post->title)
                         ->seePageIs(route('pages', ['id' => $post->id]));
                }
            }
        }

        $this->visit(route('index'))
             ->click(__('doctor'))
             ->seePageIs(route(__('doctor')));

        $this->visit(route('index'))
             ->click(__('contracted_institution'))
             ->seePageIs(route(__('contracted_institution')));

        $this->visit(route('index'))
             ->click('RESÝM GALERÝSÝ')
             ->seePageIs(route('galeries'));

        $this->visit(route('index'))
             ->click('Video Galeri')
             ->see('https://www.youtube.com/channel/UClE5EC-0wRoaONJ3P6EAH6w/videos');

        $this->visit(route('index'))
             ->click('Sanal Tur')
             ->see('https://www.toymedya.com/vipservis/');
    }
}