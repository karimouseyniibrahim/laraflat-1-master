@extends(layoutExtend())

@section('title')
    {{ adminTrans('formations' , 'formations') }} {{ adminTrans('home' , 'view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('formations' , 'formations') , 'model' => 'formations' , 'action' => adminTrans('home' , 'view')  ])

        <table class="table table-bordered table-responsive table-striped">
            @php
                $fields = rename_keys(
                     removeFromArray($data['fields'] , ['id','created_at','updated_at']) ,
                     [
                     'libeler',
                     'details'=>'required',
                    'price',
                    'places',
                    'debut_formation',
                    'fin_formation',
                    'image'
                    ]
                );
            @endphp
                 @foreach($fields as $key =>  $field)
                        <tr>
                            <th>{{ $key }}</th>
                            @php $type =  getFileType($field , $item[$field]) @endphp
                            @if($type == 'File')
                                <td> <a href="{{ url(env('UPLOAD_PATH').'/'.$item[$field]) }}">{{ $item[$field] }}</a></td>
                            @elseif($type == 'Image')
                                <td> <img src="{{ url(env('UPLOAD_PATH').'/'.$item[$field]) }}" /></td>
                            @else
                                 <td>{!!  nl2br($item[$field])  !!}</td>
                            @endif
                        </tr>
                    @endforeach
        </table>

        @include('admin.formations.buttons.delete' , ['id' => $item->id])
        @include('admin.formations.buttons.edit' , ['id' => $item->id])

    @endcomponent
@endsection
