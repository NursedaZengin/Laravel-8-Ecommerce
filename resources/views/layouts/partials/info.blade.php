@if(session()->has('alert-info'))
<div class="alert alert-info">
  {{ session()->get('alert-info')}}
</div>
@endif
