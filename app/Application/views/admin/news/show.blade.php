@extends(layoutExtend())

@section('title')
    {{ adminTrans('news' , 'news') }} {{ adminTrans('home' , 'view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('news' , 'news') , 'model' => 'news' , 'action' => adminTrans('home' , 'view')  ])

        <table class="table table-bordered table-responsive table-striped">
            @php
                $fields = rename_keys(
                     removeFromArray($data['fields'] , ['id']) ,
                     ['name','subject','details','image','created_at','updated_at']
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

        @include('admin.news.buttons.delete' , ['id' => $item->id])
        @include('admin.news.buttons.edit' , ['id' => $item->id])

    @endcomponent
@endsection
