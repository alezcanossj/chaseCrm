<form id="quoteCreateForm" method="POST" action="{{ url(route('laravel-crm.quotes.store')) }}" 
      onsubmit="submitFormCrm(event, 'quoteCreateForm', '{{ route('laravel-crm.quotes.store') }}', 'Quote created successfully!', '{{ route('laravel-crm.quotes.index') }}')">
    @csrf
    @component('laravel-crm::components.card')

        @component('laravel-crm::components.card-header')

            @slot('title')
                {{ ucfirst(__('laravel-crm::lang.create_quote')) }}
            @endslot

            @slot('actions')
                @include('laravel-crm::partials.return-button',[
                    'model' => new \VentureDrake\LaravelCrm\Models\Quote(),
                    'route' => 'quotes'
                ])
            @endslot

        @endcomponent

        @component('laravel-crm::components.card-body')

            @include('laravel-crm::quotes.partials.fields')

        @endcomponent

        @component('laravel-crm::components.card-footer')
            <a href="javascript:void(0)" onclick="loadContent('{{ route('laravel-crm.quotes.index') }}')" class="btn btn-outline-secondary">{{ ucfirst(__('laravel-crm::lang.cancel')) }}</a>
            <button type="submit" class="btn btn-primary">{{ ucfirst(__('laravel-crm::lang.save')) }}</button>
        @endcomponent

    @endcomponent
</form>
