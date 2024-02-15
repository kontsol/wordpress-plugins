<?php 

add_action( 'rest_api_init', 'register_custom_search_endpoint' );

function register_custom_search_endpoint() {
    register_rest_route( 'custom/v1', '/search/', array(
        'methods'  => 'GET',
        'callback' => 'handle_custom_search_request',
    ) );
}

function handle_custom_search_request( $data ) {
    // Retrieve the search query parameter from the request
    $search_query = $data['search_query'];

    // Perform the search query to fetch posts whose titles contain the search query
    $search_results = get_posts( array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1, // Retrieve all posts
        's'              => $search_query, // Search query
    ) );

    // Prepare the response data
    $response_data = array();
    foreach ( $search_results as $post ) {
        $response_data[] = array(
            'title' => $post->post_title,
            'link'  => get_permalink( $post->ID ),
        );
    }

    // Return the response data
    return $response_data;
}


?>