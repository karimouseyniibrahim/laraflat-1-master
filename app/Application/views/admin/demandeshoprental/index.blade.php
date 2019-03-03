@extends(layoutExtend())

@section('title')
     {{ adminTrans('demandeshoprental' , 'demandeshoprental') }} {{ adminTrans('home' , 'control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@section('content')
    @include(layoutTable() , ['title' => adminTrans('demandeshoprental' , 'demandeshoprental') , 'model' => 'demandeshoprental' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection