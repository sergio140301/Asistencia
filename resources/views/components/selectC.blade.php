
<div class="form-group">
    <div class="row">
        <div class="col-4">
            <label for="{{ $texto }}">{{ $label }}</label> 
        </div>
        <div class="col-8">
        @if($select)
        <select name="{{ $texto }}" id="{{ $texto }}" class="form-control">
        <option value="" disabled selected>Seleccione una categoría</option>
            @foreach(['Empleado', 'Supervisor', 'Gerente'] as $categoria)
                <option value="{{ $categoria }}" {{ $campo == $categoria ? 'selected' : '' }}>{{ $categoria }}</option>
            @endforeach
        </select>
    @else
       <br> <input type="{{ $tipo }}" name="{{ $texto }}" id="{{ $texto }}" class="form-control" value="{{ $campo }}">
    @endif
        </div>
    </div>
    
    
</div>
