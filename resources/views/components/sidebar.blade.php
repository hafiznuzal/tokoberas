<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header">Menu</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('transaksi/pembelian') }}"><i class="fa fa-circle-o"></i> Pembelian</a></li>
          <li><a href="{{ url('transaksi/penjualan') }}"><i class="fa fa-circle-o"></i> Penjualan</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>CRUD</span>
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
    </ul>
  </section>
</aside>