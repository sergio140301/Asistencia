<div class="mb-3 row">
    <label for="{{ $texto }}" class="col-4 col-form-label">{{ $label }} </label> <br>

    <div class="col-6">
        <div class="row">
            <div class="col-4">
            <input type="hidden" name="{{ $texto }}" value="No">
                <input type="checkbox" name="{{ $texto }}" value="Si" {{ (old($texto, $asistencias["asistencia"][$i] ?? '') == 'Si') ? 'checked' : '' }}> Si
            </div>
        </div>
        @error( $texto )
            <span style="color:red">{{ $message }}</span>
        @enderror
    </div>
</div>