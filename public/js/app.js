var _control_vars = {};

window.addEventListener("load", function(){
    //action-confirm
    $('body').on('click','.action-confirm',function(ev) {
        ev.preventDefault();
        var button = $(this);

        actionConfirm(button);
    });

    //action-execute
    $('body').on('click','.action-execute',function(ev) {
        ev.preventDefault();
        var element = $(this);

        actionExecute(element);
    });

    //onchange-load
    $('body').on('onchange','.onchange-load',function(ev) {
        ev.preventDefault();
        var element = $(this);

        onchangeLoad(element);
    });
});


function actionConfirm(button) {
    Swal.fire({
        title: 'Confirmar',
        text: button.data('text-confirm'),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Confirmado!',
            'Esta acción se va a realizar.',
            'success'
            )

            var href = button.prop('href');
            if ( typeof href !== "undefined" ) {
                window.location.href = href;
            }
            else {
                var func = button.data('action-confirm');
                window[func](button);
            }
        }
    })

    /* alertify.confirm('Confirmar',button.data('text-confirm'), function(){
        var href = button.prop('href');
        if ( typeof href !== "undefined" ) {
            window.location.href = button.prop('href');
        }
        else {
            var func = button.data('action-confirm');
            window[func](button);
        }
    }, function() {}); */

    return false;
}


function actionExecute(element) {
    var href = element.prop('href');
    if ( typeof href !== "undefined" ) {
        window.location.href = href;
    }
    else {
        var func = element.data('action-confirm');
        window[func](element);
    }
}


function onchangeLoad(element) {
    var url = element.data('action-url');
    url.replace('{val}',element.val()).replace('[val]',element.val());
    window.location.href = url;
}


function initializeDataTable(table_config) {
    const id = (typeof table_config['id'] != "undefined") ? '#'+table_config['id'] : '#zero-config';

    //Inicializa la variable y elimina la versión anterior de la tabla en caso de existir
        if ( typeof _control_vars['DataTables'] == "undefined" ) {
            _control_vars['DataTables']             = {};
            _control_vars['DataTables_filters']     = {};
            _control_vars['DataTables_filters'][id] = {};
        }
        else if ( typeof _control_vars['DataTables'][id] != "undefined" ) {
            _control_vars['DataTables'][id].destroy();
            _control_vars['DataTables_filters'][id] = {};
        }
    //Inicializa la variable y elimina la versión anterior de la tabla en caso de existir

    //Agrega los filtros de rangos
        if ( typeof table_config['actions'] != "undefined" && typeof table_config['actions']['search_columns'] != "undefined" && table_config['actions']['search_columns'] ) {
            var _col_init = 0;
            if ( typeof table_config['with_pos'] != "undefined" && table_config['with_pos'] ) {
                var _col_init = 1;
            }

            var _col_count   = 0;
            var _col_ck_name = '';
            for ( var _tsc in table_config['actions']['search_columns'] ) {
                if ( table_config['actions']['search_columns'][_tsc]['type'] == 'range' ) {
                    _col_count = _col_init;
                    for ( _col_ck_name in table_config['headers'] ) {
                        if ( _col_ck_name == _tsc ) {
                            break;
                        }
                        _col_count++;
                    }

                    $.fn.dataTable.ext.search.push(
                        function( settings, data, dataIndex ) {
                            let dfmin = $('[data-filter-wrapper] [data-filter-column-name="' + _tsc + '"][data-filter-column-range-type="min"]');
                            let dfmax = $('[data-filter-wrapper] [data-filter-column-name="' + _tsc + '"][data-filter-column-range-type="max"]');

                            var min = ( typeof dfmin.prop('step') != "undefined" && dfmin.prop('step') && dfmin.prop('step').indexOf('.') != -1 ) ? parseFloat(dfmin.val(), 10) : parseInt(dfmin.val(), 10);
                            var max = ( typeof dfmax.prop('step') != "undefined" && dfmax.prop('step') && dfmax.prop('step').indexOf('.') != -1 ) ? parseFloat(dfmax.val(), 10) : parseInt(dfmax.val(), 10);

                            var _value_to_eval = parseFloat( data[_col_count] ) || 0
                            
                            if ( ( isNaN( min ) && isNaN( max ) ) ||
                                ( isNaN( min ) && _value_to_eval <= max ) ||
                                ( min <= _value_to_eval   && isNaN( max ) ) ||
                                ( min <= _value_to_eval   && _value_to_eval <= max ) )
                            {
                                return true;
                            }
                            return false;
                        }
                    );
                }
            }


            $('[data-filter-wrapper] [data-filter-column="range"]').each(function() {
                let ts_params = {
                    verticalbuttons: true,
                    verticalup: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg>',
                    verticaldown: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>',
                };
                if ( typeof this.min != "undefined" && this.min ) {
                    ts_params['min'] = this.min;
                }
                if ( typeof this.max != "undefined" && this.max ) {
                    ts_params['max'] = this.max;
                }
                if ( typeof this.step != "undefined" && this.step ) {
                    ts_params['step'] = this.step;
                }
                if ( typeof this.value != "undefined" && this.value ) {
                    ts_params['initval'] = this.value;
                }
                $(this).TouchSpin(ts_params);
            });
        }
    //Agrega los filtros de rangos

    //Botones de exportar datos
        var _onTopLeft = "<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l>";
        var _secondRow = "";

        if ( typeof table_config['actions'] != "undefined" && typeof table_config['actions']['export_data'] != "undefined" && table_config['actions']['export_data'] ) {
            var _buttons = {
                "buttons": [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'pdf', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            };

            if ( typeof table_config['actions']['pagination'] != "undefined" && table_config['actions']['pagination'] == false ) {
                _onTopLeft = "<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'B>";
            }
            else {
                _secondRow = "<'row my-3'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'B>>";
            }
        }
        else {
            var _buttons   = null;
        }
    //Botones de exportar datos

    //Procesado del lado del servidor
        let _searchDelay    = 0;
        let _serverSide     = null;
        let _serverSideAjax = null;
        if ( typeof table_config['actions'] != "undefined" && typeof table_config['actions']['server_side'] != "undefined" && table_config['actions']['server_side'] ) {
            _searchDelay    = 1800;
            _serverSide     = true;
            _serverSideAjax = {
                'url' : table_config['actions']['server_side']['url'],
                'type': table_config['actions']['server_side']['type'],
            };
        }
    //Procesado del lado del servidor

    //Definición de columnas
        let _columnDefs = [];
        let _columnPos  = 0;
        if ( typeof table_config['with_pos'] != "undefined" && table_config['with_pos'] ) {
            _columnDefs.push({
                "targets"   : [_columnPos],
                "name"      : "pos_column",
                "searchable": false,
                "orderable" : false,
                "render": function (data,type,row,meta) {
                    return meta['settings']['_iDisplayStart'] + meta['row'] + 1;
                },
            });
            _columnPos++;
        }

        for ( let _columnName in table_config['headers'] ) {
            _columnDefs.push({
                "targets": [_columnPos],
                "name"   : _columnName,
                "data"   : _columnName,
            });
            _columnPos++;
        }
    //Definición de columnas

    //Inicializa la tabla
        _control_vars['DataTables'][id] = $(id).DataTable({
            "dom": "<'dt--top-section'<'row'"+_onTopLeft+"<'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>"+_secondRow+">" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "buttons": _buttons,
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Página _PAGE_ de _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar...",
                "sLengthMenu": "Resultados :  _MENU_",
                "sInfoFiltered": "(_TOTAL_ registros filtrados de _MAX_ totales)",
                "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                "sEmptyTable": "No hay información disponible en la tabla",
                "sLoadingRecords": "Cargando...",
                "sProcessing": "Procesando...",
                "sZeroRecords": "No se encontraron coincidencias"
            },
            "stripeClasses": [],
            "retrieve": true,

            //Paginación
            "paging": (typeof table_config['actions'] != "undefined" && typeof table_config['actions']['pagination'] != "undefined" && table_config['actions']['pagination'] == false) ? false : true,
            "lengthMenu": (typeof table_config['actions'] != "undefined" && typeof table_config['actions']['pagination'] != "undefined" && typeof table_config['actions']['pagination']['options'] != "undefined") ? table_config['actions']['pagination']['options'] : [20,50,100,200,500],
            "pageLength": (typeof table_config['actions'] != "undefined" && typeof table_config['actions']['pagination'] != "undefined" && typeof table_config['actions']['pagination']['rows'] != "undefined") ? table_config['actions']['pagination']['rows'] : 10, 
            //Paginación

            //Ordenamiento
            "ordering": (typeof table_config['actions'] != "undefined" && typeof table_config['actions']['ordering'] != "undefined" && table_config['actions']['ordering'] == false) ? false : true,
            //Ordenamiento

            //Búsqueda
            "searching": (typeof table_config['actions'] != "undefined" && typeof table_config['actions']['searching'] != "undefined" && table_config['actions']['searching'] == false) ? false : true,
            //Búsqueda

            //Procesado del lado del servidor
            "serverSide" : _serverSide,
            "ajax"       : _serverSideAjax,
            "searchDelay": _searchDelay,
            //Procesado del lado del servidor

            //Definición de columnas
            "columnDefs": _columnDefs,
            //Definición de columnas
        });
    //Inicializa la tabla

    //Agrega los eventos de los filtros por columnas
        if ( typeof table_config['actions'] != "undefined" && typeof table_config['actions']['search_columns'] != "undefined" && table_config['actions']['search_columns'] ) {
            _control_vars['DataTables'][id].columns().every( function () {
                let dtch = $(this.header());
                if ( typeof dtch.data('datatable-column') != "undefined" && typeof table_config['actions']['search_columns'][dtch.data('datatable-column')] != "undefined" ) {
                    let fWrapper = $('[data-filter-wrapper]');
                    let that     = this;

                    if ( table_config['actions']['search_columns'][dtch.data('datatable-column')]['type'] == 'text' ) {
                        if ( _serverSide ) {
                            $('[data-filter-column-name="' + dtch.data('datatable-column') + '"]',fWrapper).on('keyup change', function() {
                                if ( typeof _control_vars['DataTables_filters'][id][dtch.data('datatable-column')] != "undefined" ) {
                                    clearTimeout(_control_vars['DataTables_filters'][id][dtch.data('datatable-column')]);
                                }
                                
                                var inpt = this;
                                _control_vars['DataTables_filters'][id][dtch.data('datatable-column')] = setTimeout(function() {
                                    if ( that.search() !== inpt.value ) {
                                        that
                                            .search( inpt.value )
                                            .draw();
                                    }
                                }, 1000);
                            });
                        }

                        else {
                            $('[data-filter-column-name="' + dtch.data('datatable-column') + '"]',fWrapper).on('keyup change', function() {
                                if ( that.search() !== this.value ) {
                                    that
                                        .search( this.value )
                                        .draw();
                                }
                            });
                        }
                    }

                    else if ( table_config['actions']['search_columns'][dtch.data('datatable-column')]['type'] == 'select' ) {
                        $('[data-filter-column-name="' + dtch.data('datatable-column') + '"]',fWrapper).on('change', function() {
                            if ( that.search() !== this.value ) {
                                that
                                    .search( this.value )
                                    .draw();
                            }

                            if ( typeof table_config['actions']['search_columns'][dtch.data('datatable-column')]['dependents'] != "undefined" && table_config['actions']['search_columns'][dtch.data('datatable-column')]['dependents'] ) {
                                let _dependentsQry = [];
                                for ( _dependent in table_config['actions']['search_columns'][dtch.data('datatable-column')]['dependents'] ) {
                                    _dependentsQry.push(`[data-filter-column-name="${table_config['actions']['search_columns'][dtch.data('datatable-column')]['dependents'][_dependent]}"]`);
                                }
                                $(_dependentsQry.join(','),fWrapper).val('').trigger( "change" );
                            }
                        });
                    }

                    else if ( table_config['actions']['search_columns'][dtch.data('datatable-column')]['type'] == 'range' ) {
                        if ( _serverSide ) {
                            $('[data-filter-column-name="' + dtch.data('datatable-column') + '"],[data-filter-column-name="' + dtch.data('datatable-column') + '"]',fWrapper).on('keyup change', function() {
                                if ( typeof _control_vars['DataTables_filters'][id][dtch.data('datatable-column')] != "undefined" ) {
                                    clearTimeout(_control_vars['DataTables_filters'][id][dtch.data('datatable-column')]);
                                }
                                
                                _control_vars['DataTables_filters'][id][dtch.data('datatable-column')] = setTimeout(function() {
                                    _control_vars['DataTables'][id].draw();
                                }, 1000);
                            });
                        }

                        else {
                            $('[data-filter-column-name="' + dtch.data('datatable-column') + '"]',fWrapper).on('keyup change', function() {
                                _control_vars['DataTables'][id].draw();
                            });
                        }
                    }
                }
            } );
        }
    //Agrega los eventos de los filtros por columnas
}