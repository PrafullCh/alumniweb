@if (Auth::guard('admin')->check())
<p>You are logged in as admin</p>
@else
<p>You are logged out as admin</p>
@endif
@if (Auth::guard('web')->check())
<p>You are logged in as user</p>
@else
<p>You are logged out as user</p>
@endif