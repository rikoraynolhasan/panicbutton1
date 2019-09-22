

<li class="{{ Request::is('dataUsers*') ? 'active' : '' }}">
    <a href="/maps"><i class="fa fa-edit"></i><span>Maps</span></a>
</li>





<li class="{{ Request::is('incidents*') ? 'active' : '' }}">
    <a href="{!! route('incidents.index') !!}"><i class="fa fa-edit"></i><span>Incidents</span></a>
</li>

<li class="{{ Request::is('userIncidents*') ? 'active' : '' }}">
    <a href="{!! route('userIncidents.index') !!}"><i class="fa fa-edit"></i><span>User Incidents</span></a>
</li>

