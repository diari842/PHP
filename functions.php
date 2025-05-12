if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array(
        'key' => 'group_homepage_content',
        'title' => 'Homepage Content',
        'fields' => array(
            array(
                'key' => 'field_hero_image',
                'label' => 'Hero Image',
                'name' => 'hero_image',
                'type' => 'file',
                'instructions' => 'Upload a hero image (JPG, PNG, WebP).',
                'required' => 1,
                'return_format' => 'array',
                'library' => 'all',
                'mime_types' => 'jpg,jpeg,png,webp',
            ),
            array(
                'key' => 'field_hero_text',
                'label' => 'Hero Text',
                'name' => 'hero_text',
                'type' => 'wysiwyg',
                'instructions' => 'Enter the text to display over the hero image.',
                'required' => 1,
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 0,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'style' => 'default',
        'position' => 'normal',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
        'description' => '',
    ));

}
