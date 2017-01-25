<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header">Menu</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('transaksi/pembelian') }}"><i class="fa fa-circle-o"></i> Pembelian</a></li>
          <li><a href="{{ url('transaksi/penjualan') }}"><i class="fa fa-circle-o"></i> Penjualan</a></li>
          <li><a href="{{ url('pengeluaran') }}"><i class="fa fa-circle-o"></i> Pengeluaran</a></li>
          <li><a href="{{ url('pembayaran') }}"><i class="fa fa-circle-o"></i> Pembayaran</a></li>
        </ul>
      </li>
      @if (in_array(Auth::user()->jabatan, ['admin', 'keuangan']))
      <li class="treeview">
        <a href="#">
          <i class="fa fa-list-ol"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('laporan_pembelian') }}"><i class="fa fa-circle-o"></i> Pembelian</a></li>
          <li><a href="{{ url('laporan_penjualan') }}"><i class="fa fa-circle-o"></i> Penjualan</a></li>
          <li><a href="{{ url('inventory') }}"><i class="fa fa-circle-o"></i> Inventory</a></li>
        </ul>
      </li>
      @endif
      @if (in_array(Auth::user()->jabatan, ['admin', 'keuangan']))
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i> <span>Grafik</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('grafik/keuntungan_bersih') }}"><i class="fa fa-circle-o"></i> Keuntungan Bersih</a></li>
          <li><a href="{{ url('grafik/modal_aktual') }}"><i class="fa fa-circle-o"></i> Modal Aktual</a></li>
          <li><a href="{{ url('grafik/fresh_money') }}"><i class="fa fa-circle-o"></i> Fresh Money</a></li>
          <li><a href="{{ url('grafik/penjualan_bulanan') }}"><i class="fa fa-circle-o"></i> Penjualan Bulanan</a></li>
          <li><a href="{{ url('grafik/komposisi_penjualan') }}"><i class="fa fa-circle-o"></i> Komposisi Penjualan</a></li>
          <li><a href="{{ url('grafik/komposisi_operasional') }}"><i class="fa fa-circle-o"></i> Komposisi Operasional</a></li>
          <li><a href="{{ url('grafik/komposisi_pengeluaran') }}"><i class="fa fa-circle-o"></i> Komposisi Pengeluaran</a></li>
          <li><a href="{{ url('grafik/pemasukan_pengeluaran') }}"><i class="fa fa-circle-o"></i> Pemasukan : Pengeluaran</a></li>
          {{-- <li><a href="{{ url('grafik/modal_penjualan') }}"><i class="fa fa-circle-o"></i> Modal : Penjualan</a></li> --}}
        </ul>
      </li>
      @endif
      @if (in_array(Auth::user()->jabatan, ['admin']))
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i> <span>CRUD</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> User</a></li>
          <li><a href="{{ url('produsen') }}"><i class="fa fa-circle-o"></i> Produsen</a></li>
          <li><a href="{{ url('konsumen') }}"><i class="fa fa-circle-o"></i> Konsumen</a></li>
          <li><a href="{{ url('jenis') }}"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
          <li><a href="{{ url('jenis_operasional') }}"><i class="fa fa-circle-o"></i> Jenis Operasional</a></li>
        </ul>
      </li>
      @endif
    </ul>
  </section>
</aside>