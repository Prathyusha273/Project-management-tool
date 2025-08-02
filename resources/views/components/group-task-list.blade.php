@foreach($taskLists as $taskList)
     <!-- Task List Header Row -->
     <tr class="table-primary">
         <td colspan="7" class="fw-bold">
             {{ $taskList->name }}
             <button class="btn btn-primary btn-sm float-end">
                 <i class="bx bx-plus me-1"></i> Add Task
             </button>
         </td>
     </tr>
 
     <!-- Tasks in the Task List -->
     @forelse($taskList->tasks as $task)
         <tr>
             <td>
                 <div class="form-check">
                     <input class="form-check-input" type="checkbox"
                            value="" id="task-{{ $task->id }}"
                            {{ $task->completed ? 'checked' : '' }}>
                 </div>
             </td>
             <td>
                 <span class="{{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                     {{ $task->title }}
                 </span>
             </td>
             <td>
                 @if($task->due_date)
                     <span class="badge bg-label-{{ strtotime($task->due_date) < time() ? 'danger' : 'info' }}">
                         {{ date('M d, Y', strtotime($task->due_date)) }}
                     </span>
                 @endif
             </td>
             <td>
                 @switch($task->priority)
                     @case('high')
                         <span class="badge bg-label-danger">High</span>
                         @break
                     @case('medium')
                         <span class="badge bg-label-warning">Medium</span>
                         @break
                     @default
                         <span class="badge bg-label-primary">Low</span>
                 @endswitch
             </td>
             <td>
                 @if($task->assigned_to)
                     <div class="d-flex align-items-center">
                         <div class="avatar avatar-xs me-2">
                             <img src="{{ $task->assigned_to->avatar ?? asset('assets/img/avatars/default.png') }}"
                                  alt="Avatar" class="rounded-circle">
                         </div>
                         <span>{{ $task->assigned_to->name }}</span>
                     </div>
                 @endif
             </td>
             <td>
                 <select class="form-select form-select-sm status-select">
                     <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                     <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                     <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                 </select>
             </td>
             <td>
                 <div class="dropdown">
                     <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                             data-bs-toggle="dropdown">
                         <i class="bx bx-dots-vertical-rounded"></i>
                     </button>
                     <div class="dropdown-menu">
                         <a class="dropdown-item" href="javascript:void(0);">
                             <i class="bx bx-edit-alt me-1"></i> Edit
                         </a>
                         <a class="dropdown-item" href="javascript:void(0);">
                             <i class="bx bx-trash me-1"></i> Delete
                         </a>
                     </div>
                 </div>
             </td>
         </tr>
     @empty
         <tr>
             <td colspan="7" class="text-center">
                 <p class="text-muted mb-0">No tasks in this list</p>
             </td>
         </tr>
     @endforelse
 @endforeach