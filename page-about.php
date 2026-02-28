<?php
/**
 * Template Name: من نحن - About Page
 * صفحة من نحن - محتوى كامل: رؤية، رسالة، قيم، أعمدة، شركاء تقنيون
 * النصوص القابلة للتعديل من تحرير الصفحة (حقول ACF).
 */
get_header();
$contact_url = home_url('/contact');
$quotation_url = home_url('/quotation');
$about_id = get_queried_object_id();
$about_hero_title    = (function_exists('get_field') && get_field('hero_title', $about_id)) ? get_field('hero_title', $about_id) : 'نحن نصمم المستقبل بقيم راسخة وخبرة عميقة';
$about_hero_subtitle = (function_exists('get_field') && get_field('hero_subtitle', $about_id)) ? get_field('hero_subtitle', $about_id) : 'شريكك الهندسي الموثوق. حلول متكاملة تجمع بين الجودة والابتكار والكفاءة لتشكيل عالم أفضل.';
$about_story_label   = (function_exists('get_field') && get_field('story_label', $about_id)) ? get_field('story_label', $about_id) : 'قصتنا';
$about_story_heading = (function_exists('get_field') && get_field('story_heading', $about_id)) ? get_field('story_heading', $about_id) : 'شراكة حقيقية.. لا مجرد خدمة';
$about_story_content = (function_exists('get_field') && get_field('story_content', $about_id)) ? get_field('story_content', $about_id) : 'تأسست شركتنا على مبدأ بسيط ولكنه قوي: أن الاستشارات الهندسية يجب أن تكون شراكة حقيقية، وليست مجرد خدمة. انطلقنا برؤية تهدف إلى سد الفجوة بين التصاميم الطموحة والتنفيذ الواقعي على الأرض.';
$about_story_cta     = (function_exists('get_field') && get_field('story_cta_text', $about_id)) ? get_field('story_cta_text', $about_id) : 'تواصل معنا لنبدأ الرحلة';
$about_vision_heading = (function_exists('get_field') && get_field('vision_mission_heading', $about_id)) ? get_field('vision_mission_heading', $about_id) : 'ما الذي يحركنا؟';
$about_vision_intro  = (function_exists('get_field') && get_field('vision_mission_intro', $about_id)) ? get_field('vision_mission_intro', $about_id) : 'بوصلتنا نحو المستقبل وهدفنا الذي لا نحيد عنه';
$about_vision_text   = (function_exists('get_field') && get_field('vision_text', $about_id)) ? get_field('vision_text', $about_id) : 'أن نكون الشريك الهندسي الأكثر موثوقية في المنطقة، ونُعرف بقدرتنا على تحويل الرؤى المعقدة إلى واقع مستدام وذي قيمة، يساهم في تطوير مجتمعاتنا ويرتقي بجودة الحياة للأجيال القادمة.';
$about_mission_text  = (function_exists('get_field') && get_field('mission_text', $about_id)) ? get_field('mission_text', $about_id) : 'تقديم حلول هندسية متكاملة ومبتكرة، من خلال فريق من الخبراء الملتزمين بالجودة والدقة والشفافية. نعمل بلا كلل لضمان نجاح مشاريع عملائنا وتحقيق أهدافهم الاستثمارية والوظيفية بأعلى المعايير.';
?>

<!-- Hero Section: Modern & Immersive -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden">
    <!-- Background Image with Parallax Feel -->
    <div class="absolute inset-0 z-0">
        <img src="<?php echo esc_url(visionary_get_hero_image_url('about')); ?>" alt="Visionary Engineering" class="w-full h-full object-cover transform scale-105 transition-transform duration-1000">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/95 via-blue-800/80 to-blue-900/40"></div>
        <div class="absolute inset-0 blueprint-grid opacity-10"></div>
    </div>

    <!-- Content -->
    <div class="container relative z-10 text-center px-4">
        <div class="max-w-4xl mx-auto space-y-6 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold text-white tracking-tight leading-tight">
                <?php echo wp_kses_post($about_hero_title); ?>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 leading-relaxed max-w-2xl mx-auto opacity-90">
                <?php echo esc_html($about_hero_subtitle); ?>
            </p>
        </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
    </div>
</section>

<div class="visionary-content-wrap">

    <!-- Our Story: 2-Column Layout -->
    <section class="py-20 bg-white relative overflow-hidden">
        <div class="container px-4 sm:px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="order-2 lg:order-1 text-right space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-sm font-semibold mb-2">
                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        <?php echo esc_html($about_story_label); ?>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 !mb-4 !border-0 !pb-0"><?php echo esc_html($about_story_heading); ?></h2>
                    <div class="text-lg text-gray-600 leading-relaxed about-story-content">
                        <?php echo wp_kses_post($about_story_content); ?>
                    </div>
                    <div class="pt-6">
                        <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 transition group">
                            <?php echo esc_html($about_story_cta); ?>
                            <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform rtl:-scale-x-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        </a>
                    </div>
                </div>
                <!-- Image Content -->
                <div class="order-1 lg:order-2 relative group">
                    <div class="absolute inset-0 bg-blue-600 rounded-3xl transform rotate-3 opacity-10 group-hover:rotate-6 transition-transform duration-500"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project-2.jpg" alt="Our Team" class="relative rounded-3xl shadow-2xl w-full h-auto object-cover transform transition-transform duration-500 hover:scale-[1.02] bg-gray-200 min-h-[400px]">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission: Interlocking Cards -->
    <section class="py-20 bg-gray-50 relative">
        <div class="absolute inset-0 blueprint-grid opacity-5"></div>
        <div class="container px-4 sm:px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 !mb-4 !border-0 text-center"><?php echo esc_html($about_vision_heading); ?></h2>
                <p class="text-gray-600 text-lg"><?php echo esc_html($about_vision_intro); ?></p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 lg:gap-12 max-w-5xl mx-auto">
                <!-- Vision Card -->
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col text-right group">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">رؤيتنا الطموحة</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        <?php echo esc_html($about_vision_text); ?>
                    </p>
                </div>
                
                <!-- Mission Card -->
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col text-right group">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">رسالتنا المستمرة</h3>
                    <p class="text-gray-600 leading-relaxed flex-grow">
                        <?php echo esc_html($about_mission_text); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-blue-600 relative overflow-hidden text-white">
        <div class="absolute inset-0 blueprint-grid opacity-10"></div>
        <div class="container px-4 sm:px-6 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center max-w-5xl mx-auto divide-x divide-blue-500/30 rtl:divide-x-reverse">
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-extrabold mb-2">+15</div>
                    <div class="text-blue-100 text-sm md:text-base font-medium">سنة من الخبرة</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-extrabold mb-2">+250</div>
                    <div class="text-blue-100 text-sm md:text-base font-medium">مشروع ناجح</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-extrabold mb-2">98%</div>
                    <div class="text-blue-100 text-sm md:text-base font-medium">رضا العملاء</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl md:text-5xl font-extrabold mb-2">+50</div>
                    <div class="text-blue-100 text-sm md:text-base font-medium">خبير ومهندس</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-20 bg-white">
        <div class="container px-4 sm:px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 !mb-4 !border-0 text-center">قيمنا الراسخة</h2>
                <p class="text-gray-600 text-lg">المبادئ التي توجه كل قرار نتخذه وكل خط نصممه</p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Value 1 -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">النزاهة أولاً</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">نعمل بشفافية ومصداقية مطلقة. ثقة عملائنا هي أثمن أصولنا التي لا نغامر بها أبدًا.</p>
                </div>
                
                <!-- Value 2 -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">الابتكار الهندسي</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">نسعى باستمرار لتبني أحدث التقنيات لتقديم حلول أكثر كفاءة واستدامة تواكب العصر.</p>
                </div>
                
                <!-- Value 3 -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">التركيز على العميل</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">نضع أهدافك في صميم عملنا. نستمع، نتعاون، ونسعى دائمًا لتجاوز توقعاتك في كل مرحلة.</p>
                </div>

                <!-- Value 4 -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">الجودة في التنفيذ</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">لا نساوم على الجودة. من أصغر التفاصيل إلى الإشراف العام، التزامنا بالتميز لا يتزعزع.</p>
                </div>

                <!-- Value 5 -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300 sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">روح الفريق</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">نؤمن بأن أفضل الحلول تأتي من التعاون. نعمل كوحدة واحدة لتحقيق أفضل النتائج لمشروعك.</p>
                </div>

                <!-- Value 6 -->
                <div class="group p-8 rounded-3xl bg-gray-50 border border-gray-100 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">التعلم المستمر</h3>
                    <p class="text-gray-600 leading-relaxed text-sm">نطور أدواتنا ونحدث معارفنا باستمرار لضمان أنك تحصل دائمًا على أفضل ما توصل إليه العلم الهندسي.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Excellence Pillars (Cleaned up) -->
    <section class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="container px-4 sm:px-6">
            <h2 class="text-3xl md:text-3xl font-bold text-blue-900 text-center mb-12 !border-0 text-center">أعمدة التميز</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto text-center">
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="text-4xl mb-4">🎨</div>
                    <h3 class="font-bold text-blue-900 mb-2">الإبداع</h3>
                    <p class="text-gray-500 text-sm">تصاميم عملية تجمع الجمال والكفاءة</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="text-4xl mb-4">⏱️</div>
                    <h3 class="font-bold text-blue-900 mb-2">الإنجاز</h3>
                    <p class="text-gray-500 text-sm">التزام صارم بالوقت والميزانية</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="text-4xl mb-4">📐</div>
                    <h3 class="font-bold text-blue-900 mb-2">الاحترافية</h3>
                    <p class="text-gray-500 text-sm">معايير عالمية وتوثيق دقيق</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="text-4xl mb-4">🤝</div>
                    <h3 class="font-bold text-blue-900 mb-2">الاهتمام</h3>
                    <p class="text-gray-500 text-sm">شريكك الذي يستمع ويفهم</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners / Tools -->
    <section class="py-20 bg-white">
        <div class="container px-4 sm:px-6 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 !border-0 text-center">أدواتنا التقنية</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">نستخدم أحدث البرمجيات الهندسية لضمان دقة التصميم وكفاءة التنفيذ</p>
            <div class="flex flex-wrap justify-center gap-4 md:gap-6 items-center max-w-4xl mx-auto grayscale hover:grayscale-0 transition-all duration-500">
                <?php
                $tools = array('AutoCAD', 'Revit', 'Navisworks', 'Civil 3D', 'ETABS', 'SAFE', 'Primavera P6', 'BIM 360', 'SketchUp', 'Lumion');
                foreach ($tools as $tool) : ?>
                    <div class="px-6 py-3 rounded-lg bg-gray-50 border border-gray-100 text-gray-400 font-bold hover:bg-white hover:text-blue-600 hover:border-blue-100 hover:shadow-md transition-all cursor-default">
                        <?php echo esc_html($tool); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 bg-gradient-to-br from-blue-900 via-blue-800 to-black relative overflow-hidden text-center">
        <div class="absolute inset-0 bg-[url('<?php echo get_template_directory_uri(); ?>/assets/images/pattern.png')] opacity-5"></div>
        <div class="container relative z-10 px-4">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">مستعدون لبناء المستقبل؟</h2>
            <p class="text-blue-200 text-lg md:text-xl mb-10 max-w-2xl mx-auto">دعنا نحول رؤيتك إلى واقع ملموس. فريقنا جاهز للإجابة على استفساراتك.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?php echo esc_url($quotation_url); ?>" class="inline-flex justify-center items-center px-8 py-4 rounded-full font-bold bg-blue-500 text-white hover:bg-blue-400 transition transform hover:-translate-y-1 shadow-lg shadow-blue-500/30">
                    اطلب عرض سعر
                </a>
                <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex justify-center items-center px-8 py-4 rounded-full font-bold border border-white/20 text-white hover:bg-white/10 transition backdrop-blur-sm">
                    تواصل معنا
                </a>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
