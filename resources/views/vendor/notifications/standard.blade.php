@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ SITE_NAME }}
        @endcomponent
    @endslot

    <div>
        <p>Hello {{$user->name}},</p>
        <p>Thanks for uploading your documents. Our Admin will review and approve your documents soon.</p>
        <p>Best regards, {{SITE_NAME}}.</p>
    </div>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{SITE_NAME}}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
