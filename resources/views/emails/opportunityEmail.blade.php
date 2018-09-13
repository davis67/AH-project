@component('mail::message')
# Hello Consultant,


You have been Assigned an Opportunity Task to do from the BDS team.
Open it by clicking the button below...
{{ $url= route('opportunities.index')}}
@component('mail::button', ['url' => $url, 'color' => 'green'])
view Opportunity
@endcomponent

Thanks,<br>
{{ config('app.name') }}<br>
<b>Results that last</b>
@endcomponent
