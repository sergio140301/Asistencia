<div class="mb-4 row">
            <label for="{{ $texto }}" class="col-4 col-form-label">{{ $label }} </label>
            <div class="col-8">
                <input type="text" class="form-control" name="{{ $texto }}" value="{{ old($texto, $campo) }}" id="" maxlength="13">
                @error( $texto )
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div>