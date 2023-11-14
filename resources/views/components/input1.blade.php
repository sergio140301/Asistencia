<div class="mb-4 row">
            <label for="{{ $texto }}" class="col-4 col-form-label">{{ $label }} </label>
            <div class="col-8">
                <input type="text" class="form-control" name="{{ $texto }}" value="{{ old($texto, $campo) }}" id="" placeholder="">
                @error( $texto )
                    <span style="color:rgb(34, 0, 255)">{{ $message }}</span>
                @enderror
            </div>
        </div>