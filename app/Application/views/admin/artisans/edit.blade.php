@extends(layoutExtend())

@section('title')
    {{ adminTrans('artisans' , 'artisans') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('artisans' , 'artisans') , 'model' => 'artisans' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/artisans/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

 
            <div class="form-group">
                <label for="">{{adminTrans('artisans','numero_artisant')}}</label>
                <input type="text" name="numero_artisant" value="{{isset($item->numero_artisant) ? $item->numero_artisant : null}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">{{adminTrans('artisans','name_artisant')}}</label>
                <input type="text" name="name_artisant" value="{{isset($item->name_artisant) ? $item->name_artisant : null}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">{{adminTrans('artisans','email_artisan')}}</label>
                <input type="text" name="email_artisan" value="{{isset($item->email_artisan) ? $item->email_artisan : null}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">{{adminTrans('artisans','adresse_artisan')}}</label>
                <input type="text" name="adresse_artisan" value="{{isset($item->adresse_artisan) ? $item->adresse_artisan : null}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">{{adminTrans('artisans','telephone_artisan')}}</label>
                <input type="text" name="telephone_artisan" value="{{isset($item->telephone_artisan) ? $item->telephone_artisan : null}}" class="form-control">
            </div>



            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('artisans' , 'artisans') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
