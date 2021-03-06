<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PortfolioRequest as StoreRequest;
use App\Http\Requests\PortfolioRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class PortfolioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PortfolioCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Portfolio');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/portfolio');
        $this->crud->setEntityNameStrings('portfolio', 'portfolios');
        $this->crud->orderBy('published_at', 'DESC');
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
//        $this->crud->setFromDb();

        $this->crud->addColumns([
            'title',
            [
                'name' => 'published_at',
                'label' => 'Published',
                'tab' => 'Custom'
            ]
        ]);

        $this->crud->addField([
            'name' => 'title',
            'label' => 'Title',
            'tab' => 'Custom'
        ]);

        $this->crud->addField([
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'tab' => 'Custom'
        ]);
        $this->crud->addField([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'wysiwyg',
            'tab' => 'Custom'
        ]);

        $this->crud->addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'browse',
            'tab' => 'Custom'
        ]);

        $this->crud->addField([
            'name' => 'dir_path',
            'label' => 'HTML dir path',
            'type' => 'browse',
            'tab' => 'Custom'
        ]);

        $this->crud->addField([
            'name' => 'categories',
            'label' => 'Categories',
            'entity' => 'categories',
            'pivot' => 'true',
            'attribute' => 'title',
            'tab' => 'Custom',
            'type' => 'select2_multiple'
        ]);

        $this->crud->addField([
            'name' => 'published_at',
            'label' => 'Published',
            'type' => 'datetime_picker',
            'datetime_picker_options' => [
                'format' => 'YYYY-MM-DD  HH:mm'
            ],
            'tab' => 'Custom',
            'default' => now()
        ]);

        $this->crud->addField([
            'name' => 'link',
            'label' => 'Link',
            'type' => 'url',
            'tab' => 'Custom'
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug',
            'tab' => 'Custom'
        ]);

        $this->crud->addField([
            'name' => 'user_id',
            'type' => 'select2',
            'label' => 'User',
            'entity' => 'user',
            'attribute' => 'name',
            'tab' => 'Custom'
        ]);

        //Seo
        $this->crud->addField([
            'type' => 'seo',
            'name' => 'seo',
            'tab' => 'Seo'
        ]);


        // add asterisk for fields that are required in PortfolioRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);

        $locale = $request->get('locale') ?? config('app.locale');

        foreach ($request->get('seo') as $key => $value) {
            $this->crud->entry->seo->setTranslation($key, $locale, $value);
        }
        $this->crud->entry->seo->save();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);

        $locale = $request->get('locale') ?? config('app.locale');

        foreach ($request->get('seo') as $key => $value) {
            $this->crud->entry->seo->setTranslation($key, $locale, $value);
        }
        $this->crud->entry->seo->save();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
