<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as BreadcrumbTrail;



// Home > Categories > [Category]
Breadcrumbs::for('notes', function (BreadcrumbTrail $trail) {
    $trail->push('Заметки', route('notes.show'));
});

// Home > Categories > [Category] > [Product]
Breadcrumbs::for('note', function (BreadcrumbTrail $trail, $note) {
    $trail->parent('notes', $note->category);
    $trail->push($note->name, route('notes.show', $note->id));
});
