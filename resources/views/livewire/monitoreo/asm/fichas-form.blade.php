<div>
    
    
    <div class="modal fade {{($stp1) ? 'show' : ''}}" id="crearficha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:{{($stp1) ? 'block' : ''}};">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fichas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    
                        
                    <div>
                        {{ html()->modelForm($modelo,'post','form')->id('nuevo')->open() }}
                        <div class="form-group mb-4">
                            <label for="defaultForm-name">Nombre de la Ficha<strong>*</strong></label>
                            {{ html()->text('nombre')->id('nombre')->class('form-control')->placeholder('Ej: FMyE E219 2023-2024')->required()->attributes(['wire:model.defer'=>'nombre','title'=>'Ejemplo: FMyE 2023-2024']) }}
                                {{-- <input 
                                wire:model.defer="nombre"
                                type="text"
                                name="nombre"
                                placeholder="Nombre de la Ficha"
                                class="form-control"
                            /> --}}
                            @error('nombre')  
                            <div class="input-group mb-3">
                                <span class="text-danger"><b>* {{$message}}</b></span>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="defaultForm-name">Programa Presupuestal<strong>*</strong></label>
                            {{ html()->Select('programa')->class('form-control')->placeholder('Seleccione')->options($rows_pp)->required()->attributes(['wire:model.defer'=>'programa','title'=>'Elija un programa presupuestal']) }}
                            @error('programa')  
                            <div class="input-group mb-3">
                                <span class="text-danger"><b>* {{$message}}</b></span>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="defaultForm-name">Dependencia Responsable<strong>*</strong></label>
                                {{ html()->Select('dependencia')->class('form-control')->placeholder('Seleccione')->options($rows_cd)->required()->attributes(['wire:model.defer'=>'dependencia','title'=>'Elija una Dependencia Responsable']) }}
                                @error('dependencia')  
                                <div class="input-group mb-3">
                                    <span class="text-danger"><b>* {{$message}}</b></span>
                                </div>
                                @enderror
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="defaultForm-name">Descripción de la Ficha<strong>*</strong></label>
                            {{ html()->textarea('descripcion')->id('desc')->class('form-control')->placeholder('Describa brevemente la ficha')->rows(4)->required()->attributes(['wire:model.defer'=>'descripcion','title'=>'Introduce una descripción']) }}
                            {{-- <textarea
                                wire:model.defer="descripcion"
                                name="descripcion"
                                placeholder="Descripción de la Ficha"
                                class="form-control"
                                rows="4">
                            </textarea> --}}
                            @error('descripcion')  
                            <div class="input-group mb-3">
                                <span class="text-danger"><b>* {{$message}}</b></span>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="row">
                                <div class="col-3">
                                    <label for="defaultForm-name">Fecha Inicial<strong>*</strong></label>
                                    {{ html()->date('fecha_inicial')->id('fecha_inicial')->class('form-control')->placeholder('Fecha de Inicio')->attributes(['wire:model.defer'=>'fecha_inicial','title'=>'Elija la fecha de Inicio']) }}
                                    {{-- <input
                                        wire:model.defer="f_i"
                                        type="date"
                                        name="f_i"
                                        placeholder="Fecha Inicial"
                                        class="form-control"                                    
                                    /> --}}
                                    @error('fecha_inicial')  
                                    <div class="input-group mb-3">
                                        <span class="text-danger"><b>* {{$message}}</b></span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="defaultForm-name"><strong>* Campos obligatorios</strong></label>
                        </div>
                        
                        
                        <div class="button-action mt-5">
                            <button type="button" wire:click="val" class="btn btn-info">Limpiar</button>
                            <button type="button" class="btn btn-success" wire:click="create" wire:loading.attr="disabled">Guardar</button>
                        </div>
                    </form>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button class="btn" data-bs-dismiss="modal" ><i class="flaticon-cancel-12"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>

   
                        
                        
    
</div>
