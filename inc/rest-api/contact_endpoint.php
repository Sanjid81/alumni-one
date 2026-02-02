<?php


function contact_endpoint()
{
    register_rest_route('nh/v1', '/contact-form/', array(
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => 'nh_handle_contact_submission',
        'permission_callback' => '__return_true', // Publicly accessible
    ));
}
add_action('rest_api_init', 'contact_endpoint');

/**
 * Handle contact form submission
 *
 * @param WP_REST_Request $request
 * @return WP_Error|array
 */

 function nh_handle_contact_submission(WP_REST_Request $request)
{
     $params = $request->get_json_params();

    if (empty($params)) {
        return new WP_Error('no_data', 'No data received', array('status' => 400));
    }

    // Get the admin email
    $admin_email = carbon_get_theme_option('email') ?? get_option('admin_email');

    // Get the form fields from the frontend
    $name = isset($params['name']) ? sanitize_text_field($params['name']) : '';
    $user_email = isset($params['email']) ? sanitize_email($params['email']) : '';
    $organization = isset($params['organization']) ? sanitize_text_field($params['organization']) : '';
    $phone = isset($params['phone']) ? sanitize_text_field($params['phone']) : '';

    // Prepare the message for the admin email
    $admin_subject = 'New Contact Form Submission';
    $admin_message = "You have a new contact form submission:\n\n" .
                     "Name: $name\n" .
                     "Email: $user_email\n" .
                     "Organization: $organization\n" .
                     "Phone: $phone";

    // Prepare the message for the user email
    $user_subject = 'Thank you for contacting us';
    $user_message = "Hi $name,\n\n" .
                    "Thank you for reaching out. We have received your message and will get back to you soon.\n\n" .
                    "Here is a copy of your submission details:\n" .
                    "Name: $name\n" .
                    "Organization: $organization\n" .
                    "Phone: $phone";

    //HEADER FOR ADMIN 
    $admin_headers = array();
    if (!empty($user_email)) {
        $admin_headers[] = 'Reply-To: ' . $user_email;
    }
    //HEADER FOR USER 
    $user_headers = array();
    if (!empty($admin_email)) {
        $user_headers[] = 'Reply-To: ' . $admin_email;
    }

    // Send email to the admin
    wp_mail($admin_email, $admin_subject, $admin_message, $admin_headers);
    
    // Send email to the user (if their email is provided)
    if (!empty($user_email)) {
        wp_mail($user_email, $user_subject, $user_message, $user_headers);
    }

    return new WP_REST_Response(array(
        'success' => true,
        'message' => 'Data received and emails sent successfully. Thanks for contacting us.',
        'data' => $params
    ), 200);
}