<?php
global $current_category;
global $slug_benh_ly_lien_quan;
$benh_ly_lien_quan = get_term_by('slug', $slug_benh_ly_lien_quan, 'category');
?>
<?php get_header(); ?>
    <section style="display:block;background:#dfdfdf; margin:0px; padding:10px 0px;">
        <a href="#" title="#">
            <img src="http://via.placeholder.com/980x90" alt="#">
        </a>
    </section>
    <main>
        <div class="container">
            <section>
                <div class="title-category">
                    <ul class="nav nav-pills">
                        <li>
                            <a href="<?php echo get_category_link($benh_ly_lien_quan); ?>" title="<?php echo $benh_ly_lien_quan->name; ?>" >
                                <?php echo $benh_ly_lien_quan->name; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo get_category_link($current_category); ?>" title="<?php echo $current_category->name; ?>" class="current-category">
                                <?php echo $current_category->name; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <div class="content newspaper">
                <?php  
                get_template_part( 'template-parts/content/embed-special-2');
                get_template_part( 'template-parts/content/embed-tieu-diem-tuan');
                ?>
                <section>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/728x90 " alt="# ">
                    </a>
                </section>

                <section>
                    <div class="content-left">
                        <div class="list-post-new">
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                        </div>

                        <?php  
		                get_template_part( 'template-parts/content/embed-dung-bo-lo');
		                ?>


                        <div class="list-post-new">
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                        </div>
						
						<?php  
		                get_template_part( 'template-parts/content/embed-cu-ma-hay');
		                ?>


                        

                        <div class="list-post-new">
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <a href="#" title="#">
                                    <img src="http://via.placeholder.com/235x142" alt="#">
                                </a>
                                <div class="info">
                                    <a href="#" title="#">
                                        Một số bệnh viện lớn đầu tư trang thiết bị điều trị ung thư hiện đại
                                    </a>
                                    <span class="time">
                                        18/02/2017 | <i class="glyphicon glyphicon-time"></i> 09:30 AM
                                    </span>
                                    <span class="sumary">
                                        Tỉnh dậy vì nghe tiếng nổ lớn như là tiếng bom phát ra từ phía trước cửa nhà mình. Sau khi mở cửa phòng ngủ chạy ra, chị Thúy dùng đèn pin điện thoại soi thì thấy cảnh tượng tan hoang
                                    </span>
                                </div>
                            </div>
                        </div>



                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a class="prev " href="#" aria-label="Previous">
                                        &laquo;
                                    </a>
                                </li>
                                <li><span class=" current">1</span></li>
                                <li><a href="#" title="#">2</a></li>
                                <li><a href="#" title="#">3</a></li>
                                <li><a href="#" title="#">4</a></li>
                                <li><span class=" dots">…</span></li>
                                <li><a href="#" title="#">9</a></li>
                                <li>
                                    <a class="next " href="#" aria-label="Next">
                                        &raquo;
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <div class="content-right pull-right">
                        <?php
		                    get_template_part( 'template-parts/content/right/content-right-box-1');
		                ?>

                        <a class="advertising" href="#" title="#">
                            <img src="http://via.placeholder.com/200x446" alt="#">
                        </a>

                        <?php
		                    get_template_part( 'template-parts/content/right/content-right-box-2');
		                ?>
                    </div>
                </section>




            </div>
            <div class="right ">
                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>

                <?php
                    get_template_part( 'template-parts/sidebar/right-box-1');
                ?>


                <aside>
                    <a href="# " title="# ">
                        <a href="# " title="# ">
                            <img src="http://via.placeholder.com/300x600 " alt="# ">
                        </a>
                    </a>
                </aside>


                <?php
                    get_template_part( 'template-parts/sidebar/right-box-2');
                ?>

                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>


                <?php
                    get_template_part( 'template-parts/sidebar/right-box-3');
                ?>

                <aside>
                    <a class="advertising" href="# " title="# ">
                        <img src="http://via.placeholder.com/300x250 " alt="# ">
                    </a>
                </aside>
            </div>
        </div>
    </main>
<?php get_footer(); ?>