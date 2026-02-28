<?php get_header(); ?>

<?php
// إعدادات الهيرو من خيارات الثيم (مطابق للملف القديم visionary-theme1)
$hero_title   = (function_exists('get_field') && get_field('hero_title', 'option')) ? get_field('hero_title', 'option') : 'حلول هندسية متكاملة';
$hero_subtitle = (function_exists('get_field') && get_field('hero_subtitle', 'option')) ? get_field('hero_subtitle', 'option') : 'تبني المستقبل';
$theme_uri = get_theme_file_uri('');
$hero_images = array(
    array('service-interior.jpg', 'التصميم الداخلي'),
    array('service-architectural.jpg', 'التصميم المعماري'),
    array('service-surveying.jpg', 'هندسة المساحة'),
    array('service-mep.jpg', 'أنظمة MEP'),
);
?>

<!-- Hero - Enhanced for Visionary Theme -->
<section id="hero" class="hero-section relative min-h-[85vh] md:min-h-screen flex items-center overflow-hidden bg-white">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-grid-pattern opacity-[0.03] z-0 pointer-events-none"></div>
    <!-- Dynamic Blobs -->
    <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-[100px] animate-pulse-slow pointer-events-none -z-10"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-indigo-50/60 rounded-full blur-[120px] pointer-events-none -z-10"></div>

    <div class="container relative z-10 px-4 sm:px-6 py-12 lg:py-0">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            <!-- Text Column (Right) -->
            <div class="text-right order-2 lg:order-1 space-y-8 lg:space-y-9 max-w-xl ml-auto relative">
                <!-- Decorative Star -->
                <div class="absolute -top-12 -right-12 text-yellow-400 opacity-20 animate-spin-slow pointer-events-none hidden lg:block">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z" /></svg>
                </div>

                <!-- Tag (ديزين قديم - ثابت) -->
                <div class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white border border-blue-100 shadow-sm text-blue-600 animate-fade-in hover:shadow-md transition-shadow cursor-default">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <span class="font-bold text-sm tracking-wide">نبتكر لغدٍ أفضل</span>
                </div>

                <!-- Headings (ديزين قديم - مع إمكانية التخصيص من hero_title إن رغبت لاحقاً) -->
                <h1 class="leading-[1.15] animate-fade-in-up">
                    <span class="block text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-3 tracking-tight">نحوّل الرؤى إلى</span>
                    <span class="block text-5xl sm:text-6xl lg:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 mb-6 pb-2 drop-shadow-sm">واقع ملموس</span>
                    <span class="block text-xl sm:text-2xl lg:text-3xl font-medium text-gray-500 tracking-wide mt-2">هندسة متكاملة.. دقة لا متناهية</span>
                </h1>

                <!-- Description (ديزين قديم - مع تمييز الإبداع المعماري والدقة الإنشائية) -->
                <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-lg animate-fade-in-up animation-delay-200">
                    شريكك الهندسي الموثوق لتصميم وإدارة مشاريعك باحترافية. ندمج <span class="text-blue-600 font-bold">الإبداع المعماري</span> مع <span class="text-blue-600 font-bold">الدقة الإنشائية</span> لضمان نتائج تتجاوز التوقعات.
                </p>

                <!-- Buttons (ديزين قديم) -->
                <div class="flex flex-wrap gap-4 pt-2 animate-fade-in-up animation-delay-300">
                     <a href="<?php echo esc_url(home_url('/quotation')); ?>" class="group flex items-center gap-3 px-8 py-4 bg-gray-900 text-white rounded-2xl font-bold text-lg hover:bg-blue-600 transition-all duration-300 shadow-lg hover:shadow-blue-500/30 hover:-translate-y-1">
                        <span>ابدأ مشروعك</span>
                        <svg class="w-5 h-5 rtl:rotate-180 group-hover:translate-x-[-4px] transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    <a href="<?php echo esc_url(get_post_type_archive_link('project') ?: home_url('/#projects')); ?>" class="flex items-center gap-3 px-8 py-4 bg-white text-gray-900 border border-gray-200 rounded-2xl font-bold text-lg hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 hover:-translate-y-1">
                        <span>أعمالنا</span>
                    </a>
                </div>

                <!-- Trust Indicators (ديزين قديم) -->
                <div class="pt-8 border-t border-gray-100 mt-8 flex items-center gap-6 animate-fade-in-up animation-delay-500">
                     <div>
                        <div class="flex -space-x-3 rtl:space-x-reverse mb-2">
                             <img class="w-10 h-10 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Client+1&background=random" alt="Client">
                             <img class="w-10 h-10 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Client+2&background=random" alt="Client">
                             <img class="w-10 h-10 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Client+3&background=random" alt="Client">
                             <span class="flex items-center justify-center w-10 h-10 rounded-full border-2 border-white bg-gray-100 text-xs font-bold text-gray-600">+50</span>
                        </div>
                        <p class="text-sm text-gray-500 font-medium">عميل يثق بنا</p>
                     </div>
                     <div class="h-10 w-px bg-gray-200"></div>
                     <div class="flex items-center gap-2">
                         <span class="text-3xl font-black text-blue-600">15+</span>
                         <span class="text-sm text-gray-500 font-medium leading-tight">عاماً من<br>الخبرة</span>
                     </div>
                </div>
            </div>

            <!-- Image Grid (Left) - Floating Cards -->
            <div class="hero-cards-stack hidden lg:block order-1 lg:order-2 relative h-[600px] w-full max-w-[580px] mx-auto perspective-1000">
                <?php
                $cards = array(
                    // Image, Title, Classes, Delay
                    array('service-interior.jpg', 'التصميم الداخلي', 'left-0 top-0 w-56 xl:w-64 shadow-2xl rotate-[-6deg]', 'delay-0'),
                    array('service-architectural.jpg', 'التصميم المعماري', 'right-0 top-24 w-60 xl:w-72 shadow-2xl rotate-[6deg] z-20', 'delay-1000'),
                    array('service-surveying.jpg', 'هندسة المساحة', 'left-8 bottom-16 w-56 xl:w-64 shadow-2xl rotate-[-3deg] z-10', 'delay-2000'),
                    array('service-mep.jpg', 'أنظمة MEP', 'right-8 bottom-0 w-60 xl:w-72 shadow-2xl rotate-[3deg] z-30', 'delay-3000'),
                );
                
                foreach ($cards as $c) :
                    $img_src = get_theme_file_uri('assets/images/' . sanitize_file_name($c[0]));
                ?>
                <div class="hero-card absolute transition-all duration-500 ease-out hover:z-50 hover:scale-110 hover:rotate-0 cursor-pointer animate-float <?php echo esc_attr($c[2] . ' ' . $c[3]); ?>">
                    <div class="aspect-[4/5] overflow-hidden rounded-3xl relative ring-4 ring-white shadow-lg">
                         <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($c[1]); ?>" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-700">
                         <!-- Glass Badge -->
                         <div class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-md p-3 rounded-xl border border-white/50 shadow-sm text-center">
                             <span class="block font-bold text-gray-900 text-sm"><?php echo esc_html($c[1]); ?></span>
                         </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <!-- Background Decorative Blob for Cards -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-blue-100/50 to-indigo-100/50 rounded-full blur-3xl -z-10 animate-pulse-slow"></div>
            </div>
            
        </div>
    </div>
</section>

<!-- Stats - مطابق React (مع عداد اختياري عبر JS) -->
<section class="relative py-12 sm:py-16 md:py-20 lg:py-24 bg-gradient-to-b from-white via-blue-50/20 to-white overflow-hidden">
    <div class="container relative z-10 px-4 sm:px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
            <?php if (function_exists('have_rows') && have_rows('home_stats', 'option')) : ?>
                <?php while (have_rows('home_stats', 'option')) : the_row(); ?>
                    <div class="group relative p-4 sm:p-5 md:p-6 lg:p-8 rounded-xl md:rounded-2xl bg-white border-2 border-gray-200 shadow-sm hover:border-blue-300 hover:shadow-xl transition-all duration-500">
                        <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-extrabold text-blue-600 mb-1 sm:mb-2 md:mb-3 stat-counter" data-end="<?php echo absint(get_sub_field('value')); ?>" data-suffix="<?php echo esc_attr(get_sub_field('suffix')); ?>">0</div>
                        <p class="text-xs sm:text-sm md:text-base font-semibold text-gray-500"><?php the_sub_field('label'); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else :
                $default_stats = array(
                    array(100, '+', 'مشروع منجز'),
                    array(10, '+', 'سنوات خبرة'),
                    array(19, '%', 'متوسط توفير في التكلفة'),
                    array(90, '%', 'تقليل إعادة العمل'),
                );
                foreach ($default_stats as $s) : ?>
                    <div class="group relative p-4 sm:p-5 md:p-6 lg:p-8 rounded-xl md:rounded-2xl bg-white border-2 border-gray-200 shadow-sm hover:border-blue-300 hover:shadow-xl transition-all duration-500">
                        <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-extrabold text-blue-600 mb-1 sm:mb-2 md:mb-3 stat-counter" data-end="<?php echo (int) $s[0]; ?>" data-suffix="<?php echo esc_attr($s[1]); ?>">0</div>
                        <p class="text-xs sm:text-sm md:text-base font-semibold text-gray-500"><?php echo esc_html($s[2]); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- About - مطابق React (من نحن - قسم داكن) -->
<section class="relative py-16 sm:py-20 md:py-24 lg:py-32 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 overflow-hidden" id="about">
    <div class="absolute inset-0 opacity-20 blueprint-grid"></div>
    <div class="container relative z-10 px-4 sm:px-6">
        <div class="grid md:grid-cols-2 gap-10 md:gap-12 lg:gap-24 items-center">
            <div class="space-y-5 sm:space-y-6 md:space-y-8 text-white text-center md:text-right">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/20 border border-blue-400/30">
                    <span class="text-sm font-medium text-blue-300">من نحن</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                    <span class="text-white">شريكك الهندسي الذي </span>
                    <span class="text-cyan-300 font-extrabold">تعتمد عليه</span>
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-slate-300 leading-relaxed">
                    نحن نؤمن بأن النجاح يأتي من التكامل والتنسيق. لذلك نجمع كل التخصصات الهندسية تحت إدارة واحدة لنضمن لك مشروعاً متناسقاً بأقل التكاليف وأعلى جودة.
                </p>
                <div class="space-y-2 sm:space-y-3 pt-2 md:pt-4">
                    <div class="flex gap-2 sm:gap-3 items-start p-3 sm:p-4 rounded-lg bg-white/5 border border-white/10 hover:bg-white/10 transition text-right">
                        <span class="text-cyan-300 font-bold flex-shrink-0">✓</span>
                        <div>
                            <h3 class="font-bold text-white mb-0.5 sm:mb-1 text-sm sm:text-base">نهج التصميم المتكامل</h3>
                            <p class="text-slate-400 text-xs sm:text-sm">نجمع كل التخصصات الهندسية تحت سقف واحد لضمان التناسق والجودة</p>
                        </div>
                    </div>
                    <div class="flex gap-2 sm:gap-3 items-start p-3 sm:p-4 rounded-lg bg-white/5 border border-white/10 hover:bg-white/10 transition text-right">
                        <span class="text-cyan-300 font-bold flex-shrink-0">✓</span>
                        <div>
                            <h3 class="font-bold text-white mb-0.5 sm:mb-1 text-sm sm:text-base">الالتزام بالميزانية والجدول</h3>
                            <p class="text-slate-400 text-xs sm:text-sm">نحترم وقتك وميزانيتك من خلال تخطيط دقيق وإدارة فعالة للمشروع</p>
                        </div>
                    </div>
                    <div class="flex gap-2 sm:gap-3 items-start p-3 sm:p-4 rounded-lg bg-white/5 border border-white/10 hover:bg-white/10 transition text-right">
                        <span class="text-cyan-300 font-bold flex-shrink-0">✓</span>
                        <div>
                            <h3 class="font-bold text-white mb-0.5 sm:mb-1 text-sm sm:text-base">الدقة المدعومة بالتقنية</h3>
                            <p class="text-slate-400 text-xs sm:text-sm">نستخدم BIM والمسح ثلاثي الأبعاد لتقليل الأخطاء وتحسين النتائج</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center md:justify-start gap-2 sm:gap-3 md:gap-4 pt-3 md:pt-4">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="px-5 py-3 sm:px-6 sm:py-3.5 md:px-8 md:py-4 rounded-xl font-bold text-sm sm:text-base bg-gradient-to-r from-blue-500 to-cyan-500 text-white hover:from-blue-600 hover:to-cyan-600 transition shadow-lg">اطلب مراجعة سريعة</a>
                    <a href="<?php echo esc_url(home_url('/quotation')); ?>" class="px-5 py-3 sm:px-6 sm:py-3.5 md:px-8 md:py-4 rounded-xl font-bold text-sm sm:text-base border-2 border-blue-400/50 text-white hover:bg-blue-500/20 transition">تواصل مع خبير</a>
                </div>
            </div>
            <div class="space-y-5 sm:space-y-6 md:space-y-8">
                <div class="grid grid-cols-3 gap-2 sm:gap-3 md:gap-4">
                    <div class="p-3 sm:p-4 md:p-6 rounded-xl md:rounded-2xl bg-white/10 backdrop-blur-sm border-2 border-blue-400/40 text-center">
                        <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-0.5 sm:mb-1 md:mb-2">15%</div>
                        <p class="text-[10px] sm:text-xs md:text-sm text-slate-200 font-semibold">تسريع التسليم</p>
                    </div>
                    <div class="p-3 sm:p-4 md:p-6 rounded-xl md:rounded-2xl bg-white/10 backdrop-blur-sm border-2 border-blue-400/40 text-center">
                        <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-0.5 sm:mb-1 md:mb-2">90%</div>
                        <p class="text-[10px] sm:text-xs md:text-sm text-slate-200 font-semibold">تقليل إعادة العمل</p>
                    </div>
                    <div class="p-3 sm:p-4 md:p-6 rounded-xl md:rounded-2xl bg-white/10 backdrop-blur-sm border-2 border-blue-400/40 text-center">
                        <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-0.5 sm:mb-1 md:mb-2">25%</div>
                        <p class="text-[10px] sm:text-xs md:text-sm text-slate-200 font-semibold">وفورات في التكلفة</p>
                    </div>
                </div>
                <div class="relative rounded-xl md:rounded-2xl overflow-hidden aspect-[3/4] max-h-[50vh] sm:max-h-[60vh] md:max-h-[70vh] border-2 border-white/20 bg-slate-800 w-full">
                    <video class="w-full h-full object-cover pointer-events-none" src="<?php echo esc_url(get_theme_file_uri('assets/images/Architectural_Sketch_Animation_Generation.mp4')); ?>" loop muted playsinline autoplay poster="">
                        <?php esc_html_e('متصفحك لا يدعم تشغيل الفيديو.', 'qeema-theme'); ?>
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services - مطابق React -->
<section class="py-12 sm:py-16 md:py-20 lg:py-24 bg-gradient-to-b from-white to-gray-50/50" id="services">
    <div class="container px-4 sm:px-6">
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14 md:mb-20">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-200 mb-4 md:mb-6">
                <span class="text-sm font-medium text-gray-900">خدماتنا</span>
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 md:mb-6">
                حلول هندسية <span class="gradient-text">شاملة</span>
            </h2>
            <p class="text-sm sm:text-base md:text-lg text-gray-600 px-2">
                نقدم مجموعة متكاملة من الخدمات الهندسية المتخصصة لتحقيق رؤيتك بأعلى معايير الجودة والاحترافية
            </p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6">
            <?php
            $services = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 4, 'orderby' => 'menu_order title', 'order' => 'ASC'));
            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    $icon = function_exists('get_field') ? get_field('icon_name') : '';
                    $service_img = visionary_get_service_asset_image(get_the_ID());
            ?>
                    <a href="<?php the_permalink(); ?>" class="group relative bg-white rounded-xl md:rounded-2xl border-2 border-gray-100 hover:border-blue-300 hover:shadow-xl transition-all duration-500 overflow-hidden">
                        <div class="aspect-[16/10] overflow-hidden bg-gray-100">
                            <img src="<?php echo esc_url($service_img); ?>" alt="<?php the_title_attribute(array('echo' => false)); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="relative p-5 sm:p-6 md:p-8 pb-4 md:pb-6">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 rounded-xl md:rounded-2xl bg-blue-50 flex items-center justify-center mb-4 md:mb-6 group-hover:scale-110 transition-all text-blue-600">
                                <span class="text-lg sm:text-xl md:text-2xl font-bold"><?php echo $icon ? esc_html(substr($icon, 0, 1)) : '●'; ?></span>
                            </div>
                        </div>
                        <div class="px-5 sm:px-6 md:px-8 pb-5 sm:pb-6 md:pb-8">
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-900 mb-2 md:mb-3 group-hover:text-blue-600 transition-colors"><?php the_title(); ?></h3>
                            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed mb-3 md:mb-4 line-clamp-3"><?php echo esc_html(function_exists('get_field') ? get_field('short_description') : get_the_excerpt()); ?></p>
                            <div class="flex items-center gap-2 text-blue-600 font-semibold text-sm group-hover:gap-3 transition-all">
                                <span>اعرف المزيد</span>
                                <span>←</span>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </a>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <div class="text-center mt-10 sm:mt-12 md:mt-16">
            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="inline-flex items-center gap-2 px-5 py-3 sm:px-6 sm:py-3.5 md:px-8 md:py-4 rounded-xl font-semibold text-sm sm:text-base border-2 border-gray-200 text-gray-700 hover:border-blue-300 hover:bg-blue-50 transition">استكشف جميع خدماتنا</a>
        </div>
    </div>
</section>

<!-- Why Us - مطابق React (تحت الخدمات) -->
<section id="why-us" class="py-12 sm:py-16 md:py-20 lg:py-24 bg-secondary text-white overflow-hidden" style="background-color: hsl(var(--secondary));">
    <div class="container px-4 sm:px-6">
        <div class="grid md:grid-cols-2 gap-10 md:gap-12 lg:gap-16 items-center">
            <div class="text-center md:text-right">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 md:mb-6">
                    شريكك الهندسي الذي <span class="gradient-text-gold">يُعتمد عليه</span>
                </h2>
                <p class="text-base sm:text-lg text-white/80 mb-6 md:mb-8">
                    نحن نؤمن بأن النجاح يأتي من التكامل والتنسيق. لذلك نجمع كل التخصصات الهندسية تحت إدارة واحدة لنضمن لك مشروعاً متناسقاً بأقل التكاليف وأعلى جودة.
                </p>
                <div class="space-y-4 md:space-y-6">
                    <div class="flex gap-3 md:gap-4 text-right">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-blue-400/20 flex items-center justify-center flex-shrink-0 text-blue-300">✓</div>
                        <div>
                            <h3 class="font-bold mb-0.5 sm:mb-1 text-sm sm:text-base">نهج التصميم المتكامل</h3>
                            <p class="text-white/70 text-xs sm:text-sm">نجمع كل التخصصات الهندسية تحت سقف واحد لضمان التناسق والجودة</p>
                        </div>
                    </div>
                    <div class="flex gap-3 md:gap-4 text-right">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-blue-400/20 flex items-center justify-center flex-shrink-0 text-blue-300">✓</div>
                        <div>
                            <h3 class="font-bold mb-0.5 sm:mb-1 text-sm sm:text-base">الالتزام بالميزانية والجدول</h3>
                            <p class="text-white/70 text-xs sm:text-sm">نحترم وقتك وميزانيتك من خلال تخطيط دقيق وإدارة فعالة للمشروع</p>
                        </div>
                    </div>
                    <div class="flex gap-3 md:gap-4 text-right">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-blue-400/20 flex items-center justify-center flex-shrink-0 text-blue-300">✓</div>
                        <div>
                            <h3 class="font-bold mb-0.5 sm:mb-1 text-sm sm:text-base">الدقة المدعومة بالتقنية</h3>
                            <p class="text-white/70 text-xs sm:text-sm">نستخدم BIM والمسح ثلاثي الأبعاد لتقليل الأخطاء وتحسين النتائج</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center md:justify-start gap-2 sm:gap-3 md:gap-4 mt-6 md:mt-10">
                    <a href="<?php echo esc_url(home_url('/quotation')); ?>" class="px-5 py-3 sm:px-6 sm:py-3.5 md:px-8 md:py-4 rounded-xl font-bold text-sm sm:text-base bg-blue-500 text-white hover:bg-blue-600 transition">اطلب مراجعة سريعة</a>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="px-5 py-3 sm:px-6 sm:py-3.5 md:px-8 md:py-4 rounded-xl font-bold text-sm sm:text-base border-2 border-white/30 text-white hover:bg-white/10 transition">تواصل مع خبير</a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 sm:gap-3 md:gap-4">
                <div class="p-3 sm:p-4 md:p-6 rounded-xl md:rounded-2xl bg-white/10 border border-blue-400/20 text-center">
                    <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-0.5 sm:mb-1 md:mb-2">90%</div>
                    <p class="text-white/80 text-[10px] sm:text-xs md:text-sm">تقليل إعادة العمل</p>
                </div>
                <div class="p-3 sm:p-4 md:p-6 rounded-xl md:rounded-2xl bg-white/10 border border-blue-400/20 text-center">
                    <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-0.5 sm:mb-1 md:mb-2">15%</div>
                    <p class="text-white/80 text-[10px] sm:text-xs md:text-sm">تسريع التسليم</p>
                </div>
                <div class="col-span-2 p-3 sm:p-4 md:p-6 rounded-xl md:rounded-2xl bg-white/10 border border-blue-400/20 text-center">
                    <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-0.5 sm:mb-1 md:mb-2">25%</div>
                    <p class="text-white/80 text-[10px] sm:text-xs md:text-sm">وفورات في التكلفة الإجمالية</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Carousel - مطابق React -->
<section class="py-12 sm:py-16 md:py-20 lg:py-24 bg-gradient-to-b from-gray-50/30 to-white overflow-hidden" id="projects">
    <div class="container px-4 sm:px-6">
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12 md:mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-200 mb-4 md:mb-6">
                <span class="text-sm font-medium text-gray-900">مشاريعنا</span>
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 md:mb-6">
                مشاريعنا <span class="gradient-text">تتحدث عنا</span>
            </h2>
            <p class="text-sm sm:text-base md:text-lg text-gray-600 px-2">نفخر بإنجاز مشاريع متنوعة في مختلف القطاعات بأعلى معايير الجودة والاحترافية</p>
        </div>
        <div class="relative px-1 sm:px-2">
            <button type="button" id="projects-prev" class="absolute right-0 top-1/2 -translate-y-1/2 z-30 w-9 h-9 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full bg-white shadow-lg border-2 border-blue-200 hover:border-blue-500 hover:bg-blue-50 flex items-center justify-center transition-all text-sm md:text-base" aria-label="السابق">→</button>
            <button type="button" id="projects-next" class="absolute left-0 top-1/2 -translate-y-1/2 z-30 w-9 h-9 sm:w-10 sm:h-10 md:w-12 md:h-12 rounded-full bg-white shadow-lg border-2 border-blue-200 hover:border-blue-500 hover:bg-blue-50 flex items-center justify-center transition-all text-sm md:text-base" aria-label="التالي">←</button>
            <div id="projects-carousel" class="flex gap-4 sm:gap-5 md:gap-6 overflow-x-auto scrollbar-hide scroll-smooth snap-x snap-mandatory px-1 sm:px-2 pb-6 md:pb-8">
                <?php
                $projects = new WP_Query(array('post_type' => 'project', 'posts_per_page' => 6));
                if ($projects->have_posts()) :
                    while ($projects->have_posts()) : $projects->the_post();
                        $cat = function_exists('get_field') ? get_field('category') : '';
                        $loc = function_exists('get_field') ? get_field('location') : '';
                        $project_img = visionary_get_project_image_url(get_the_ID(), $projects->current_post, 'medium_large');
                ?>
                        <div class="group relative flex-shrink-0 w-[85%] sm:w-[70%] md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] snap-start">
                            <a href="<?php the_permalink(); ?>" class="block relative bg-white rounded-2xl border-2 border-gray-100 hover:border-blue-200 transition-all duration-500 overflow-hidden shadow-lg hover:shadow-xl hover:-translate-y-1">
                                <div class="relative aspect-[4/3] overflow-hidden">
                                    <img src="<?php echo esc_url($project_img); ?>" alt="<?php the_title_attribute(array('echo' => false)); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                                    <div class="absolute top-4 right-4 px-3 py-1.5 rounded-full bg-white/90 backdrop-blur-sm border border-white/50">
                                        <span class="text-xs font-semibold text-gray-900"><?php echo esc_html($cat); ?></span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors"><?php the_title(); ?></h3>
                                    <div class="flex items-center gap-2 text-gray-500 text-sm">📍 <?php echo esc_html($loc); ?></div>
                                </div>
                            </a>
                        </div>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
            <div id="projects-dots" class="flex justify-center gap-2 mt-4"></div>
        </div>
        <div class="text-center mt-10 sm:mt-12 md:mt-16">
            <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>" class="inline-flex items-center gap-2 px-5 py-3 sm:px-6 sm:py-3.5 md:px-8 md:py-4 rounded-xl font-semibold text-sm sm:text-base bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg">شاهد جميع مشاريعنا</a>
        </div>
    </div>
</section>

<!-- Testimonials - مطابق React -->
<section class="py-12 sm:py-16 md:py-20 lg:py-24 bg-gray-100">
    <div class="container px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-4">ماذا يقول <span class="gradient-text">عملاؤنا</span></h2>
            </div>
            <div class="relative">
                <div class="bg-white rounded-2xl md:rounded-3xl p-5 sm:p-6 md:p-8 lg:p-12 shadow-lg border border-gray-100">
                    <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-800 mb-5 sm:mb-6 md:mb-8 leading-relaxed testimonial-quote">
                        تعاملنا مع رؤية الهندسة كان تجربة استثنائية. الاحترافية والدقة في التنفيذ فاقت توقعاتنا.
                    </p>
                    <div>
                        <p class="font-bold text-gray-900 testimonial-author text-sm sm:text-base">م. خالد العمري</p>
                        <p class="text-gray-500 testimonial-company text-xs sm:text-sm">مجموعة العمري للتطوير العقاري</p>
                    </div>
                </div>
                <div class="flex justify-center gap-3 sm:gap-4 mt-5 sm:mt-6 md:mt-8">
                    <button type="button" id="testimonial-prev" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-700 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 transition text-sm" aria-label="الشهادة السابقة">→</button>
                    <div id="testimonial-dots" class="flex items-center gap-2"></div>
                    <button type="button" id="testimonial-next" class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white border border-gray-200 flex items-center justify-center text-gray-700 hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600 transition text-sm" aria-label="الشهادة التالية">←</button>
                </div>
            </div>
            <div class="mt-10 sm:mt-12 md:mt-16">
                <p class="text-center text-gray-500 mb-4 sm:mb-6 md:mb-8 text-sm sm:text-base">شركاء النجاح</p>
                <div class="flex flex-wrap justify-center gap-3 sm:gap-4 md:gap-6 lg:gap-8">
                    <span class="px-4 py-2 sm:px-5 sm:py-2.5 md:px-6 md:py-3 rounded-lg md:rounded-xl bg-white border border-gray-200 text-gray-500 font-medium text-xs sm:text-sm md:text-base">شركة الراجحي</span>
                    <span class="px-4 py-2 sm:px-5 sm:py-2.5 md:px-6 md:py-3 rounded-lg md:rounded-xl bg-white border border-gray-200 text-gray-500 font-medium text-xs sm:text-sm md:text-base">مجموعة العليان</span>
                    <span class="px-4 py-2 sm:px-5 sm:py-2.5 md:px-6 md:py-3 rounded-lg md:rounded-xl bg-white border border-gray-200 text-gray-500 font-medium text-xs sm:text-sm md:text-base">شركة سابك</span>
                    <span class="px-4 py-2 sm:px-5 sm:py-2.5 md:px-6 md:py-3 rounded-lg md:rounded-xl bg-white border border-gray-200 text-gray-500 font-medium text-xs sm:text-sm md:text-base">بنك الرياض</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA - مطابق React -->
<section class="py-12 sm:py-16 md:py-20 lg:py-24 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 relative overflow-hidden">
    <div class="absolute inset-0 blueprint-grid opacity-20"></div>
    <div class="container relative px-4 sm:px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-4 md:mb-6">هل أنت مستعد لبدء مشروعك؟</h2>
            <p class="text-base sm:text-lg md:text-xl text-blue-100 mb-6 sm:mb-8 md:mb-10">تواصل معنا اليوم واحصل على استشارة مجانية ومراجعة سريعة لمخططاتك</p>
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 md:gap-4">
                <a href="<?php echo esc_url(home_url('/quotation')); ?>" class="inline-flex items-center gap-2 px-6 py-3 sm:px-8 sm:py-3.5 md:px-10 md:py-4 rounded-xl font-bold text-sm sm:text-base bg-white text-blue-600 hover:bg-blue-50 transition shadow-lg">اطلب عرض سعر الآن</a>
                <a href="tel:+201009148383" class="inline-flex items-center gap-2 px-6 py-3 sm:px-8 sm:py-3.5 md:px-10 md:py-4 rounded-xl font-bold text-sm sm:text-base border-2 border-white text-white hover:bg-white/10 transition">اتصل بنا مباشرة</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
