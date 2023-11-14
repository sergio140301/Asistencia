<div class="mb-3 row">
    <label for="{{ $texto }}" class="col-4 col-form-label">{{ $label }} </label>
            
    <div class="col-6">
        <div class="row">
            <div class="col-4">
                <input type="radio" name="{{ $texto }}" value="Externo" {{ (old($texto, $campo) == 'Externo') ? 'checked' : '' }} > Externo   
            </div>
            <div class="col-4">
                <input type="radio" name="{{ $texto }}" value="Interno" {{ (old($texto, $campo) == 'Interno') ? 'checked' : '' }} > Interno    
            </div>
        </div>
        @error( $texto )
            <span style="color:red">{{ $message }}</span>
        @enderror
    </div>
</div>