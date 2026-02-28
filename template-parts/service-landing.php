<?php
/**
 * لاندنج بيدج الخدمة — تصميم احترافي مع صور قابلة للتغيير من الداشبورد
 * يستخدم: hero_image, section_image_1, section_image_2, section_image_3 (ACF)
 */
if (!defined('ABSPATH')) exit;
$icon = function_exists('get_field') ? get_field('icon_name') : '';
$img1 = function_exists('get_field') ? get_field('section_image_1') : null;
$img2 = function_exists('get_field') ? get_field('section_image_2') : null;
$img3 = function_exists('get_field') ? get_field('section_image_3') : null;
$quotation_url = home_url('/quotation');
$contact_url = home_url('/contact');
?>
<div id="service-details" class="visionary-content-wrap service-landing">

    <!-- القسم 1: لماذا تختار هذه الخدمة (صورة + محتوى) -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container px-4 sm:px-6 max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <?php 
                // Fallback for img1
                if (!$img1 || empty($img1['url'])) {
                    $img1 = array(
                        'url' => get_template_directory_uri() . '/assets/images/project-1.jpg',
                        'alt' => 'Visionary Service'
                    );
                }
                ?>
                <div class="order-2 lg:order-1 relative group">
                    <div class="absolute inset-0 bg-blue-600 rounded-3xl rotate-3 opacity-10 group-hover:rotate-6 transition-transform duration-500"></div>
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-gray-100 transform transition-transform duration-500 hover:-translate-y-2">
                        <img src="<?php echo esc_url($img1['url']); ?>" alt="<?php echo esc_attr($img1['alt'] ?: get_the_title()); ?>" class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                </div>
                <div class="order-1 lg:order-2 text-right">
                    <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-blue-50 text-blue-700 font-bold text-sm mb-8">
                        <span class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm shadow-md"><?php echo $icon ? esc_html(mb_substr($icon, 0, 1)) : '★'; ?></span>
                        لماذا تختارنا
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-8 leading-tight">لماذا تختار هذه الخدمة؟</h2>
                    <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed mb-10">
                        <?php the_content(); ?>
                    </div>
                    <?php if (function_exists('have_rows') && have_rows('service_benefits')) : ?>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <?php while (have_rows('service_benefits')) : the_row(); ?>
                        <div class="visionary-card flex items-center gap-4 p-5 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition group">
                            <span class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0 shadow-inner group-hover:scale-110 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </span>
                            <span class="font-bold text-gray-800 text-base"><?php the_sub_field('text'); ?></span>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- القسم 2: منهجية العمل (Zigzag Timeline) -->
    <section class="py-16 md:py-24 bg-slate-50 relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-50 pointer-events-none"></div>
        <div class="container px-4 sm:px-6 max-w-5xl mx-auto relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">منهجية العمل</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto font-light">خطوات مدروسة لضمان أعلى معايير الجودة.</p>
            </div>
            
            <?php if (function_exists('have_rows') && have_rows('service_process')) : ?>
                <div class="relative">
                    <!-- Central Line for Desktop -->
                    <div class="hidden md:block absolute right-1/2 transform translate-x-1/2 h-full w-0.5 bg-gray-200"></div>

                    <?php 
                    $step_count = 0;
                    while (have_rows('service_process')) : the_row(); 
                        $is_even = ($step_count % 2 == 0);
                        $step_num = $step_count + 1;
                    ?>
                        <div class="relative mb-12 md:mb-0 flex md:items-center <?php echo $is_even ? 'md:flex-row' : 'md:flex-row-reverse'; ?>">
                            <!-- Timeline Dot -->
                            <div class="hidden md:flex absolute right-1/2 transform translate-x-1/2 w-10 h-10 bg-blue-600 rounded-full border-4 border-white shadow-lg items-center justify-center text-white font-bold z-10">
                                <?php echo $step_num; ?>
                            </div>
                            
                            <!-- Content Spacer -->
                            <div class="hidden md:block w-1/2"></div>
                            
                            <!-- Content Card -->
                            <div class="w-full md:w-1/2 <?php echo $is_even ? 'md:pl-12' : 'md:pr-12'; ?> pl-10 md:pl-0 border-r-2 md:border-r-0 border-gray-200 md:border-none pr-6 md:pr-0">
                                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                                    <span class="md:hidden inline-block w-8 h-8 bg-blue-600 text-white rounded-full text-center leading-8 font-bold text-sm mb-3"><?php echo $step_num; ?></span>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?php the_sub_field('title'); ?></h3>
                                    <p class="text-gray-600 leading-relaxed text-sm"><?php the_sub_field('description'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $step_count++; 
                    endwhile; 
                    ?>
                </div>
            <?php else : ?>
                <div class="visionary-glass p-10 rounded-3xl text-center border border-gray-100">
                    <p class="text-gray-600 text-lg">يتم تنفيذ هذه الخدمة عبر مراحل مدروسة لضمان الجودة. <a href="<?php echo esc_url($contact_url); ?>" class="text-blue-600 font-bold hover:underline">تواصل معنا</a> لمعرفة التفاصيل.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- القسم 3: صورة إضافية إن وُجدت -->
    <?php if ($img3 && !empty($img3['url'])) : ?>
    <section class="py-12 md:py-16 bg-white">
        <div class="container px-4 sm:px-6 max-w-6xl mx-auto">
            <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-100 relative group">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                <img src="<?php echo esc_url($img3['url']); ?>" alt="<?php echo esc_attr($img3['alt'] ?: get_the_title()); ?>" class="w-full h-[350px] md:h-[500px] object-cover transform group-hover:scale-105 transition-transform duration-1000">
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- التقنيات المستخدمة -->
    <?php if (function_exists('have_rows') && have_rows('service_tools')) : ?>
    <section class="py-20 md:py-28 bg-gray-900 relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
             <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100 contrast-150 mix-blend-overlay"></div>
             <div class="absolute top-[-50%] left-[-50%] w-[200%] h-[200%] bg-gradient-to-br from-blue-900/30 via-transparent to-purple-900/30 animate-spin-slow opacity-50"></div>
        </div>

        <div class="container relative z-10 px-4 sm:px-6 text-center">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 tracking-tight">التقنيات المستخدمة</h2>
            <p class="text-blue-200 mb-12 max-w-2xl mx-auto text-lg font-light">نعتمد على أحدث الأدوات والبرمجيات العالمية لضمان دقة لا متناهية وكفاءة قصوى في كل مشروع.</p>
            
            <div class="flex flex-wrap justify-center gap-6">
                <?php while (have_rows('service_tools')) : the_row(); ?>
                <div class="visionary-glass-dark px-8 py-4 rounded-2xl text-white font-bold hover:bg-white/20 transition-all duration-300 shadow-lg border border-white/10 hover:border-white/30 transform hover:-translate-y-1">
                    <?php the_sub_field('name'); ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- CTA + مشاريع ذات صلة (بطاقات أفقية) -->
    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container px-4 sm:px-6 max-w-6xl mx-auto">
            <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">
                <div class="lg:col-span-1">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-8 shadow-xl text-white sticky top-24">
                        <h3 class="text-2xl font-bold mb-4">مشروعك يبدأ هنا</h3>
                        <p class="text-blue-100 mb-8 leading-relaxed text-sm">فريق "قيمة جروب" مستعد لتحويل رؤيتك إلى واقع. احصل على استشارة أولية مجانية اليوم.</p>
                        
                        <a href="<?php echo esc_url($quotation_url); ?>" class="block w-full py-4 bg-white text-blue-700 text-center rounded-xl font-bold hover:bg-blue-50 transition shadow-lg mb-4 transform hover:scale-105 duration-200">
                            طلب عرض سعر
                        </a>
                        <div class="flex flex-col gap-3">
                            <a href="<?php echo esc_url($contact_url); ?>" class="flex items-center justify-center gap-2 py-3 text-white/90 font-semibold hover:text-white hover:bg-white/10 rounded-xl transition">
                                <span>تواصل معنا</span>
                            </a>
                            <a href="tel:+201009148383" class="flex items-center justify-center gap-2 py-3 text-white/80 text-sm hover:text-white dir-ltr font-mono">
                                <span>📞 +20 100 914 8383</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-gray-900">مشاريع ذات صلة</h3>
                        <a href="<?php echo home_url('/projects'); ?>" class="text-blue-600 font-bold hover:underline text-sm">عرض كل المشاريع ←</a>
                    </div>
                    
                    <div class="space-y-6">
                        <?php
                        $related = new WP_Query(array('post_type' => 'project', 'posts_per_page' => 3));
                        if ($related->have_posts()) :
                            while ($related->have_posts()) : $related->the_post();
                                $thumb = visionary_get_project_image_url(get_the_ID(), 0, 'medium_large');
                        ?>
                        <a href="<?php the_permalink(); ?>" class="visionary-card flex flex-col sm:flex-row gap-6 p-4 rounded-3xl bg-white border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 group">
                            <div class="w-full sm:w-40 h-40 rounded-2xl overflow-hidden flex-shrink-0 relative">
                                <div class="absolute inset-0 bg-blue-900/10 group-hover:bg-transparent transition-colors duration-300 z-10"></div>
                                <img src="<?php echo esc_url($thumb); ?>" alt="" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="flex-1 min-w-0 text-right flex flex-col justify-center">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    <span class="text-xs font-bold text-blue-500 uppercase tracking-wider">مشروع مميز</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors mb-3 line-clamp-1"><?php the_title(); ?></h4>
                                <p class="text-gray-500 text-sm line-clamp-2 mb-4 pl-4"><?php echo get_the_excerpt(); ?></p>
                                <span class="text-blue-600 text-sm font-bold group-hover:translate-x-[-5px] transition-transform duration-300 inline-flex items-center gap-1">
                                    اقرأ المزيد 
                                    <span class="text-lg leading-none">←</span>
                                </span>
                            </div>
                        </a>
                        <?php endwhile; wp_reset_postdata();
                        else : ?>
                        <div class="text-center py-12 bg-gray-50 rounded-3xl border border-gray-100 border-dashed">
                             <p class="text-gray-500">لا توجد مشاريع معروضة حالياً.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
