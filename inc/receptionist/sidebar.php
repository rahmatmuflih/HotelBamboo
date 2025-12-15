<div class="main-sidebar">
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href=""><img src="../assets/img/icon/Bamboo-admin-icon.png" alt="" width=200px height=20px></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href=""><img src="../assets/img/icon/Bamboo-admin-icon-b.png" alt="" width=20px height=20px></a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Transaksi</li>
        <li class="
            <?php
                if($value=="manage-invoice"){
                    echo "active";
                }
            ?>
        "><a href="manage-invoice.php" class="nav-link"><i class="fas fa-fire"></i> <span>Invoice</span></a></li>
        <li class="
            <?php
                if($value=="manage-confirmation"){
                    echo "active";
                }
            ?>
        "><a href="manage-confirmation.php" class="nav-link"><i class="fas fa-hotel"></i> <span>Confirmation</span></a></li>
    </ul>
</aside>
</div>