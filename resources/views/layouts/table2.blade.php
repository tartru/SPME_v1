<div>
    @if ( !empty($table_config) && !empty($table_config['previous']) )
        @foreach ( $table_config['previous'] as $_t_prev_key => $_t_prev )
            @if ( is_int($_t_prev_key) )
                @include($_t_prev)
            @else
                @include($_t_prev_key,$_t_prev)
            @endif
        @endforeach
    @endif

    <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
        <div class="dt--top-section">
            <div class="row">
                <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                    <div class="dataTables_length" id="zero-config_length">
                        <label>
                            Resultados :  
                            <select name="zero-config_length" aria-controls="zero-config" class="form-control">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                    <div id="zero-config_filter" class="dataTables_filter">
                        <label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            <input type="search" class="form-control" placeholder="Buscar..." aria-controls="zero-config">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="{{ (!empty($table_config) && !empty($table_config['id'])) ? $table_config['id'] : 'zero-config' }}" class="table table-striped dt-table-hover dataTable no-footer" style="width:100%;" role="grid" aria-describedby="zero-config_info">
                <thead>
                    <tr role="row">
                        @if ( !empty($table_config['with_pos']) )
                            <th class="sorting_1">#</th>
                        @endif

                        @foreach ( $table_config['headers'] as $_h_key => $_h_val )
                            <th>{{ $_h_val }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @if ( !empty($table_config['row_template']) )
                        
                        @foreach ( $table_data as $r_pos => $row )
                            @include($table_config['row_template'], ['row' => $row, 'r_pos' => $r_pos])
                        @endforeach

                    @elseif ( !empty($table_config['with_pos']) )

                        @php
                            $t_pos = 1;
                        @endphp
                        
                        @foreach ( $table_data as $r_pos => $row )
                            <tr role="row">
                                <td class="sorting_1">{{ $t_pos }}</td>

                                @foreach ( $table_config['headers'] as $_h_key => $_h_val )
                                    <td>
                                        @if ( !empty($table_config['col_templates']) && isset($table_config['col_templates'][$_h_key]) )
                                            @include($table_config['col_templates'][$_h_key], ['row' => $row, 'c_key' => $_h_key, 'r_pos' => $r_pos])
                                        @else
                                            {{ $row[$_h_key] }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            
                            @php
                                $t_pos++;
                            @endphp
                        @endforeach

                    @else

                        @foreach ( $table_data as $r_pos => $row )
                            <tr role="row">
                                @php
                                    $_t_first = true;
                                @endphp
                                @foreach ( $table_config['headers'] as $_h_key => $_h_val )
                                    <td @if($_t_first) echo 'class="sorting_1"'; $_t_first = false; @endif>
                                        @if ( !empty($table_config['col_templates']) && isset($table_config['col_templates'][$_h_key]) )
                                            @include($table_config['col_templates'][$_h_key], ['row' => $row, 'c_key' => $_h_key, 'r_pos' => $r_pos])
                                        @else
                                            {{ $row[$_h_key] }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                    @endif
                </tbody>
            </table>
        </div>
        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
            <div class="dt--pages-count  mb-sm-0 mb-3">
                <div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Página 1 de 1</div>
            </div>
            <div class="dt--pagination">
                <div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="zero-config_previous">
                            <a href="#" aria-controls="zero-config" data-dt-idx="0" tabindex="0" class="page-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            </a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="zero-config" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                        </li>
                        <li class="paginate_button page-item next disabled" id="zero-config_next">
                            <a href="#" aria-controls="zero-config" data-dt-idx="2" tabindex="0" class="page-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        
    </script>
</div>