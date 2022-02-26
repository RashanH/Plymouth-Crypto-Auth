@extends('customer.layout')

@section('content')
<div class="max-w-7xl px-4 pt-6 pb-2 sm:px-6 lg:px-8">
    <div class="text-lg text-gray-600 leading-7 font-semibold text-left"><a class="text-indigo-700"
            href="{{ url('customers') }}">
            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full"
                style="background: #bac2ff5e; color:#000;">
                Back
            </div>
        </a></div>
</div>
<div class="max-w-7xl mx-auto px-4 pt-4 pb-0 sm:px-6 lg:px-8">
    <h2 class="font-semibold text-xl text-gray-600 leading-tight text-center uppercase">
        {{ $customer->email }}
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
        <form method="post" action="{{ route('customers.update',$customer->id) }}">
            @method('PATCH')
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="First name" name="first_name" value="{{ $customer->first_name }}"></div>
                <div class="form-group mb-6"> <input type="text"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Last name" name="last_name" value="{{ $customer->last_name }}"></div>
            </div>
            <div class="form-group mb-6"> <input type="email"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Email" name="email" value="{{ $customer->email }}"> </div>
            <div class="form-group mb-6"> <input type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Company" name="company" value="{{ $customer->company }}"> </div>

            <button type="submit"
                class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Update</button>
        </form>
    </div>
</div>
@endsection
