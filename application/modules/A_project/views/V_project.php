<span ng-controller="projectctrl">    
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Projects</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">
                    <strong>Projects</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
    <button class="btn btn-primary dim" type="button" data-toggle="modal" data-target="#myModal" ng-click="viewtambah()"><i class="fa fa-money"></i> | Tambah Project baru</button><div id="infonya"></div>
    
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content animated bounceIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-folder modal-icon"></i>
                    <h4 class="modal-title">{{judulmodal}} Project</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group"><label class="col-lg-4 control-label">Nama Project</label>
                            <div class="col-lg-8"><input type="text" ng-model="project.nama_project" placeholder="Nama Project ..." class="form-control"> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Pemilik</label>
                            <div class="col-lg-8"><input type="text" ng-model="project.pemilik" placeholder="Pemilik ..." class="form-control"> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Lokasi</label>
                            <div class="col-lg-8"><textarea class="form-control" ng-model="project.lokasi" placeholder="Isi Lokasi"></textarea> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Tahun</label>
                            <div class="col-lg-8"><input type="text" ng-model="project.tahun" placeholder="Tahun ..."  class="form-control"> 
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" ng-click="tambahdata()">Simpan</button>
                </div>
            </div>
            </div>
        </div>
        
        <div class="row" ng-repeat="val in projectText">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title {{val.status}}">
                            <a ng-if="val.status=='berjalan'" href="" class="btn btn-primary btn-sm pull-right" type="button" role="button" ng-click="ubahstatus(val.id_project,val.status,$index,'Ingin Menyelesaikan Project Ini ?')" style="margin-left: 10px;">
                                <i class="fa fa-check"></i>&nbsp;| Belum Selesai
                            </a>
                            <a ng-if="val.status=='selesai'" href="" class="btn btn-primary btn-sm pull-right" type="button" role="button" ng-click="ubahstatus(val.id_project,val.status,$index,'Ingin Mengubah Status Project Ini ?')" style="margin-left: 10px;">
                                <i class="fa fa-check"></i>&nbsp;| Selesai
                            </a>
                            <button class="btn btn-danger btn-sm pull-right" ng-click="hapusdata(val.id_project,$index)"><i class="fa fa-trash"></i>&nbsp;| Hapus Project</button>

                            <h2>{{val.nama_project}}</h2>
                            <a href="#/detail-project/{{val.id_project}}" class="btn btn-primary btn-sm" type="button" role="button" ><i class="fa fa-eye"></i>&nbsp;| Detail</a>
                        </div>
                        <div class="ibox-content">
                            <div class="m-t-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div>
                                        <canvas id="lineChart" height="114"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <dl class="dl-horizontal">
                                            <dt>Pemilik Project: </dt><dd>{{val.pemilik}}</dd>
                                            <dt>Lokasi: </dt><dd>{{val.lokasi}}</dd>
                                            <dt>Tahun: </dt><dd>{{val.tahun}}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="stat-list m-t-lg">
                                            <li>
                                                <h2 class="no-margins betul" >Rp. 46.000.000</h2>
                                                <small>Jumlah Pembelian</small>
                                                <div class="progress progress-mini">
                                                    <div class="progress-bar" style="width: 48%;"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins ">Rp. 46.000.000</h2>
                                                <small>Jumlah Hutang</small>
                                                <div class="progress progress-mini">
                                                    <div class="progress-bar" style="width: 60%;"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins">Rp. 46.000.000</h2>
                                                <small>Jumlah Pengajian</small>
                                                <div class="progress progress-mini">
                                                    <div class="progress-bar" style="width: 48%;"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins ">Rp. 46.000.000</h2>
                                                <small>Jumlah Piutang</small>
                                                <div class="progress progress-mini">
                                                    <div class="progress-bar" style="width: 60%;"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div></div>
                            </div>
                            <div class="m-t-md">
                                <small class="pull-right">
                                    <i class="fa fa-clock-o"> </i>
                                    Terakhir diubah 16.07.2015
                                </small>
                                <small>
                                    <i class="fa fa-calendar-o"></i> Selasa, 1 November 2016 - Rabu, 30 November 2016
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</span>
<!-- content end -->
