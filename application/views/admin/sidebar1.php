<?php $admin=new Main();?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <?php
        $att_active = ($this->uri->segment(1)== 'configuration') ? 'active' : '';
        $cms = ($this->uri->segment(1)=='cms') ? 'active' : '';
        $news = ($this->uri->segment(1)=='news') ? 'active' : '';
        $catalog_active = ($this->uri->segment(1)== 'catalog') ? 'active' : '';
        $products_active = ($this->uri->segment(1)== 'products') ? 'active' : '';
        $attr_active = ($this->uri->segment(1)=='attribut') ? 'active' : '';
        $coupon_active = ($this->uri->segment(1)=='coupon') ? 'active' : '';
        $seo_active = ($this->uri->segment(1)=='seo') ? 'active' : '';
        $attribut_set_active = ($this->uri->segment(2)=='attribut_set') ? 'active' : '';
        $attribut_set_add_active = ($this->uri->segment(2)=='add_attribut_set') ? 'active' : '';
        $attribut_active = ($this->uri->segment(2)=='list_attribute') ? 'active' : '';
        $add_attribut_active = ($this->uri->segment(2)=='add_attribut') ? 'active' : '';
        ?>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="<?php echo base_url().'index.php/dashboard';?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-usd"></i>
                    <span>Sales</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-sliders"></i>Orders</a></li>
                    <li><a href="#"><i class="fa fa-sliders"></i>Invoice</a></li>
                    <li><a href="#"><i class="fa fa-sliders"></i>Shipments</a></li>
                    <li><a href="#"><i class="fa fa-sliders"></i>Credit Memo</a></li>
                    <li><a href="#"><i class="fa fa-sliders"></i>Transactions</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo $catalog_active;?>">
                <a href="#">
                    <i class="fa fa-sitemap"></i>
                    <span>Management Category</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(). 'catalog/category/index';?>"><i class="fa fa-sliders"></i>List Category</a></li>
                    <li><a href="<?php echo base_url(). 'catalog/add_categories';?>"><i class="fa fa-sliders"></i>Add Category</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo $attr_active;?>">
                <a href="#">
                    <i class="fa fa-server"></i>
                    <span>Attribute Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo $attribut_set_active?> <?php echo $attribut_set_add_active?>">
                        <a href="#"><i class="fa fa-circle-o"></i>Mange Attribute Set</a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url().'attribut/attribut_set';?>"><i class="fa fa-circle-o"></i>List Attribute Set</a></li>
                            <li><a href="<?php echo base_url().'attribut/add_attribut_set';?>"><i class="fa fa-circle-o"></i>Add Attribute Set</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $attribut_active ?> <?php echo $add_attribut_active ?>">
                        <a href="#"><i class="fa fa-circle-o"></i>Manage Attributes</a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url().'attribut/list_attribute';?>"><i class="fa fa-circle-o"></i>List Attributes</a></li>
                            <li><a href="<?php echo base_url().'attribut/add_attribut';?>"><i class="fa fa-circle-o"></i>Add Attribute</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php echo $products_active;?>">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Manage Product</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url().'products';?>"><i class="fa fa-circle-o"></i>Products</a></li>
                    <li><a href="<?php echo base_url().'products/add_product';?>"><i class="fa fa-circle-o"></i>Add Simple Product</a></li>
                    <li><a href="<?php echo base_url().'products/add_product/option';?>"><i class="fa fa-circle-o"></i>Add Configurable Product</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url().'brands';?>">
                    <i class="fa fa-btc"></i> <span>Brands</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Customers</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(). 'customers/customer_list';?>"><i class="fa fa-circle-o"></i>All Customers</a></li>
                    <li><a href="<?php echo base_url(). '';?>"><i class="fa fa-circle-o"></i>Customer Groups</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo $coupon_active ?> <?php echo $seo_active ?>">
                <a href="#">
                    <i class="fa fas fa-bullhorn"></i> <span>Marketing</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo $coupon_active ?>">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> Promotions <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(). 'coupon';?>"><i class="fa fa-circle-o"></i>Gift Coupon</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $seo_active ?>">
                        <a href="#"><i class="fa fa-circle-o"></i> SEO & Search <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(). 'seo/url_rewrite';?>"><i class="fa fa-circle-o"></i>URL Rewrites</a></li>
                            <li><a href="<?php echo base_url(). 'seo/searchTerms';?>"><i class="fa fa-circle-o"></i>Search Terms</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Communications <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i>Email Templates</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url().'news/newsletter';?>">
                    <i class="fa fa-newspaper-o"></i> <span>Newsletter Subscribers</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-star"></i>
                    <span>Reviews</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url().'reviews/review';?>"><i class="fa fa-sliders"></i>All Reviews</a></li>
                    <li><a href="<?php echo base_url().'reviews/add_review';?>"><i class="fa fa-sliders"></i>Add Reviews</a></li>
                </ul>
            </li>
            
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-star"></i>
                    <span>Store Credit</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url().'store_credit/credit_list';?>"><i class="fa fa-sliders"></i>All Credits</a></li>
                    <li><a href="<?php echo base_url().'store_credit/add_store_credit';?>"><i class="fa fa-sliders"></i>Add Store Credit</a></li>
                </ul>
            </li>

            
            <li class="treeview">
                <a href="<?php echo base_url().'slider';?>">
                    <i class="fa fa-btc"></i> <span>Slider</span>
                </a>
            </li>

            <li class="treeview <?php echo $cms;?>">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>CMS Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url().'cms/pages';?>"><i class="fa fa-circle-o"></i>Manage Pages</a></li>
                    <li><a href="<?php echo base_url().'cms/static_block';?>"><i class="fa fa-circle-o"></i>Manage Static Block</a></li>
                </ul>
            </li>
            <li class="treeview <?php echo $att_active;?>">
                <a href="#">
                    <i class="fa fa-file-image-o"></i>
                    <span>Configuration</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url().'configuration/general';?>"><i class="fa fa-sliders"></i>General</a></li>
                    <li><a href="<?php echo base_url().'configuration/currency_setup';?>"><i class="fa fa-sliders"></i>Currency Setup</a></li>
                    <li><a href="<?php echo base_url().'configuration/email';?>"><i class="fa fa-sliders"></i>Email Address</a></li>
                    <li><a href="<?php echo base_url().'configuration/catalog';?>"><i class="fa fa-sliders"></i>Catalog</a></li>
                    <li><a href="<?php echo base_url().'configuration/security';?>"><i class="fa fa-sliders"></i>Security</a></li>
                    <li><a href="<?php echo base_url().'payment_methods';?>"><i class="fa fa-sliders"></i>Payment methods</a></li>
                    <li><a href="<?php echo base_url().'shipping_methods';?>"><i class="fa fa-sliders"></i>Shipping Methods</a></li>


                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>