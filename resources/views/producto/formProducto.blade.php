<!-- Formulario base / -->

<form action="{{ route('producto.store') }}" method="POST">
  @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ isset($producto->nombre)?$producto->nombre:'' }}"> required >

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" required  value="{{ isset($producto->precio)?$producto->precio:'' }}"><!--ingressa datos bacios-->

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" value="{{ isset($producto->marca)?$producto->marca:'' }}"required >

    <button type="submit">Registrar</button>
</form> 