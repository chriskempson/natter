<?php

function discussion($file = 'posts.json') 
{
    // Create the file if it doesn't exist
    create_json_file($file);

    // Who are you? Who who, who who.
    $user_id = session('user')['id'];

    // Hide from the public
    // if (!$user_id) {
    //     die('You are not logged in');
    // }

    // Load all posts
    $posts = read_json_file($file);

    // Set $query to hold query string vars
    if (isset($_SERVER['QUERY_STRING'])) {
        parse_str($_SERVER['QUERY_STRING'], $query);
    }

    // Handle post deletion
    if (isset($query['delete'])) {
        $post_id = $query['delete'];
        $post = $posts[$post_id - 1];

        // Remove matching post from array if author is equal to current user
        if ($post['author'] == $user_id) {

            // Remove the post from the array
            unset($posts[$post_id - 1]);

            // Save all the posts again
            write_json_file($file, $posts);

            echo '<div class="message">Your post has been deleted.</div>';
        } 
        else {
            echo '<div class="message">You cannot delete post #' . $post_id . ' as you did not create it.</div>';
        }
    }

    // Handle post editing
    else if (isset($query['edit'])) {

        $post_id = $query['edit'];
        $post = $posts[$post_id - 1];

        // Check if current user is author
        if ($post['author'] == $user_id) {

            if (isset($_POST['message'])) {

                // Prepare the message
                $message = strip_tags($_POST['message']);

                $posts[$post_id - 1]['message'] = $message;
                $posts[$post_id - 1]['edited'] = gmdate('Y-m-d H:m');

                // Save all the posts again
                write_json_file($file, $posts);

                echo '<div class="message">Your post has been edited.</div>';
            }
            else {
                echo '<style>.post.hide.id' . ($post_id)   .' { display: block }</style>';
            }
        } 
        else {
            echo '<div class="message">You cannot edit post #' . $post_id . ' as you did not create it.</div>';
        }
    }

    // Handle new posts
    else if (isset($query['new'])) {

        // Prepare the message
        $message = strip_tags($_POST['message']);

        // Prevent the same user from posting the same thing
        $last_post = @end($posts);
        if ($last_post['author'] == $user_id
            && $last_post['message'] == $message) {
            echo '<div class="message">Your message is the same as your last message.</div>';
        }
        else {

            // Build new post 
            $new_post[] = [
                'date' => gmdate('Y-m-d H:m'),
                'author' => $user_id,
                'message' => $message
            ];
        
            // Add the new post to the previous posts if there are any
            if ($posts) {
                $posts = array_merge($posts, $new_post);
            } else {
                $posts = $new_post;
            }
        
            // Save all the posts again
            write_json_file($file, $posts);
        }

    }

    $i = 1;
    if (is_array($posts)) {
        foreach ($posts as $post) {
            $post['id'] = $i++;
            partial('discussion-post', ['post' => $post]);
        }
    }

    echo partial('discussion-form');
}

function new_thread($path, $variables, $template = 'thread-template.txt') 
{
    if (!session('user')) return;

    // Make directories
    if (!file_exists($path)) {
        mkdir(DOCUMENT_ROOT . $path, 0777, true);
    }
    
    // Read template file
    $template = file_get_contents(PLUGIN_PATH . 'discussion/' . $template);

    // Replace {{vars}}
    $search = [ 
        '{{title}}', '{{date}}', '{{author}}' 
    ];
    $replace = [ 
        $variables['title'], $variables['date'], $variables['author']
    ];
    $template = str_replace($search, $replace, $template);

    // Write the template to the new location
    file_put_contents(DOCUMENT_ROOT . $path . '/index.php', $template);
}