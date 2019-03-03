<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\News\AddRequestNews;
use App\Application\Requests\Admin\News\UpdateRequestNews;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\NewssDataTable;
use App\Application\Model\News;
use Yajra\Datatables\Request;
use Alert;

class NewsController extends AbstractController
{
    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    public function index(NewssDataTable $dataTable){
        return $dataTable->render('admin.news.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.news.edit' , $id);
    }

    public function store(AddRequestNews $request){
         return $this->storeOrUpdate($request , null , 'admin/news');
    }

    public function update($id , UpdateRequestNews $request){
             return $this->storeOrUpdate($request , $id , 'admin/news');
    }

    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.news.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/news')->with('sucess' , 'Done Delete news From system');
    }
}
