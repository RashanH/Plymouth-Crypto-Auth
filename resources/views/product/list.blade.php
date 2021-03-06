@extends('product.layout')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-1 md:table-fixed">

    <div class="max-w-7xl px-4 pt-6 pb-2 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0">
        <div class="text-lg text-gray-600 leading-7 font-semibold text-right"><a class="text-indigo-700"
                href="{{ route('products.create') }}">
                <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full" style="background: var(--prime-three); color:#fff;">
                    Add new product
                </div>
            </a></div>
    </div>

    @if ($message = Session::get('success'))
    <div class="py-4 px-4 mb-2 mt-2 text-base font-bold" role="alert" style="background:#caffdf;">
        {!! $message !!}
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
                                <th scope="col" class="font-bold text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Name
                                </th>
                                <th scope="col"
                                    class="font-bold max-w-md text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Version
                                </th>
                                <th scope="col" class="font-bold w-20 text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                    Keys
                                </th>
                                <th scope="col" class="font-bold text-sm font-medium text-gray-900 px-6 py-4 text-center"
                                    style="width:9rem">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-500 truncate">
                                    <a href="{{ route('products.show',$product) }}">
                                        <div style="height:100%;" class="w-full">
                                            {{ $product->name }}
                                        </div>
                                    </a>
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                    {{ $product->latest_version }}
                                </td>
                                <td
                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                    {{ $product->keys_count }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                    <a class="inline-block px-2 py-2.5" href="{{ route('products.edit',$product->id) }}"
                                        title="Edit"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-2 py-2.5" title="Delete"><i
                                                class="fa fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty

                            @if (! Auth::user()->subscribed())
                            <tr
                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
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
                            <tr
                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="4">
                                    You don't have any active products. Let's get started.<br>

                                    <a class="text-indigo-700" href="{{ URL::to('products/create') }}">
                                        <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 my-4 bg-green-900 text-green-900 rounded-full"
                                            style="background: var(--prime-three); color:#fff;">
                                            Create the first product
                                        </div>
                                    </a>

                                </td>
                            </tr>
                            @endif


                            @endforelse

                        </tbody>
                    </table>
                    @if(!$products->isEmpty())
                    <div class="my-4"> {{ $products->links() }}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>



</div>
@endsection
