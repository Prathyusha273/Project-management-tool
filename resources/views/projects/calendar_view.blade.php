@extends('layout')
@section('title')
{{ get_label('projects', 'Projects') }} - {{ get_label('calendar_view', 'Calendar View') }}
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
                        <a href="{{ route('projects.index') }}">{{ get_label('projects', 'projects') }}</a>

                    </li>
                    <li class="breadcrumb-item active">
                        {{ get_label('calendar_view', 'Calendar View') }}
                    </li>
                </ol>
            </nav>

        </div>
        <div>
            @php
                $projectDefaultView = getUserPreferences('projects', 'default_view');
            @endphp
            @if ($projectDefaultView === 'calendar-view')
                <span class="badge bg-primary"><?= get_label('default_view', 'Default View') ?></span>
            @else
                <a href="javascript:void(0);"><span class="badge bg-secondary" id="set-default-view" data-type="projects"
                        data-view="calendar-view"><?= get_label('set_as_default_view', 'Set as Default View') ?></span></a>
            @endif
        </div>
        <div>
            <a href="javascript:void(0);" class="btn-open-modal" data-bs-toggle="modal"
                data-bs-target="#create_project_modal">
                <button type="button" class="btn btn-sm btn-primary action_create_projects" data-bs-toggle="tooltip"
                    data-bs-placement="left" title="{{ get_label('create_project', 'Create project') }}">
                    <i class='bx bx-plus'></i>
                </button>
            </a>

            <a
                href="{{ url(request()->has('status') ? route('projects.index', ['status' => request()->status]) : route('projects.index')) }}">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="left"
                    data-bs-original-title="<?= get_label('grid_view', 'Grid view') ?>">
                    <i class='bx bxs-grid-alt'></i>
                </button>
            </a>
            <a href="{{ route('projects.kanban_view', ['status' => request()->status, 'sort' => request()->sort]) }}"><button
                    type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="left"
                    data-bs-original-title="<?= get_label('kanban_view', 'Kanban View') ?>"><i
                        class='bx bxs-dashboard'></i></button></a>
            <a href="{{ route('projects.gantt_chart') }}"><button type="button" class="btn btn-sm btn-primary"
                    data-bs-toggle="tooltip" data-bs-placement="left"
                    data-bs-original-title="<?= get_label('gantt_chart_view', 'Gantt Chart View') ?>"><i
                        class='bx bxs-collection'></i></button></a>
            <a href="{{ route('projects.index') }}"><button type="button" class="btn btn-sm btn-primary"
                    data-bs-toggle="tooltip" data-bs-placement="left"
                    data-bs-original-title="{{ get_label('list_view', 'List view') }}"><i
                        class='bx bx-list-ul'></i></button></a>
        </div>
    </div>

    <div>



        <div class="card mb-4">
            <div class="card-body">
                <div id="projectsCalenderDiv"></div>
            </div>
        </div>
    </div>
</div>

@endsection