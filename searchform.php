<?php
/**
 * نموذج البحث - نصوص عربية
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label class="block text-sm font-medium text-gray-700 mb-2">
		<span class="screen-reader-text"><?php echo esc_html_x('ابحث عن:', 'label', 'qeema-theme'); ?></span>
	</label>
	<input type="search" class="w-full h-12 rounded-lg border border-gray-300 px-4 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" placeholder="<?php echo esc_attr_x('ابحث في المدونة...', 'placeholder', 'qeema-theme'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="mt-3 w-full md:w-auto bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
		<?php echo esc_html_x('بحث', 'submit button', 'qeema-theme'); ?>
	</button>
</form>
