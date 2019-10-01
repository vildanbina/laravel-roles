<form action="{{ route('laravelroles::roles-deleted-restore-all') }}" method="POST" accept-charset="utf-8" class="mb-0">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <button class="dropdown-item text-success pointer" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmRestoreRoles" data-title="{{ trans('laravelroles.modals.restoreAllRolesTitle') }}" data-message="{{ trans('laravelroles.modals.restoreAllRolesMessage') }}" >
        <i class="fa fa-fw fa-refresh" aria-hidden="true"></i>
        {!! trans('laravelroles.buttons.restore-all-roles') !!}
    </button>
</form>
