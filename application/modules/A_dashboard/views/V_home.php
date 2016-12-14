<span ng-controller="proyekctrl">    
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
    <button class="btn btn-primary dim" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-money"></i> | Tambah Project baru</button><div id="infonya"></div>
    
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content animated bounceIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-folder modal-icon"></i>
                    <h4 class="modal-title">Tambah Project</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group"><label class="col-lg-4 control-label">Nama Project</label>
                            <div class="col-lg-8"><input type="text" placeholder="Nama Project ..." class="form-control"> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Pemilik</label>
                            <div class="col-lg-8"><input type="text" placeholder="Pemilik ..." class="form-control"> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Lokasi</label>
                            <div class="col-lg-8"><input type="telp" placeholder="Isi Lokasi ..." class="form-control"> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-4 control-label">Tahun</label>
                            <div class="col-lg-8"><input type="number" placeholder="Tahun ..."  class="form-control"> 
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </div>
        </div>
        
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title belum-selesai">
                            <a href="#" class="btn btn-danger btn-sm pull-right" type="button" role="button" onclick="confirm('Ingin Menyelesaikan Project Ini?')"><i class="fa fa-check"></i>&nbsp;| Belum Selesai</a>
                            <h2>GEDUNG A - SAINTEK</h2>
                            <a href="detail-project.html" class="btn btn-primary btn-sm" type="button" role="button"><i class="fa fa-eye"></i>&nbsp;| Detail</a>
                        </div>
                        <div class="ibox-content">
                            <div class="m-t-sm">
                                <div class="row">
                                    <div class="col-md-6">
                                    <!-- bagian Chart -->
         
                                        <!-- <div class="pie highlight" data-start="30" data-value="30"></div>
                                        <div class="pie" data-start="60" data-value="40"></div>
                                        <div class="pie big" data-start="100" data-value="260"></div> -->
                                    <!-- /.bagian chart -->
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="stat-list m-t-lg">
                                            <li>
                                                <h2 class="no-margins betul" ></h2>
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
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="stat-list m-t-lg">
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
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title selesai">
                            <a href="#" class="btn btn-success btn-sm pull-right" type="button" role="button"><i class="fa fa-pencil"></i>&nbsp;| Selesai</a>
                            <h2>GEDUNG A - SAINTEK</h2>
                            <a href="detail-project.html" class="btn btn-primary btn-sm" type="button" role="button"><i class="fa fa-eye"></i>&nbsp;| Detail</a>
                        </div>
                        <div class="ibox-content">
                            <div class="m-t-sm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                        <canvas id="lineChart" height="114"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="stat-list m-t-lg">
                                            <li>
                                                <h2 class="no-margins">Rp. 46.000.000</h2>
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
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="stat-list m-t-lg">
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
</span>
<!-- content end -->
