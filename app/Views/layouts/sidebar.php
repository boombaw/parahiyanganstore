<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?= route_to('kategori')?>">
                                    <span class="sub-item">Kategori</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= route_to('jenis')?>">
                                    <span class="sub-item">Jenis</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= route_to('produk')?>">
                                    <span class="sub-item">Produk</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= route_to('reseller')?>">
                                    <span class="sub-item">Reseller</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Transaksi</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?= route_to('transaksi-in')?>">
                                    <span class="sub-item">Transaksi Masuk</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= route_to('transaksi-out')?>">
                                    <span class="sub-item">Transaksi Keluar</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= route_to('transaksi-in-reseller')?>">
                                    <span class="sub-item">Transaksi Reseller</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?= route_to('report-sales')?>">
                                    <span class="sub-item">Laporan Penjualan</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= route_to('report-stock')?>">
                                    <span class="sub-item">Laporan Stock</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= route_to('report-rekap-sales')?>"> <span class="sub-item">Laporan Rekap Penjualan</span> </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>