@extends(layoutExtend())

@section('title')
    {{ adminTrans('formations' , 'formations') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component(layoutForm() , ['title' => adminTrans('formations' , 'formations') , 'model' => 'formations' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/formations/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                {!! extractFiled('libeler' , isset($item->libeler) ? $item->libeler : null, 'text','formations') !!}
            </div>

            <div class="form-group">
                {!! extractFiled('details' , isset($item->details) ? $item->details : null , 'textarea' , 'formations' , 'tinymce' ) !!}
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">{{ adminTrans('formations' , 'price') }}</label>
                        <input type="number" name="price" id="price"  class="form-control" value="{{ isset($item->price) ? $item->price : null }}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="">{{ adminTrans('formations' , 'places') }}</label>
                        <input id="places" name="places" type="number" class="form-control" value="{{ isset($item->places) ? $item->places : null }}" >
                
                </div>
                
              </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">{{ adminTrans('formations' , 'debut_formation') }}</label>
                        <input type="date" name="debut_formation" id="debut_formation"  class="form-control" value="{{ isset($item->debut_formation) ? $item->debut_formation : null }}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="">{{ adminTrans('formations' , 'fin_formation') }}</label>
                        <input id="fin_formation" name="fin_formation" type="date" class="form-control" value="{{ isset($item->fin_formation) ? $item->fin_formation : null }}" >
                
                </div>
                
              </div>           

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
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('formations' , 'formations') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
@section('script')
@include(layoutPath('layout.helpers.tynic'))
{{ Html::script('/admin/plugins/momentjs/moment.js') }}
@include('admin.shared.script_uploads')
@endsection