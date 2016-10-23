        <div id="leftSide" style="padding-top:30px;">
            <!-- Account panel -->
            <div class="sideProfile">
                <a href="#" title="" class="profileFace"><img width="40" src="<?php echo public_url('admin') ?>/images/user.png" /></a>
                <span>Xin chào: <strong>Admin</strong></span>
                <span>Nguyễn Duy Minh</span>
                <div class="clear"></div>
            </div>
            <div class="sidebarSep"></div>      
            <!-- Left navigation -->
            <ul id="menu" class="nav">

                <li class="home">
                    <a href="#" class="active" id="current">
                        <span>Bảng điều khiển</span>
                        <strong></strong>
                    </a>
                </li>
                
                <li class="product">
                    <a href="admin/product.html" class=" exp" >
                        <span>Sản phẩm</span>
                        <strong>2</strong>
                    </a>
                    <ul class="sub">
                        <li >
                            <a href="<?= admin_url('product') ?>">Sản phẩm</a>
                        </li>
                        <li >
                            <a href="<?= admin_url('catalog') ?>">Danh mục</a>
                        </li>
                    </ul>
                </li>
            
            </ul>
        </div>
        <div class="clear"></div>