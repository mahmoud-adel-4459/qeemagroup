<?php
/**
 * محتوى صفحة خدمة الإليكتروميكانيكال (MEP) - داتا كاملة
 * Standardized to Visionary Theme Service Design
 */
if (!defined('ABSPATH')) exit;
$quotation_url = home_url('/quotation');
$contact_url = home_url('/contact');
?>
<div id="service-details" class="visionary-content-wrap">

<!-- تمهيد (Intro) -->
<section class="py-16 md:py-24 bg-white" aria-label="تمهيد">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <div class="prose prose-lg md:prose-xl max-w-none text-gray-600 leading-relaxed">
            <p class="font-medium text-2xl md:text-3xl text-gray-900 mb-6 leading-relaxed">
                أنظمة ذكية تمنح مبناك <span class="visionary-gradient-text font-bold">الحياة والكفاءة والاستدامة</span>.
            </p>
            <p>
                نقدم حلولاً هندسية متكاملة لأنظمة التكييف، الكهرباء، والسباكة (MEP) تضمن الراحة للمستخدمين، وتوفر في استهلاك الطاقة، وتلتزم بأعلى معايير السلامة والأكواد المحلية والدولية.
            </p>
        </div>
    </div>
</section>

<!-- لماذا تختارنا؟ (3-Column Grid) -->
<section class="py-16 md:py-24 bg-slate-50 relative overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-50 pointer-events-none"></div>
    <div class="container px-4 sm:px-6 max-w-6xl mx-auto text-right relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">لماذا تختارنا؟</h2>
            <div class="w-16 h-1 bg-blue-600 mx-auto rounded-full"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">تصميم هندسي دقيق يعني توفير في تكاليف التشغيل وصيانة أسهل.</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    <span class="font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">كفاءة الطاقة (Green Design)</h3>
                <p class="text-gray-600 leading-relaxed">
                     نصمم أنظمة تكييف وإنارة ذكية تقلل فاتورة الكهرباء بنسبة تصل إلى <strong class="text-green-600">30%</strong>، مما يقلل تكاليف التشغيل (OPEX).
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                     <span class="font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">تنسيق كامل (Zero Clash)</h3>
                <p class="text-gray-600 leading-relaxed">
                    باستخدام تقنية BIM، نضمن عدم تعارض مجاري التكييف مع الجسور الخرسانية أو تمديدات الحريق، مما يمنع التكسير في الموقع.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                     <span class="font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">امتثال وسلامة</h3>
                <p class="text-gray-600 leading-relaxed">
                    تصاميم مطابقة تماماً للكود السعودي (SBC) واشتراطات الدفاع المدني (NFPA)، لضمان تراخيص سريعة ومبنى آمن.
                </p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg hover:-translate-y-1">
                اطلب استشارة MEP <span class="rtl:rotate-180">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ما الذي نقدمه؟ (نطاق خدماتنا) -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 sm:px-6 max-w-6xl mx-auto text-right">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">نطاق خدماتنا (MEP)</h2>
                <p class="text-lg text-gray-600 mb-8">تغطية شاملة لكافة الأنظمة الحيوية في المبنى:</p>
                <ul class="space-y-6">
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <!-- Icon: HVAC -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">أنظمة التكييف والتهوية (HVAC)</h4>
                            <p class="text-gray-600 mt-1">تصميم أنظمة التكييف المركزي، المخفي، والتهوية لضمان جودة الهواء والراحة الحرارية بأقل استهلاك للطاقة.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <!-- Icon: Electrical -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">الأنظمة الكهربائية والإنارة</h4>
                            <p class="text-gray-600 mt-1">توزيع الأحمال، تصميم اللوحات، أنظمة الإنارة (Lighting Design)، والتيار الخفيف (كاميرات، شبكات، سمارت هوم).</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                            <!-- Icon: Plumbing -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">السباكة والصرف الصحي</h4>
                            <p class="text-gray-600 mt-1">شبكات التغذية والصرف، سخانات مركزية، مضخات، وأنظمة معالجة المياه الرمادية.</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                           <!-- Icon: Fire -->
                           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-900">أنظمة مكافحة الحريق</h4>
                            <p class="text-gray-600 mt-1">تصميم شبكات الرش الآلي، إنذار الحريق، وأنظمة الإخلاء المعتمدة من الدفاع المدني.</p>
                        </div>
                    </li>
                </ul>
            </div>
<?php 
            $img_offer = function_exists('get_field') ? get_field('section_image_1') : null;
            $default_img_offer = get_template_directory_uri() . '/assets/images/service-mep.jpg';
            $img_url = ($img_offer && !empty($img_offer['url'])) ? $img_offer['url'] : $default_img_offer;
            ?>
            <div class="relative h-full min-h-[400px] rounded-3xl overflow-hidden shadow-2xl group">
                 <div class="absolute inset-0 bg-gray-900/10 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                 <img src="<?php echo esc_url($img_url); ?>" alt="MEP Engineering" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                 
                 <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/80 to-transparent text-white z-20">
                      <p class="font-bold text-xl">بنية تحتية قوية</p>
                      <p class="text-sm text-gray-300">القلب النابض للمبنى الحديث.</p>
                 </div>
            </div>
        </div>
    </div>
</section>

<!-- كيف ننفذ ذلك؟ (Zigzag Timeline) -->
<section class="py-16 md:py-24 bg-slate-50">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">منهجية العمل (Workflow)</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">خطوات مدروسة لضمان تكامل الأنظمة وكفاءة الأداء.</p>
        </div>

        <div class="relative">
            <!-- Central Line for Desktop -->
            <div class="hidden md:block absolute right-1/2 transform translate-x-1/2 h-full w-0.5 bg-gray-200"></div>

            <?php
            $phases = array(
                array(
                    'title' => 'تحليل الأحمال والمتطلبات',
                    'desc' => 'حساب الأحمال الحرارية والكهربائية (Load Calculation) بدقة بناءً على موقع المبنى واستخدامه لتحديد سعات الأجهزة.',
                    'icon' => '1'
                ),
                array(
                    'title' => 'تصميم الأنظمة واختيار المعدات',
                    'desc' => 'اختيار أفضل المعدات كفاءةً وملاءمة للميزانية، ورسم مخططات التمديدات الأولية.',
                    'icon' => '2'
                ),
                array(
                    'title' => 'تنسيق BIM وكشف التعارضات',
                    'desc' => 'مطابقة مخططات MEP مع المعماري والإنشائي وحل أي تداخلات (Clash Detection) رقمياً قبل التنفيذ.',
                    'icon' => '3'
                ),
                array(
                    'title' => 'المخططات التنفيذية واعتماد المواد',
                    'desc' => 'إصدار مخططات الورشه (Shop Drawings) واعتماد المواد (Material Submittal) لضمان الجودة.',
                    'icon' => '4'
                ),
                array(
                    'title' => 'الإشراف والاختبار',
                    'desc' => 'متابعة التركيبات في الموقع، والفحص المرحلي، ثم إجراء اختبارات التشغيل (Testing & Commissioning).',
                    'icon' => '5'
                ),
            );
            
            foreach ($phases as $i => $p) : 
                $is_even = ($i % 2 == 0);
            ?>
                <div class="relative mb-12 md:mb-0 flex md:items-center <?php echo $is_even ? 'md:flex-row' : 'md:flex-row-reverse'; ?>">
                    <!-- Timeline Dot -->
                    <div class="hidden md:flex absolute right-1/2 transform translate-x-1/2 w-10 h-10 bg-blue-600 rounded-full border-4 border-white shadow-lg items-center justify-center text-white font-bold z-10">
                        <?php echo $p['icon']; ?>
                    </div>
                    
                    <!-- Content Spacer -->
                    <div class="hidden md:block w-1/2"></div>
                    
                    <!-- Content Card -->
                    <div class="w-full md:w-1/2 <?php echo $is_even ? 'md:pl-12' : 'md:pr-12'; ?> pl-10 md:pl-0 border-r-2 md:border-r-0 border-gray-200 md:border-none pr-6 md:pr-0">
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                            <span class="md:hidden inline-block w-8 h-8 bg-blue-600 text-white rounded-full text-center leading-8 font-bold text-sm mb-3"><?php echo $p['icon']; ?></span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo esc_html($p['title']); ?></h3>
                            <p class="text-gray-600 leading-relaxed text-sm"><?php echo esc_html($p['desc']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ما الذي ستحصل عليه؟ (Grid Cards) -->
<section class="py-16 md:py-24 bg-white">
    <div class="container px-4 sm:px-6 max-w-5xl mx-auto text-right">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">مخرجات الخدمة</h2>
            <p class="text-gray-600">ملف هندسي متكامل يضمن دقة التنفيذ</p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">❄️</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">مخططات HVAC</h4>
                    <p class="text-sm text-gray-600">توزيع الدكت، الوحدات، وحسابات الأحمال.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">⚡</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">مخططات الكهرباء</h4>
                    <p class="text-sm text-gray-600">الإنارة، القوى، اللوحات، والتيار الخفيف.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">💧</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">مخططات الصحية</h4>
                    <p class="text-sm text-gray-600">تغذية المياه، الصرف، وشبكات الحريق.</p>
                </div>
            </div>
             <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">📊</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">جداول الكميات (BOQ)</h4>
                    <p class="text-sm text-gray-600">حصر شامل للأنابيب، الكابلات، والوحدات.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">✅</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">مواصفات فنية</h4>
                    <p class="text-sm text-gray-600">تحديد الماركات والمواصفات القياسية للمواد.</p>
                </div>
            </div>
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100 flex gap-4 items-start">
                <div class="text-blue-600 text-xl mt-1">🔒</div>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">اعتمادات الدفاع المدني</h4>
                    <p class="text-sm text-gray-600">مخططات السلامة المعتمدة عند الحاجة.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- الأسئلة الشائعة -->
<section class="py-16 md:py-24 bg-white" id="faq">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <h2 class="text-2xl md:text-3xl font-bold text-blue-600 mb-10">أسئلة شائعة</h2>
        <div class="space-y-6">
            <?php
            $faq_items = array(
                array('ما هي أهمية استخدام BIM في تصميم MEP؟', 'يسمح لنا BIM ببناء نموذج افتراضي كامل للمبنى، مما يمكننا من اكتشاف وحل التعارضات بين الأنظمة المختلفة قبل بدء البناء، وهذا يوفر الوقت والمال ويضمن جودة أعلى.'),
                array('هل يمكن لتصميم MEP الجيد أن يزيد من قيمة العقار؟', 'نعم بالتأكيد. المباني ذات الأنظمة الموفرة للطاقة والمصممة جيدًا تكون تكاليف تشغيلها أقل، مما يجعلها أكثر جاذبية للمشترين والمستأجرين ويزيد من قيمتها على المدى الطويل.'),
                array('متى يجب أن أبدأ في التفكير في تصميم MEP لمشروعي؟', 'في أقرب وقت ممكن. التكامل المبكر لمهندسي MEP مع الفريق المعماري والإنشائي هو مفتاح النجاح لتجنب التعديلات المكلفة وضمان أفضل النتائج.'),
                array('هل يمكن الدمج مع أنظمة ذكية موجودة؟', 'نعم عبر بروتوكولات Modbus/BACnet وفق مواصفاتكم.'),
                array('متى نبدأ MEP؟', 'من مرحلة SD لضمان مساحات الخدمات وتجنّب التعارضات.'),
            );
            foreach ($faq_items as $faq) : ?>
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html($faq[0]); ?></h3>
                    <p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html($faq[1]); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA ختامي -->
<section class="py-20 md:py-24 bg-blue-600">
    <div class="container px-4 sm:px-6 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">هل أنت مستعد لبناء مبنى يعمل بذكاء؟</h2>
        <p class="text-blue-100 mb-8">تواصل معنا اليوم للحصول على استشارة حول أنظمة MEP لمشروعك.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold bg-white text-blue-600 hover:bg-blue-50 transition shadow-lg">احجز استشارة مجانية</a>
            <a href="<?php echo esc_url($quotation_url); ?>" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-bold border-2 border-white text-white hover:bg-white/10 transition">اطلب عرض سعر لأنظمة MEP</a>
        </div>
    </div>
</section>

<?php
$faq_schema = array(
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array(
        array('@type' => 'Question', 'name' => 'ما هي أهمية استخدام BIM في تصميم MEP؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'يسمح لنا BIM ببناء نموذج افتراضي كامل للمبنى، مما يمكننا من اكتشاف وحل التعارضات بين الأنظمة المختلفة قبل بدء البناء، وهذا يوفر الوقت والمال ويضمن جودة أعلى.')),
        array('@type' => 'Question', 'name' => 'هل يمكن لتصميم MEP الجيد أن يزيد من قيمة العقار؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'نعم بالتأكيد. المباني ذات الأنظمة الموفرة للطاقة والمصممة جيدًا تكون تكاليف تشغيلها أقل، مما يجعلها أكثر جاذبية للمشترين والمستأجرين ويزيد من قيمتها على المدى الطويل.')),
        array('@type' => 'Question', 'name' => 'متى يجب أن أبدأ في التفكير في تصميم MEP لمشروعي؟', 'acceptedAnswer' => array('@type' => 'Answer', 'text' => 'في أقرب وقت ممكن. التكامل المبكر لمهندسي MEP مع الفريق المعماري والإنشائي هو مفتاح النجاح لتجنب التعديلات المكلفة وضمان أفضل النتائج.')),
    ),
);
?>
<script type="application/ld+json"><?php echo wp_json_encode($faq_schema); ?></script>
</div>
