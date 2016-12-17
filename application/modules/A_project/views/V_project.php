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
                            <a ng-if="val.status=='berjalan'" href="" class="btn btn-primary btn-sm pull-right" type="button" role="button" ng-click="ubahstatus(val.id_project,val.status,$index,'Ingin Menyelesaikan Project Ini ?')">
                                <i class="fa fa-check"></i>&nbsp;| Belum Selesai
                            </a>
                            <a ng-if="val.status=='selesai'" href="" class="btn btn-primary btn-sm pull-right" type="button" role="button" ng-click="ubahstatus(val.id_project,val.status,$index,'Ingin Mengubah Status Project Ini ?')">
                                <i class="fa fa-check"></i>&nbsp;| Selesai
                            </a>
                            <button class="btn btn-danger btn-sm pull-right" style="margin: 0px 7px;" ng-click="hapusdata(val.id_project,$index)"><i class="fa fa-trash"></i>&nbsp;| Hapus Project</button>

                            <a href="#/detail-project/{{val.id_project}}" class="btn btn-info btn-sm pull-right" type="button" role="button"><i class="fa fa-eye"></i>&nbsp;| Detail</a>

                            <h2><b>{{val.nama_project}}</b></h2>
                        </div>
                        <div class="ibox-content">
                            <div class="m-t-sm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <dl class="dl-vertical">
                                            <dt class="badge badge-info"><i class="fa fa-user"></i> Pemilik Project </dt>
                                            <dd style="margin: 5px 18px;">{{val.pemilik}}</dd><hr>
                                            <dt class="badge badge-info"><i class="fa fa-map-marker"></i> Lokasi </dt>
                                            <dd style="margin: 5px 18px;">{{val.lokasi}}</dd><hr>
                                            <dt class="badge badge-info"><i class="fa fa-calendar"></i> Tahun </dt>
                                            <dd style="margin: 5px 18px;">{{val.tahun}}</dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="stat-list">
                                            <li class="col-md-4"> <span class="badge badge-warning">DEBIT</span>
                                                <ul class="stat-list">
                                                <li class="col-md-12">
                                                    <h2 class="no-margins betul" >Rp. 46.000.000</h2>
                                                    <div class="progress progress-mini">
                                                        <div class="progress-bar" style="width: 100%;"></div>
                                                    </div>
                                                </li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4"> <span class="badge badge-warning">KREDIT</span>
                                                <ul class="stat-list">
                                                <li class="col-md-12">
                                                    <h2 class="no-margins betul" >Rp. 46.000.000</h2>
                                                    <div class="progress progress-mini">
                                                        <div class="progress-bar" style="width: 100%;"></div>
                                                    </div>
                                                </li>
                                                </ul>
                                            </li>
                                            <li class="col-md-4"> <span class="badge badge-warning">SALDO</span>
                                                <ul class="stat-list">
                                                <li class="col-md-12">
                                                    <h2 class="no-margins betul" >Rp. 46.000.000</h2>
                                                    <div class="progress progress-mini">
                                                        <div class="progress-bar" style="width: 100%;"></div>
                                                    </div>
                                                </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
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
    </div>
</span>
<!-- content end -->
