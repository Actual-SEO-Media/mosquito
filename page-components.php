<?php

/**
* Template Name: Components Page
*/

use Timber\Timber;

$context = Timber::context();

Timber::render('templates/page-components.twig', $context);
