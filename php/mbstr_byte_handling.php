<?php 

// Testing mb_str* functions

function run_commands($vars, $commands) {  
    $output = '';
    foreach ($commands as $command) {
        $output .= $command;
        if (function_exists(substr($command, 0, strpos($command, '(')))) {
            $output .= ': ';
            $output .= eval('extract(unserialize(\''.serialize($vars).'\'), EXTR_SKIP); return '.$command.';');
        }
        $output .= "\n";
    }
    return $output;
}

$s = 'ルビ ンツア'

?>

LC_CTYPE environmental var is "<?php echo getenv('LC_CTYPE') ?>"
MB string overload is <?php echo ini_get('mbstring.func_overload') & (1<<2) ? 'on' : 'off' ?>
MB Internal encoding is <?php echo mb_internal_encoding() ?>

<?php mb_internal_encoding('UTF-8'); ?>
MB Internal encoding is <?php echo mb_internal_encoding() ?>

Testing string "<?php echo $s ?>"

<?php 

echo run_commands(array(
    's' => $s
), array(
    'strlen($s)',
    'mb_strlen($s)',
    'mb_strlen($s, \'8bit\')',
    '',
    'substr($s,1,2)',
    'mb_substr($s,1,2)',
    'mb_substr($s,1,2,\'8bit\')',
    'mb_strcut($s,1,2)',
    'mb_strcut($s,1,2,\'8bit\')',
    '',
    'mb_strlen(mb_substr($s,1,2))',
    'mb_strlen(mb_substr($s,1,2,\'8bit\'))',
    'mb_strlen(mb_substr($s,1,2), \'8bit\')',
    'mb_strlen(mb_substr($s,1,2,\'8bit\'), \'8bit\')',
    ''
));