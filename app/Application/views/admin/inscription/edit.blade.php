@extends(layoutExtend())

@section('title')
    {{ adminTrans('inscription' , 'inscription') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('inscription' , 'inscription') , 'model' => 'inscription' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/inscription/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">

                <div class="form-group col-md-6">
                    <div class="form-line">
                        <label for="">{{ adminTrans('inscription' , 'numero_artisan') }}</label>
                        <input type="text" name="numero_artisan" class="form-control" value="{{ isset($item) ? $item->numero_artisan : null }}">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="form-line">
                    <label for="">{{ adminTrans('inscription' , 'name') }}</label>
                    <input type="text" name="name" class="form-control" value="{{ isset($item) ? $item->name : null }}">
                </div>
            </div>

            <div class="form-group">
                 <label for="">{{ adminTrans('inscription','formation_id') }}</label> 
                 @php $formationName =  isset($item->formation_id) ? $item->formation_id : null @endphp
                {!! Form::select('formation_id',$data['data']['formation'],$formationName, ['class'=>'form-control','id'=>'formation_id'])!!}
            </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="">{{ adminTrans('formations' , 'price') }}</label>
                        <input type="number"  id="price"  class="form-control" value="{{ isset($data) ? $data['data']['price'] : null }}" readonly>
                </div>
                <div class="form-group col-md-3">
                  <label for="">{{ adminTrans('formations' , 'places') }}</label>
                        <input id="places"  type="number" class="form-control" value="{{ isset($data) ? $data['data']['places'] : null }}" readonly>
                
                </div>
                <div class="form-group col-md-3">
                  <label for="">{{ adminTrans('formations' , 'debut_formation') }}</label>
                        <input id="debut_formation" type="date" class="form-control" value="{{ isset($data) ? $data['data']['debut_formation'] : null }}" readonly>
                
                </div>
                <div class="form-group col-md-3">
                  <label for="">{{ adminTrans('formations' , 'fin_formation') }}</label>
                        <input id="fin_formation"  type="date" class="form-control" value="{{ isset($data) ? $data['data']['fin_formation'] : null }}" readonly>
                
                </div>
                
              </div>



            <div class="form-group ">
                <div class="form-line">
                    <label for="">{{ adminTrans('inscription' , 'email') }}</label>
                    <input type="email" name="email" class="form-control" value="{{ isset($item) ? $item->email : null }}">
                </div>
            </div>
            <div class="form-group ">
                <div class="form-line">
                    <label for="">{{ adminTrans('inscription' , 'adresse') }}</label>
                    <input type="text" name="adresse" class="form-control" value="{{ isset($item) ? $item->adresse : null }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label for="">{{ adminTrans('inscription' , 'telephone') }}</label>
                        <input type="text" name="telephone" id="telephone"  class="form-control" value="{{ isset($item->telephone) ? $item->telephone : null }}" >
                </div>
             </div>   


            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('inscription' , 'inscription') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection

@section('script')
    @include('admin.inscription.scripts.formations')
@endsection