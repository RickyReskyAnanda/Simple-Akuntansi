<span ng-controller="suplierctrl">
<div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Projects</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">
                        <strong>Suplier</strong>
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
                                    Tambah Suplier
                                </button>
                            </div>
                        </div>
                        
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <div class="form-inline dt-bootstrap">
                        <div class="dataTables_length" >
                            Menampilkan 
                                <select class="form-control input-sm"
                                        ng-change="changeAction()"
                                        ng-model="pagesize"  
                                        ng-options="opt as opt for opt in pagesizes">
                                </select> Halaman {{currentpage+1}} dari {{pagenumber}} halaman

                            </div>
                            
                        <div class="col-sm-3 pull-right">
                            <div class="input-group"><input type="text" placeholder="Search" ng-model="q" class="input-sm form-control"/></div>
                        </div>
                <table class="table table-stripped" style="font-size: 13px;">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Suplier</th>
                        <th>No. telp</th>
                        <th>Alamat</th>
                        <th>Merk</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="val in (results =(suplierText | filter:q))"
                        ng-if="$index >= (currentpage*pagesize) && $index < ((currentpage+1)*pagesize)" >
                        <td>{{$index+1}}</td>
                        <td>{{val.nama_suplier}}</td>
                        <td>{{val.no_telp}}</td>
                        <td>{{val.alamat}}</td>
                        <td>{{val.merk}}</td>
                        <td>
                            <button class="btn btn-info btn-sm" type="button" ng-click="ubah(val)" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-paste"></i> Edit
                            </button>
                            <button class="btn btn-danger btn-sm" type="button" ng-click="hapusdata(val.id_suplier,$index)">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
                        </td>   
                    </tr>
                    <tr ng-if="results.length == 0"><td colspan="6" align="center"><h2>Hasil Tidak Ditemukan</h2></td></tr>
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
        <!-- Modal Menambahkan Suplier START -->
    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">  
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-user modal-icon"></i>
                    <h4 class="modal-title">{{judulmodal}} Suplier</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group"><label class="col-lg-4 control-label">Nama Suplier</label>
                            <div class="col-lg-8"><input type="text" ng-model="suplier.nama_suplier" placeholder="Isi nama suplier..." class="form-control"> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">No. Telepon</label>
                            <div class="col-lg-8"><input type="telp" ng-model="suplier.no_telp" placeholder="Isi No. Telepon..." class="form-control"> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Alamat</label>
                            <div class="col-lg-8"><textarea class="form-control" ng-model="suplier.alamat" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Merk</label>
                            <div class="col-lg-8"><input type="text" ng-model="suplier.merk" placeholder="Isi Nama Pemilik..." class="form-control"> 
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
    <!-- Modal Menambahkan Suplier END -->
        <!-- content end -->