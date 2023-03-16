@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Buat Program Donasi</h1>
    </div>
    {{-- Start Form --}}
    <div class="row justify-content-center">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Program Bantu Mereka</h4>
                    {{-- <p class="card-description"> Basic form elements </p> --}}
                    <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="currency-field">Enter Amount</label>
                        <input type="text" class="form-control" name="currency-field" id="currency-field" pattern="^\Rp\d{1,3}(,\d{3})*(\.\d+)?Rp" value=""
                                data-type="currency" placeholder="$1,000,000.00">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender">
                        <option>Male</option>
                        <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        {{-- <input type="file" name="img[]" class="file-upload-default"> --}}
                        <div class="input-group col-xs-12">
                            <input type="file" class="form-control file-upload-info" style="background-color: #2A3038; height: 2.875rem; padding: 0.56rem 0.75rem; font-size: 0.875rem;
                            font-weight: 400; color: #495057; border-radius: 2px" placeholder="Upload Image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("input[data-type='currency']").on({
        keyup: function() {
        formatCurrency($(this));
        },
        blur: function() {
        formatCurrency($(this), "blur");
        }
    });


    function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") { return; }

    // original length
    var original_len = input_val.length;

    // initial caret position
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
        right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "$" + left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "$" + input_val;

        // final formatting
        if (blur === "blur") {
        input_val += ".00";
        }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
    }
    </script>
@endsection
