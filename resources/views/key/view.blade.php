@extends('product.layout')

@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Laravel 9 CRUD Example</h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-primary" href="{{ url('products') }}"> Back</a>
    </div>
</div>


<div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0">
    <div class="text-lg text-gray-600 leading-7 font-semibold">{{ $product->name }}</div>
</div>

@if ($message = Session::get('success'))
<div class="py-4 px-4 mb-2 mt-2 text-base font-bold" role="alert" style="background:#caffdf;">
    {{ $message }}
</div>
@endif
@if ($errors->any())
<div class="py-4 px-4 mb-2 mt-2 text-base font-bold" role="alert" style="background:#ffcaca;">
<ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
</div>
@endif

<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="w-full border-collapse table-fixed pd-4">
                    <thead class="bg-white border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Key
                            </th>
                            <th scope="col" class="max-w-md text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Version
                            </th>
                            <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Users
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center"
                                style="width:9rem">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($keys as $key)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-500 truncate">
                                <a href="{{ route('keys.show',$key) }}">
                                    <div style="height:100%;" class="w-full">
                                        {{ $keys->name }}
                                    </div>
                                </a>
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                0
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                0
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                <form action="{{ route('keys.destroy',$key->id) }}" method="POST">
                                    <a class="inline-block px-2 py-2.5" href="{{ route('keys.edit',$key->id) }}"
                                        title="Edit"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block px-2 py-2.5" title="Delete"><i
                                            class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty

                        @if (! Auth::user()->subscribed())
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="4">
                                You must select a subscription plan before continuing.<br>

                                <a class="text-indigo-700" href="{{ URL::to('billing/portal') }}">
                                    <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 my-4 bg-green-900 text-green-900 rounded-full"
                                        style="background: var(--prime-three); color:#fff;">
                                        View Plans
                                    </div>
                                </a>

                            </td>
                        </tr>
                        @else
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="4">
                                You don't have any active keys.<br>

                                <a class="text-indigo-700" href="{{ URL::to('keys/create', $product->id) }}">
                                    <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 my-4 bg-green-900 text-green-900 rounded-full"
                                        style="background: var(--prime-three); color:#fff;">
                                        Create the first key
                                    </div>
                                </a>

                            </td>
                        </tr>
                        @endif


                        @endforelse

                    </tbody>
                </table>
                @if(!$keys->isEmpty())
                <div class="my-4"> {{ $keys->links() }}</div>
                @endif

            </div>
        </div>
    </div>
</div>










@endsection
