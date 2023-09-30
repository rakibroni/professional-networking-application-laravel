<?php 

use Carbon\Carbon;

?>


<tr>
  <td>{{ $user->id}}</td>
  <td>{{ $user->fullName() }}</td>
  <td>{{ $user->loginsCount() }}</td>
  <td>{{ $user->lastLogin() }}</td>
  {{--  <td>-</td>
  <td>-</td>
  <td>-</td>--}}
  <td>{{ $user->timeOfLastActivity() }} </td>
  <td>{{ $user->latestActivity() }}</td>
  <td class="@if ($user->wasActiveInCurrentMonth() == "TRUE")
    text-success
  @else
    text-danger
  @endif">{{ $user->wasActiveInCurrentMonth() }}</td>
  <td class="@if ($user->wasActiveInCurrentWeek() == "TRUE")
    text-success
  @else
    text-danger
  @endif">{{ $user->wasActiveInCurrentWeek() }}</td>
  <td class="@if ($user->wasActiveInCurrentDay() == "TRUE")
    text-success
  @else
    text-danger
  @endif">{{ $user->wasActiveInCurrentDay() }}</td>
</tr>