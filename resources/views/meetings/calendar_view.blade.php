@extends('layout')
@section('title')
{{ get_label('meetings', 'Meetings') }} - {{ get_label('calendar_view', 'Calendar View') }}
@endsection
@section('content')
<div class="container-fluid">
<div class="d-flex justify-content-between mb-2 mt-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{route('home.index')}}">{{ get_label('home', 'Home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('meetings.index') }}">{{ get_label('meetings', 'Meetings') }}</a>

                </li>
                <li class="breadcrumb-item active">
                    {{ get_label('calendar_view', 'Calendar View') }}
                </li>
            </ol>
        </nav>

    </div>
    <div>
    @php
                    $meetingsDefaultView = getUserPreferences('meetings', 'default_view');
                    // dd($meetingsDefaultView)
                @endphp
                @if ($meetingsDefaultView === 'calendar-view')
                    <span class="badge bg-primary"><?= get_label('default_view', 'Default View') ?></span>
                @else
                    <a href="javascript:void(0);"><span class="badge bg-secondary" id="set-default-view" data-type="meetings"
                            data-view="calendar-view"><?= get_label('set_as_default_view', 'Set as Default View') ?></span></a>
                @endif
    </div>
        
    <div>
    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#createMeetingModal"><button type="button" class="btn btn-sm btn-primary action_create_meetings" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="<?= get_label('create_meeting', 'Create meeting') ?>"><i class='bx bx-plus'></i></button></a>

    <a href="{{ route('meetings.index') }}"><button type="button" class="btn btn-sm btn-primary"
                        data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-original-title="{{ get_label('meetings', 'Meetings') }}"><i
                            class='bx bx-shape-polygon'></i></button></a>
    </div>

</div>
<div class="card mb-4">
    <div class="card-body">
        <div id="meetingsCalenderDiv"></div>
    </div>
</div>
@endsection