@if (session()->has('register_success'))
      <script  type="text/javascript">
            toastr.success('Vendedor agregado con exito.', 'Bien hecho!!');
      </script>
@endif

@if (session()->has('update-success'))
      <script  type="text/javascript">
            toastr.success('Vendedor actualizado con exito.', 'Bien hecho!!');
      </script>
@endif

@if (session()->has('delete-success'))
      <script  type="text/javascript">
            toastr.error('Vendedor eliminado con exito.', 'Bien hecho!!');
      </script>
@endif