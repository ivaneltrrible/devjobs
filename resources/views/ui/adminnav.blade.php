<a href="{{ route('vacante.index') }}" class="font-bold text-white p-3 text-sm uppercase  {{ Request::is('vacantes') ? 'bg-teal-500' : '' }}" >Ver Vacantes</a>

<a href="{{ route('vacante.create') }}" class="font-bold text-white p-3 text-sm uppercase  {{ Request::is('vacantes/create') ? 'bg-teal-500' : '' }}" >Nueva Vacante</a>
