@extends(layoutExtend())

@section('title')
     {{ adminTrans('artisans' , 'artisans') }} {{ adminTrans('home' , 'control') }}
@endsection

@section('style')
    @include('admin.shared.style')
@endsection

@section('content')
    @include(layoutTable() , ['title' => adminTrans('artisans' , 'artisans') , 'model' => 'artisans' , 'table' => $dataTable->table([] , true) ])
@endsection

@section('script')
    @include('admin.shared.scripts')
@endsection