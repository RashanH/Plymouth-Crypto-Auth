<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Billing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
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
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                                <path
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                </path>
                                <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
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
                                        <div
                                            class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-900 text-green-900 rounded-full" style="background: #10ff005e; color:#000;">
                                            Start your subscription
                                        </div>
                                    @endif


                                    <div>Billing portal</div>

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
                </div>


                <div
                    class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0">
                    <div class="text-lg text-gray-600 leading-7 font-semibold">For plans, upgrades & subscription
                        settings, please visit our new <a class="text-indigo-700"
                            href="{{ URL::to('billing/portal') }}">Billing Portal</a>.</div>
                </div>
                <div
                    class="max-w-7xl mx-auto px-4 pt-4 pb-0 sm:px-6 lg:px-8 border-t border-gray-200 md:border-t-1 md:border-0">
                    <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                        Your invoices
                    </h2>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="space-y-6">

                        @forelse ($invoices as $invoice)
                        <div class="flex items-center">
                            <div>
                                <a href="{{ $invoice->invoice_pdf }}">
                                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                        <path
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
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
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
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
