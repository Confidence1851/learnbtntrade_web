@component('mail::message')
# Hello, Admin !!

A new contact message was received from the website.

@component('mail::table')
|        |          |
| ------------- |:-------------|
| Sender`s Name      | {{$data['name']}} |
| Email      | {{$data['email']}} |
| Message      | {{$data['message']}} |
| Sent on      | {{ date('M d, Y',strtotime($data['time'])) }} |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
