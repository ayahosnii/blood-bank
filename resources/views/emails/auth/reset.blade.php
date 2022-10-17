
@component('mail::message')
    Hello **{{$user->name}}**,  {{-- use double space for line break --}}
     **{{$content}}**
    <p>
        Thank you for choosing {{config ('app.name')}}!
    Click below to start working right now
    </p>
    @component('mail::button', ['url' => $link])
        Go to BloodBank website
    @endcomponent
    Sincerely,
    BloodBank team.
@endcomponent
