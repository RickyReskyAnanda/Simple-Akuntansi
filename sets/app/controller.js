var app=angular.module('akuntanapp',["ngRoute"]);
var linked ="http://localhost/akuntansi/";

/**
|---------------------------------------------------------------------------------------------------------------------------
|                                               USER                                                                   |
|---------------------------------------------------------------------------------------------------------------------------
*/
app.controller('userctrl',function($scope,$http){
        $scope.simpan       = "Simpan";
        $scope.aksi         = "tambah";
        $scope.judulmodal   = "Tambah suplier";
        $scope.user     = {};

    /**
      |-----------------------------------------------------------------------------------------------
      |                                   MENAMPILKAN DATA TABLE
      |-----------------------------------------------------------------------------------------------
      */
          $http.post(linked+"A_user/select_data_user"
            ).success(function(result){
              $scope.userText     = result;
              $scope.pagesizes    = [5,10,15,20];
              $scope.pagesize     = $scope.pagesizes[0]; // jumlah baris dalam 1 halaman
              $scope.currentpage  = 0;//lokasi halaman saat ini
              $scope.pagenumber   = Math.ceil($scope.userText.length/$scope.pagesize);//jumlah total halaman
          });
    /*
    |-------------------------------------------------------------------------------------------
    |                                 FUNGSI UNTUK MEMBUAT PAGINASI
    |-------------------------------------------------------------------------------------------
    */
          $scope.paging=function(type){
            if(type == 0 && $scope.currentpage > 0){
              --$scope.currentpage;
            }else if(type == 1 && $scope.currentpage < $scope.pagenumber-1){
              ++$scope.currentpage; 
            }
          }

          $scope.$watchCollection('results',function(){
            if($scope.results==undefined)return;
            $scope.currentpage=0;
            $scope.pagenumber = Math.ceil($scope.results.length/$scope.pagesize);
          });

          $scope.changeAction=function(){
            $scope.currentpage=0;
            $scope.pagenumber = Math.ceil($scope.results.length/$scope.pagesize);
          }

/**
      |-----------------------------------------------------------------------------------------------
      |                               VIEW MODAL TAMBAH suplier
      |-----------------------------------------------------------------------------------------------
      */
            $scope.viewtambah = function(){
              $scope.simpan     = "Simpan";
              $scope.judulmodal = "Tambah";
              $scope.aksi       = "tambah";
              $scope.user       = {};
            }

    // /**
    //   |-----------------------------------------------------------------------------------------------
    //   |                               INSERT suplier
    //   |-----------------------------------------------------------------------------------------------
    //   */
            

            $scope.tambahdata = function(){
              $http.post(
                linked+"A_user/insert_data_user",
                {
                  data: $scope.user //data kembalian
                }
              ).success(function(data){
                alert("Berhasil menyimpan data");
                $scope.userText.unshift(data);
              }).error(function(){
                alert("Gagal menyimpan data !");
              });
            };

    /**
       |-----------------------------------------------------------------------------------------------
      |                               EDIT DATA
      |-----------------------------------------------------------------------------------------------
      */
          $scope.ubah = function(val){
            $scope.aksi             = "ubah";
            $scope.simpan           = "Ubah";
            $scope.judulmodal       = "Edit";
            $scope.idYgAkanDiUbah   = val.id_user;
            $scope.user          = val;
          };

          $scope.ubahdata = function(){
            $http.post(
              linked+"A_user/update_data_user",
              {
                id  : $scope.idYgAkanDiUbah,
                data: $scope.user
              }
            ).success(function(){
              alert("Berhasil mengubah data");
            }).error(function(){
              alert("Gagal mengubah data");
            });
          };
          
    /**
      |-----------------------------------------------------------------------------------------------
      |                               PILIHAN SIMPAN DATA
      |-----------------------------------------------------------------------------------------------
      */
          $scope.simpandata = function(){
            switch($scope.aksi){
              case "tambah":
                $scope.tambahdata();
              break;
              
              case "ubah":
                $scope.ubahdata();
              break;
            }
          };

    /**
      |-----------------------------------------------------------------------------------------------
      |                               HAPUS suplier
      |-----------------------------------------------------------------------------------------------
      */
            $scope.hapusdata = function(id,index){
                if (confirm("Apakah anda ingin menghapus ? ")){
                    $http.post(
                      linked+"A_user/delete_data_user",
                      {
                        id:id
                      }
                    ).success(function(){
                      $scope.userText.splice(index,1);
                      alert("Berhasil Menghapus Data");
                    }).error(function(){
                      alert("Gagal menghapus data");
                    });
                }
            };

  }); //end-suplier

/**
|---------------------------------------------------------------------------------------------------------------------------
|                                               Suplier                                                                 |
|---------------------------------------------------------------------------------------------------------------------------
*/
app.controller('suplierctrl',function($scope,$http){
        $scope.simpan       = "Simpan";
        $scope.aksi         = "tambah";
        $scope.judulmodal   = "Tambah suplier";
        $scope.suplier      = {};
        $scope.suplierText = "";

 /**
      |-----------------------------------------------------------------------------------------------
      |                                   MENAMPILKAN DATA TABLE
      |-----------------------------------------------------------------------------------------------
      */

          $http.post(linked+"A_suplier/select_data_suplier"
            ).success(function(result){
              $scope.suplierText  = result;
              $scope.pagesizes    = [5,10,15,20];
              $scope.pagesize     = $scope.pagesizes[0]; // jumlah baris dalam 1 halaman
              $scope.currentpage  = 0;//lokasi halaman saat ini
              $scope.pagenumber   = Math.ceil($scope.suplierText.length/$scope.pagesize);//jumlah total halaman
          });
    /*
    |-------------------------------------------------------------------------------------------
    |                                 FUNGSI UNTUK MEMBUAT PAGINASI
    |-------------------------------------------------------------------------------------------
    */
          $scope.paging=function(type){
            if(type == 0 && $scope.currentpage > 0){
              --$scope.currentpage;
            }else if(type == 1 && $scope.currentpage < $scope.pagenumber-1){
              ++$scope.currentpage; 
            }
          }

          $scope.$watchCollection('results',function(){
            if($scope.results==undefined)return;
            $scope.currentpage=0;
            $scope.pagenumber = Math.ceil($scope.results.length/$scope.pagesize);
          });

          $scope.changeAction=function(){
            $scope.currentpage=0;
            $scope.pagenumber = Math.ceil($scope.results.length/$scope.pagesize);
          }

    /**
      |-----------------------------------------------------------------------------------------------
      |                               VIEW MODAL TAMBAH suplier
      |-----------------------------------------------------------------------------------------------
      */
            $scope.viewtambah = function(){
              $scope.simpan                 = "Simpan";
              $scope.judulmodal             = "Tambah";
              $scope.aksi                   = "tambah";
              $scope.suplier                = {};
            }

    /**
      |-----------------------------------------------------------------------------------------------
      |                               INSERT suplier
      |-----------------------------------------------------------------------------------------------
      */
            $scope.tambahdata = function(){
              $http.post(
                linked+"A_suplier/insert_data_suplier",
                {
                  data: $scope.suplier //data kembalian
                }
              ).success(function(id){
                alert("Berhasil Menyimpan Data !");
                $scope.suplierText.unshift({
                  "id_suplier"  :id,
                  "nama_suplier":$scope.suplier.nama_suplier,
                  "no_telp"     :$scope.suplier.no_telp,
                  "alamat"      :$scope.suplier.alamat,
                  "merk"        :$scope.suplier.merk
                });
              }).error(function(){
                alert("Gagal menyimpan data !");
              });
            };
    /**
       |-----------------------------------------------------------------------------------------------
      |                               EDIT DATA
      |-----------------------------------------------------------------------------------------------
      */
          $scope.ubah = function(val){
            $scope.aksi             = "ubah";
            $scope.simpan           = "Ubah";
            $scope.judulmodal       = "Edit";
            $scope.idYgAkanDiUbah   = val.id_suplier;
            $scope.suplier          = val;
          };

          $scope.ubahdata = function(){
            $http.post(
              linked+"A_suplier/update_data_suplier",
              {
                id  : $scope.idYgAkanDiUbah,
                data: $scope.suplier
              }
            ).success(function(){
              alert("Berhasil mengubah data");
            }).error(function(){
              alert("Gagal mengubah data");
            });
          };
          
    // /**
    //   |-----------------------------------------------------------------------------------------------
    //   |                               PILIHAN SIMPAN DATA
    //   |-----------------------------------------------------------------------------------------------
    //   */
          $scope.simpandata = function(){
            switch($scope.aksi){
              case "tambah":
                $scope.tambahdata();
              break;
              
              case "ubah":
                $scope.ubahdata();
              break;
            }
          };

    /**
      |-----------------------------------------------------------------------------------------------
      |                               HAPUS suplier
      |-----------------------------------------------------------------------------------------------
      */
            $scope.hapusdata = function(id,index){
                if (confirm("Apakah anda ingin menghapus ? ")){
                    $http.post(
                      linked+"A_suplier/delete_data_suplier",
                      {
                        id:id
                      }
                    ).success(function(data){
                      $scope.suplierText.splice(index,1);
                      alert("Berhasil Menghapus Data");
                    }).error(function(){
                      alert("Gagal menghapus data");
                    });
                }
            };


  }); //end-suplier


/**
|---------------------------------------------------------------------------------------------------------------------------
|                                               PROJECT                                                                 |
|---------------------------------------------------------------------------------------------------------------------------
*/
app.controller('projectctrl',function($scope,$http){
        $scope.simpan       = "Simpan";
        $scope.aksi         = "tambah";
        $scope.judulmodal   = "Tambah suplier";
        $scope.user     = {};

    /**
      |-----------------------------------------------------------------------------------------------
      |                                   MENAMPILKAN DATA TABLE
      |-----------------------------------------------------------------------------------------------
      */
          $http.post(linked+"A_project/select_data_project"
            ).success(function(result){
              $scope.projectText  = result;
          });
 

/**
      |-----------------------------------------------------------------------------------------------
      |                               VIEW MODAL TAMBAH Project
      |-----------------------------------------------------------------------------------------------
      */
            $scope.viewtambah = function(){
              $scope.simpan     = "Simpan";
              $scope.judulmodal = "Tambah";
              $scope.aksi       = "tambah";
              $scope.project    = {};
            }

    /**
      |-----------------------------------------------------------------------------------------------
      |                               INSERT project
      |-----------------------------------------------------------------------------------------------
      */
            

            $scope.tambahdata = function(){
              $http.post(
                linked+"A_project/insert_data_project",
                {
                  data: $scope.project //data kembalian
                }
              ).success(function(data){
                alert("Berhasil menyimpan data");
                $scope.projectText.unshift(data);
              }).error(function(){
                alert("Gagal menyimpan data !");
              });
            };

    // /**
    //    |-----------------------------------------------------------------------------------------------
    //   |                               EDIT DATA
    //   |-----------------------------------------------------------------------------------------------
    //   */
    //       $scope.ubah = function(val){
    //         $scope.aksi             = "ubah";
    //         $scope.simpan           = "Ubah";
    //         $scope.judulmodal       = "Edit";
    //         $scope.idYgAkanDiUbah   = val.id_user;
    //         $scope.user          = val;
    //       };

          $scope.ubahstatus = function(id,status,index,pesan){
            if (confirm(pesan)){
              $http.post(
                linked+"A_project/update_status_project",
                {
                  id  : id,
                  status : status
                }
              ).success(function(data){
                alert("Berhasil mengubah data");
                $scope.projectText.splice(index,1);
                $scope.projectText.unshift(data);
              }).error(function(){
                alert("Gagal mengubah data");
              });
            }
          };
          
    // /**
    //   |-----------------------------------------------------------------------------------------------
    //   |                               PILIHAN SIMPAN DATA
    //   |-----------------------------------------------------------------------------------------------
    //   */
    //       $scope.simpandata = function(){
    //         switch($scope.aksi){
    //           case "tambah":
    //             $scope.tambahdata();
    //           break;
              
    //           case "ubah":
    //             $scope.ubahdata();
    //           break;
    //         }
    //       };


            $scope.hapusdata = function(id,index){
                if (confirm("Apakah anda ingin menghapus ? ")){
                    $http.post(
                      linked+"A_project/delete_data_project",
                      {
                        id:id
                      }
                    ).success(function(){
                      $scope.projectText.splice(index,1);
                      alert("Berhasil Menghapus Data");
                    }).error(function(){
                      alert("Gagal menghapus data");
                    });
                }
            };

  }); //end-suplier
app.controller('detailprojectctrl',function($scope,$http,$routeParams){
    $scope.aktif1="active";
    $scope.aktif2="";
    $scope.tabulasi=true;
    $scope.buku={};
    $scope.detailproject=[];
    $scope.tampilformjurnal=false;

    $scope.selectDataDetailProject=function(){

    $http.post(linked+"A_project/select_data_detail_project/",
    {
      id:$routeParams.id 
    }
      ).success(function(result){
          $scope.detailproject  = result;
      }).error(function(){
          alert("Gagal mengambil data");
      });
    }
    $scope.selectDataDetailProject();

    $scope.tabBerganti=function(nilai){
      if(nilai==1){
        $scope.aktif1="active";
        $scope.aktif2="";
        $scope.tabulasi=true;
      }else if(nilai==2){
        $scope.aktif1="";
        $scope.aktif2="active";
        $scope.tabulasi=false;
      }
    }
//select data buku besar berdasarkan kategori
    $scope.totalbuku={};
    $scope.totalbuku.kredit=0;
    $scope.totalbuku.debit=0;
    $http.post(linked+"A_project/select_data_buku_besar/"
      ).success(function(result){
          $scope.kode  = result;
      }).error(function(){
          alert("Gagal mengambil data");
      });

    $http.post(
        linked+"A_project/select_data_sub_buku_besar",
        {
          jenis_buku:'0',
          jenis : 'modal'
        }
      ).success(function(result){
        $scope.projectText=result;
        $scope.perhitungankreditdebit();
      }).error(function(){
        alert("Gagal mengambil data");
      });

        
        // alert(total);

    $scope.view={};

    $scope.view.jenis      = 'modal';
    $scope.view.jenis_buku = '0';
    $scope.view.kode        = 'Modal';
    $scope.tombolhapus=false;

    $scope.tabbukubesar = function(jenis_buku,jenis,kode){
      $scope.view.jenis      = jenis;
      $scope.view.kode       = kode;
      $scope.view.jenis_buku = jenis_buku;
      if(jenis=='lainnya')$scope.tombolhapus=true;
      else $scope.tombolhapus=false;
      $http.post(
        linked+"A_project/select_data_sub_buku_besar",
        {
          jenis_buku:jenis_buku,
          jenis : jenis
        }
      ).success(function(result){
        $scope.projectText=result;
        $scope.perhitungankreditdebit();
      }).error(function(){
        alert("Gagal mengambil data");
      });
    }

    $scope.viewtambahkode= function(){
      $scope.buku       = {};
      $scope.buku       = $scope.view;
      $scope.buku.pembayaran = 'debit';
    }
    $scope.viewtambahbuku= function(){
      $scope.aksi       = "tambah";
      $scope.judulmodal = "Tambah";
      $scope.buku = {};
      $scope.buku = $scope.view;
      $scope.buku.pembayaran = 'debit';
      $scope.buku.nominal = '';
      $scope.buku.nama_buku_besar="";
    }

          $scope.perhitungankreditdebit=function(){
              $scope.totalbuku.debit=0;
              $scope.totalbuku.kredit=0;
              for(var i = 0; i < $scope.projectText.length; i++){
                if($scope.projectText[i].pembayaran=='debit'){
                  $scope.totalbuku.debit +=parseInt($scope.projectText[i].nominal);
                }else if($scope.projectText[i].pembayaran=='kredit'){
                  $scope.totalbuku.kredit +=parseInt($scope.projectText[i].nominal);
                }
              }
          }
    /**
      |-----------------------------------------------------------------------------------------------
      |                               INSERT suplier
      |-----------------------------------------------------------------------------------------------
      */
            $scope.tambahsubbuku= function(){
              $http.post(
                linked+"A_project/insert_data_sub_buku_besar/",
                {
                  jenis       : $scope.view.jenis,
                  jenis_buku  : $scope.view.jenis_buku,
                  data        : $scope.buku, //data kembalian
                  id_project  : $routeParams.id 
                }
              ).success(function(result){
                alert('Berhasil Menginput data');
                $scope.projectText.unshift(result);
                $scope.perhitungankreditdebit();
                $scope.selectDataDetailProject();
                $scope.buku={};
              }).error(function(){
                alert("Gagal menyimpan data !");
              });
            };
    /**
       |-----------------------------------------------------------------------------------------------
      |                               EDIT DATA
      |-----------------------------------------------------------------------------------------------
      */
          $scope.vieweditbuku = function(val,kode){
            $scope.aksi             = "ubah";
            $scope.judulmodal       = "Edit";
            $scope.idYgAkanDiUbah   = val.id_buku_besar;
            $scope.buku             = val;
            $scope.buku.kode        = kode;
          };

          $scope.editsubbuku = function(){
            $http.post(
              linked+"A_project/update_data_sub_buku_besar",
              {
                id  : $scope.idYgAkanDiUbah,
                data: $scope.buku
              }
            ).success(function(data){
              alert(data);
              $scope.perhitungankreditdebit();
           }).error(function(){
              alert("Gagal mengubah data");
            });
          };
          
    /**
      |-----------------------------------------------------------------------------------------------
      |                               PILIHAN SIMPAN DATA
      |-----------------------------------------------------------------------------------------------
      */
          $scope.simpansubbuku = function(){
            switch($scope.aksi){
              case "tambah":
                $scope.tambahsubbuku();
              break;
              case "ubah":
                $scope.editsubbuku();
              break;
            }
          };

    $scope.hapussubbuku=function(bb,index){
      if(confirm("Apakah anda ingin menghapus data ? ")){
        $http.post(linked+"A_project/delete_data_sub_buku_besar",
          {
            data:bb,
            id_project : $routeParams.id
          }).success(function(result){
                alert(result);
                $scope.projectText.splice(index,1);
                $scope.perhitungankreditdebit();
                $scope.selectDataDetailProject();
            }).error(function(){
                alert("Gagal menghapus data");
            });
        }
    }

// //----------------------jurnaal--------------------------------------------------------------------------------

    $http.post(linked+"A_project/select_data_jurnal_umum",
    {
      id:$routeParams.id
    }).success(function(result){
          $scope.jurnalumumText = result;
      }).error(function(){
          alert("Gagal mengambil data");
      });
    /**
      |-----------------------------------------------------------------------------------------------
      |                               VIEW MODAL TAMBAH suplier
      |-----------------------------------------------------------------------------------------------
      */
    $scope.viewtambahjurnal = function(){
      $scope.simpan     = "Simpan";
      $scope.aksi       = "tambah";
      $scope.isijurnal  = {};
      $scope.tampilformjurnal = false;
    }
   /*
      |-----------------------------------------------------------------------------------------------
      |                               INSERT suplier
      |-----------------------------------------------------------------------------------------------
      */
    $scope.tambahdatajurnal = function(){
      $http.post(
        linked+"A_project/insert_data_jurnal_umum",
        {
          data: $scope.isijurnal, //data kembalian
          id_project:$routeParams.id
        }
      ).success(function(result){
        alert('Berhasil Menginput data');
        $scope.jurnalumumText.unshift(result);
      }).error(function(){
        alert("Gagal menyimpan data !");
      });
    };

    $scope.hapusdatajurnal=function(id,index){
      if(confirm("Apakah anda ingin menghapus data ? ")){
        $http.post(linked+"A_project/delete_data_jurnal_umum",
          {
            id:id
          }).success(function(){
                alert('Berhasil menghapus data');
                $scope.jurnalumumText.splice(index,1);
            }).error(function(){
                alert("Gagal menghapus data");
            });
        }
    }
});