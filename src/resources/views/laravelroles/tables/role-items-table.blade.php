@permission(config('permission.roles.view'))
<div class="table-responsive roles-table">
    <table class="table table-sm table-striped data-table roles-table">
        <caption class="p-1 pb-0">
            @if($tabletype == 'normal')
                {!! trans_choice('laravelroles.roles-table.caption', $items->count(), ['count' => $items->count()]) !!}
            @endif
            @if($tabletype == 'deleted')
                {!! trans_choice('laravelroles.roles-deleted-table.caption', $items->count(), ['count' => $items->count()]) !!}
            @endif
        </caption>
        <thead class="thead">
        <tr>
            <th scope="col">
                {!! trans('laravelroles.roles-table.id') !!}
            </th>
            <th scope="col">
                {!! trans('laravelroles.roles-table.name') !!}
            </th>
            <th scope="col" class="hidden-xs ">
                {!! trans('laravelroles.roles-table.desc') !!}
            </th>
            <th scope="col">
                {!! trans('laravelroles.roles-table.level') !!}
            </th>
            <th scope="col" class="hidden-xs hidden-sm">
                {!! trans('laravelroles.roles-table.permissons') !!}
            </th>
            <th scope="col" class="hidden-xs hidden-sm ">
                {!! trans('laravelroles.roles-table.createdAt') !!}
            </th>
            <th scope="col" class="hidden-xs hidden-sm ">
                {!! trans('laravelroles.roles-table.updatedAt') !!}
            </th>
            @if($tabletype == 'deleted')
                <th scope="col" class="hidden-xs hidden-sm ">
                    {!! trans('laravelroles.roles-table.deletedAt') !!}
                </th>
            @endif
            <th class="no-search no-sort " colspan="3">
                {!! trans('laravelroles.roles-table.actions') !!}
            </th>
        </tr>
        </thead>
        <tbody class="roles-table-body">
        @if($items->count() > 0)
            @foreach($items as $item)
                <tr>
                    <td>
                        @if($tabletype == 'normal')
                            {{ $item['role']->id }}
                        @endif
                        @if($tabletype == 'deleted')
                            {{ $item->id }}
                        @endif
                    </td>
                    <td>
                        @if($tabletype == 'normal')
                            {{ $item['role']->name }}
                        @endif
                        @if($tabletype == 'deleted')
                            {{ $item->name }}
                        @endif
                    </td>
                    <td class="hidden-xs">
                        @if($tabletype == 'normal')
                            {{ $item['role']->description }}
                        @endif
                        @if($tabletype == 'deleted')
                            {{ $item->description }}
                        @endif
                    </td>
                    <td>
                        @if($tabletype == 'normal')
                            {{ $item['role']->level }}
                        @endif
                        @if($tabletype == 'deleted')
                            {{ $item->level }}
                        @endif
                    </td>
                    <td class="hidden-xs hidden-sm">
                        @if($tabletype == 'normal')
                            @if($item['permissions']->count() > 0)
                                @foreach($item['permissions'] as $itemPermKey => $itemPerm)
                                    <span class="badge badge-pill badge-primary mb-1">
                                            {{ $itemPerm->name }}
                                        </span>
                                @endforeach
                            @else
                                <span class="badge badge-pill badge-default">
                                        {!! trans('laravelroles.cards.none-count') !!}
                                    </span>
                            @endif
                        @endif
                        @if($tabletype == 'deleted')
                            @if($item->permissions()->count() > 0)
                                @foreach($item->permissions()->get() as $itemPermKey => $itemPerm)
                                    <span class="badge badge-pill badge-primary mb-1">
                                            {{ $itemPerm->name }}
                                        </span>
                                @endforeach
                            @else
                                <span class="badge badge-pill badge-default">
                                        {!! trans('laravelroles.cards.none-count') !!}
                                    </span>
                            @endif
                        @endif
                    </td>
                    <td class="hidden-xs hidden-sm">
                        @if($tabletype == 'normal')
                            {{ $item['role']->created_at->format(trans('laravelroles.date-format')) }}
                        @endif
                        @if($tabletype == 'deleted')
                            {{ $item->created_at->format(trans('laravelroles.date-format')) }}
                        @endif
                    </td>
                    <td class="hidden-xs hidden-sm">
                        @if($tabletype == 'normal')
                            {{ $item['role']->updated_at->format(trans('laravelroles.date-format')) }}
                        @endif
                        @if($tabletype == 'deleted')
                            {{ $item->updated_at->format(trans('laravelroles.date-format')) }}
                        @endif
                    </td>
                    @if($tabletype == 'deleted')
                        <td class="hidden-xs hidden-sm">
                            {{ $item->deleted_at->format(trans('laravelroles.date-format')) }}
                        </td>
                    @endif
                    @if($tabletype == 'normal')
                        @permission(config('permission.roles.view'))
                        <td>
                            <a class="btn btn-sm btn-outline-info btn-block btn-rounded" href="{{ route('laravelroles::roles.show', $item['role']->id) }}" data-toggle="tooltip" title="{{ trans('laravelroles.tooltips.show-role') }}">
                                {!! trans("laravelroles.buttons.show") !!}
                            </a>
                        </td>
                        @endpermission
                        @permission(config('permission.roles.edit'))
                        <td>
                            <a class="btn btn-sm btn-outline-secondary btn-block btn-rounded" href="{{ route('laravelroles::roles.edit', $item['role']->id) }}" data-toggle="tooltip" title="{{ trans('laravelroles.tooltips.edit-role') }}">
                                {!! trans("laravelroles.buttons.edit") !!}
                            </a>
                        </td>
                        @endpermission
                        @permission(config('permission.roles.delete'))
                        <td>
                            @include('laravelroles::laravelroles.forms.delete-sm', ['type' => 'Role' ,'item' => $item['role']])
                        </td>
                        @endpermission
                    @endif
                    @if($tabletype == 'deleted')
                        <td>
                            <a class="btn btn-sm btn-outline-info btn-block btn-rounded" href="{{ route('laravelroles::role-show-deleted', $item->id) }}" data-toggle="tooltip" title="{{ trans('laravelroles.tooltips.show-deleted-role') }}">
                                {!! trans("laravelroles.buttons.show-deleted-role") !!}
                                <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            @include('laravelroles::laravelroles.forms.restore-item', ['style' => 'small', 'type' => 'role', 'item' => $item])
                        </td>
                        <td>
                            @include('laravelroles::laravelroles.forms.destroy-sm', ['type' => 'Role' ,'item' => $item])
                        </td>
                    @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td>{!! trans("laravelroles.roles-table.none") !!}</td>
                <td></td>
                <td class="hidden-xs"></td>
                <td class="hidden-xs"></td>
                <td class="hidden-xs"></td>
                <td class="hidden-sm hidden-xs"></td>
                <td class="hidden-sm hidden-xs hidden-md"></td>
                <td class="hidden-sm hidden-xs hidden-md"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@endpermission