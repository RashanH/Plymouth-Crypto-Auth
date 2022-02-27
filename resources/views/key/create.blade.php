@extends('key.layout')

<link rel="stylesheet" href="{{ URL::asset('css/autocomplete.css') }}" />
<script src="{{ URL::asset('js/autocomplete.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')

<div class="max-w-7xl px-4 pt-6 pb-2 sm:px-6 lg:px-8">
    <div class="text-lg text-gray-600 leading-7 font-semibold text-left"><a class="text-indigo-700"
            href="{{ url('products', $product->id) }}">
            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full"
                style="background: #bac2ff5e; color:#000;">
                Back
            </div>
        </a></div>
</div>
<div class="max-w-7xl mx-auto px-4 pt-4 pb-0 sm:px-6 lg:px-8">
    <h2 class="font-semibold text-xl text-gray-600 leading-tight text-center uppercase">
        Add New Key: {{ $product->name }}
    </h2>
</div>


@if ($message = Session::get('success'))
<div class="py-5 px-6 mb-4 mt-4 text-base" role="alert" style="background:#caffdf;">
    {{ $message }}
</div>
@endif
@if ($errors->any())
<div class="py-5 px-6 mb-4 mt-4 text-base" role="alert" style="background:#ffcaca;">
<ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
</div>
@endif

<div class="max-w-7xl mx-auto px-4 pt-2 pb-4 sm:px-6 lg:px-8 my-8">
    <div class="block p-6 rounded-lg shadow-lg bg-white sm:max-w-xl" style="margin: auto;">
        <form action="{{ route('keys.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="form-group mb-6"> <input type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Key code" name="key_code" id="key_code" value="{{ old('key_code') ?? $serial }}">
                    

                    <div class="max-w-7xl pt-2 pb-2 border-t border-gray-200 md:border-t-1 md:border-0 relative" style="display: flex; justify-content: space-between;">
                        <div class="text-lg text-gray-600 leading-7 font-semibold">
                            <a id="generate_new_serial" class="text-indigo-700" href="#">
                                <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full" style="background: #bac2ff5e; color:#000;">Generate a new key</div>
                            </a>
                        </div>
                    
                        <div class="text-lg text-gray-600 leading-7 font-semibold">
                            <a class="text-indigo-700" href="#">
                                <div onclick="copy_serial_key()" class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full" style="background: #10ff005e; color:#000;">Copy key</div>
                            </a>
                        </div>
                    </div>
                    <script>function copy_serial_key() { var copyText = document.getElementById("key_code"); copyText.select(); copyText.setSelectionRange(0, 99999); navigator.clipboard.writeText(copyText.value); }</script>


                </a>
                <script>
                    $(document).ready(function(){
                      $("#generate_new_serial").click(function(){
                        $.get("{{ url('/keys/generate_serial') }}", function(data, status){
                          $("#key_code").val(data);
                        });
                      });
                    });
                    </script>
                
                </div>
            <div class="grid md:grid-cols-3 gap-4">
                <div class="form-group mb-6">
                    <label class="form-check-label inline-block text-gray-800" for="expires_at">Expires at</label>
                    <input
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        type="date" id="expires_at" name="expires_at"
                        value="{{ old('expires_at') ?? date('Y-m-d') }}"
                        min="2022-02-25T00:00" max="2099-02-25T00:00">
                </div>
                <div class="form-group mb-6">
                    <label class="form-check-label inline-block text-gray-800" for="maximum_devices">Max. devices</label>
                    <input type="number"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Max. devices" name="maximum_devices" id="maximum_devices" value="{{ old('maximum_devices') ?? '1' }}">
                </div>
                <div class="form-group mb-6 form-check text-right mt-6">
                    <input type="checkbox"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                        id="is_blocked" name="is_blocked" @if(is_array(old('is_blocked')) && in_array(3,
                        old('is_blocked'))) checked @endif>
                    <label class="form-check-label inline-block text-gray-800" for="is_blocked">Blocked</label>
                </div>
            </div>
            <div class="form-group mb-6">
                <textarea
                    class="form-control  block  w-full  px-3  py-1.5  text-base  font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out  m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    rows="5" placeholder="Notes" name="notes">{{ old('notes') ?? '' }}</textarea>
            </div>

            <div class="max-w-7xl mx-auto py-4 border-t border-gray-200 md:border-t-1 md:border-1">
                <div class="text-lg text-gray-600 leading-7 font-semibold">Customer details</div>
            </div>

            <div class="form-group mb-6 autocomplete"> <input type="email"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Customer email" name="customer_email" value="{{ old('customer_email') ?? '' }}"
                    id="customer_email"> </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="First name" name="customer_first_name"
                        value="{{ old('customer_first_name') ?? '' }}" id="customer_first_name">
                </div>
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Last name" name="customer_last_name" value="{{ old('customer_last_name') ?? '' }}"
                        id="customer_last_name">
                </div>
            </div>
            <div class="form-group mb-6 autocomplete"> <input type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Company" name="customer_company" value="{{ old('customer_company') ?? '' }}"
                    id="customer_company"> </div>
            <button type="submit"
                class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add
                key</button>
        </form>
    </div>
</div>

<script>
    var email_list = [];
    document.getElementById("customer_email").addEventListener('input', trigger_autocomplete);

    function trigger_autocomplete() {
        document.getElementById("customer_first_name").value = '';
        document.getElementById("customer_last_name").value = '';
        document.getElementById("customer_company").value = '';
        document.getElementById("customer_first_name").disabled = false;
        document.getElementById("customer_last_name").disabled = false;
        document.getElementById("customer_company").disabled = false;

        // setTimeout(function () {


        email_list = [];
        autocomplete(document.getElementById("customer_email"), email_list);
        //alert('Horray! Someone wrote "' + this.value + '"!');
        //console.log(this.value);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                //document.getElementById("customer_email").innerHTML = xhttp.responseText;
                email_list = [];
                var json_data = JSON.parse(xhttp.responseText);
                for (var i in json_data) {
                    email_list.push(json_data[i].email);
                }
                //console.log(email_list);
                //console.log(xhttp.responseText);
                autocomplete(document.getElementById("customer_email"), email_list);
            }
        };
        var url = "{{route('customers/autocomplete', '')}}" + "?query=" + this.value;
        //console.log(url);
        xhttp.open("GET", url, true);
        xhttp.send();
        email_list = [];
        //autocomplete(document.getElementById("customer_email"), email_list);




        //  }, 1000);
    }

</script>

<script>
    //$('#customer_email').change(function() {
    $('#customer_email').bind('input propertychange paste', function () {
        //setTimeout(function () {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                //document.getElementById("customer_email").innerHTML = xhttp.responseText;
                //console.log(xhttp.responseText);
                var json_data = JSON.parse(xhttp.responseText);
                if (json_data.first_name != null) {
                    document.getElementById("customer_first_name").value = json_data.first_name;
                }
                if (json_data.last_name != null) {
                    document.getElementById("customer_last_name").value = json_data.last_name;
                }
                if (json_data.company != null) {
                    document.getElementById("customer_company").value = json_data.company;
                }
                if (Object.keys(json_data).length != 0) {
                    document.getElementById("customer_first_name").disabled = true;
                    document.getElementById("customer_last_name").disabled = true;
                    document.getElementById("customer_company").disabled = true;
                }
            }
        };
        var url = "{{route('customers/get_details_by_email', '')}}" + "?query=" + document
            .getElementById("customer_email").value;
        //console.log(url);
        xhttp.open("GET", url, true);
        xhttp.send();
        //}, 500);
    });

</script>
@endsection
