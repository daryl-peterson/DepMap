<?php
/*
 * Dependency Visualisation logic:
 * Copyright (c) 2018 Arturs Plisko <https://github.com/blizko http://www.blizko.lv>
 *
 * Based on LibreNMS Map module
 * Copyright (c) 2014 Neil Lathwood <https://github.com/laf/ http://www.lathwood.co.uk/fa>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE at the top level of
 * the source code distribution for details.
 */

use LibreNMS\Plugin\DepMap\DepMapper;

$objMapper = new DepMapper();
$objMapper->initialize();

if ($objMapper->hasDependency()){

?>

    <div id="visualization"></div>
    <script src="js/vis.min.js"></script>
    <script type="text/javascript">
        var height = $(window).height() - 100;
        $('#visualization').height(height + 'px');
        // create an array with nodes
        var nodes = <?php echo $objMapper->getNodes(); ?>;

        // create an array with edges
        var edges = <?php echo $objMapper->getEdges(); ?>;
        // create a network
        var container = document.getElementById('visualization');
        var data = {
            nodes: nodes,
            edges: edges,
            stabilize: true
        };
        var options = <?php echo $config['network_map_vis_options']; ?>;
        var network = new vis.Network(container, data, options);
        network.on('click', function (properties) {
        });
    </script>

<?php

} else {
    print_message("No map to display, this may be because you don't have any defined device dependencies.");
}

$pagetitle[] = "Dependency Map";
