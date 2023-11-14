<div class="mb-3">
        <label for="" class="form-label">{{ $leyenda }} </label>
        <select class="form-select form-select-lg" name="{{ $fk }}" id="">
            <option selected>{{ $leyenda2 }}</option>
            @foreach($arreglo as $arr)
                <option value="{{  $arr->$pk }}" @selected($arr->$pk==$valor)>
                    {{$arr->$display}}</option>
            @endforeach

        </select>
        
        @error($fk)
        <div class="mt-2">
            @if ($message == "El campo $fk es obligatorio. Por favor, seleccione una retícula.")
            <span style="color:red">{{ $message }}</span>
            @else
            <span style="color:red">Hubo un error en el campo {{ $fk }}</span>
            @endif
        </div>
@enderror
</div>