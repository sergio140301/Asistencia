<div class="form-group">
    <div class="row">
        <div class="col-4">
            <label for="{{ $texto }}">{{ $label }}</label> 
        </div>
        <div class="col-8">
        @if($select)
        <select name="{{ $texto }}" id="{{ $texto }}" class="form-control">
        <option value="" disabled selected>Seleccione los años de experiencia</option>
            @foreach(['1 año', '2 años', '3 años', '4 años', '5 años o mas'] as $experiencia)
                <option value="{{ $experiencia }}" {{ $campo == $experiencia ? 'selected' : '' }}>{{ $experiencia }}</option>
            @endforeach
        </select>
    @else
       <br> <input type="{{ $tipo }}" name="{{ $texto }}" id="{{ $texto }}" class="form-control" value="{{ $campo }}">
    @endif
        </div>
    </div>
    
</div>