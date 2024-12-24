<?php
// Define a function named 'sort_subnets' for custom sorting of IP subnets
function sort_subnets ($x, $y) {
    // Split IP subnets into arrays of octets
    $x_arr = explode('.', $x);
    $y_arr = explode('.', $y);

    // Iterate through each octet and compare values
    foreach (range(0,3) as $i) {
        // If the current octet in $x is less than the current octet in $y, return -1 (indicating $x comes first)
        if ( $x_arr[$i] < $y_arr[$i] ) {
            return -1;
        }
        // If the current octet in $x is greater than the current octet in $y, return 1 (indicating $y comes first)
        elseif ( $x_arr[$i] > $y_arr[$i] ) {
            return 1;
        }
    }

    // If all octets are equal, return -1 (indicating $x comes first)
    return -1;
}

// Define an array of IP subnets
$subnet_list = array(
    '192.169.12',
    '192.167.11',
    '192.169.14',
    '192.168.13',
    '192.167.12',
    '122.169.15',
    '192.167.16'
);

// Use 'usort' function to sort the array of IP subnets using the 'sort_subnets' custom sorting function
usort($subnet_list, 'sort_subnets');

// Print the sorted array of IP subnets
print_r($subnet_list);
?>