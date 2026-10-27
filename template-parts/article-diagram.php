<?php
$diagram = isset($args['diagram']) ? $args['diagram'] : '';

$diagrams = array(
    'rag' => array(
        'file' => 'nexora-diagram-rag-flow.svg',
        'alt' => __('Retrieval augmented generation flow diagram', 'nexora'),
        'caption' => __('Retrieval augmented generation flow', 'nexora'),
    ),
    'api' => array(
        'file' => 'nexora-diagram-api-flow.svg',
        'alt' => __('API flow diagram', 'nexora'),
        'caption' => __('API request and response flow', 'nexora'),
    ),
);

if (!isset($diagrams[$diagram])) {
    return;
}
?>
<figure class="nexora-article-diagram">
    <img src="<?php echo esc_url(get_theme_file_uri('assets/diagrams/' . $diagrams[$diagram]['file'])); ?>" alt="<?php echo esc_attr($diagrams[$diagram]['alt']); ?>">
    <figcaption><?php echo esc_html($diagrams[$diagram]['caption']); ?></figcaption>
</figure>
