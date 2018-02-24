<?php

namespace SpencerMortensen\Paths;


// Test
$paths = new PosixPaths();
$input = new PosixPathData(array(), true);
$output = $paths->serialize($input);

// Output
$output = '/';


// Test
$paths = new PosixPaths();
$input = new PosixPathData(array(), false);
$output = $paths->serialize($input);

// Output
$output = '.';


// Test
$paths = new PosixPaths();
$input = new PosixPathData(array('etc', 'fstab'), true);
$output = $paths->serialize($input);

// Output
$output = '/etc/fstab';


// Test
$paths = new PosixPaths();
$input = new PosixPathData(array('etc', 'fstab'), false);
$output = $paths->serialize($input);

// Output
$output = 'etc/fstab';


// Test
$paths = new PosixPaths();
$output = $paths->deserialize($input);

// Input
$input = '/';

// Output
$output = new PosixPathData(array(), true);

// Input
$input = '';

// Output
$output = new PosixPathData(array(), false);

// Input
$input = '/etc/fstab';

// Output
$output = new PosixPathData(array('etc', 'fstab'), true);

// Input
$input = 'etc/fstab';

// Output
$output = new PosixPathData(array('etc', 'fstab'), false);


// Test
$paths = new PosixPaths();
$output = call_user_func_array(array($paths, 'join'), $input);

// Input
$input = array();

// Output
$output = null;

// Input
$input = array('/');

// Output
$output = '/';

// Input
$input = array('/etc', 'fstab');

// Output
$output = '/etc/fstab';

// Input
$input = array('etc', 'fstab');

// Output
$output = 'etc/fstab';

// Input
$input = array(array('etc', 'fstab'));

// Output
$output = 'etc/fstab';


// Test
$paths = new PosixPaths();
$c = $paths->isChildPath($a, $b);

// Input
$a = '';
$b = '';

// Output
$c = false;

// Input
$a = '/';
$b = '';

// Output
$c = false;

// Input
$a = '';
$b = '/';

// Output
$c = false;

// Input
$a = '/';
$b = '/';

// Output
$c = true;

// Input
$a = '/etc';
$b = '/';

// Output
$c = false;

// Input
$a = '/etc';
$b = '/bin';

// Output
$c = false;

// Input
$a = '/etc';
$b = '/etc';

// Output
$c = true;

// Input
$a = '/etc';
$b = '/etc/fstab';

// Output
$c = true;


// Test
$paths = new PosixPaths();
$c = $paths->getRelativePath($a, $b);

// Input
$a = '';
$b = '';

// Output
$c = null;

// Input
$a = '/';
$b = '';

// Output
$c = null;

// Input
$a = '';
$b = '/';

// Output
$c = null;

// Input
$a = '/';
$b = '/';

// Output
$c = '.';

// Input
$a = '/etc';
$b = '/';

// Output
$c = '..';

// Input
$a = '/etc';
$b = '/bin';

// Output
$c = '../bin';

// Input
$a = '/etc';
$b = '/etc';

// Output
$c = '.';

// Input
$a = '/etc';
$b = '/etc/fstab';

// Output
$c = 'fstab';

// Input
$a = '/etc/profile';
$b = '/bin/bash';

// Output
$c = '../../bin/bash';

// Input
$a = '/etc/profile';
$b = '/etc/profile.d';

// Output
$c = '../profile.d';