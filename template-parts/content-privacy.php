<?php
/**
 * محتوى سياسة الخصوصية فقط — لا يُستخدم للشروط والأحكام
 * يُستدعى من page-privacy.php فقط
 */
if (!defined('ABSPATH')) exit;
$privacy_updated = isset($privacy_updated) ? $privacy_updated : '1 يناير 2025';
$privacy_email  = isset($privacy_email) ? $privacy_email : get_bloginfo('admin_email');
$privacy_phone  = isset($privacy_phone) ? $privacy_phone : '';
$privacy_address = isset($privacy_address) ? $privacy_address : '';
?>
<section class="py-12 md:py-20 bg-white">
    <div class="container px-4 sm:px-6 max-w-4xl mx-auto text-right">
        <p class="text-sm text-gray-500 mb-10">تاريخ آخر تحديث: <strong><?php echo esc_html($privacy_updated); ?></strong></p>

        <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-10">
            تحترم شركة قيمة جروب خصوصيتك وتلتزم بحماية بياناتك الشخصية عند استخدامك لموقعنا الإلكتروني أو التواصل معنا عبر القنوات المختلفة. توضح هذه السياسة نوع البيانات التي نجمعها، وكيف نستخدمها، ومع من نشاركها، والخيارات والحقوق المتاحة لك.
        </p>

        <div class="space-y-10">
            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">1) من نحن</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    قيمة جروب هي شركة تقدم خدمات هندسية تشمل — على سبيل المثال لا الحصر — (تصميم/تنفيذ/إشراف/توريد/استشارات/صيانة) وفقًا لطبيعة أعمال الشركة.
                </p>
                <p class="text-sm font-medium text-gray-800 mb-2">بيانات التواصل الرسمية:</p>
                <ul class="space-y-1 text-gray-700 text-sm md:text-base">
                    <li>البريد الإلكتروني: <?php echo $privacy_email ? '<a href="mailto:' . esc_attr($privacy_email) . '" class="text-blue-600 hover:underline">' . esc_html($privacy_email) . '</a>' : '(أضف البريد في إعدادات الثيم أو في هذا القالب)'; ?></li>
                    <li>رقم الهاتف: <?php echo $privacy_phone ? esc_html($privacy_phone) : '(أضف رقم الهاتف)'; ?></li>
                    <li>العنوان: <?php echo $privacy_address ? esc_html($privacy_address) : '(أضف العنوان)'; ?></li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">2) نطاق تطبيق هذه السياسة</h2>
                <p class="text-gray-700 leading-relaxed mb-3">تنطبق هذه السياسة على:</p>
                <ul class="space-y-3 text-gray-700">
                    <li>زوار الموقع وصفحاته ونماذج التواصل.</li>
                    <li>العملاء المحتملين الذين يطلبون عروض أسعار أو معلومات.</li>
                    <li>العملاء الحاليين عند استخدام قنواتنا الرقمية (مثل نموذج إرسال ملفات/مرفقات).</li>
                    <li>المتقدمين للتوظيف في حال توفر صفحة "وظائف".</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">3) البيانات التي نجمعها</h2>
                <p class="text-gray-700 leading-relaxed mb-4">قد نجمع البيانات التالية بحسب طريقة تفاعلك معنا:</p>
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">أ) بيانات تقدمها أنت مباشرةً</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li><strong>بيانات التعريف والتواصل:</strong> الاسم، رقم الهاتف، البريد الإلكتروني، الشركة/الجهة، المسمى الوظيفي.</li>
                            <li><strong>بيانات الطلبات والاستفسارات:</strong> تفاصيل الخدمة المطلوبة، موقع المشروع (على مستوى المدينة/المنطقة)، نطاق العمل، الجدول الزمني، الميزانية التقديرية إن وُجدت.</li>
                            <li><strong>المرفقات:</strong> ملفات مثل (مخططات، BOQ، صور موقع، مستندات فنية) عند إرسالها لنا لطلب عرض سعر/دراسة مشروع.</li>
                            <li><strong>المراسلات:</strong> أي محتوى تكتبه في نماذج الاتصال أو رسائل البريد/واتساب/الرسائل.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">ب) بيانات نجمعها تلقائيًا عند استخدام الموقع</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li><strong>بيانات تقنية واستخدام:</strong> عنوان IP (بشكل قد يكون مُقنّعًا/مختصرًا حسب الإعدادات)، نوع الجهاز والمتصفح، نظام التشغيل، الصفحات التي تزورها، مدة الزيارة، مصادر الإحالة.</li>
                            <li><strong>ملفات تعريف الارتباط (Cookies):</strong> لتحسين التجربة، وحفظ التفضيلات، وقياس الأداء.</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">ج) بيانات من أطراف ثالثة (عند الحاجة)</h3>
                        <p class="text-gray-700 leading-relaxed">قد نستقبل بياناتك عبر:</p>
                        <ul class="space-y-3 text-gray-700 mt-2">
                            <li>منصات الإعلانات/التحليلات (إذا فعلنا حملات تسويقية).</li>
                            <li>شركاء أو عملاء قاموا بإحالتك إلينا بموافقتك أو ضمن تواصل مهني مشروع.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">4) كيف نستخدم بياناتك</h2>
                <p class="text-gray-700 leading-relaxed mb-3">نستخدم بياناتك للأغراض التالية:</p>
                <ul class="space-y-3 text-gray-700">
                    <li>الرد على استفساراتك وتقديم معلومات عن خدماتنا.</li>
                    <li>إعداد عروض الأسعار والمقترحات الفنية وتقدير تكلفة/زمن التنفيذ بناءً على بيانات المشروع.</li>
                    <li>إدارة العلاقة مع العملاء بما يشمل المتابعة، الفوترة، وإدارة العقود (عند التعاقد).</li>
                    <li>تحسين الموقع والخدمات عبر فهم سلوك الاستخدام وتحليل الأداء.</li>
                    <li><strong>التسويق والتواصل (اختياري):</strong> إرسال تحديثات أو عروض مرتبطة بخدماتنا إذا وافقت على ذلك، مع إمكانية إلغاء الاشتراك في أي وقت.</li>
                    <li><strong>الامتثال القانوني وحماية الحقوق:</strong> عند وجود متطلبات تنظيمية أو نزاعات أو منع إساءة الاستخدام.</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">5) الأساس النظامي لمعالجة البيانات</h2>
                <p class="text-gray-700 leading-relaxed mb-3">نعالج بياناتك عندما يكون ذلك:</p>
                <ul class="space-y-3 text-gray-700">
                    <li>ضروريًا لتنفيذ طلبك (مثل طلب عرض سعر أو خدمة).</li>
                    <li>بناءً على موافقتك (مثل الاشتراك في رسائل تسويقية).</li>
                    <li>لتحقيق مصلحة مشروعة (مثل تحسين خدماتنا وتأمين الموقع ومنع الاحتيال) بشرط عدم تعارض ذلك مع حقوقك.</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">6) مشاركة البيانات مع أطراف أخرى</h2>
                <p class="text-gray-700 leading-relaxed mb-3">لا نبيع بياناتك الشخصية. وقد نشارك بياناتك بالحد الأدنى اللازم مع:</p>
                <ul class="space-y-3 text-gray-700">
                    <li>مزودي خدمات يساعدوننا في تشغيل الموقع (استضافة، بريد إلكتروني، تحليلات، أنظمة CRM).</li>
                    <li>شركاء/مقاولين فرعيين عند الحاجة لتنفيذ الخدمة أو تقديم عرض فني (ضمن التزامهم بالسرية).</li>
                    <li>جهات رسمية أو قانونية إذا طُلب منا ذلك وفقًا لإجراءات نظامية أو لحماية حقوقنا.</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-4">نحرص على أن تكون أي مشاركة وفق ضوابط تعاقدية تحمي سرية البيانات وأمنها قدر الإمكان.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">7) ملفات تعريف الارتباط (Cookies)</h2>
                <p class="text-gray-700 leading-relaxed mb-3">قد يستخدم الموقع ملفات تعريف الارتباط من أجل:</p>
                <ul class="space-y-3 text-gray-700">
                    <li>تشغيل وظائف أساسية بالموقع (ضرورية).</li>
                    <li>تحسين الأداء وتجربة المستخدم.</li>
                    <li>قياس الزيارات وتحليل التفاعل (Analytics).</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-4">يمكنك التحكم في الكوكيز من خلال إعدادات المتصفح. ملاحظة: تعطيل بعض الكوكيز قد يؤثر على وظائف الموقع.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">8) الاحتفاظ بالبيانات</h2>
                <p class="text-gray-700 leading-relaxed mb-3">نحتفظ ببياناتك لمدة لا تزيد عن الحاجة لتحقيق الأغراض المذكورة، مثل:</p>
                <ul class="space-y-3 text-gray-700">
                    <li><strong>بيانات الاستفسارات:</strong> عادةً لفترة مناسبة للمتابعة التجارية وخدمة العملاء.</li>
                    <li><strong>بيانات العملاء المتعاقدين:</strong> لفترة ترتبط بمتطلبات العقود والسجلات المالية/الإدارية.</li>
                    <li><strong>سجلات الموقع والتحليلات:</strong> لفترات قياسية لتحسين الأداء والأمان.</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">9) حماية وأمن البيانات</h2>
                <p class="text-gray-700 leading-relaxed mb-3">نطبق إجراءات تنظيمية وتقنية مناسبة لحماية البيانات، مثل:</p>
                <ul class="space-y-3 text-gray-700">
                    <li>تقييد الوصول للبيانات على الموظفين المخولين فقط.</li>
                    <li>استخدام بروتوكولات آمنة (مثل HTTPS) متى كان ذلك متاحًا.</li>
                    <li>إجراءات نسخ احتياطي ومراقبة تقنية للحد من المخاطر.</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-4">ومع ذلك، لا يمكن ضمان أمان الإنترنت 100%، لكننا نبذل أقصى جهد معقول لحماية بياناتك.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">10) حقوقك وخياراتك</h2>
                <p class="text-gray-700 leading-relaxed mb-3">وفقًا للتشريعات المعمول بها، قد تكون لك الحقوق التالية:</p>
                <ul class="space-y-3 text-gray-700">
                    <li>طلب الوصول إلى بياناتك أو الحصول على نسخة منها.</li>
                    <li>طلب تصحيح بيانات غير دقيقة.</li>
                    <li>طلب حذف بياناتك أو تقييد معالجتها في حالات معينة.</li>
                    <li>سحب الموافقة على التسويق في أي وقت.</li>
                    <li>الاعتراض على بعض أنواع المعالجة عند توافر المبرر.</li>
                </ul>
                <p class="text-gray-700 leading-relaxed mt-4">لتقديم طلب متعلق ببياناتك، تواصل معنا عبر: <?php echo $privacy_email ? '<a href="mailto:' . esc_attr($privacy_email) . '" class="text-blue-600 hover:underline font-medium">' . esc_html($privacy_email) . '</a>' : '(البريد/الهاتف أعلاه)'; ?>.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">11) خصوصية الأطفال</h2>
                <p class="text-gray-700 leading-relaxed">خدماتنا وموقعنا ليست موجهة للأطفال. إذا كنت ولي أمر وتعتقد أن طفلك زودنا ببيانات شخصية، يرجى التواصل معنا لحذفها.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">12) روابط ومواقع الطرف الثالث</h2>
                <p class="text-gray-700 leading-relaxed">قد يتضمن موقعنا روابط لمواقع خارجية. نحن غير مسؤولين عن سياسات الخصوصية لتلك المواقع، ويُنصح بمراجعتها قبل تزويدهم بأي بيانات.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">13) نقل البيانات خارج بلدك</h2>
                <p class="text-gray-700 leading-relaxed">قد تُعالج بياناتك عبر مزودي خدمات (استضافة/أدوات) موجودين في دول أخرى. في هذه الحالة نحرص على تطبيق ضوابط تعاقدية وإجرائية لحماية البيانات قدر الإمكان.</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-blue-600 mb-4 pb-2 border-b border-gray-200">14) التعديلات على سياسة الخصوصية</h2>
                <p class="text-gray-700 leading-relaxed">قد نقوم بتحديث هذه السياسة من وقت لآخر. سيتم نشر أي تعديل على هذه الصفحة مع تحديث تاريخ "آخر تحديث". استمرار استخدامك للموقع بعد التعديلات يعني اطلاعك عليها.</p>
            </div>
        </div>
    </div>
</section>
