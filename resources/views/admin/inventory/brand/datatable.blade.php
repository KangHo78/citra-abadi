<div class="card-body">
                <div class="table-responsive dataTable">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                               
                                <th>Nama</th>
                                <!-- <th>Subkategori</th> -->
                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $brand)
                                
                            <tr>
                                <td>{{ $brand->name }}</td>
                                <!-- <td>
                                    <ul style="list-style-type: none;padding-inline-start: 0">
                                        <li>Deskripsi</li>
                                        <li>Deskripsi</li>
                                    </ul>
                                </td> -->
                               
                                <td>
                                    <div class="btn-group mb-1">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                @can('brand-update')
                                                <a href="{{route('brand.edit', $brand->id)}}"
                                                    class="dropdown-item">
                                                    <i class="bi bi-pencil text-warning"></i>
                                                    <b class="p-2">Ubah</b>
                                                </a>
                                                @endcan
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>