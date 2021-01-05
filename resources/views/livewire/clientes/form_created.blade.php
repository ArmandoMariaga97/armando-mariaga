
            <div class="col-md-4">
              <div class="card ">
                <div class="card-header">
                    <h4 align="center" class="card-title text-green form-create">REGISTRAR NUEVO CLIENTE</h4>
                    <hr>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <form class="form-horizontal error" >
                      <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">

                          <div class="form-group mt-2">
                            <div class="controls">
                              <input type="text" wire:model.defer="nombre" class="form-control"  placeholder="nombre">
                              @error('nombre') <span style="color:red;">{{ $message }}</span> @enderror
                            </div>
                          </div>
                          <div class="form-group mt-2">
                            <div class="controls">
                              <input type="text" wire:model.defer="correo" class="form-control"  placeholder="correo">
                              @error('correo') <span style="color:red;">{{ $message }}</span> @enderror
                            </div>
                          </div>
                          <div class="form-group mt-2">
                            <div class="controls">
                              <input type="text" wire:model.defer="documento" class="form-control"  placeholder="documento">
                              @error('documento') <span style="color:red;">{{ $message }}</span> @enderror
                            </div>
                          </div>
                          <div class="form-group mt-2">
                            <div class="controls">
                              <input type="text" wire:model.defer="direccion" class="form-control"  placeholder="direccion">
                              @error('direccion') <span style="color:red;">{{ $message }}</span> @enderror
                            </div>
                          </div>

                          <div class="form-group mt-2">
                            <button type="button" wire:click="limpiarcampos" class="btn btn-danger text-white">Cancelar</button>
                            <button type="button" wire:click="register" class="btn btn-success text-white">Agregar</button>
                          </div>
                          
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
