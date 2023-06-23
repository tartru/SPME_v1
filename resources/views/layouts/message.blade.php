
    @if ($message = Session::get('msg-error'))
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="alert alert-primary" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    </div>
    @endif
    
    @if ($message = Session::get('message'))
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="alert alert-info" role="alert">  
            <strong>{{ $message }}</strong>
        </div>
    </div>
    @endif
    
    @if ($message = Session::get('msg-warning'))
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="alert alert-warning" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    </div>
    @endif
    
    @if ($message = Session::get('msg-info'))
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="alert alert-info alert-block">
            <strong>{{ $message }}</strong>
        </div>
    </div>
    @endif
    
    @if ($message = Session::get('msg-success'))
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="alert alert-danger" role="alert">
            Se detectaron algunos errores
        </div>
    </div>
    @endif
