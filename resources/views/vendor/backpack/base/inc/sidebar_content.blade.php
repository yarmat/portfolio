<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i>
        <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href='{{ backpack_url('portfolio') }}'><i class='fa fa-tag'></i> <span>@lang('custom.portfolio')</span></a></li>
<li><a href='{{ backpack_url('blog') }}'><i class='fa fa-tag'></i> <span>@lang('custom.blog')</span></a></li>
<li><a href='{{ backpack_url('category') }}'><i class='fa fa-tag'></i> <span>@lang('custom.categories')</span></a></li>
<li><a href='{{ backpack_url('comment') }}'><i class='fa fa-tag'></i> <span>@lang('comment::comment.title')</span></a>
</li>
<li><a href="{{ backpack_url('page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>

<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i>
        <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i
            class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
        <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
