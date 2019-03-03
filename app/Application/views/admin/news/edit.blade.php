@extends(layoutExtend())

@section('title')
    {{ adminTrans('news' , 'news') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection

@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('news' , 'news') , 'model' => 'news' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/news/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            {!! extractFiled('name' , isset($item->name) ? $item->name : old('name')) !!}

            {!! extractFiled('subject' , isset($item->subject) ? $item->subject : old('subject')) !!}

            
            {!! extractFiled('details' , isset($item->details) ? $item->details : null , 'textarea' , 'news' , 'tinymce' ) !!}
            <div class="form-group">
                <div class="form-line">
                    <label for="">{{ adminTrans('formations' , 'image') }}</label>
                    @if(isset($item) && $item->image != '')
                        <img src="{{ url('/'.env('UPLOAD_PATH').'/'.$item->image) }}" class="img-responsive thumbnail" alt="">
                        <br>
                    @endif    
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="file-loading">
                                {!! Form::file('image', array('multiple'=>false,'accept'=>'image/*','class'=>'file','data-overwrite-initial'=>'false','data-min-file-count'=>'1','data-max-file-count'=>'1','id'=>'file-1'))  !!}                                      
                            </div>
                        </div>
 
                </div>
            </div> 

                    

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('news' , 'news') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
@section('script')
@include(layoutPath('layout.helpers.tynic'))
{{ Html::script('/admin/plugins/momentjs/moment.js') }}
@include('/admin.shared.script_uploads')
@endsection