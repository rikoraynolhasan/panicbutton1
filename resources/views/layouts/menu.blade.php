<li class="{{ Request::is('incidents*') ? 'active' : '' }}">
    <a href="{!! route('incidents.index') !!}"><i class="fa fa-edit"></i><span>Incident</span></a>
</li>

<li class="{{ Request::is('dataUsers*') ? 'active' : '' }}">
    <a href="{!! route('dataUsers.index') !!}"><i class="fa fa-edit"></i><span>Data User</span></a>
</li>

<li class="{{ Request::is('dataUsers*') ? 'active' : '' }}">
    <a href="/maps"><i class="fa fa-edit"></i><span>Maps</span></a>
</li>

<li class="{{ Request::is('dataUsers*') ? 'active' : '' }}">
    <a href="/maps"><i class="fa fa-edit"></i><span>Bantuan</span></a>
</li>



