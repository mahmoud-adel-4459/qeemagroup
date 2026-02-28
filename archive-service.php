<?php get_header(); ?>

<!-- Hero Section -->
<section class="relative min-h-[60vh] min-h-[500px] flex items-center justify-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('services')); ?>" alt="خدماتنا" class="w-full h-full min-h-full min-w-full object-cover object-center">
        <div class="absolute inset-0 z-[1] bg-gradient-to-r from-slate-900/95 via-blue-900/80 to-slate-900/70" aria-hidden="true"></div>
        <div class="absolute inset-0 z-[1] blueprint-grid opacity-20 pointer-events-none" aria-hidden="true"></div>
    </div>
    <div class="container relative z-10 text-center px-4 pt-20">
        <div class="max-w-4xl mx-auto space-y-6 animate-fade-in-up">
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight leading-tight">
                <span class="block text-blue-400 text-2xl md:text-3xl font-medium mb-2 tracking-widest uppercase">تميز هندسي</span>
                حلول شاملة لمشاريع <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-white">استثنائية</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 leading-relaxed max-w-2xl mx-auto opacity-90 font-light">
                نقدم خدمات متكاملة تبدأ من الفكرة الطموحة وتنتهي بالتنفيذ المتقن، مع التزام تام بالجودة والابتكار.
            </p>
        </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce hidden md:block text-white/50">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
    </div>
</section>

<!-- Stats Strip -->
<div class="bg-blue-600 text-white py-10 relative z-20 -mt-8 mx-4 sm:mx-10 rounded-3xl shadow-2xl flex flex-wrap justify-center gap-8 md:gap-16 border-t border-blue-500/30 backdrop-blur-sm">
    <div class="text-center px-4">
        <div class="text-4xl font-bold mb-1">+15</div>
        <div class="text-blue-200 text-sm font-medium uppercase tracking-wider">سنة خبرة</div>
    </div>
    <div class="w-px bg-white/20 h-16 hidden md:block"></div>
    <div class="text-center px-4">
        <div class="text-4xl font-bold mb-1">+150</div>
        <div class="text-blue-200 text-sm font-medium uppercase tracking-wider">مشروع ناجح</div>
    </div>
    <div class="w-px bg-white/20 h-16 hidden md:block"></div>
    <div class="text-center px-4">
        <div class="text-4xl font-bold mb-1">100%</div>
        <div class="text-blue-200 text-sm font-medium uppercase tracking-wider">التزام بالمواعيد</div>
    </div>
</div>

<div class="visionary-content-wrap bg-gray-50 pb-24 pt-20">

    <!-- Services Container -->
    <div class="container px-4 sm:px-6">
        <?php if (have_posts()): ?>
            <div class="space-y-24 md:space-y-32">
                <?php 
                $i = 0;
                while (have_posts()): the_post(); 
                    $i++;
                    $is_even = ($i % 2 == 0);
                    $icon = get_field('icon_name') ?: 'Layers';
                    $service_img = visionary_get_service_asset_image(get_the_ID());
                ?>
                

                <!-- Service Item -->
                <article class="visionary-card group relative grid lg:grid-cols-2 gap-12 lg:gap-20 items-center bg-white rounded-3xl p-6 lg:p-10 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                    <!-- Image Side -->
                    <div class="relative <?php echo $is_even ? 'lg:order-2' : 'lg:order-1'; ?>">
                        <div class="relative rounded-2xl overflow-hidden shadow-lg transform transition-transform duration-700 aspect-[4/3]">
                            <div class="absolute inset-0 bg-blue-900/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                            <img src="<?php echo esc_url($service_img); ?>" alt="<?php the_title_attribute(); ?>" 
                                 class="w-full h-full object-cover transform scale-100 group-hover:scale-110 transition-transform duration-[1.5s] ease-out">
                            
                            <!-- Floating Icon Badge -->
                            <div class="absolute bottom-6 <?php echo $is_even ? 'left-6' : 'right-6'; ?> z-20 visionary-glass p-4 rounded-xl shadow-lg text-blue-600">
                                <span class="text-3xl font-bold block"><?php echo esc_html(substr($icon, 0, 1)); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Content Side -->
                    <div class="<?php echo $is_even ? 'lg:order-1 lg:text-left dir-ltr' : 'lg:order-2 text-right'; ?>">
                        <div class="flex items-center gap-4 mb-6 <?php echo $is_even ? 'lg:flex-row-reverse' : ''; ?>">
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold tracking-wide">0<?php echo $i; ?></span>
                            <div class="h-px bg-blue-100 flex-1"></div>
                        </div>
                        
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight group-hover:text-blue-600 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed font-light line-clamp-3">
                            <?php echo esc_html(get_field('short_description') ?: get_the_excerpt()); ?>
                        </p>
                        
                        <ul class="space-y-2 mb-8 text-gray-700 visionary-list-check">
                            <?php
                            // Simulating features/tags for visual richness if not present
                            $features = ['حلول مخصصة', 'فريق متخصص', 'أعلى معايير الجودة']; 
                            foreach($features as $f): ?>
                            <li class="<?php echo $is_even ? 'lg:flex-row-reverse' : ''; ?>">
                                <span><?php echo $f; ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-50 text-blue-600 font-bold hover:bg-blue-600 hover:text-white transition-all duration-300 <?php echo $is_even ? 'lg:flex-row-reverse' : ''; ?>">
                            <span>استكشف الخدمة</span>
                            <svg class="w-4 h-4 rtl:-scale-x-100 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </article>

                
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-20">
                <p class="text-xl text-gray-500">جاري إضافة خدماتنا المتميزة. يرجى العودة قريباً.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Workflow Section -->
    <section class="mt-32 pt-24 pb-16 bg-white border-t border-gray-100 relative overflow-hidden">
        <div class="absolute inset-0 blueprint-grid opacity-5"></div>
        <div class="container px-4 sm:px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">كيف نعمل؟</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full mb-6"></div>
                <p class="text-xl text-gray-600">منهجية دقيقة تضمن تحويل رؤيتك إلى واقع ملموس</p>
            </div>

            <div class="relative">
                <!-- Connecting Line -->
                <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-100 -translate-y-1/2 hidden md:block z-0"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10">
                    <!-- Step 1 -->
                    <div class="group text-center bg-white p-6">
                        <div class="w-20 h-20 mx-auto bg-white border-4 border-blue-100 rounded-full flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:border-blue-600 group-hover:scale-110 transition-all duration-300 relative">
                            <span class="absolute -top-2 -right-2 w-8 h-8 bg-blue-600 text-white text-sm font-bold rounded-full flex items-center justify-center">1</span>
                            👂
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">الاستشارة</h3>
                        <p class="text-gray-500 leading-relaxed">فهم عميق لمتطلباتك وتحديد الأهداف بدقة.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="group text-center bg-white p-6">
                        <div class="w-20 h-20 mx-auto bg-white border-4 border-blue-100 rounded-full flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:border-blue-600 group-hover:scale-110 transition-all duration-300 relative">
                            <span class="absolute -top-2 -right-2 w-8 h-8 bg-blue-600 text-white text-sm font-bold rounded-full flex items-center justify-center">2</span>
                            🎨
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">التصميم</h3>
                        <p class="text-gray-500 leading-relaxed">حلول إبداعية ومخططات تفصيلية توافق رؤيتك.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="group text-center bg-white p-6">
                        <div class="w-20 h-20 mx-auto bg-white border-4 border-blue-100 rounded-full flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:border-blue-600 group-hover:scale-110 transition-all duration-300 relative">
                             <span class="absolute -top-2 -right-2 w-8 h-8 bg-blue-600 text-white text-sm font-bold rounded-full flex items-center justify-center">3</span>
                            ⚙️
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">التنفيذ</h3>
                        <p class="text-gray-500 leading-relaxed">إدارة ميدانية صارمة لضمان الجودة والجدول الزمني.</p>
                    </div>
                    <!-- Step 4 -->
                    <div class="group text-center bg-white p-6">
                        <div class="w-20 h-20 mx-auto bg-white border-4 border-blue-100 rounded-full flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:border-blue-600 group-hover:scale-110 transition-all duration-300 relative">
                             <span class="absolute -top-2 -right-2 w-8 h-8 bg-blue-600 text-white text-sm font-bold rounded-full flex items-center justify-center">4</span>
                            ✨
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">التسليم</h3>
                        <p class="text-gray-500 leading-relaxed">تسليم المشروع مطابقاً للمواصفات مع ضمان الأداء.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="container px-4 sm:px-6 mb-[-100px] relative z-30 transform translate-y-12">
        <div class="bg-blue-900 rounded-[3rem] p-10 md:p-16 text-center shadow-2xl relative overflow-hidden group">
            <div class="absolute inset-0 bg-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-700 origin-left opacity-20"></div>
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-500/20 rounded-full blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10 max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">هل لديك مشروع في بالك؟</h2>
                <p class="text-xl text-blue-200 mb-10">دعنا نناقش كيف يمكن لخبراتنا أن تساهم في نجاح مشروعك القادم.</p>
                <div class="flex flex-wrap justify-center gap-4">
                     <a href="<?php echo esc_url(home_url('/contact')); ?>" class="px-10 py-4 bg-white text-blue-900 rounded-full font-bold text-lg hover:bg-blue-50 transition shadow-lg hover:scale-105 transform duration-200">تواصل معنا</a>
                     <a href="<?php echo esc_url(home_url('/quotation')); ?>" class="px-10 py-4 border-2 border-white/30 text-white rounded-full font-bold text-lg hover:bg-white/10 transition">طلب عرض سعر</a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>