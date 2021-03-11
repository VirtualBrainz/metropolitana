@foreach ($cats as $cat)
<div class="row">
    <div class="col-3">{{ $cat->sku }}</div>
    <div class="col-3">{{ $cat->sku }}</div>
    <div class="col-3">
        @if ($cat->status == '1')
            <i class="fas fa-globe-americas" style="color: green;"></i>
        @else
            <i class="fas fa-globe-americas" style="color: red;"></i>
        @endif
    </div>
    <div class="col-3">
        <div class="opts">
            @if (kvfj(Auth::user()->permissions, 'products_edit'))
                <a href="{{ url('/admin/product/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar">
                    <i class="fas fa-edit" style="color: #ffc107;"></i>
                </a>
            @endif
            @if (kvfj(Auth::user()->permissions, 'products_delete'))
                <a href="{{ url('/admin/product/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
                    <i class="fas fa-trash-alt" style="color: red;"></i>
                </a>
            @endif
        </div>
    </div>

</div>

@endforeach



