@isset($edit)
    {!! Form::model($item, ['method' => 'PATCH', 'class' => 'form-add-edit', 'route' => ['admin.{module}.update', $module, $item->id]]) !!}
@else
    {!! Form::open(['method' => 'POST', 'class' => 'form-add-edit', 'route' => ['admin.{module}.store', $module]]) !!}
@endisset
<div class="row">
    @foreach ($form as $f)
        {!! $f !!}
    @endforeach
</div>
{!! Form::close() !!}
