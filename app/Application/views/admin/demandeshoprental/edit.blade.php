@extends(layoutExtend())

@section('title')
    {{ adminTrans('demandeshoprental' , 'demandeshoprental') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('demandeshoprental' , 'demandeshoprental') , 'model' => 'demandeshoprental' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/demandeshoprental/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="">{{adminTrans('demandeshoprental','artisan_id')}}</label>
                <input type="text" name="artisan_id" value="{{isset($item->artisan_id) ? $item->artisan_id : null}}" class="form-control">
            </div>
             <div class="form-group">
                 <label for="">{{ adminTrans('demandeshoprental','section_id') }}</label> 
                 @php $sectionName =  isset($item->section_id) ? $item->section_id : null @endphp
                {!! Form::select('section_id',$data['data']['section'],$sectionName, ['class'=>'form-control','id'=>'section_id'])!!}
            </div>
            <div class="form-group">
                <label for="">{{adminTrans('demandeshoprental','shoprental_id')}}</label>
                 @php $shoprentalName =  isset($item->shoprental_id) ? $item->shoprental_id : null @endphp
                {!! Form::select('shoprental_id',$data['data']['shoprental'],$shoprentalName, ['class'=>'form-control','id'=>'shoprental_id'])!!}
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">{{ adminTrans('shoprental' , 'price') }}</label>
                        <input type="number" id="price"  class="form-control" value="{{ isset($data['data']) ? $data['data']['price'] : null }}" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="">{{ adminTrans('shoprental' , 'area') }}</label>
                        <input id="area" type="number" class="form-control" value="{{ isset($data['data']) ? $data['data']['area'] : null }}" readonly>
                
                </div>
                
              </div>
              
            <div class="form-group">
                <label for="">{{adminTrans('demandeshoprental','artisan_email')}}</label>
                <input type="text" name="artisan_email" value="{{isset($item->artisan_email) ? $item->artisan_email : null}}" class="form-control" >
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('demandeshoprental' , 'demandeshoprental') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection

@section('script')
    @include('admin.demandeshoprental.scripts.section')
@endsection