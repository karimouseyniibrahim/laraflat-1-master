@extends(layoutExtend())

@section('title')
    {{ adminTrans('shoprental' , 'shoprental') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component(layoutForm() , ['title' => adminTrans('shoprental' , 'shoprental') , 'model' => 'shoprental' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/shoprental/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="">{{ adminTrans('shoprental','section') }}</label>   
                {!! Form::select('section_id',$data['section'],null, ['class'=>'form-control'])!!}

            </div>
            <div class="form-group">
            {!! extractFiled('name' , isset($item->name) ? $item->name : null,'text','shoprental') !!}
            </div>

            <div class="form-group">
                <div class="form-line">
                    <label for="">{{ adminTrans('shoprental' , 'price') }}</label>
                    <input type="number" name="price" class="form-control" value="{{ isset($item) ? $item->price : old('price') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label for="">{{ adminTrans('shoprental' , 'area') }}</label>
                    <input type="number" name="area" class="form-control" value="{{ isset($item) ? $item->area : old('area') }}">
                </div>
            </div>

            <div class="form-group">
            {!! extractFiled('details' , isset($item->details) ? $item->details : null , 'textarea' , 'page' , 'tinymce' ) !!}
            </div>    
            <div class="form-group">
                <div class="form-line">
                    <label for="">{{ adminTrans('page' , 'image') }}</label>
                    @if(isset($item) && $item->image != '')
                        <img src="{{ url('/'.env('UPLOAD_PATH').'/'.$item->image) }}" class="img-responsive thumbnail" alt="">
                        <br>
                    @endif    
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="file-loading">
                    {!! Form::file('image[]', array('multiple'=>true,'accept'=>'image/*','class'=>'file','data-overwrite-initial'=>'false','data-min-file-count'=>'1',!isset($item) ? "'required'=>'required'" : '','id'=>'file-1'))  !!}
                                        
                                        
                                    </div>
                        </div>
 
                </div>
            </div>
    

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('shoprental' , 'shoprental') }}
                </button>
            </div>

        </form>
    @endcomponent
@endsection
@section('script')
@include(layoutPath('layout.helpers.tynic'))
    {{ Html::script('/admin/plugins/momentjs/moment.js') }}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "/image-view",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
    </script>
@endsection