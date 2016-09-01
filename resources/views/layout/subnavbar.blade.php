<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="{!! Menu::activeMenu('home') !!}"><a href="{!! URL::to('home') !!}"><i class="icon-dashboard"></i><span>Home</span> </a> </li>
        
        @if (Auth::check())
        
        <?php $tabMaster = ['obat'] ?>
        <li class="dropdown {!! Menu::checkActiveRoute($tabMaster) !!}"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list"></i><span>Master</span> <b class="caret"></b></a>
          <ul class="dropdown-menu active">
            <li class=""><a href="{!! route('obat.index') !!}">Obat</a></li>
            
          </ul>
        </li>

        <?php $uriname = ['rak', 'golongan', 'merk', 'supplier', 'satuan', 'user', 'hutangsupplier', 'uanglaci'] ?>
        <li class="dropdown {!! Menu::checkActiveRoute($uriname) !!}"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-cog"></i><span>Settings</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{!! route('rak.index') !!}">Rak</a></li>
            <li><a href="{!! route('golongan.index') !!}">Golongan</a></li>
            <li><a href="{!! route('merk.index') !!}">Merk</a></li>
            <li><a href="{!! route('satuan.index') !!}">Satuan</a></li>
            <li><a href="{!! route('supplier.index') !!}">Supplier / PBF</a></li>
            <li><a href="{!! route('user.index') !!}">Users</a></li>
            <li class="divider"></li>
            <li><a href="{!! route('hutangsupplier.index') !!}">Hutang Supplier</a></li>
            <li><a href="{!! route('uanglaci.index') !!}">Uang laci</a></li>
          </ul>
        </li>

        <?php $tabTransaksi = ['transaksi', 'retur'] ?>
        <li class="dropdown {!! Menu::checkActiveRoute($tabTransaksi) !!}"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-share-alt"></i><span>Transaksi</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{!! route('transaksi.index') !!}">Transaksi / Kasir</a></li>
            <li class="divider"></li>
            <li><a href="{!! url('retur') !!}">Retur Obat</a></li>
          </ul>
        </li>

        <?php $tabLaporan = ['laporan'] ?>
        <li class="dropdown {!! Menu::checkActiveRoute($tabLaporan) !!}"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-print"></i><span>Laporan</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{!! url('laporan/penjualan') !!}">Laporan Penjualan</a></li>
            <li><a href="{!! url('laporan/cetak') !!}">Cetak Laporan Penjualan</a></li>
            <li><a href="{!! url('laporan/chart') !!}">Obat paling laris</a></li>
            <li><a href="{!! url('laporan/obathabis', ['aksi'=>'show']) !!}">Obat habis</a></li>
            <li><a href="{!! url('laporan/informasipendapatan') !!}">Informasi pendapatan</a></li>
            <li><a href="{!! url('laporan/informasiobat') !!}">Informasi obat</a></li>
            <li><a href="{!! url('laporan/cetakperrak') !!}">Cetak obat per rak</a></li>
          </ul>
        </li>

        @endif

      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->