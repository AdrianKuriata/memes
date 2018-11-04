@extends('back.layouts.app')

@section('content')
    <div>
        <div class="d-flex justify-content-between">
            <div>
                <a href="{{route('admin.{module}.create', ['module' => $module])}}" class="btn btn-primary">Dodaj nowy</a>
            </div>

            {!! Form::open(['method' => 'GET']) !!}
            <div class="input-group mb-3">
                <input type="search" class="form-control" placeholder="Wprowadź frazę" name="search" value="{{$search}}" />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Szukaj</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <table class="table table-hover bg-white">
            <thead>
                <th>

                </th>
                <th>
                    #
                </th>
                @foreach ($columns as $column)
                    <th>
                        {{$column}}
                    </th>
                @endforeach
                <th>

                </th>
            </thead>

            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>
                            <input type="checkbox" />
                        </td>
                        <td>
                            {{$item->id}}
                        </td>
                        @foreach ($fields as $field)
                            <td>
                                {{$item->$field}}
                            </td>
                        @endforeach
                        <td class="justify-content-end d-flex">
                            <a href="#" class="btn btn-success btn-sm mr-1">{{__('Zobacz memy')}}</a>
                            <a href="{{route('admin.{module}.edit', ['module' => $module, 'id' => $item->id])}}" class="btn btn-primary btn-sm mr-1">{{__('Edytuj')}}</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.{module}.destroy', $module, $item->id]]) !!}
                                <button type="submit" class="btn btn-primary btn-sm">{{__('Usuń')}}</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{3 + count($columns)}}" style="text-align: center;">
                            {{__('Nic nie znaleziono, spróbuj ponownie.')}}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {!! $items->appends(['search' => $search])->render() !!}
    </div>
@endsection
