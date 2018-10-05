@forelse($job as $key => $val)
<div class="job-gadget-box">
    <p>{!!@$val->name!!}</p>
    <p class="text-muted"><small><i class="ion ion-android-person"></i> {!!@$val->user->name!!} at {!! format_date($val->created_at)!!}</small></p>
</div>
@empty
<div class="job-gadget-box">
    <p>No Job</p>
</div>
@endif