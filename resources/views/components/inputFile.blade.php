<div class="mb-4 row">        
    <div class="col-8">
        <input type="file" class="input-foto" name="{{ $texto }}" value="{{ old($texto, $campo) }}" id="foto" >
            @error( $texto )
                <span style="color:red">{{ $message }}</span>
            @enderror
    </div>
</div>
        