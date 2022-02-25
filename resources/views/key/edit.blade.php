@extends('product.layout')
 
@section('content')
<div class="max-w-7xl px-4 pt-6 pb-2 sm:px-6 lg:px-8">
    <div class="text-lg text-gray-600 leading-7 font-semibold text-left"><a class="text-indigo-700"
            href="{{ url('products') }}">
            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full"
                style="background: #bac2ff5e; color:#000;">
                Back
            </div>
        </a></div>
</div>
<div class="max-w-7xl mx-auto px-4 pt-4 pb-0 sm:px-6 lg:px-8">
    <h2 class="font-semibold text-xl text-gray-600 leading-tight text-center uppercase">
    {{ $product->name }}
    </h2>
</div>

    @if ($errors->any())
    <div class="py-5 px-6 mb-4 mt-4 text-base" role="alert" style="background:#ffcaca;">
    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
    </div>
@endif



    <div class="max-w-7xl mx-auto px-4 pt-2 pb-4 sm:px-6 lg:px-8 my-8">
    <div class="block p-6 rounded-lg shadow-lg bg-white sm:max-w-xl" style="margin: auto;">
    <form method="post" action="{{ route('products.update',$product->id) }}" >
        @method('PATCH')
        @csrf
            <div class="form-group mb-6"> <input type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Product name" name="name" value="{{ $product->name }}"> </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="form-group mb-6"> <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Latest version" name="latest_version" value="{{ $product->latest_version }}"></div>
                <div class="form-group mb-6 form-check text-right mt-2">
                    <input type="checkbox"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                        id="force_latest_version" name="force_latest_version" @if($product->force_latest_version) checked @endif>
                    <label class="form-check-label inline-block text-gray-800" for="force_latest_version">Force latest
                        version</label>
                </div>
            </div>
            <div class="form-group mb-6"> <input type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Secret code" name="secret_code" value="{{ $product->secret_code }}"> </div>
            <div class="form-group mb-6">
                <textarea
                    class="  form-control  block  w-full  px-3  py-1.5  text-base  font-normal  text-gray-700  bg-white bg-clip-padding  border border-solid border-gray-300  rounded  transition  ease-in-out  m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    rows="5" placeholder="Description" name="description">{{ $product->description }}</textarea> </div>

            <button type="submit"
                class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Update</button>
        </form>
    </div>
</div>
@endsection