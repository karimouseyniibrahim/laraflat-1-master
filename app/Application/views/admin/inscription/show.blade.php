@extends(layoutExtend())

@section('title')
    {{ adminTrans('inscription' , 'inscription') }} {{ adminTrans('home' , 'view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('inscription' , 'inscription') , 'model' => 'inscription' , 'action' => adminTrans('home' , 'view')  ])

        <table class="table table-bordered table-responsive table-striped">
            @php
                $fields = rename_keys(
                     removeFromArray($data['fields'] , ['id','created_at','updated_at']) ,
                     [
                     'numero_artisan',
                     'name','email',
                     'adresse',
                     'telephone',
                     'status',
                     'formations_id'
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

        @include('admin.inscription.buttons.delete' , ['id' => $item->id])
        @include('admin.inscription.buttons.edit' , ['id' => $item->id])

    @endcomponent
@endsection
