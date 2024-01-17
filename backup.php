<?php
use App\Layout;

$obj = new SampleNamespace\MyClass;

$test = new Layout();

$test->header();

$obj->show();

$test->footer();