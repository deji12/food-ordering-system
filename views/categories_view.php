<?php

require_once '../Category/category.php';

function display_categories() {

    $initialise_category_class = new Category();
    $get_categories = $initialise_category_class->get_categories();

    foreach($get_categories as $item) {
        echo '<tr>
                <td>' . $item["category_name"] . '</td>
                <td>' . $item["number_of_sales"] . '</td>
                <td>' . $item["total_amount_sold"] . '</td>
                <td><a href="#" class="btn-small d-block">Edit</a></td>
            </tr>';
    }

}