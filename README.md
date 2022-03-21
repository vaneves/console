# Console

PHP Simple Console

## Install

```bash
composer require vaneves/console
```

## Basic Usage

```php
require_once('../vendor/autoload.php');

use Vaneves\Console\Console;
```

### Console

```php
use Vaneves\Console\Console;

$console = new Console();

$console->title('A highlighted title for the section');

$console->line('A regular line.');

$console->success('Operation executed successfully!');
$console->info('This is just highlighted information.');
$console->warning('This requires your attention!');
$console->error('Oops! Error during execution!');
$console->comment('Just a comment.');
$console->comment('Just a comment without slash.', false);

$console->successWithIcon('Operation executed successfully!');
$console->infoWithIcon('This is just highlighted information.');
$console->warningWithIcon('This requires your attention!');
$console->errorWithIcon('Oops! Error during execution!');

$console->successWithIcon('Operation executed successfully!', '❤');
$console->infoWithIcon('This is just highlighted information.', '➥');
$console->warningWithIcon('This requires your attention!', '➤');
$console->errorWithIcon('Oops! Error during execution!', '✖');
```

Output:

```bash
===================================
A highlighted title for the section
===================================

A regular line.
Operation executed successfully!
This is just highlighted information.
This requires your attention!
Oops! Error during execution!
// Just a comment.
Just a comment without slash.
✔ Operation executed successfully!
☛ This is just highlighted information.
⚠ This requires your attention!
✘ Oops! Error during execution!
❤ Operation executed successfully!
➥ This is just highlighted information.
➤ This requires your attention!
✖ Oops! Error during execution!
```

### Progress

```php
use Vaneves\Console\Progress;

$total = 150;

$progress = new Progress($total);
$progress->start();

for ($i = 1; $i <= $total; $i++) {
    $progress->advance();
    usleep(30000);
}
$progress->finish();
```

Output:

```bash
74/150 [▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░] 49%
```

### Table

```php
use Vaneves\Console\Table;

$data = [
    [
        'name' => 'Van Neves',
        'domain' => 'vaneves.com',
        'profession' => 'PHP Developer',
    ],
    [
        'name' => 'Luiz Carvalho',
        'domain' => 'luizcarvalho.com',
        'profession' => 'Ruby Developer',
    ],
    [
        'name' => 'Nyl Marcos',
        'domain' => '',
        'profession' => 'PHP Developer',
    ],
];

$table = new Table($data);
$table->show();
```

Output:

```bash
+---------------+------------------+----------------+
| name          | domain           | profession     |
+---------------+------------------+----------------+
| Van Neves     | vaneves.com      | PHP Developer  |
| Luiz Carvalho | luizcarvalho.com | Ruby Developer |
| Nyl Marcos    |                  | PHP Developer  |
+---------------+------------------+----------------+
```

### Padding

```php
use Vaneves\Console\Padding;

$padding = new Padding(20);
$padding->line('Apples', '$0.99');
$padding->line('Bananas', '$0.39');
$padding->line('Clementines', '$3.99');
$padding->line('Lemons', '$0.69');
$padding->line('Strawberriess', '$1.99');
```

Output:

```bash
Apples.........$0.99
Bananas........$0.39
Clementines....$3.99
Lemons.........$0.69
Strawberriess..$1.99
```