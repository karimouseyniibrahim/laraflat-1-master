@extends(layoutExtend())

@section('title')
     {{ adminTrans('news' , 'news') }} {{ adminTrans('home' , 'control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@section('content')
    @include(layoutTable() , ['title' => adminTrans('news' , 'news') , 'model' => 'news' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection