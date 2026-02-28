</main><!-- #content -->

<!-- Footer - مطابق React: 4 أعمدة، روابط سريعة، تواصل، شريط سفلي -->
<footer class="site-footer text-white bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900">
    <div class="container py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Company Info - لوجو أبيض للفوتر -->
            <div class="lg:col-span-1">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center gap-3 mb-6">
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/images/logowhite.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="h-10 w-auto object-contain" />
                </a>
                <p class="text-white/80 mb-6 leading-relaxed">
                    شريكك الهندسي الموثوق. نقدم حلول هندسية متكاملة تجمع بين الجودة والابتكار والكفاءة.
                </p>
                <div class="flex gap-3">
                    <a href="<?php echo esc_url('https://www.facebook.com/qeemagroup'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-white/70 hover:bg-blue-500 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" aria-label="Twitter" class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-white/70 hover:bg-blue-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="#" aria-label="LinkedIn" class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-white/70 hover:bg-blue-600 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-white/70 hover:bg-pink-500 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Services -->
            <div>
                <h3 class="font-bold text-lg mb-6 text-white">خدماتنا</h3>
                <ul class="space-y-3">
                    <?php
                    $footer_services = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 6));
                    if ($footer_services->have_posts()) :
                        while ($footer_services->have_posts()) : $footer_services->the_post(); ?>
                            <li><a href="<?php the_permalink(); ?>" class="text-white/80 hover:text-blue-300 transition"><?php the_title(); ?></a></li>
                        <?php endwhile; wp_reset_postdata();
                    else : ?>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="text-white/80 hover:text-blue-300 transition">التصميم الداخلي والتشطيبات</a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="text-white/80 hover:text-blue-300 transition">التصميم المعماري والإنشائي</a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="text-white/80 hover:text-blue-300 transition">أنظمة الإليكتروميكانيكال</a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="text-white/80 hover:text-blue-300 transition">هندسة المساحة</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Quick Links — من المنيو (قائمة التذييل) إن وُجد -->
            <div>
                <h3 class="font-bold text-lg mb-6 text-white">روابط سريعة</h3>
                <?php if (has_nav_menu('footer')) : ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'space-y-3 list-none m-0 p-0',
                        'menu_id'        => 'footer-quick-links',
                    )); ?>
                <?php else : ?>
                    <ul class="space-y-3">
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>" class="text-white/80 hover:text-blue-300 transition">من نحن</a></li>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('project') ?: home_url('/#projects')); ?>" class="text-white/80 hover:text-blue-300 transition">مشاريعنا</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog')); ?>" class="text-white/80 hover:text-blue-300 transition">المدونة</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>" class="text-white/80 hover:text-blue-300 transition">تواصل معنا</a></li>
                        <li><a href="<?php echo esc_url(home_url('/quotation')); ?>" class="text-white/80 hover:text-blue-300 transition">اطلب عرض سعر</a></li>
                        <li><a href="<?php echo esc_url(home_url('/careers')); ?>" class="text-white/80 hover:text-blue-300 transition">التوظيف</a></li>
                        <li><a href="<?php echo esc_url(home_url('/vendors')); ?>" class="text-white/80 hover:text-blue-300 transition">الموردين</a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="font-bold text-lg mb-6 text-white">تواصل معنا</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <span class="text-blue-400 mt-1">📍</span>
                        <span class="text-white/80">٣ مكرم عبيد - مدينة نصر - القاهرة<br>(بجوار محجوب)</span>
                    </li>
                    <li>
                        <a href="tel:+201009148383" class="flex items-center gap-3 text-white/80 hover:text-blue-300 transition">
                            <span class="text-blue-400">📞</span>
                            <span dir="ltr">01009148383</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@qeema-group.com" class="flex items-center gap-3 text-white/80 hover:text-blue-300 transition">
                            <span class="text-blue-400">✉</span>
                            info@qeema-group.com
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Bar - مطابق React -->
    <div class="border-t border-white/10">
        <div class="container py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-white/60">
                <p>© <?php echo date('Y'); ?> رؤية الهندسة. جميع الحقوق محفوظة.</p>
                <div class="flex items-center gap-6">
                    <a href="<?php echo esc_url(home_url('/privacy')); ?>" class="hover:text-blue-300 transition">سياسة الخصوصية</a>
                    <a href="<?php echo esc_url(home_url('/terms')); ?>" class="hover:text-blue-300 transition">الشروط والأحكام</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Floating Buttons - مطابق React -->
<div class="fixed bottom-6 left-6 z-40 flex flex-col gap-3">
    <a href="https://wa.me/201009148383" target="_blank" rel="noopener noreferrer" class="group w-14 h-14 rounded-full flex items-center justify-center bg-[#25D366] text-white shadow-lg hover:scale-110 transition-all duration-300" aria-label="تواصل عبر واتساب">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
        <span class="absolute left-16 bg-white text-gray-800 px-4 py-2 rounded-lg shadow-md text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">تواصل عبر واتساب</span>
    </a>
    <a href="tel:+201009148383" class="group w-14 h-14 rounded-full flex items-center justify-center bg-blue-600 text-white shadow-lg hover:scale-110 transition-all duration-300" aria-label="اتصل بنا">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <span class="absolute left-16 bg-white text-gray-800 px-4 py-2 rounded-lg shadow-md text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">اتصل بنا مباشرة</span>
    </a>
</div>

<!-- Quotation Popup - مطابق React (عربي) -->
<div id="quotation-popup" class="hidden fixed inset-0 z-50 items-center justify-center p-4" aria-hidden="true" role="dialog" aria-label="طلب عرض سعر">
    <div id="popup-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm cursor-pointer"></div>
    <div class="relative w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden animate-fade-in-up md:max-w-lg">
        <button id="close-popup" class="absolute top-4 left-4 p-2 rounded-full hover:bg-gray-100 transition-colors z-10" aria-label="إغلاق">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="bg-gradient-to-l from-blue-600 via-blue-500 to-blue-700 p-6 text-center text-white">
            <h3 class="text-xl font-bold mb-2">احصل على عرض سعر مجاني</h3>
            <p class="text-blue-100 text-sm">اترك بياناتك وسنتواصل معك خلال 24 ساعة</p>
        </div>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="p-6 space-y-4">
            <input type="hidden" name="action" value="qeema_quotation_submit">
            <input type="hidden" name="qeema_quotation_popup" value="1">
            <?php wp_nonce_field('qeema_quotation_form', 'qeema_quotation_nonce'); ?>
            <input type="text" name="name" placeholder="الاسم الكامل" required class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none">
            <input type="tel" name="phone" placeholder="رقم الجوال" required class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" dir="ltr">
            <input type="email" name="email" placeholder="البريد الإلكتروني (اختياري)" class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none" dir="ltr">
            <select name="service" class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                <option value="">اختر الخدمة المطلوبة</option>
                <option value="interior">التصميم الداخلي والتشطيبات</option>
                <option value="architectural">التصميم المعماري والإنشائي</option>
                <option value="mep">أنظمة الإليكتروميكانيكال</option>
                <option value="surveying">هندسة المساحة</option>
            </select>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition shadow-lg">احصل على عرض سعر الآن</button>
            <p class="text-center text-xs text-gray-500">بياناتك آمنة ولن نشاركها مع أي طرف ثالث</p>
        </form>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
