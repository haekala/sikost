<?php
/**
 * Created by JetBrains PhpStorm.
 * User: julisman
 * Date: 12/8/13
 * Time: 9:32 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<!DOCTYPE html>
<html lang="en" data-ng-app xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">

   <!-- <script src="http://code.jquery.com/jquery-latest.js"></script>-->
    <script src="<?php echo base_url(); ?>asset/js/angular.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
    <script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
           <!-- <a class="brand" href="<?php /*echo base_url(); */?>"><?php /*echo $judul_pendek; */?></a>-->
            <div class="nav-collapse collapse">
                <ul class="nav">
              <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
			  <li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_pemilik"><i class="icon-book icon-white"></i> Dashboard</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>index.php/dashboard_pemilik/tempatkost"><i class="icon-book icon-white"></i> Tempat Kos</a></li>
            </ul>
                <div class="btn-group pull-right">

                    <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('name'); ?></button>
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>app/change_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
                        <li><a href="<?php echo base_url(); ?>manage_user"><i class="icon-tasks"></i> Manajemen User</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/loginlogout/do_logout"><i class="icon-off"></i> Log Out</a></li>
                    </ul>
                </div>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container" data-ng-controller="kost">
    <div data-ng-show="tambahdatakos">
        <legend>{{action}} data kos</legend>
        <form class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
                <label class="control-label">Nama</label>
                <div class="controls">
                    <input type="text" name="nama" class="span6" maxlength="255" ng-model="data.nama" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Kuota</label>
                <div class="controls">
                    <input type="text" name="kuota" class="span6" maxlength="255" ng-model="data.kuota" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tersedia</label>
                <div class="controls">
                    <input type="text" name="tersedia" class="span6" maxlength="255" ng-model="data.tersedia" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Alamat</label>
                <div class="controls">
                    <textarea  name="kuota" class="span6" maxlength="255" ng-model="data.alamat" /></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Deskripsi</label>
                <div class="controls">
                    <textarea  name="kuota" class="span6" maxlength="255" ng-model="data.deskripsi" /></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-sm btn-primary" data-ng-click="saveData('kos',action)">Simpan</button>
                    <button class="btn btn-sm btn-primary" data-ng-click="cancel('kos')">Cancel</button>
                </div>
            </div>

        </form>
    </div>

    <button class="btn btn-sm btn-primary" data-ng-click="tambahData('kos','tambah')">Tambah Data Kos</button>
    <table class="table table-hover table-condensed">
          <tr>
              <td>Id Kost</td>
              <td>Nama</td>
              <td>Kuota</td>
              <td>Alamat</td>
              <td>Tersedia</td>
              <td>Deskripsi</td>
              <td>Gambar</td>
              <td colspan="3">Action</td>
          </tr>
        <tr data-ng-repeat="(k,v) in datakost">
            <td>{{v.idkost}}</td>
            <td>{{v.nama}}</td>
            <td>{{v.kuota}}</td>
            <td>{{v.alamat}}</td>
            <td>{{v.tersedia}}</td>
            <td>{{v.deskripsi}}</td>
            <td><img src='<?php echo(base_url()); ?>{{v.file}}'/></a></td>
            <td><a href="" data-ng-click="detail(v.idkost , 1)">Detail</a> </td>
            <td><a href="" data-ng-click="upload(v.idkost)">Upload Photo</a> </td>
            <td><a href="#" data-ng-click="editkost($index , 'kos' ,'edit')">Edit</a> </td>
            <td><a href="#" data-ng-click="deletekos(v.idkost,'kos')">Delete</a> </td>
        </tr>
    </table>


    <div class="col-md-12">
        <button class="btn btn-sm btn-primary" ng-click="showtable(pagefirst)" ng-disabled="page <= pagefirst">
            <span class="win-label">Pertama</span>
        </button>
        <button class="btn btn-sm btn-primary" ng-click="showtable(page-1)" ng-disabled="page <= pagefirst">
            <span class="win-label">Sebelumnya</span>
        </button>
        <button  class="btn btn-sm btn-primary" ng-repeat="p in pagination" ng-click="showtable(p)">
            <span class="win-label">Page {{p}}</span>
        </button>
        <button class="btn btn-sm btn-primary" ng-click="showtable(page,true)" ng-disabled="page >= pagelast">
            <span class="win-label">Berikutnya</span>
        </button>
        <button class="btn btn-sm btn-primary" ng-click="showtable(pagelast)" ng-disabled="page >= pagelast">
            <span class="win-label">Terakhir</span>
        </button>
    </div>
    <legend></legend>
    <div data-ng-show="formupload">
        <?php echo form_open_multipart('dashboard_pemilik/do_upload');?>
        <input type='hidden' name='idkost' value={{idkosttmp}}>

        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="upload" />

        </form>
    </div>
    <div data-ng-show="formuploadkamar">
        <?php echo form_open_multipart('dashboard_pemilik/do_uploadkamar');?>
        <input type='hidden' name='idkamar' value={{idkamartmp}}>

        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="upload" />

        </form>
    </div>
    <div data-ng-show="tambahdatakamar">
        <legend>{{actionkamar}} data kamar</legend>
        <form class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Id Kamar</label>
                <div class="controls">
                    <input type="text" name="nama" class="span6" maxlength="255" ng-model="datak.idkamar" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Harga</label>
                <div class="controls">
                    <input type="text" name="kuota" class="span6" maxlength="255" ng-model="datak.harga" required/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Fasilitas</label>
                <div class="controls">
                    <textarea  name="kuota" class="span6" maxlength="255" ng-model="datak.fasilitas" /></textarea>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-sm btn-primary" data-ng-click="saveData('kamar',actionkamar)">Simpan</button>
                    <button class="btn btn-sm btn-primary" data-ng-click="cancel('kamar')">Cancel</button>
                </div>
            </div>

        </form>
    </div>
    <button class="btn btn-sm btn-primary" data-ng-click="tambahData('kamar','tambah')" data-ng-show="datakamar.length > 0">Tambah Data Kamar</button>

    <table class="table table-hover table-condensed" data-ng-show="datakamar.length > 0" >
        <tr>
            <td>Id Kamar</td>
            <td>Hargaa</td>
            <td>Status</td>
            <td>Fasilitas</td>
            <td>Gambar</td>
            <td colspan="3">Action</td>
        </tr>
        <tr data-ng-repeat="(k,v) in datakamar">
            <td>{{v.idkamar}}</td>
            <td>{{v.harga}}</td>
            <td>{{v.status}}</td>
            <td>{{v.fasilitas}}</td>
            <td><img src='<?php echo(base_url()); ?>{{v.file}}'/></a></td>
            <td><a href="" data-ng-click="uploadkamar(v.idkamar)">Upload Photo</a> </td>
            <td><a href="#"  data-ng-click="editkost($index , 'kamar' ,'edit')">Edit</a> </td>
            <td><a href="#" data-ng-click="deletekos(v.idkamar,'kamar')">Delete</a> </td>
        </tr>
    </table>
    <div class="col-md-12" data-ng-show="datakamar.length > 0">
        <button class="btn btn-sm btn-primary" ng-click="detail('',pagefirstd)" ng-disabled="paged <= pagefirstd">
            <span class="win-label">Pertama</span>
        </button>
        <button class="btn btn-sm btn-primary" ng-click="detail('',paged-1)" ng-disabled="paged <= pagefirstd">
            <span class="win-label">Sebelumnya</span>
        </button>
        <button  class="btn btn-sm btn-primary" ng-repeat="p in paginationd" ng-click="detail('',p)">
            <span class="win-label">Page {{p}}</span>
        </button>
        <button class="btn btn-sm btn-primary" ng-click="detail('',paged,true)" ng-disabled="paged >= pagelastd">
            <span class="win-label">Berikutnya</span>
        </button>
        <button class="btn btn-sm btn-primary" ng-click="detail('',pagelastd)" ng-disabled="paged >= pagelastd">
            <span class="win-label">Terakhir</span>
        </button>
    </div>
</div> <!-- /container -->

</body>
</html>
<script type="text/javascript">
    function kost($scope ,$http){

        $scope.datak = {};

        $scope.showtable = function(page , next){
            if(next) page = parseInt(page) + 1;
            $http.get('<?php echo(base_url()); ?>index.php/dashboard_pemilik/getdata/'+page)
                .success(function(data) {
                    $scope.datakost = data['data'];
                    $scope.page             = data['page'];
                    $scope.pagefirst        = data['pagefirst'];
                    $scope.pagelast         = data['pagelast'];
                    $scope.pagination       = data['pagination'];
                    $scope.$apply()
                });
        };
        //init data
        $scope.showtable(1);

        $scope.detail = function(idkost ,paged ,next){
           // alert(idkost+'/'+paged);
            $scope.id = idkost == '' ? $scope.tmp : idkost;
            $scope.tmp   = $scope.id;
            if(next) paged = parseInt(paged) + 1;
            $http.post('<?php echo(base_url()); ?>index.php/dashboard_pemilik/getdatakamar/'+paged+'/'+$scope.id)
                .success(function(data) {
                    $scope.datakamar        = data['data'];
                    $scope.paged             = data['page'];
                    $scope.pagefirstd        = data['pagefirst'];
                    $scope.pagelastd         = data['pagelast'];
                    $scope.paginationd       = data['pagination'];
                    $scope.$apply()
                });
        };
        // tambah data kos
        $scope.tambahData = function(id ,action) {
            if(id == 'kos'){
                $scope.tambahdatakos = true;
                $scope.action = action;
            }else if(id == 'kamar'){
                $scope.tambahdatakamar = true;
                $scope.actionkamar = action;
            }
        };
        // cancel form tambah
        $scope.cancel = function(id){
            if(id == 'kos'){
                $scope.tambahdatakos = false;
            }else if(id == 'kamar'){
                $scope.tambahdatakamar = false;
            }
        };
        $scope.upload = function(id){
            $scope.formupload = true;
            $scope.idkosttmp = id;
        };
        $scope.uploadkamar = function(id){
            $scope.formuploadkamar = true;
            $scope.idkamartmp = id;
        };

        $scope.saveData = function(jenis ,action){
          if(action === 'tambah'){
              if(jenis == 'kos'){
                  $http.post('<?php echo(base_url()); ?>index.php/dashboard_pemilik/insertdatakos' ,$scope.data)
                      .success(function(data) {
                          if(data) {
                              $scope.showtable($scope.page);
                              $scope.tambahdatakos = false;
                          }
                  });
              }else if(jenis == 'kamar'){
                  $scope.datak['idKost'] = $scope.id;
                  $http.post('<?php echo(base_url()); ?>index.php/dashboard_pemilik/insertdatakamar' ,$scope.datak)
                      .success(function(data) {
                          if(data) {
                              $scope.detail($scope.id,1);
                              $scope.tambahdatakamar = false;
                          }
                      });
              }
          }else if (action === 'edit'){
              if(jenis == 'kos'){
                  $http.post('<?php echo(base_url()); ?>index.php/dashboard_pemilik/updatekos' ,$scope.data)
                      .success(function(data) {
                          if(data) {
                              $scope.showtable($scope.page);
                              $scope.tambahdatakos = false;
                          }
                      });
              }else if(jenis == 'kamar'){
                  $http.post('<?php echo(base_url()); ?>index.php/dashboard_pemilik/updatekamar' ,$scope.datak)
                      .success(function(data) {
                          if(data) {
                              $scope.detail($scope.id,1);
                              $scope.tambahdatakamar = false;
                          }
                      });
              }
          }


        };

        $scope.editkost = function(id , jenis ,action){
            if(jenis == 'kos'){
                $scope.tambahdatakos = true;
                $scope.data = $scope.datakost[id];
                $scope.action = action;
            }else if(jenis == 'kamar'){
                $scope.tambahdatakamar = true;
                $scope.datak = $scope.datakamar[id];
                $scope.actionkamar = action;
            }
        };

        $scope.deletekos = function(id , jenis){

            if(jenis == 'kos'){
                var data = {
                    'idkost' : id
                };
                $http.post('<?php echo(base_url()); ?>index.php/dashboard_pemilik/deletekos' ,data)
                    .success(function(data) {
                        if(data) {
                            $scope.showtable($scope.page);
                        }
                    });
            }else if(jenis == 'kamar'){
                var datak = {
                    'idkamar' : id
                };
                $http.post('<?php echo(base_url()); ?>index.php/dashboard_pemilik/deletekamar' ,datak)
                    .success(function(data) {
                        if(data) {
                            $scope.detail($scope.id,1);                        }
                    });
            }
        }

    }
</script>