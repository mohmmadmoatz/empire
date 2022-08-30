<tr style="@if($project->out_payment > 0) color:#c0392b @endif" x-data="{ modalIsOpen : false }">

    <td>

        @if(getCrudConfig('project')->update)
            <a href="@route(getRouteName().'.project.update', ['project' => $project->id])" class="btn text-primary mt-1">
                <i class="icon-pencil"></i>
            </a>
        @endif

        @if(getCrudConfig('project')->delete)
            <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                <i class="icon-trash"></i>
            </button>
            <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                    <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Project') ]) }}</h5>
                    <p>{{ __('DeleteMessage', ['name' => __('Project') ]) }}</p>
                    <div class="mt-5 d-flex justify-content-between">
                        <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                        <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                    </div>
                </div>
            </div>
        @endif
    </td>

    <td> 
        <a href="@route(getRouteName().'.project.file', ['project' => $project->id])" target="_blank" rel="noopener noreferrer">
            {{ $project->name }} 
        </a>
        
    </td>
    <td> {{ $project->Customer->name ??"" }} </td>
    <td> {{ $project->site }} </td>
    <td>
        
        القطعة : {{ $project->space_site }} 
        <hr>
        البناء : {{ $project->space_build }} 
    </td>
   
    <td> {{ $project->floor_count }} </td>
    <td> {{ $project->starting_date }} </td>

    <td>  <a  target="_blank" href="@route(getRouteName().'.income.read')?project_id={{$project->id}}">@convert($project->income)</a> </td>
    <td>  
        
        <span class="text text-danger">@convert($project->expenses)</span>  
        <hr>
        <a target="_blank" href="@route(getRouteName().'.expense.read')?project_id={{$project->id}}" class="btn btn-info">الهيكل</a>
        <a target="_blank" href="@route(getRouteName().'.endingamount.read')?project_id={{$project->id}}" class="btn btn-info">الانهاءات</a>
      
    </td>

    <td> {{ $project->office_perctange }} </td>
   
    <td>
        <a href="@route(getRouteName().'.'.'projectperctanges'.'.read')?project_id={{$project->id}}">@convert($project->office_net) </a> 
    </td>    
    <td @if($project->project_balance <0) style="background: red;color:white" @endif> @convert($project->project_balance) </td>    
 
    <td @if($project->budget <0) style="background: red;color:white" @endif> @convert($project->budget) </td>    

    <td> @convert($project->out_payment) </td>    

    

      

</tr>
