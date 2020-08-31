@component('mail::message')
# Introduction

A New Story was added with {{ $title }}.

@component('mail::button', ['url' => route('dashboard.index')])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
