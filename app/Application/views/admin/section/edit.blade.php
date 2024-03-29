@extends(layoutExtend())

@section('title')
    {{ adminTrans('section' , 'section') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('section' , 'section') , 'model' => 'section' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/section/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            {!! extractFiled('name' , isset($item->name) ? $item->name : null,'text','section') !!}

            {!! extractFiled('details' , isset($item->details) ? $item->details : null , 'textarea' , 'section' , 'tinymce' ) !!}

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('section' , 'section') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
