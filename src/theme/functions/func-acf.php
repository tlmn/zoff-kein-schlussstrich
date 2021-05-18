<?php

function KS_acf_register_json_fields()
{
    if (function_exists("acf_add_local_field_group")) {
        $acf_json_data = file_get_contents(get_template_directory() + "/assets/acf/fields.json");
        $custom_fields = $acf_json_data ? json_decode(file_get_contents($acf_json_data), true) : array();

        foreach ($custom_fields as $custom_field) {
            acf_add_local_field_group($custom_field);
        }
    }
}
add_action("init", "KS_acf_register_json_fields");
