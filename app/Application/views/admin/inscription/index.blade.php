@extends(layoutExtend())

@section('title')
     {{ adminTrans('inscription' , 'inscription') }} {{ adminTrans('home' , 'control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@section('content')
    @include(layoutTable() , ['title' => adminTrans('inscription' , 'inscription') , 'model' => 'inscription' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection