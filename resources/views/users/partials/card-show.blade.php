@component('laravel-crm::components.card')

    @component('laravel-crm::components.card-header')

        @slot('title')
            {{ $user->name }}
        @endslot

        @slot('actions')
            <span class="float-right">
                <a type="button" class="btn btn-outline-secondary btn-sm" href="{{ url(route('laravel-crm.users.index')) }}"><span class="fa fa-angle-double-left"></span> Back to users</a> | 
                <a href="{{ url(route('laravel-crm.users.edit', $user)) }}" type="button" class="btn btn-outline-secondary btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a>
                 <form action="{{ route('laravel-crm.users.destroy',$user) }}" method="POST" class="form-check-inline mr-0 form-delete-button">
                    {{ method_field('DELETE') }}
                     {{ csrf_field() }}
                    <button class="btn btn-danger btn-sm" type="submit" data-model="person" {{ (auth()->user()->id == $user->id) ? 'disabled' : null }}><span class="fa fa-trash-o" aria-hidden="true"></span></button>
                </form>
            </span>
        @endslot

    @endcomponent

    @component('laravel-crm::components.card-body')

        <div class="row">
            <div class="col-sm-6 border-right">
                <h6 class="text-uppercase">Details</h6>
                <hr />
                <dl class="row">
                    <dt class="col-sm-3 text-right">Name</dt>
                    <dd class="col-sm-9">{{ $user->name }}</dd>
                    <dt class="col-sm-3 text-right">Email</dt>
                    <dd class="col-sm-9">{{ $user->email }}</dd>
                    <dt class="col-sm-3 text-right">CRM Access</dt>
                    <dd class="col-sm-9">{{ ($user->crm_access) ? 'Yes' : 'No' }}</dd>
                    <dt class="col-sm-3 text-right">CRM Role</dt>
                    <dd class="col-sm-9">{{ $user->roles()->first()->name ?? null }}</dd>
                </dl>
                <h6 class="text-uppercase mt-4 section-h6-title"><span>Teams ({{ $user->crmTeams->count() }})</span></h6>
                <hr />
                @foreach($user->crmTeams as $team)
                    <p><span class="fa fa-users" aria-hidden="true"></span> {{ $team->name }}</p>
                @endforeach
            </div>
            <div class="col-sm-6">
                <h6 class="text-uppercase">Activities</h6>
                <hr />
                ...
            </div>
        </div>
        
    @endcomponent

@endcomponent    