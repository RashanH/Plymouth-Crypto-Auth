@extends('key.layout')
 
@section('content')
<div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0">
    <div class="text-lg text-gray-700 leading-7 font-semibold text-center">Key: {{ $decrypted_key }}</div>
</div>

<div class="max-w-7xl px-4 pt-6 pb-2 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0 relative"
    style="display: flex; justify-content: space-between;">
    <div class="text-lg text-gray-600 leading-7 font-semibold">
        <a class="text-indigo-700" href="{{ URL::to('products', $product->id) }}">
            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full"
                style="background: #bac2ff5e; color:#000;">Back to keys list</div>
        </a>
    </div>

    <div class="text-lg text-gray-600 leading-7 font-semibold">
        <a class="text-indigo-700" href="{{ route('keys.edit',$key->id) }}">
            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-2 bg-green-900 text-green-900 rounded-full"
                style="background: var(--prime-three); color:#fff;">Edit key</div>
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

<div class="mx-auto">
<div class="max-w-7xl mx-auto pb-4 pt-4 px-4 sm:px-6 lg:px-8" style="text-align: center;">
    Key Summary
</div>
<div class="grid md:grid-cols-2 gap-2">
    <div>
        <div class="pt-0 pb-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="w-full border-collapse table-fixed pd-4">
                    <tbody>
                        <tr>
                            <th scope="col" class="max-w-xl text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                Product
                            </th>
                            <th scope="col" class="max-w-xl max-w-md text-sm font-medium text-gray-900 px-6 py-2 text-right">
                                <span>{{ $product->name }}</span>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="max-w-xl text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                Version
                            </th>
                            <th scope="col" class="max-w-xl max-w-md text-sm font-medium text-gray-900 px-6 py-2 text-right">
                                <span>{{ $product->latest_version }}</span>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="max-w-xl text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                Customer
                            </th>
                            <th scope="col" class="max-w-xl max-w-md text-sm font-medium text-gray-900 px-6 py-2 text-right">
                                <span>{{ $customer->first_name }} {{ $customer->last_name }}</span>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="max-w-xl text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                Company
                            </th>
                            <th scope="col" class="max-w-xl max-w-md text-sm font-medium text-gray-900 px-6 py-2 text-right">
                                <span>{{ $customer->company }}</span>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <div class="pt-0 pb-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="w-full border-collapse table-fixed pd-4">
                    <tbody>
                        <tr>
                            <th scope="col" class="max-w-xl text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                Created at
                            </th>
                            <th scope="col"
                            class="max-w-xl max-w-md text-sm font-medium text-gray-900 px-6 py-2 text-right">
                            <span title="{{ $key->created_at }}">{{ $key->created_at->diffForHumans() }}</span>
                        </th>
                        </tr>
                        <tr>
                            <th scope="col" class="max-w-xl text-sm font-medium text-gray-900 px-6 py-2 text-left">
                                Total devices
                            </th>
                            <th scope="col" class="max-w-xl max-w-md text-sm font-medium text-gray-900 px-6 py-2 text-right">
                                <span>{{ $devices_count }}</span>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>

<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="w-full border-collapse table-fixed pd-4">
                    <thead class="bg-white border-b">
                        <tr>
                            <th scope="col" class="max-w-md font-bold text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                HWID
                            </th>
                            <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-center">
                                Operating System
                            </th>
                            <th scope="col" class="font-bold text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                IP
                            </th>
                            <th scope="col" class="font-bold text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Country
                            </th>
                            <th scope="col" class="font-bold text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                Registered on
                            </th>
                            <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-center"
                                style="width:9rem">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($devices as $device)
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium truncate">
                                <span>{{ $device->hardware_unique }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium truncate text-center">
                                <span>{{ $device->operating_system }}</span>
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                <span>{{ $device->registered_ip_address }}</span>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                <span>{{ $device->registered_country }}</span>
                            </td>
                            <td
                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center truncate">
                                <span title="{{ $device->created_at }}">{{ $device->created_at->diffForHumans() }}</span>
                           
                            </td>
                            <td class="text-sm text-gray-900 font-light px-2 py-4 whitespace-nowrap text-center">
                                <form action="{{ route('devices.destroy',$device->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block px-2 py-2.5" title="Delete"><i
                                            class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 text-center">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="6">
                                This key does not have registered active devices.<br>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                @if(!$devices->isEmpty())
                <div class="my-4"> {{ $devices->links() }}</div>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection
