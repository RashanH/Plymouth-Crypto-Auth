<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Billing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                        <i class="fa fa-user text-gray-400 fa-2xl"></i>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Subscription Status
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Name: <b>{{ $user->name }} ({{ $user -> email}})</b></br>
                                Current plan: <b>{{ $current_plan -> name ?? 'N/A'}}
                                    ({{ ucfirst(trans($current_plan -> interval ?? 'N/A')) }})</b></br>
                                Status:
                                @if(!empty($current_plan->active) and $current_plan->active == true)
                                <b>Active</b>
                                @else
                                <b>Inactive</b>
                                @endif
                            </div>

                            <a href="{{ URL::to('products') }}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                    <div>Explore products</div>

                                    <div class="ml-1 text-indigo-500">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                        <i class="fa fa-credit-card text-gray-400 fa-2xl"></i>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Payment Methods</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Card type: <b>{{ ucfirst(trans($user->card_brand ?? 'N/A')) }}</b><br>
                                Card: <b>{{ '**** **** **** ' . $user->card_last_four ?? 'N/A' }}</b><br>
                                Expire: <b>{{ $user->card_expiration  ?? 'N/A'}}

                            </div>

                            <a href="{{ URL::to('billing/portal') }}">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">

                                    @if (! Auth::user()->subscribed())
                                    <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-900 text-green-900 rounded-full"
                                        style="background: var(--prime-three); color:#fff;">
                                        Start your subscription
                                    </div>

                                    @else
                                    <div>Billing portal</div>

                                    <div class="ml-1 text-indigo-500">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>

                                    @endif



                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                @if (Auth::user()->subscribed())
                <div
                    class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0">
                    <div class="text-lg text-gray-600 leading-7 font-semibold">For plans, upgrades & subscription
                        settings, please visit our new <a class="text-indigo-700"
                            href="{{ URL::to('billing/portal') }}">
                            <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-900 text-green-900 rounded-full"
                                style="background: var(--prime-three); color:#fff;">
                                Billing Portal
                            </div>
                        </a></div>
                </div>
                @endif
                <div
                    class="max-w-7xl mx-auto px-4 pt-4 pb-0 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0">
                    <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                        Your invoices
                    </h2>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="space-y-6">

                        @forelse ($invoices as $invoice)
                        <div class="pl-4 flex items-center">
                            <div>
                                <a href="{{ $invoice->invoice_pdf }}" title="Download invoice as PDF">
                                <i class="fa fa-download text-gray-400 fa-2xl"></i>
                                </a>
                            </div>

                            <div class="ml-3">
                                <div class="text-sm text-gray-600">
                                    {{ $invoice->lines->data[0]->description }} -
                                    {{ \Carbon\Carbon::parse($invoice->created)->format('d/m/Y')}}
                                </div>

                                <div>
                                    <div class="text-xs text-gray-500">
                                        {{ $invoice->number }},

                                        <span class="text-green-500 font-bold">USD
                                            {{ number_format($invoice->amount_paid/100, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="flex items-center">
                            <div>
                            <i class="fa fa-exclamation text-gray-400 fa-2xl"></i>
                            </div>

                            <div class="ml-3">
                                <div class="text-sm text-gray-600">
                                    No invoices to show.
                                </div>

                                <div>
                                    <div class="text-xs text-gray-500">
                                        Enjoy our service by <a href="{{ URL::to('billing/portal') }}"><span
                                                class="text-green-500 font-semibold">purchasing</span></a> a package.
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforelse

                        <div class="text-gray-400 leading-7 text-sm font-semibold text-center">
                            Anything wrong? Please <a href="{{ URL::to('contact') }}">contact us</a>!
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
