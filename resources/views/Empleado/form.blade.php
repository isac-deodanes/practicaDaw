<!-- Formulario base / -->

<form action="{{ route('empleado.store') }}" method="POST">
  @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ isset($empleado->nombre)?$empleado->nombre:'' }}"> required >

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" required  value="{{ isset($empleado->apellido)?$empleado->apellido:'' }}"><!--ingressa datos bacios-->

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" value="{{ isset($empleado->correo)?$empleado->correo:'' }}"> required placeholder="ejemplo@correo.com">

    <label for="dui">DUI:</label>
    <input type="text" id="dui" name="dui" required value="{{ isset($empleado->dui)?$empleado->dui:'' }}">>


    <label for="dui">Telefono:</label>
    <input type="num" id="telefono" name="telefono" required value="{{ isset($empleado->telefono)?$empleado->telefono:'' }}">>

    <label for="dui">Salario:</label>
    <input type="num" id="salario" name="salario" required value="{{ isset($empleado->salario)?$empleado->salario:'' }}">>

    <select name="area" id="area" required>
        <option value="Gerencia" {{ isset($empleado) && $empleado->area =='Gerencia' ? 'selected' : '' }}>Gerencia</option>
        <option value="Supervisor" {{ isset($empleado) && $empleado->area =='supervisor' ? 'selected' : '' }}>Supervisor</option>
        <option value="Ventas" {{ isset($empleado) && $empleado->area =='ventas' ? 'selected' : '' }}>Ventas</option>

    </select>
    <button type="submit">Registrar</button>

</form> 