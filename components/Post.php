<?php namespace RainLab\Blog\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Post as BlogPost;
use Rainlab\Blog\Models\Settings;

class Post extends ComponentBase
{
    /**
     * @var RainLab\Blog\Models\Post The post model used for display.
     */
    public $post;

    /**
     * @var string Reference to the page name for linking to categories.
     */
    public $categoryPage;

	public $headerImage;

    public function componentDetails()
    {
        return [
            'name'        => 'rainlab.blog::lang.settings.post_title',
            'description' => 'rainlab.blog::lang.settings.post_description'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'rainlab.blog::lang.settings.post_slug',
                'description' => 'rainlab.blog::lang.settings.post_slug_description',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ],
            'categoryPage' => [
                'title'       => 'rainlab.blog::lang.settings.post_category',
                'description' => 'rainlab.blog::lang.settings.post_category_description',
                'type'        => 'dropdown',
                'default'     => 'blog/category',
            ],
        ];
    }

    public function getCategoryPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function onRun()
    {

        $this->categoryPage = $this->page['categoryPage'] = $this->property('categoryPage');
		$this->headerImage = Settings::get('default_header_image');
        $this->post = $this->page['post'] = $this->loadPost();
    }

	public function jssor1() {
		if (!$this->post->hasJssor1()) {
			return '';
		}

		return$this->renderComponent('jssor1', ['gallery' => $this->post->jssor1->id]);
	}

	public function jssor2() {
		if (!$this->post->hasJssor2()) {
			return '';
		}

		return$this->renderComponent('jssor2', ['gallery' => $this->post->jssor2->id]);
	}

    protected function loadPost()
    {
        $slug = $this->property('slug');

        $post = new BlogPost;

        $post = $post->isClassExtendedWith('RainLab.Translate.Behaviors.TranslatableModel')
            ? $post->transWhere('slug', $slug)
            : $post->where('slug', $slug);

        $post = $post->isPublished()->first();

		if ($post == null) {
			throw new \Exception("Post with slug ".$slug." not found!");
		}
		
        /*
         * Add a "url" helper attribute for linking to each category
         */
        if ($post && $post->categories->count()) {
            $post->categories->each(function($category){
                $category->setUrl($this->categoryPage, $this->controller);
            });
        }

        return $post;
    }
}
