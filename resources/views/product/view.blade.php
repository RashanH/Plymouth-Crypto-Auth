@extends('product.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0">
    <div class="text-lg text-gray-700 leading-7 font-semibold text-center">{{ $product->name }} (Ver. {{ $product->latest_version }})</div>
</div>

<div class="max-w-7xl px-4 pt-6 pb-2 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0 relative"
    style="display: flex; justify-content: space-between;">
    <div class="text-lg text-gray-600 leading-7 font-semibold">
        <a class="text-indigo-700" href="{{ URL::to('products') }}">
            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full"
                style="background: #bac2ff5e; color:#000;">Back to product list</div>
        </a>
    </div>

    <div class="text-lg text-gray-600 leading-7 font-semibold">
        <a class="text-indigo-700" href="{{ URL::to('keys/create', $product->id) }}">
            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full"
                style="background: var(--prime-three); color:#fff;">Add new key</div>
        </a>
    </div>
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
                                Customer
                            </th>
                            <th scope="col" class="w-1/4 text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Expires
                            </th>
                            <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Active
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
                                <a href="{{ route('keys.show', $key) }}">
                                    <div style="height:100%;" class="w-full">
                                        {{ $key->key_code }}
                                    </div>
                                </a>
                            </td>
                            <td
                                class="text-sm text-indigo-500  font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                <a href="{{ route('customers.show', $key->customer_id) }}">
                                    <div style="height:100%;" class="w-full">
                                        {{ $key->email }}
                                    </div>
                                </a>
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                @php
                                $expire_date = explode(" ", $key->expires_at)
                                @endphp
                                {{ $expire_date[0] }}
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                @if($key->is_blocked === 1)
                                ❌
                            @else
                            ✔
                            @endif
                           
                            </td>
                            <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-center">
                                <a class="inline-block px-2 py-2.5" href="{{ route('keys.edit', $key->id) }}"
                                    title="Edit"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('keys.destroy',$key->id) }}" method="POST" class="inline-block">
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="5">
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="5">
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
