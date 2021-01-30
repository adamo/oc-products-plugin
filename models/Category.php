<?php namespace Depcore\Products\Models;

use Model;
use Cms\Classes\Page as CmsPage;
use Cms\Classes\Theme;
// use RainLab\Translate\Classes\Translator;

/**
 * category Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\SimpleTree;

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
        'description',
        'short_description',
        ['slug', 'index' => true],
    ];


    public $slugs = ['slug' => 'name'];

    public $rules = [
        'name' => 'required|max:60',
    ];

    public $customMessages = [
        'name.required' => 'depcore.products::lang.categories.name.required',
        'name.max' => 'depcore.products::lang.categories.name.max',
    ];

    public $table = 'depcore_products_categories';

    protected $guarded = ['*'];

    protected $fillable = ['name','slug','description','short_description'];


    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'products' => [
            Product::class,
            'order' => 'sort_order asc',
            'conditions' => 'is_published = 1',
        ],
    ];

    public $attachOne = [
        'cover' => '\System\Models\File',
    ];

    public $morphOne = [
        'iconable' => [SvgIcon::class, 'name' => 'iconable']
    ];

    /**
     * Get only published elements from database
     *
     * @return Object
     * @author Adam
     **/
    public function scopePublished($query)
    {
        return $query->whereNotNull('is_published')->where ( 'is_published',true )->orderBy( 'sort_order' );
    }

    /**
     * Get first category by slug value
     *
     * @return Object:Category
     * @author Adam
     **/
    public function scopeFindBySlug($query, $slug)
    {
        return $this->isClassExtendedWith('RainLab.Translate.Behaviors.TranslatableModel')
            ? $this->transWhere('slug', $slug )->first(  )
            : $this->where('slug', $slug)->first(  );

        return $query->published()->where( 'slug', (string) $slug );
    }

    /**
     * get a valid url address
     *
     * @return string
     * @author Adam
     **/
    public function url()
    {
        return $this->getPageWithComponent() . $this->slug;
    }


    public static function resolveMenuItem($item, $url, $theme)
    {
        $pageName = $item->cmsPage;
        $cmsPage = \Cms\Classes\Page::loadCached($theme, $pageName);
        $items   = self
            ::orderBy('created_at', 'DESC')
            ->get()
            ->map(function (self $item) use ($cmsPage, $url, $pageName) {
                $pageUrl = $cmsPage->url($pageName, ['slug' => $item->slug]);

                return [
                    'title'    => $item->name,
                    'url'      => $pageUrl,
                    'mtime'    => $item->updated_at,
                    'isActive' => $pageUrl === $url,
                ];
            })
            ->toArray();

        return [
            'items' => $items,
        ];
    }


    /**
     * gets the page with ProductList compoment or returns false
     *
     * @return string
     * @author Adam
     **/
    protected function getPageWithComponent() : string
    {
        $theme = Theme::getActiveTheme();
        $pages = CmsPage::listInTheme($theme, true);
        $pageName = '';
        $pageUrl = '';

        foreach ($pages as $page) {
            if (!$page->hasComponent('productsList')) continue;
            $pageUrl = current(explode(':', $page->url));
            $pageName = strtolower($page->fileName);
        }

        return $pageUrl ? $pageUrl : '';

    }

}
