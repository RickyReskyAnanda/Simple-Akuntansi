<!-- content start -->
<span ng-controller="userctrl">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Projects</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            <strong>Managemen User</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content">
        
        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div>
                                <button type="button" class="btn btn-primary" ng-click="viewtambah()" data-toggle="modal" data-target="#myModal">
                                    Tambah User
                                </button>
                            </div>
                        </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                    <div class=" form-inline dt-bootstrap">
                        <div class="col-sm-3">
                            <label>Menampilkan 
                                <select class="form-control input-sm"
                                        ng-change="changeAction()"
                                        ng-model="pagesize"  
                                        ng-options="opt as opt for opt in pagesizes">
                                </select> Halaman {{currentpage+1}} dari {{pagenumber}} halaman</label>
                            </div>
                        <div class="col-sm-3 pull-right">
                                    <div class="input-group"><input type="text" ng-model="q" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                </div>
                        <table class="table table-bordered" style="font-size: 13px;">
                    <thead>
                    <tr role="row">
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>E-mail</th>
                        <th>No. Handphone</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="val in (results =(userText | filter:q))"
                        ng-if="$index >= (currentpage*pagesize) && $index < ((currentpage+1)*pagesize)">
                        <td>{{$index+1}}</td>
                        <td>{{val.nama_lengkap}}</td>
                        <td>{{val.jk}}</td>
                        <td>{{val.email}}</td>
                        <td>{{val.no_hp}}</td>
                        <td>{{val.alamat}}</td>
                        <td>{{val.status}}</td>
                        <td>
                            <button class="btn btn-info btn-sm" type="button" ng-click="ubah(val)" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-paste"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm" type="button" ng-click="hapusdata(val.id_user,$index)">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </td>   
                    </tr>
                    </tbody>
                    </table>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                    <center><ul class="pagination">
                        <li class="paginate_button"><a href="" ng-click="currentpage=0">Pertama</a></li>
                        <li class="paginate_button"><a href="" ng-click="paging(0)" >Sebelumnya</a></li>
                        <li class="paginate_button"><a href="" ng-click="paging(1)">Selanjutnya</a></li>
                        <li class="paginate_button"><a href="" ng-click="currentpage=pagenumber-1">Akhir</a></li>
                    </ul></center>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
                </div>
                    </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">  
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-user modal-icon"></i>
                    <h4 class="modal-title">{{judulmodal}} User</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group"><label class="col-lg-4 control-label">Nama Lengkap</label>
                            <div class="col-lg-8"><input type="text" ng-model="user.nama_lengkap" placeholder="Isi nama ..." class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">E-Mail</label>
                            <div class="col-lg-8"><input type="email" ng-model="user.email" placeholder="Alamat" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">No. Handphone</label>
                            <div class="col-lg-8"><input type="text" ng-model="user.no_hp" placeholder="081231******" class="form-control"></div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Jenis Kelamin</label>
                            <div class="col-lg-8">
                                <select class="form-control input-sm" ng-model="user.jk">
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Alamat</label>
                            <div class="col-lg-8"><textarea class="form-control" rows="3" ng-model="user.alamat"></textarea></div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Status</label>
                            <div class="col-lg-8">
                                <select class="form-control input-sm" ng-model="user.status">
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Tidak Aktif</option>
                                </select> 
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" ng-click="simpandata()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div id="toast-container" class="toast-top-right" aria-live="polite" role="alert" ng-show="tampilkantoast">
        <div class="toast {{properties.warna}}" style="opacity: 0.896272;">
            <div class="toast-progress" style="width: 100%;"></div>
            <button type="button" class="toast-close-button" role="button">×</button>
            <div class="toast-title">{{properties.judul}}</div>
            <div class="toast-message">{{properties.isi}}</div>
        </div>
    </div>
</span>
    <!-- Modal Menambahkan User END -->
        <!-- content end -->