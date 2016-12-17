<span ng-controller="suplierctrl">
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Projects</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            <strong>Profile</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profile anda</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-center">
                                <a href="#"><img alt="image" width="200px" class="img-circle" src="img/profile_small.jpg" /></a>
                                <br>
                            </p><br>
                            <form role="form" class="form-inline">
                               <center> <label title="Upload image file" for="inputImage" class="btn btn-sm btn-success">
                                        <input  type="file" accept="image/*" name="file" id="inputImage" class="hide">
                                        <i class="fa fa-file-image-o"></i> | <strong>Ubah Foto Profil</strong>
                                    </label></center>
                            </form>
                        </div>
                        <div class="col-sm-4"><h3 class="m-t-none m-b">Muhammad Juanda B</h3>
                            <div class="form-group">
                                <label>E-mail</label>
                                <p>muhjuandab@gmail.com</p>
                            </div>
                            <div class="form-group">
                                <label>No. Handpone</label>
                                <p>092384023984</p>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <p>Laki-laki</p>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <p>Jl. Pemuda No. 28 C</p>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-primary pull-left m-t-n-xs" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-edit"></i> | <strong>Edit Profile</strong></button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <p>************</p>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-danger pull-left m-t-n-xs" type="submit" data-toggle="modal" data-target="#editpass">
                                    <i class="fa fa-key"></i> | <strong>Ubah Password</strong></button>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <form role="form">
                                    <div class="form-group"><label>Password Lama</label>
                                        <input type="password" placeholder="********" class="form-control">
                                    </div>
                                    <div class="form-group"><label>Password Baru</label>
                                        <input type="password" placeholder="********" class="form-control">
                                    </div>
                                    <div class="form-group"><label>Ulangi Password Baru</label>
                                        <input type="password" placeholder="********" class="form-control">
                                    </div>
                                    <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary btn-sm">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- content end -->