<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class InscriptionTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            'id' => $modelOrCollection->id,
            'name' => getLangValue($modelOrCollection->name , 'en'),
            'image' => url(env('UPLOAD_PATH').'/'.$modelOrCollection->image),
        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
            'id' => $modelOrCollection->id,
            'name' => getLangValue($modelOrCollection->name , 'ar'),
            'image' => url(env('UPLOAD_PATH').'/'.$modelOrCollection->image),
        ];
    }

}