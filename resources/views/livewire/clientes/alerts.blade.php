@if (session()->has('register_success'))
      <script  type="text/javascript">
            toastr.success('cliente agregado con exito.', 'Bien hecho!!');
      </script>
@endif

@if (session()->has('update-success'))
      <script  type="text/javascript">
            toastr.success('cliente actualizado con exito.', 'Bien hecho!!');
      </script>
@endif

@if (session()->has('delete-success'))
      <script  type="text/javascript">
            toastr.error('cliente eliminado con exito.', 'Bien hecho!!');
      </script>
@endif