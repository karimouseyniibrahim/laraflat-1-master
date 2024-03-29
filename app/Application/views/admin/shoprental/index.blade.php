@extends(layoutExtend())

@section('title')
     {{ adminTrans('shoprental' , 'shoprental') }} {{ adminTrans('home' , 'control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@section('content')
    @include(layoutTable() , ['title' => adminTrans('shoprental' , 'shoprental') , 'model' => 'shoprental' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection