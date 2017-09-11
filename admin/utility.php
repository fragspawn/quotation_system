<?php
/*
 * What method should be best suited to protect our server from unwanted user input
 * Write a function that cleans up, and checks input against an ideal kind of input
 *
 * This is a research exercise, as much as anything, to ensure you are dealing with
 * input that is assumed by design, but users may have less than ideal intent for
 * your server.
 *
 * <?php session_destroy(); ?>
 * <script>Some code here</script>
 * 
 * $x[] = 'foo';
 * 
 */


function util_validity_check($untrusted, $regex) {
    $trusted = stripslashes($untrusted);

    $trusted = preg_replace('/<\?*(.*?)\?>/is', "", $trusted);
    $trusted = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $trusted);

    $trusted = strip_tags($trusted);
    $trusted = htmlspecialchars($trusted);
    $trusted = trim($trusted); 

// todo regex
    return $trusted;

}


/*
 * A reliable, secret password encryption technique is mandatory for Internet facing sites
 *
 * Problem is, that most encryption techniques are insecure
 *
 * PHP is one of the few languages that get this right.
 * Can you find the technique for encrypting passwords
 * SECURELY?
 *  MD5 & SHA256 are not secure!
 *  
 */

function encrypt_password($p) {
    // Option 2
    $new_p = base64_encode(hash('sha512', $p, 'The quick brown fox jumped over the lazy dog.'));
    return $new_p;
}

?>













