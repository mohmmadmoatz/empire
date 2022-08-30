<li class="list-divider"></li>
<li class="nav-small-cap"><span class="hide-menu">{{ __('CRUD Menu') }}</span></li>



    <li class='sidebar-item @isActive([getRouteName().".'customer'.read", getRouteName().".'customer'.create", getRouteName().".'customer'.update"], "selected")'>
        <a class='sidebar-link has-arrow' href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-edit"></i>
            <span class="hide-menu">التعريفات</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level base-level-line">
            <li class="sidebar-item @isActive(getRouteName().'.'.'customer'.'.read')">
                <a href="@route(getRouteName().'.'.'customer'.'.read')" class="sidebar-link @isActive(getRouteName().'.'.'customer'.'.read')">
                    <span class="hide-menu"> الزبائن</span>
                </a>
            </li>
            <li class="sidebar-item @isActive(getRouteName().'.'.'worker'.'.read')">
                <a href="@route(getRouteName().'.'.'worker'.'.read')" class="sidebar-link @isActive(getRouteName().'.'.'worker'.'.read')">
                    <span class="hide-menu"> الكادر</span>
                </a>
            </li>
          
        </ul>
    </li>

    <li class='sidebar-item @isActive([getRouteName().".'project'.read", getRouteName().".'project'.create", getRouteName().".'project'.update"], "selected")'>
        <a class='sidebar-link' href="@route(getRouteName().'.'.'project'.'.read')" aria-expanded="false">
            <i class="fa fa-building"></i>
            <span class="hide-menu">المشاريع</span>
        </a>
    </li>

    {{-- <li class='sidebar-item @isActive([getRouteName().".'income'.read", getRouteName().".'income'.create", getRouteName().".'income'.update"], "selected")'>
        <a class='sidebar-link' href="@route(getRouteName().'.'.'income'.'.read')" aria-expanded="false">
            <i class="fa fa-file"></i>
            <span class="hide-menu">الواردات</span>
        </a>
    </li> --}}

    <li class='sidebar-item @isActive([getRouteName().".'expense'.read", getRouteName().".'expense'.create", getRouteName().".'expense'.update"], "selected")'>
        <a class='sidebar-link' href="@route(getRouteName().'.'.'expense'.'.read')" aria-expanded="false">
            <i class="fa fa-file"></i>
            <span class="hide-menu">مصاريف المشاريع</span>
        </a>
    </li>

   

   

    <li class='sidebar-item @isActive([getRouteName().".'officeexp'.read", getRouteName().".'officeexp'.create", getRouteName().".'officeexp'.update"], "selected")'>
        <a class='sidebar-link' href="@route(getRouteName().'.'.'officeexp'.'.read')" aria-expanded="false">
            <i class="fa fa-credit-card"></i>
            <span class="hide-menu">مصاريف المكتب</span>
        </a>
    </li>

    <li class='sidebar-item @isActive([getRouteName().".'projectperctanges'.read", getRouteName().".'projectperctanges'.create", getRouteName().".'projectperctanges'.update"], "selected")'>
        <a class='sidebar-link' href="@route(getRouteName().'.'.'projectperctanges'.'.read')" aria-expanded="false">
            <i class="fa fa-credit-card"></i>
            <span class="hide-menu">واردات المكتب</span>
        </a>
    </li>

    <li class='sidebar-item @isActive([getRouteName().".'project'.report", getRouteName().".'project'.report"], "selected")'>
        <a class='sidebar-link' href="@route(getRouteName().'.'.'project'.'.report')" aria-expanded="false">
            <i class="fa fa-file"></i>
            <span class="hide-menu">تقرير شامل</span>
        </a>
    </li>

    <li class='sidebar-item @isActive([getRouteName().".'customer'.read", getRouteName().".'customer'.create", getRouteName().".'customer'.update"], "selected")'>
        <a class='sidebar-link has-arrow' href="javascript:void(0)" aria-expanded="false">
            <i class="fa fa-edit"></i>
            <span class="hide-menu">التطبيق</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level base-level-line">
            <li class="sidebar-item @isActive(getRouteName().'.'.'buildrequst'.'.read')">
                <a href="@route(getRouteName().'.'.'buildrequst'.'.read')" class="sidebar-link @isActive(getRouteName().'.'.'buildrequst'.'.read')">
                    <span class="hide-menu"> طلبات البناء</span>
                </a>
            </li>
            <li class="sidebar-item @isActive(getRouteName().'.'.'categories'.'.read')">
                <a href="@route(getRouteName().'.'.'categories'.'.read')" class="sidebar-link @isActive(getRouteName().'.'.'categories'.'.read')">
                    <span class="hide-menu"> اصناف العقارات</span>
                </a>
            </li>
            <li class="sidebar-item @isActive(getRouteName().'.'.'post'.'.read')">
                <a href="@route(getRouteName().'.'.'post'.'.read')" class="sidebar-link @isActive(getRouteName().'.'.'post'.'.read')">
                    <span class="hide-menu">  العقارات</span>
                </a>
            </li>
        </ul>
    </li>



@if(config('easy_panel.todo'))
    <li class="sidebar-item @isActive([getRouteName().'.todo.lists', getRouteName().'.todo.create'], 'selected')">
        <a class="sidebar-link @isActive([getRouteName().'.todo.lists', getRouteName().'.todo.create'], 'active') " href="@route(getRouteName().'.todo.lists')" aria-expanded="false">
            <i data-feather="grid" class="feather-icon"></i>
            <span class="hide-menu">{{ __('Todo') }}</span>
        </a>
    </li>
@endif
