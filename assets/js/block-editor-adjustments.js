// Removes "layout" panel from gutenberug 
// Loaded via cleanup.php

wp.hooks.addFilter(
    "blocks.registerBlockType",
    "mno/block-features",
    customizeBlockFeatures
);

function customizeBlockFeatures(settings, name) {
    // Disable layout options for group blocks
    groups = ['core/group','core/cover'];
    if (groups.includes(name)) {
        settings.supports.layout = false;
    }

    return settings;
}
