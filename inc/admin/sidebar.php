<div class="main-sidebar">
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href=""><img src="../assets/img/icon/Bamboo-admin-icon.png" alt="" width=200px height=20px></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href=""><img src="../assets/img/icon/Bamboo-admin-icon-b.png" alt="" width=20px height=20px></a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="
            <?php
                if($value=="dashboard"){
                    echo "active";
                }
            ?>
        "><a href="dashboard.php" class="nav-link"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li class="menu-header">Kamar Hotel</li>
        <li class="
            <?php
                if($value=="manage-room"){
                    echo "active";
                }
            ?>
        "><a href="manage-room.php" class="nav-link"><i class="fas fa-hotel"></i> <span>Kamar Hotel</span></a></li>
        <li class="
            <?php
                if($value=="manage-feedback"){
                    echo "active";
                }
            ?>
        "><a href="manage-feedback.php" class="nav-link"><i class="fas fa-comment-dots"></i> <span>Feedback</span></a></li>
        <li class="menu-header">User</li>
        <li class="
            <?php
                if($value=="manage-user"){
                    echo "active";
                }
            ?>
        "><a href="manage-user.php" class="nav-link"><i class="fas fa-user"></i><span>Tamu Hotel</span></a></li>
    </ul>
</aside>
</div>